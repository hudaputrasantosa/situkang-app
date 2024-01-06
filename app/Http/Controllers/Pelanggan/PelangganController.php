<?php

namespace App\Http\Controllers\Pelanggan;

use App\Events\MessageCreated;
use App\Http\Controllers\Controller;
use App\Models\Keahlian;
use App\Models\Notification;
use App\Models\Pelanggan;
use App\Models\Pembayaran;
use App\Models\Sewa;
use App\Models\Tukang;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View as ViewView;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Village;
use Pusher\Pusher;
use RealRashid\SweetAlert\Facades\Alert;
use Xendit\Invoice;
use Xendit\Configuration;
use Xendit\Invoice\InvoiceApi;
use Xendit\Xendit;

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

    public function jenisTukang(): View
    {
        $keahlians = Keahlian::all();
        return view('jenis', compact('keahlians'));
    }

    public function hasilPencarian($idKeahlian): View
    {
        $tukangs = Tukang::join('keahlians', 'tukangs.keahlians_id', '=', 'keahlians.id')->where('keahlians_id', $idKeahlian)->select('tukangs.*', 'keahlians.nama_keahlian')->get();
        $nama_keahlian = Keahlian::find($idKeahlian)['nama_keahlian'];
        $kecamatans = \Indonesia::findCity('189', ['districts'])->districts;
        return view('hasil-jenis', compact('tukangs', 'kecamatans', 'nama_keahlian'));
    }

    public function profile()
    {
        $pelanggan = Pelanggan::find(Auth::user()->id);
        $kecamatans = \Indonesia::findCity('189', ['districts'])->districts;
        $kecamatan = District::where('id', Auth::user()->kecamatan)->first();
        $desa = Village::where('id', Auth::user()->desa)->first();

        return view('pelanggan.profile', compact('pelanggan', 'kecamatans', 'kecamatan', 'desa'));
    }

    public function updateProfile(Request $request)
    {
        $pelanggan = Pelanggan::find(Auth::user()->id);
        $pelanggan->nama = $request->nama;
        $pelanggan->tempat_lahir = $request->tempat_lahir;
        $pelanggan->tanggal_lahir = $request->tanggal_lahir;
        $pelanggan->kecamatan = $request->kecamatan;
        $pelanggan->desa = $request->desa;
        $pelanggan->alamat = $request->alamat;
        $pelanggan->no_telepon = $request->no_telepon;

        // $tukangs->foto = $fotoName;
        $fotoName = $pelanggan->foto;
        if ($request->hasFile('foto')) {
            if ($pelanggan->foto != null && Storage::disk('public')->exists('pelanggan/foto-profil/' . $pelanggan->foto)) Storage::disk('public')->delete('pelanggan/foto-profil/' . $pelanggan->foto);
            $fotoName = time() . '.' . $request->foto->extension();
            $request->foto->storeAs('pelanggan/foto-profil', $fotoName, 'public');
            $pelanggan->foto = $fotoName;
        }

        $pelanggan->update();
        Alert::toast('Berhasil update data');
        return redirect()->route('pelanggan.profil');
    }

    public function riwayatSewa()
    {
        $sewas = Sewa::join('tukangs', 'sewas.tukangs_id', '=', 'tukangs.id')->select('sewas.*', 'tukangs.nama AS nama_tukang', 'tukangs.harga')->orderBy('created_at', 'DESC')->get();
        // @dd($sewa);
        return view('pelanggan.sewa', compact('sewas'));
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

    public function checkout($id)
    {
        $pembayaran = Pembayaran::where('sewas_id', $id)->first();
        if ($pembayaran) {
            if ($pembayaran->status != 'paid') return redirect()->away($pembayaran->checkout_link);
        }
        return redirect()->back();
    }

    public function webhook(Request $request)
    {
        $data = $request->all();
        Pembayaran::where('external_id', $data['external_id'])->update([
            'status' => strtolower($request->status)
        ]);

        return response()->json($data);

        // try {
        //     $payment = Pembayaran::where('external_id', $data['external_id']);
        //     $callback_token = config('xendit.key_webhook');

        //     if ($request->header('x-callback-token') == $callback_token) {
        //         if ($payment->status == 'paid') return response()->json(['data' => 'Payment has already']);
        //         $payment->update([
        //             'status' => strtolower($request->status),
        //         ]);

        //         return response()->json([
        //             'data' => 'success',
        //         ]);
        //     }
        //     return response()->json([
        //         'status' => 'error',
        //         'message' => 'Invalid callback token'
        //     ], 400);
        // } catch (\Exception $e) {
        //     return response()->json([
        //         'status' => 'error',
        //         'message' => $e->getMessage()
        //     ], 500);
        // }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function tentang()
    {
        return view('tentang');
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
