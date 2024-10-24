<?php

namespace App\Http\Controllers;

use App\Models\Keuangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MathController extends Controller
{
    // public static function mathForAdministrasi()
    // {
    //     // $data = Keuangan::where('verify_id', 1);

    //     $amount = Keuangan::where('verify_id', 1)->select(DB::raw('sum(jumlah * harga) AS sum_of_jumlah_harga'));
    //     return $amount;
    // }
}
