<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{

    public function register(): View
    {
        $api_key = 'am7S8vBUeesVc2Eh9V6jQqsSs4xLHn';
        $response_1 = Http::withHeaders([
            'x-api-key' => $api_key
        ])->get('https://api.goapi.id/v1/regional/kecamatan?kota_id=33.02');
        $kecamatans['kecamatans'] = $response_1->json()['data'];

        usort($kecamatans['kecamatans'], function ($a, $b) {
            return strcmp($a['name'], $b['name']);
        });

        $response_2 = Http::withHeaders([
            'x-api-key' => $api_key
        ])->get('https://api.goapi.id/v1/regional/kelurahan?kecamatan_id=33.02');
        $desas['desas'] = $response_2->json()['data'];

        $uniqueDesas = collect($desas['desas'])->unique('name')->values()->all();
        $desas['desas'] = $uniqueDesas;

        usort($desas['desas'], function ($a, $b) {
            return strcmp($a['name'], $b['name']);
        });

        return view('auth.register', $kecamatans, $desas);
    }

    public function store(Request $request)
    {

        $request->validate([
            'nama' => 'required|string|max:250',
            'kecamatan' => 'required|string|max:250',
            'desa' => 'required|string|max:250',
            'alamat' => 'required|string|max:250',
            'no_telepon' => 'required|string|max:250',
            'email' => 'required|email|max:250|unique:pelanggans',
            'password' => ['required', 'confirmed', Password::min(8)->letters()->mixedCase()->numbers()->symbols()->uncompromised()],
            'password_confirmation' => 'required|same:password'
        ]);

        Pelanggan::create([
            'nama' => $request->nama,
            'kecamatan' => $request->kecamatan,
            'desa' => $request->desa,
            'alamat' =>
            $request->alamat,
            'no_telepon' =>
            $request->no_telepon,
            'email' =>
            $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('auth.login');
        // $credentials = $request->only('email','password');
        // Auth::attempt($credentials);

    }

    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8']
        ]);

        if (!Auth::attempt($credentials)) {
            return redirect()->back()->withErrors([
                'email' => 'Terjadi kesalahan pada email',
                'password' => 'Terjadi kesalahan pada password',
            ])->onlyInput('email', 'password');
        }

        $user = Pelanggan::where('email', $request->email)->first();
        if (!Hash::check($request->password, $user->password, [])) {
            throw new \Exception('Invalid Credentials');
        }

        $request->session()->regenerate();
        return redirect()->route('pelanggan.homepage')->with('success', 'Berhasil Login!');
    }
}
