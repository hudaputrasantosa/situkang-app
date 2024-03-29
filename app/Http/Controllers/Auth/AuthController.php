<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Pelanggan;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use Illuminate\Validation\Rules\Password;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Village;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    // public function __construct()
    // {
    //      $this->middleware('auth')->except([
    //           'auth.login', 'auth.register'
    //      ]);
    // }

    public function register(Request $request)
    {
        if (Auth::check()) {
            Auth::logout();
            $request->session()->invalidate();
        }
        $kecamatans = \Indonesia::findCity('189', ['districts'])->districts;

        return view('auth.register', compact('kecamatans'));
    }

    public function store(Request $request)
    {

        $validated =  $request->validate([
            'nama' => 'required|string|max:250',
            'tempat_lahir' => 'required|string|max:100',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'kecamatan' => 'required',
            'desa' => 'required',
            'alamat' => 'required|string|max:250',
            'no_telepon' => 'required|string|max:250',
            'email' => 'required|email|max:250|unique:pelanggans',
            'password' => ['required', Password::min(8)->letters()->numbers()],
        ]);
        $pelanggan = new Pelanggan();
        $pelanggan->fill($validated);
        $pelanggan->save();

        Alert::toast('Berhasil mendaftarkan akun');
        return redirect()->route('auth.login');
    }

    public function login(Request $request)
    {
        if (Auth::check()) {
            Auth::logout();
            $request->session()->invalidate();
        }

        return view('auth.login');
    }

    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (!Auth::attempt($credentials)) {
            return redirect()->back()->withErrors([
                'email' => 'Terjadi kesalahan pada email',
                'password' => 'Terjadi kesalahan pada password',
            ])->onlyInput('email');
        }

        $user = Pelanggan::where('email', $request->email)->first();
        if (!Hash::check($request->password, $user->password, [])) {
            throw new \Exception('Invalid Credentials');
        }
        $request->session()->regenerate();
        Alert::toast('Sukses Login! Selamat datang ' . Auth::user()->nama);
        return redirect()->route('homepage')->with('success', 'Berhasil Login!');
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->back();
    }
}
