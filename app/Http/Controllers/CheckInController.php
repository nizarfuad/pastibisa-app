<?php

namespace App\Http\Controllers;

use App\Models\CheckIn;
use Illuminate\Http\Request;

class CheckInController extends Controller
{
    public function index()
    {
        // $relasi = Attendance::all();
        return view('admin.cek_in', [
            'title' => 'Check In',
            'attendance' => CheckIn::all()]);
    }

    public function store(Request $request)
    {
        $cek = CheckIn::where([
            'uni_id' => $request->uni_id,
            'tanggal' => date('Y-m-d')
        ])->first();

        // $no = $cek->has('reservasi')->get();

        // if (!$no) {
        //     return redirect('/cek-in')->with('tidak_terdaftar', 'Tidak terdaftar');
        // }

        if ($cek) {
            return redirect('/cek-in')->with('gagal', 'QR Sudah Di Scan');
        }


        CheckIn::create([
            'uni_id' => $request->uni_id,
            'tanggal' => date('Y-m-d')
        ]);

        return redirect('/cek-in')->with('sukses', 'QR Sukses Di Scan');
    }
}
