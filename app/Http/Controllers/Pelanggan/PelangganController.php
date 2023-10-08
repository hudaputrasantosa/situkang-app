<?php

namespace App\Http\Controllers\Pelanggan;

use App\Events\MessageCreated;
use App\Http\Controllers\Controller;
use App\Models\Sewa;
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
        MessageCreated::dispatch('Testing Broadcast');

        $tukangs = Tukang::join('keahlians', 'tukangs.keahlians_id', '=', 'keahlians.id')->select('tukangs.*', 'keahlians.nama_keahlian')->get();
        // $keahlian = $tukangs->keahlian();
        // @dd($tukangs);
        return ($request->session()->get('tukangIsLogin')) ? redirect()->back() : view('homepage', compact('tukangs'));
        // return view('homepage');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function sewa(Request $request)
    {
        $request->validate([
            'tukangs_id' => 'required',
            'tanggal_sewa' => 'required',
            'durasi' => 'required|numeric',
            'metode_pembayaran' => 'required',
        ]);
        // @dd([$request, session('idLogin')]);
        $sewa = new Sewa();
        $sewa->tukangs_id = $request->tukangs_id;
        $sewa->pelanggans_id = session('idLogin');
        $sewa->tanggal_sewa = $request->tanggal_sewa;
        $sewa->durasi = $request->durasi;
        $sewa->metode_pembayaran = $request->metode_pembayaran;
        $sewa->status = "diproses";
        $sewa->save();

        return redirect()->back()->with('success', 'Berhasil melakukan pengajuan sewa');
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
