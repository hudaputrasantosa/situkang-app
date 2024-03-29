<?php

namespace App\Http\Controllers\Tukang;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Keahlian;
use App\Models\Notification;
use App\Models\Pengalaman;
use App\Models\Sewa;
use App\Models\Tukang;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Village;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Pembayaran;
use Xendit\Configuration;
use Xendit\Invoice\InvoiceApi;
use Illuminate\Support\Str;
use Pusher\Pusher;

class TukangController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    var $apiInstance = null;

    public function __construct()
    {
        Configuration::setXenditKey('xnd_development_GESApPvkuRa2kwoRg7Dmdg0OBgZkccKXsxEUaJsFipCyf2dle9r18a61JWkVxm');
        $this->apiInstance = new InvoiceApi();
    }

    public function tampilMasuk(Request $request)
    {
        if (Auth::check()) {
            Auth::logout();
            $request->session()->invalidate();
        }
        // Alert::toast('Success ngaab', 'Success Message');
        return view('tukang.login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function tampilDaftar(Request $request)
    {
        $kecamatans = \Indonesia::findCity('189', ['districts'])->districts;
        $keahlians = Keahlian::all();
        if (Auth::check()) {
            Auth::logout();
            $request->session()->invalidate();
        }
        return view('tukang.register', compact('keahlians', 'kecamatans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function daftar(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:250',
            'tempat_lahir' => 'required|string|max:100',
            'tanggal_lahir' => 'required',
            'kecamatan' => 'required',
            'desa' => 'required',
            'keahlians_id' => 'required',
            'no_telepon' => 'required',
            'harga' => 'required|numeric|between:0,9999999999.99',
            'email' => 'required|email|max:250|unique:tukangs',
            'password' => ['required', Password::min(8)->letters()->numbers()],
        ]);
        $validated['harga'] = preg_replace("/[.,]/", "", $validated['harga']);
        $tukang = new Tukang();
        $tukang->fill($validated);
        $tukang->save();

        Alert::toast('Berhasil mendaftarkan akun');
        return redirect()->route('tukang.login');
    }

    public function getDesa(Request $request)
    {
        return \Indonesia::findDistrict($request->id, ['villages'])->villages->pluck('id', 'name');
    }
    /**
     * Display the specified resource.
     */

    public function masuk(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);


        if (Auth::guard('tukang')->attempt($credentials)) {
            $user = Tukang::where('email', $request->email)->first();

            if (Hash::check($request->password, $user->password, [])) {
                $request->session()->regenerate();
                // @dd(Auth::check());
                Alert::toast('Berhasil Login! Selamat Datang ' . Auth::guard('tukang')->user()->nama);
                return redirect()->route('tukang.profile');
            }

            throw new \Exception('Invalid Password');
        }

        return redirect()->back()->withErrors([
            'email' => 'email atau password tidak valid',
        ])->onlyInput('email');
    }


    public function keluar(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('tukang.login');
    }

    public function portofolio($id)
    {
        $tukang = Tukang::join('keahlians', 'tukangs.keahlians_id', '=', 'keahlians.id')->where('tukangs.id', $id)->select('tukangs.*', 'keahlians.nama_keahlian')->first();
        if ($tukang) {
            $kecamatan = District::where('id', $tukang->kecamatan)->first();
            $desa = Village::where('id', $tukang->desa)->first();
            $pengalamans = Pengalaman::where('tukangs_id', $id)->join('keahlians', 'pengalamans.keahlians_id', '=', 'keahlians.id')->select('pengalamans.*', 'keahlians.nama_keahlian')->get();
            return view('portofolio', compact('tukang', 'kecamatan', 'desa', 'pengalamans'));
        }
        return abort(404);
    }

    public function tampilProfile()
    {
        $tukangs = Tukang::join('keahlians', 'tukangs.keahlians_id', '=', 'keahlians.id')
            ->where('tukangs.id', Auth::user()->id)
            ->select('tukangs.*', 'keahlians.nama_keahlian')
            ->first();
        $kecamatans = \Indonesia::findCity('189', ['districts'])->districts;
        $keahlians = Keahlian::all()->except($tukangs->keahlians_id);
        $kecamatan = District::where('id', Auth::user()->kecamatan)->first();
        $desa = Village::where('id', Auth::user()->desa)->first();
        return view('tukang.profile', compact('tukangs', 'keahlians', 'kecamatans', 'kecamatan', 'desa'));
    }

    public function updateProfile($id, Request $request)
    {
        $tukangs = Tukang::find($id);
        $tukangs->nama = $request->nama;
        $tukangs->tempat_lahir = $request->tempat_lahir;
        $tukangs->tanggal_lahir = $request->tanggal_lahir;
        $tukangs->kecamatan = $request->kecamatan;
        $tukangs->desa = $request->desa;
        $tukangs->alamat = $request->alamat;
        $tukangs->keahlians_id = $request->keahlians_id;
        $tukangs->no_telepon = $request->no_telepon;
        $tukangs->harga = preg_replace("/[.,]/", "", $request->harga);
        $tukangs->deskripsi = $request->deskripsi;
        $fotoName = $tukangs->foto;

        if ($request->hasFile('foto')) {
            if ($tukangs->foto != null && Storage::disk('public')->exists('tukang/foto-profil/' . $tukangs->foto)) Storage::disk('public')->delete('tukang/foto-profil/' . $tukangs->foto);
            $fotoName = time() . '.' . $request->foto->extension();
            $request->foto->storeAs('tukang/foto-profil', $fotoName, 'public');
            $tukangs->foto = $fotoName;
        }

        $tukangs->update();
        Alert::toast('Berhasil update data!');
        return redirect()->route('tukang.profile');
    }


    public function tampilPengalaman()
    {
        $pengalamans = Pengalaman::where('tukangs_id', Auth::user()->id)->join('keahlians', 'pengalamans.keahlians_id', '=', 'keahlians.id')->select('pengalamans.*', 'keahlians.nama_keahlian')->get();
        return view('tukang.pengalaman.pengalaman', compact('pengalamans'));
    }

    public function tampilTambahPengalaman()
    {
        $keahlians = Keahlian::all();
        return view('tukang.pengalaman.tambah-pengalaman', compact('keahlians'));
    }

    public function tambahPengalaman(Request $request)
    {
        $request->validate([
            'nama_proyek' => 'required|string|max:250',
            'alamat' => 'required|string|max:250',
            'keahlians_id' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
            'deskripsi' => 'required',
            'foto' => 'image|mimes:png,jpg,jpeg|max:2048',
        ]);

        $pengalamans = new Pengalaman();
        $pengalamans->tukangs_id = Auth::user()->id;
        $pengalamans->nama_proyek = $request->nama_proyek;
        $pengalamans->alamat = $request->alamat;
        $pengalamans->keahlians_id = $request->keahlians_id;
        $pengalamans->tanggal_mulai = $request->tanggal_mulai;
        $pengalamans->tanggal_selesai = $request->tanggal_selesai;
        $pengalamans->deskripsi = $request->deskripsi;

        $fotoName = time() . '.' . $request->foto->extension();
        $request->foto->storeAs('tukang/pengalaman/', $fotoName, 'public');
        $pengalamans->foto = $fotoName;

        $pengalamans->save();

        Alert::success('Sukses Ditambahkan!', 'Data Pengalaman berhasil ditambahkan');
        return redirect()->route('tukang.pengalaman');
    }

    public function lihatPengalaman($id): View
    {
        $keahlians = Keahlian::all();
        $pengalaman = Pengalaman::findOrFail($id);
        return view('tukang.pengalaman.tampil-pengalaman', compact('pengalaman', 'keahlians'));
    }

    public function perbaruiPengalaman($id, Request $request)
    {
        $request->validate([
            'nama_proyek' => 'required|string|max:250',
            'alamat' => 'required|string|max:250',
            'keahlians_id' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
            'deskripsi' => 'required',
            'foto' => 'image|mimes:png,jpg,jpeg|max:2048',
        ]);

        $pengalaman = Pengalaman::find($id);
        $pengalaman->nama_proyek = $request->nama_proyek;
        $pengalaman->alamat = $request->alamat;
        $pengalaman->keahlians_id = $request->keahlians_id;
        $pengalaman->tanggal_mulai = $request->tanggal_mulai;
        $pengalaman->tanggal_selesai = $request->tanggal_selesai;
        $pengalaman->deskripsi = $request->deskripsi;
        $fotoName = $request->foto;

        if ($request->hasFile('foto')) {
            if ($pengalaman->foto != null && Storage::disk('public')->exists('tukang/pengalaman/' . $pengalaman->foto)) Storage::disk('public')->delete('tukang/pengalaman/' . $pengalaman->foto);
            $fotoName = time() . '.' . $request->foto->extension();
            $request->foto->storeAs('tukang/pengalaman/', $fotoName, 'public');
            $pengalaman->foto = $fotoName;
        }
        // @dd($pengalaman);
        $pengalaman->update();
        Alert::toast('Success update data pengalaman!');
        return redirect()->route('tukang.pengalaman');
    }

    public function hapusPengalaman($id)
    {
        $pengalaman = Pengalaman::findOrFail($id);
        if ($pengalaman) {
            Storage::disk('public')->delete('tukang/pengalaman/' . $pengalaman->foto);
            $pengalaman->delete();
        }
        return redirect()->back();
    }

    public function konfirmasi()
    {
        $sewas = Sewa::where('tukangs_id', Auth::user()->id)->join('pelanggans', 'sewas.pelanggans_id', '=', 'pelanggans.id')->select('sewas.*', 'pelanggans.nama', 'pelanggans.kecamatan', 'pelanggans.desa', 'pelanggans.alamat', 'pelanggans.no_telepon')->latest()->paginate(5);
        // @dd($sewas);
        return view('tukang.penyewaan.konfirmasi', compact('sewas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function updateStatus($id, Request $request)
    {
        $diterima = $request->terima;
        $ditolak = $request->tolak;
        $sewa = Sewa::find($id);

        $notif = new Notification();
        $notif->pelanggans_id = $sewa->pelanggans_id;
        $pelanggans_id = $notif->pelanggans_id;
        $notif->tukangs_id = Auth::user()->id;
        $tukangs_id = $notif->tukangs_id;
        $notif->tipe = 'konfirmasi';
        $tipe = $notif->tipe;
        $notif->save();

        $options = array(
            'cluster' => 'ap1',
            'useTLS' => true,
        );

        $pusher = new Pusher(
            env('PUSHER_APP_KEY_2'),
            env('PUSHER_APP_SECRET_2'),
            env('PUSHER_APP_ID_2'),
            $options,
        );
        $data = [
            'pelanggans_id' => $pelanggans_id,
            'tukangs_id' => $tukangs_id,
            'tipe' => $tipe,
        ];
        $pusher->trigger('update-sewa', 'update-event', $data);

        if ($diterima === null) {
            $sewa->update(['status' => $ditolak]);
            Alert::error('Sukses Ditolak', 'Status penyewaan sukses ditolak');
            return redirect()->back();
        } else {
            $dataSewa = $sewa->join('tukangs', 'sewas.tukangs_id', '=', 'tukangs.id')->select('sewas.*', 'tukangs.nama', 'tukangs.harga')->orderBy('created_at', 'DESC')->first();
            if ($dataSewa->tipe_pembayaran == 'bank') {
                $secret_key = 'Basic ' . config('xendit.key_auth');
                $external_id = (string) Str::uuid();
                $data_request = Http::withHeaders([
                    'Authorization' => $secret_key
                ])->post('https://api.xendit.co/v2/invoices', [
                    'external_id' => $external_id,
                    'amount' => (int) $dataSewa->harga
                ]);
                $response = $data_request->object();
                $payment = new Pembayaran();
                $payment->sewas_id = $dataSewa->id;
                $payment->status = "pending";
                $payment->checkout_link = $response->invoice_url;
                $payment->external_id = $external_id;
                $payment->total_harga = $dataSewa->harga;
                $payment->save();
            }

            $dataSewa->update(['status' => $diterima]);

            Alert::Success('Sukses Menerima', 'Status penyewaan sukses diterima');
            return redirect()->back()->with('success', 'berhasil melakukan konfirmasi');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function tukangsByKecamatan(Request $request)
    {
        if ($request->id !== 'semua') {
            return Tukang::where('kecamatan', $request->id)->get();
        } else {
            return Tukang::where('keahlians_id', $request->idk)->get();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
