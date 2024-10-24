<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Keuangan;
use Illuminate\Http\Request;
use App\Exports\ExportKeuangan;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;

class KeuanganController extends Controller
{

    public function export()
    {
        return Excel::download(new ExportKeuangan, "keuangan.xlsx");
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function show($username, $id) {
        $b = Keuangan::where('verify_id', 1)->find($id);

        if ($b)
        {
            return view('admin.administrasi.show', [
                'title' => 'Administrasi',
                'show' => $b,
                'username' => User::find($username)
            ]);
        }

        return abort(404);

    }

    public function lookupAdministrasi($username) {
        return view('admin.keuangan.show', [
            'title' => 'Administrasi Lookup',
            'show' => User::where('username', $username)->first(),
            // 'show_keuangan' => User::find($username)->get(),
        ]);
    }

    public function lookupDiginotes($username) {
        return view('admin.keuangan.show', [
            'title' => 'Digital Notes Lookup',
            'show' => User::where('username', $username)->first(),
            // 'show_keuangan' => User::find($username)->get(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Keuangan $keuangan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Keuangan $keuangan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyAdministrasi($id)
    {
        $find = Keuangan::find($id);
        File::delete($find->attachment);
        $find->delete();

        return redirect()->route('administrasi')->with(['sukses' => 'Data Berhasil Dihapus!']);
    }

    public function destroyDiginotes($id)
    {
        $find = Keuangan::find($id);
        File::delete($find->attachment);
        $find->delete();

        return redirect()->route('digitalnotes')->with(['sukses' => 'Data Berhasil Dihapus!']);
    }

    public function destroyMyDiginotes($id)
    {
        $find = Keuangan::find($id);
        File::delete($find->attachment);
        $find->delete();

        return redirect()->route('mydigitalnotes')->with(['sukses' => 'Data Berhasil Dihapus!']);
    }

    public function mark($id)
    {
        Keuangan::find($id)->update(['verify_id' => '1']);
        return redirect()->route('digitalnotes')->with(['sukses' => 'Data Berhasil diberi mark!']);
    }

    public function unmark($id)
    {
        Keuangan::find($id)->update(['verify_id' => '0']);
        return redirect()->route('administrasi')->with(['sukses' => 'Data Berhasil di unmark!']);
    }

    public function mark_all()
    {
        Keuangan::where('verify_id', 0)->update(['verify_id' => '1']);
        return redirect()->route('digitalnotes')->with(['sukses' => 'Semua Data berhasil diberi mark!']);
    }
}
