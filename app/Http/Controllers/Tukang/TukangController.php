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
// use Alert;


class TukangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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
            'harga' => 'required|numeric|between:0,9999999999.99',
            'email' => 'required|email|max:250|unique:tukangs',
            'password' => ['required', 'confirmed', Password::min(8)->letters()->mixedCase()->numbers()->symbols()],
            'password_confirmation' => 'required|same:password'
        ]);

        $kecamatan = District::where('id', $request->kecamatan)->pluck('name')->first();
        $desa = Village::where('id', $request->desa)->pluck('name')->first();
        Tukang::create([
            'nama' => $request->nama,
            'tempat_lahir' =>  $request->tempat_lahir,
            'tanggal_lahir' =>  $request->tanggal_lahir,
            'kecamatan' => ucwords(strtolower($kecamatan)),
            'desa' => ucwords(strtolower($desa)),
            'keahlians_id' => $request->keahlians_id,
            'harga' => $request->harga,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

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

        // @dd(Auth::guard('tukang')->attempt($credentials));

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
        // $request->session()->flush();
        return redirect()->route('tukang.login');
    }

    public function portofolio($id)
    {
        $tukang = Tukang::join('keahlians', 'tukangs.keahlians_id', '=', 'keahlians.id')->where('tukangs.id', $id)->select('tukangs.*', 'keahlians.nama_keahlian')->get();
        // @dd($tukang->count());
        $pengalaman = Pengalaman::where('tukangs_id', $id)->join('keahlians', 'pengalamans.keahlians_id', '=', 'keahlians.id')->select('pengalamans.*', 'keahlians.nama_keahlian')->get();
        return view('portofolio', compact('tukang', 'pengalaman'));
    }

    public function profile()
    {
        $tukangs = Tukang::join('keahlians', 'tukangs.keahlians_id', '=', 'keahlians.id')
            ->where('tukangs.id', Auth::user()->id)
            ->select('tukangs.*', 'keahlians.nama_keahlian')
            ->first();
        // $tukangs = Tukang::find(Auth::user()->id);
        return view('tukang.profile', compact('tukangs'));
    }

    public function profileUpdate($id, Request $request)
    {
        $kecamatan = District::where('id', $request->kecamatan)->pluck('name')->first();
        $desa = Village::where('id', $request->desa)->pluck('name')->first();

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
        // $tukangs->foto = $fotoName;
        $fotoName = $tukangs->foto;

        if ($request->hasFile('foto')) {
            if ($tukangs->foto != null) Storage::delete('/public/foto/' . $tukangs->foto);
            $fotoName = time() . '.' . $request->foto->extension();
            $request->foto->storeAs('foto-profil', $fotoName, 'public');
            $tukangs->foto = $fotoName;
        }
        // @dd($tukangs);

        $tukangs->update();
        Alert::toast('Success update data!');
        return redirect()->route('tukang.profile');
    }

    // protected function deleteOldImage()
    // {
    //     if (auth()->user()->image) {
    //         Storage::delete('/public/images/' . Auth::guard('tukang')->user()->image);
    //     }
    // }


    public function pengalaman()
    {
        $pengalamans = Pengalaman::where('tukangs_id', Auth::user()->id)->join('keahlians', 'pengalamans.keahlians_id', '=', 'keahlians.id')->select('pengalamans.*', 'keahlians.nama_keahlian')->get();
        // @dd($pengalamans);
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
        $fotoName = time() . '.' . $request->foto->extension();
        $request->foto->move(public_path('assets/img/pengalaman'), $fotoName);

        $pengalamans = new Pengalaman();
        $pengalamans->tukangs_id = session('idLogin');
        $pengalamans->nama_proyek = $request->nama_proyek;
        $pengalamans->alamat = $request->alamat;
        $pengalamans->keahlians_id = $request->keahlians_id;
        $pengalamans->tanggal_mulai = $request->tanggal_mulai;
        $pengalamans->tanggal_selesai = $request->tanggal_selesai;
        $pengalamans->deskripsi = $request->deskripsi;
        $pengalamans->foto = $fotoName;
        $pengalamans->save();

        Alert::success('Sukses Ditambahkan!', 'Data Pengalaman berhasil ditambahkan');
        return redirect()->route('tukang.pengalaman');
    }

    public function konfirmasi()
    {
        $sewas = Sewa::where('tukangs_id', Auth::user()->id)->join('pelanggans', 'sewas.pelanggans_id', '=', 'pelanggans.id')->select('sewas.*', 'pelanggans.nama')->latest()->paginate(10);

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
            return redirect()->back()->with('success', 'berhasil melakukan konfirmasi');
        } else {
            Sewa::find($id)->update(['status' => $diterima]);
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
