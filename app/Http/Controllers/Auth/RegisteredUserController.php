<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Pelanggan;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\Http;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
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

        usort($desas['desas'], function ($a, $b) {
            return strcmp($a['name'], $b['name']);
        });

        return view('auth.register', $kecamatans, $desas);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = Pelanggan::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
