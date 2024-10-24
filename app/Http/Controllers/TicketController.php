<?php

namespace App\Http\Controllers;

use App\Models\Reservasi;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index($uni_id)
    {

        $a = Reservasi::find($uni_id);

        return view('template.ticket', [
            'name' => $a->name,
            'uid' => $a->uni_id,
            'phone' => $a->phone,
            'email' => $a->email,
        ]);
    }

    // public function pdf($uni_id)
    // {
    //     return $this->view('emails.orders.shipped')
    //             ->attachData($this->pdf, 'name.pdf', [
    //                 'mime' => 'application/pdf',
    //             ]);
    // }
}
