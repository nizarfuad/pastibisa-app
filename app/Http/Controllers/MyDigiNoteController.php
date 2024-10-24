<?php

namespace App\Http\Controllers;

use App\Models\Tipe;
use App\Models\Satuan;
use App\Models\Keuangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyDigiNoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $user = Auth::id();

        return view('admin.diginote.user_page', [
            'title' => 'My Digital Notes',
            'keuangan' => Keuangan::where('user_id', $user)->get(), // Data Penting
            'satuan' => Satuan::all(),
            'tipe' => Tipe::all(),
        ]);
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
            return redirect()->route('mydigitalnotes')->with(['sukses' => 'Data berhasil ditambahkan.']);
        }

        return redirect()->route('mydigitalnotes')->with(['gagal' => 'Data gagal ditambahkan.']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id) {

        $user = Auth::id();
        $b = Keuangan::where('user_id', $user)->find($id);

        if ($b)
        {
            return view('admin.administrasi.show', [
                'title' => 'My Digital Notes',
                'show' => $b,
            ]);
        }

        return abort(404);
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
