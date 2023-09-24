<?php

namespace App\Http\Controllers\Tukang;

use App\Http\Controllers\Controller;
use App\Models\Keahlian;
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
        $kecamatans = \Indonesia::findCity('189', ['districts'])->districts;

        $keahlians = Keahlian::all();
        // @dd($keahlians);

        return ($request->session()->get('tukangIsLogin')) ? redirect()->back() : view('tukang.register', [
            'kecamatans' => $kecamatans,
            'keahlians' => $keahlians,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    public function getDesa(Request $request)
    {
        return \Indonesia::findDistrict($request->id, ['villages'])->villages->pluck('id', 'name');
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
