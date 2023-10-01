<?php

namespace App\Http\Controllers\Tukang;

use App\Http\Controllers\Controller;
use App\Models\Keahlian;
use App\Models\Pengalaman;
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

class TukangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->session()->get('tukangIsLogin') || $request->session()->get('isLogin')) {
            $request->session()->flush();
            return view('tukang.login');
        }
        return view('tukang.login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function register(Request $request)
    {
        $kecamatans = \Indonesia::findCity('189', ['districts'])->districts;
        $keahlians = Keahlian::all();
        if ($request->session()->get('tukangIsLogin') || $request->session()->get('isLogin')) {
            $request->session()->flush();
            return view('tukang.register', [
                'kecamatans' => $kecamatans,
                'keahlians' => $keahlians,
            ]);
        }
        return view('tukang.register', [
            'kecamatans' => $kecamatans,
            'keahlians' => $keahlians,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:250',
            'tempat_lahir' => 'required|string|max:100',
            'tanggal_lahir' => 'required',
            'kecamatan' => 'required',
            'desa' => 'required',
            'id_keahlian' => 'required',
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
            'id_keahlian' => $request->id_keahlian,
            'harga' => $request->harga,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('tukang.login')->with('success', 'Berhasil membuat akun');
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
                $request->session()->put([
                    'tukangIsLogin' => Auth::guard('tukang')->check(),
                    'idLogin' => Auth::guard('tukang')->user()->id_tukang,
                    'nama' => Auth::guard('tukang')->user()->nama,
                ]);
                return redirect()->route('tukang.profile')->with('success', 'Berhasil Login!');
            }

            throw new \Exception('Invalid Password');
        }

        return redirect()->back()->withErrors([
            'email' => 'email atau password tidak valid',
        ])->onlyInput('email');
    }

    public function dashboard()
    {
        $tukang = Tukang::where('id_tukang', session()->get('idLogin'));
        return view('tukang.dashboard', ['tukang' => $tukang]);
    }


    public function logout(Request $request)
    {

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        $request->session()->flush();
        return redirect()->route('tukang.login')->with('success', 'Berhasil Logout!');
    }

    public function portofolio($nama)
    {
        $tukangs = Tukang::where('nama', $nama)->join('keahlians', 'tukangs.id_keahlian', '=', 'keahlians.id_keahlian')->select('tukangs.*', 'keahlians.nama_keahlian')->get();
        return !$tukangs ? abort(404) : view('portofolio', compact('tukangs'));
    }

    public function profile()
    {
        return view('tukang.profile');
    }

    public function pengalaman()
    {
        $pengalamans = Pengalaman::where('id_tukang', session('idLogin'))->join('keahlians', 'pengalamans.id_keahlian', '=', 'keahlians.id_keahlian')->select('pengalamans.*', 'keahlians.nama_keahlian')->get();
        // @dd($pengalamans);
        return view('tukang.pengalaman.pengalaman', ['pengalamans' => $pengalamans]);
    }

    public function tambahPengalaman()
    {
        $keahlians = Keahlian::all();
        return view('tukang.pengalaman.tambah-pengalaman', ['keahlians' => $keahlians]);
    }

    public function storePengalaman(Request $request)
    {
        $request->validate([
            'nama_proyek' => 'required|string|max:250',
            'alamat' => 'required|string|max:250',
            'id_keahlian' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
            'deskripsi' => 'required',
            'foto' => 'image|mimes:png,jpg,jpeg|max:2048',
        ]);
        // @dd($request);
        $fotoName = time() . '.' . $request->foto->extension();
        $request->foto->move(public_path('assets/img/pengalaman'), $fotoName);

        // @dd($request);
        Pengalaman::create([
            'id_tukang' => session('idLogin'),
            'nama_proyek' => $request->nama_proyek,
            'alamat' => $request->alamat,
            'id_keahlian' => $request->id_keahlian,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'deskripsi' => $request->deskripsi,
            'foto' => $fotoName,
        ]);

        return redirect()->route('tukang.pengalaman')->with('success', 'data pengalaman berhasil ditambahkan');
    }
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
