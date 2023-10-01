<?php

namespace App\Http\Controllers\Pelanggan;

use App\Http\Controllers\Controller;
use App\Models\Tukang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PelangganController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('guest')->except([
    //         'auth.logout', 'homepage'
    //     ]);
    // }
    /**
     * Display a listing of the resource.
     */
    public function homepage(Request $request)
    {
        $tukangs = Tukang::join('keahlians', 'tukangs.id_keahlian', '=', 'keahlians.id_keahlian')->select('tukangs.*', 'keahlians.nama_keahlian')->get();
        // $keahlian = $tukangs->keahlian();
        // @dd($tukangs);
        return ($request->session()->get('tukangIsLogin')) ? redirect()->back() : view('homepage', compact('tukangs'));
        // return view('homepage');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
