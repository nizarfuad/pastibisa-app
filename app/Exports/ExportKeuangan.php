<?php

namespace App\Exports;

use App\Models\Keuangan;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class ExportKeuangan implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $data = Keuangan::orderBy('keperluan')->get();
        return view('admin.administrasi.table.administrasi-table',
        [
            'data' => $data,
            'keuangan' => Keuangan::where('verify_id', 1)->get(),
            'i' => 1,
        ]);
    }
}
