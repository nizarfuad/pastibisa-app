<?php

namespace App\Http\Controllers;

use App\Models\Tipe;
use App\Models\User;
use App\Models\Satuan;
use App\Models\DigiNote;
use App\Models\Keuangan;
use Illuminate\Http\Request;

class DigiNoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.diginote', [
            'title' => 'Digital Notes',
            'keuangan' => Keuangan::where('verify_id', 0)->get(), // Data Penting
            'satuan' => Satuan::all(),
            'tipe' => Tipe::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'user_id' => 'required',
            'keperluan' => 'required',
            'jumlah' => 'required',
            'harga' => 'required',
            'satuan_id' => 'required',
            'attachment' => 'required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048',
            'tipe_id' => 'required',
            'verify_id' => 'required',
        ]);

        if ($validator) {

            $imageName = time().'.'.$request->attachment->extension();
            $request->attachment->move(public_path('attachment/keuangan/img'), $imageName);

            Keuangan::create([
                'user_id' => $request->user_id,
                'keperluan' => $request->keperluan,
                'jumlah' => $request->jumlah,
                'harga' => $request->harga,
                'satuan_id' => $request->satuan_id,
                'attachment' => 'attachment/keuangan/img/'.$imageName,
                'tipe_id' => $request->tipe_id,
                'verify_id' => $request->verify_id,
            ]);
            return redirect()->route('digitalnotes')->with(['sukses' => 'Data berhasil ditambahkan.']);
        }

        return redirect()->route('digitalnotes')->with(['gagal' => 'Data gagal ditambahkan.']);
    }

    /**
     * Display the specified resource.
     */
    public function show($username, $id) {
        $b = Keuangan::where('verify_id', 0)->find($id);

        if ($b)
        {
            return view('admin.administrasi.show', [
                'title' => 'Digital Notes',
                'show' => $b,
                'username' => User::find($username)
            ]);
        }

        return abort(404);


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DigiNote $digiNote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DigiNote $digiNote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DigiNote $digiNote)
    {
        //
    }
}
