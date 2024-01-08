<?php

namespace App\Http\Controllers\Tukang;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Keahlian;
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

    public function index(Request $request)
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
    public function register(Request $request)
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
    public function store(Request $request)
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

    public function authenticate(Request $request)
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

    // public function dashboard()
    // {
    //     $tukang = Tukang::where('id', session('idLogin'))->first();
    //     // $tukang = Tukang::where('id', Auth::user()->id);
    //     dd($tukang);
    //     return view('tukang.dashboard', ['tukang' => $tukang]);
    // }


    public function logout(Request $request)
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

    public function profile()
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

    public function profileUpdate($id, Request $request)
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
        $tukangs->harga = $request->harga;
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


    public function pengalaman()
    {
        $pengalamans = Pengalaman::where('tukangs_id', Auth::user()->id)->join('keahlians', 'pengalamans.keahlians_id', '=', 'keahlians.id')->select('pengalamans.*', 'keahlians.nama_keahlian')->get();
        return view('tukang.pengalaman.pengalaman', compact('pengalamans'));
    }

    public function tambahPengalaman()
    {
        $keahlians = Keahlian::all();
        return view('tukang.pengalaman.tambah-pengalaman', compact('keahlians'));
    }

    public function storePengalaman(Request $request)
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

    public function tampilPengalaman($id): View
    {
        $keahlians = Keahlian::all();
        $pengalaman = Pengalaman::findOrFail($id);
        return view('tukang.pengalaman.tampil-pengalaman', compact('pengalaman', 'keahlians'));
    }

    public function updatePengalaman($id, Request $request)
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

        if ($diterima === null) {
            Sewa::find($id)->update(['status' => $ditolak]);
            Alert::error('Sukses Ditolak', 'Status penyewaan sukses ditolak');
            return redirect()->back();
        } else {
            $sewa = Sewa::find($id)->join('tukangs', 'sewas.tukangs_id', '=', 'tukangs.id')->select('sewas.*', 'tukangs.nama', 'tukangs.harga')->orderBy('created_at', 'DESC')->first();
            // @dd([$id, $sewa]);


            if ($sewa->tipe_pembayaran == 'bank') {
                // $create_invoice_request = new \Xendit\Invoice\CreateInvoiceRequest([
                //     'external_id' => (string) Str::uuid(),
                //     'amount' => (int) $sewa->harga,
                // ]);
                // $result = $this->apiInstance->createInvoice($create_invoice_request);

                $secret_key = 'Basic ' . config('xendit.key_auth');
                $external_id = (string) Str::uuid();
                $data_request = Http::withHeaders([
                    'Authorization' => $secret_key
                ])->post('https://api.xendit.co/v2/invoices', [
                    'external_id' => $external_id,
                    'amount' => (int) $sewa->harga
                ]);
                $response = $data_request->object();

                // @dd($response);


                $payment = new Pembayaran();
                $payment->sewas_id = $sewa->id;
                $payment->status = "pending";
                $payment->checkout_link = $response->invoice_url;
                $payment->external_id = $external_id;
                $payment->total_harga = $sewa->harga;
                $payment->save();
            }

            $sewa->update(['status' => $diterima]);

            Alert::Success('Sukses Menerima', 'Status penyewaan sukses diterima');
            return redirect()->back()->with('success', 'berhasil melakukan konfirmasi');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
