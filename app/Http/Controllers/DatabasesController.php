<?php

namespace App\Http\Controllers;

use App\Models\Tipe;
use App\Models\User;
use App\Models\Forum;
use App\Models\Satuan;
use App\Models\Keuangan;
use App\Models\Reservasi;
use Illuminate\Http\Request;

class DatabasesController extends Controller
{
    public function index()
    {
        return view('admin.master.db', [
            'title' => 'Databases',
            'tipe' => Tipe::all(),
            'keuangan' => Keuangan::all(),
            'satuan' => Satuan::all(),
            'reservasi' => Reservasi::all(),
            'forum' => Forum::all(),
            'user' => User::all()
        ]);
    }
}
