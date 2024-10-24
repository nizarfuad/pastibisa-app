<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\kirimEmail;
use App\Models\Reservasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class KirimEmailController extends Controller
{
    public function index($uni_id)
    {

        // $data = [
        //     'files' => [
        //         public_path('attachment/qrcode/cache/95997qrcode.png'),
        //     ]
        // ];
        $a = Reservasi::find($uni_id);

        Mail::to($a->email)->send(new kirimEmail([
            'title' => 'Pasti Bisa EMAIL',
            'body' => 'Hello World',
            'files' => public_path('attachment/qrcode/cache/'.$a->uni_id.'qrcode.png'),
            'name' => $a->name,
            'uid' => $a->uni_id,
            'phone' => $a->phone,
            'email' => $a->email,
        ]));
        return redirect()->route('reservasi')->with('sukses', 'Berhasil mengirim email.');
    }
}
