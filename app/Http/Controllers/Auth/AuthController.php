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

          return ($request->session()->get('isLogin')) ? redirect()->back() : view('auth.register', $kecamatans, $desas);
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

          return redirect()->route('auth.login')->with('success', 'Berhasil membuat akun');
     }

     public function login(Request $request)
     {
          return ($request->session()->get('isLogin')) ? redirect()->back() : view('auth.login');
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
               ])->only('email');
          }

          $user = Pelanggan::where('email', $request->email)->first();
          if (!Hash::check($request->password, $user->password, [])) {
               throw new \Exception('Invalid Credentials');
          }
          $request->session()->regenerate();
          $request->session()->put(['isLogin' => auth()->check(), 'nama' => auth()->user()->nama]);
          return redirect()->route('homepage')->with('success', 'Berhasil Login!');
     }


     public function logout(Request $request)
     {
          Auth::logout();
          $request->session()->invalidate();
          $request->session()->regenerateToken();
          $request->session()->flush();
          return redirect()->back()->with('success', 'Berhasil Logout!');
     }
}
