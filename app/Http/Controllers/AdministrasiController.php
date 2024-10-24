<?php

namespace App\Http\Controllers;

use App\Models\Tipe;
use App\Models\Satuan;
use App\Models\Keuangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\MathController;
use data;

class AdministrasiController extends Controller
{

    public function index()
    {
        $data = Keuangan::orderBy('keperluan')->get();
        return view('admin.administrasi', [
            'title' => 'Administrasi',
            'keuangan' => Keuangan::where('verify_id', 1)->get(), // Data Penting
            'satuan' => Satuan::all(),
            'tipe' => Tipe::all(),
            'data' => $data,
            // 'sumkeu2' => Keuangan::where('tipe_id', 1)->get('jumlah'),
        ]);
    }


    // public function kalikan()
    // {
    //     return $this->jumlah * $this->harga;
    // }


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
            return redirect()->route('administrasi')->with(['sukses' => 'Data berhasil ditambahkan.']);
        }

        return redirect()->route('administrasi')->with(['gagal' => 'Data gagal ditambahkan.']);

    }

    public function destroy($id) {
        //
    }

    public function update(Request $request, $id)
    {

        $find = Keuangan::findOrFail($id);

        $validator = $request->validate([
            'user_id' => 'required',
            'keperluan' => 'required',
            'jumlah' => 'required',
            'harga' => 'required',
            'satuan_id' => 'required',
            'attachment' => 'required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048',
            'tipe_id' => 'required',
        ]);

        if ($validator)
        {
            $find->update([
            'user_id' => $request->user_id,
            'keperluan' => $request->keperluan,
            'jumlah' => $request->jumlah,
            'harga' => $request->harga,
            'satuan_id' => $request->satuan_id,
            'attachment' => $request->attachment,
            'tipe_id' => $request->tipe_id,
            ]);

            return redirect()->route('administrasi')->with('sukses', 'Data berhasil diedit.');
        }

        return redirect()->route('administrasi')->with('gagal', 'Data gagal ditambahkan.');
    }
}
