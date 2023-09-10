<?php

namespace App\Http\Controllers\Tukang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TukangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('tukang.login');
    }

    /**
     * Show the form for creating a new resource.
     */
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

        return ($request->session()->get('tukangIsLogin')) ? redirect()->back() : view('tukang.register', $kecamatans, $desas);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
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
