<?php

namespace App\Http\Controllers;

use App\Models\CheckIn;
use Milon\Barcode\DNS2D;
use App\Models\Reservasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ReservasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.reservasi', [
            'title' => 'Reservasi',
            'reservasi' => Reservasi::all(),
            'attend' => CheckIn::all()
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
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);

        if ($validator) {

            Reservasi::create([
                'name' => ucfirst($request->name),
                'email' => $request->email,
                'phone' => $request->phone,
                'uni_id' => generateUniqueId(),
            ]);

            $uid = Reservasi::where('email', $request->email)->first();

            // dd($uid->uni_id);


            $d = new DNS2D();
            $d->setStorPath('attachment/qrcode/cache');
            $d->getBarcodePNGPath(str($uid->uni_id), 'QRCODE',8,8);

            return redirect()->route('reservasi')->with(['sukses' => 'Data berhasil ditambahkan.']);
        }

        return redirect()->route('reservasi')->with(['gagal' => 'Data gagal ditambahkan.']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('template.ticket', [
            'show' => Reservasi::find($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservasi $reservasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservasi $reservasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($uni_id)
    {
        $a = Reservasi::find($uni_id);

        // dd($filename);

        $path_prefix = 'attachment/qrcode/cache/';
        $filepath = public_path('/') . $path_prefix . $a->uni_id.'qrcode.png';

        File::delete($filepath);
        $a->delete();
        return redirect()->route('reservasi')->with('sukses', 'Data berhasil di hapus');

    }

    public function getData($uni_id)
    {
        $reservasi = Reservasi::find($uni_id);

        // $d = new DNS2D();

        $dir = asset('attachment/qrcode/cache/'.$uni_id.'qrcode.png');


            if ($reservasi) {

                return response()->json([
                    'status' => 200,
                    'reservar' => $reservasi,
                    'cekin' => $reservasi->cekin,
                    // 'qr' => '<img src="data:image/png;base64,' . $qrShow . '" alt="barcode"   />'
                    'qr' => '<img src="'.$dir.'" alt="barcode"   />'
                ]);

            }
            // return response()->json([
            //     'status' => 200,
            //     'reservar' => $reservasi,
            //     'isattend' => 'No',
            // ]);


    }

    public function downloadQr($uni_id) {

        // Storage::disk('public')->put('qr.png',base64_decode($d->getBarcodePNG("4", "PDF417")));

        $a = Reservasi::find($uni_id);
        $path_prefix = 'attachment/qrcode/cache/';
        $filepath = public_path('/') . $path_prefix . $a->uni_id.'qrcode.png';

        // return redirect()->route('reservasi')->with(['njay' => 'sukses nambahi']);
        return Response::download($filepath, 'qr-'.$a->name.'.png');
    }
}

function generateUniqueId() {
    $number = mt_rand(10000, 99999); // better than rand()

    // call the same function if the barcode exists already
    if (uniqueIdExists($number)) {
        return generateUniqueId();
    }

    // otherwise, it's valid and can be used
    return $number;
}

function uniqueIdExists($number) {
    // query the database and return a boolean
    // for instance, it might look like this in Laravel
    return Reservasi::where('uni_id', $number)->exists();
}
