<?php

namespace App\Http\Controllers\Pelanggan;

use App\Events\MessageCreated;
use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\Pelanggan;
use App\Models\Sewa;
use App\Models\Tukang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Pusher\Pusher;
use RealRashid\SweetAlert\Facades\Alert;

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
        $tukangs = Tukang::join('keahlians', 'tukangs.keahlians_id', '=', 'keahlians.id')->select('tukangs.*', 'keahlians.nama_keahlian')->get();
        return view('homepage', compact('tukangs'));
    }

    public function profile()
    {
        $pelanggan = Pelanggan::findOrFail(Auth::user()->id);
        $kecamatans = \Indonesia::findCity('189', ['districts'])->districts;
        return view('pelanggan.profile', compact('pelanggan', 'kecamatans'));
    }

    public function updateProfile()
    {
    }

    public function riwayatSewa()
    {
        return view('pelanggan.sewa');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function sewa(Request $request)
    {
        $request->validate([
            'tukangs_id' => 'required',
            'tanggal_sewa' => 'required',
            'tipe_sewa' => 'required',
            'tipe_bangunan' => 'required',
            'tipe_pengerjaan' => 'required',
            'tipe_pembayaran' => 'required',
            'deskripsi' => 'required',
        ]);

        $sewa = new Sewa();
        $sewa->tukangs_id = $request->tukangs_id;
        $sewa->pelanggans_id = Auth::user()->id;
        $sewa->tanggal_sewa = $request->tanggal_sewa;
        $sewa->tipe_sewa = $request->tipe_sewa;
        $sewa->tipe_bangunan = $request->tipe_bangunan;
        $sewa->tipe_pengerjaan = $request->tipe_pengerjaan;
        $sewa->tipe_pembayaran = $request->tipe_pembayaran;
        $sewa->deskripsi = $request->deskripsi;
        $sewa->status = "diproses";
        $sewa->save();

        $notif = new Notification();
        $notif->pelanggans_id = Auth::user()->id;
        $pelanggans_id = $notif->pelanggans_id;
        $notif->tukangs_id = $request->tukangs_id;
        $tukangs_id = $notif->tukangs_id;
        $notif->save();

        $options = array(
            'cluster' => 'ap1',
            'useTLS' => true,
        );

        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options,
        );
        $data = [
            'pelanggans_id' => $pelanggans_id,
            'tukangs_id' => $tukangs_id,
        ];
        $pusher->trigger('my-channel', 'my-event', $data);

        Alert::Success('Sukses!', 'Sukses mengajukan sewa kepada tukang');
        return redirect()->back();
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
