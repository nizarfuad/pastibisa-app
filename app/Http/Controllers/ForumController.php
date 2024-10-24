<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    public function index() {
        return view('admin.forum', [
            'title' => 'Forum',
            'forum' => Forum::all(),
        ]);
    }

    public function store(Request $request)
    {
        $validator = $request->validate([
            'value' => 'required',
        ]);

        if ($validator) {

            Forum::create([
                'value' => $request->value,
            ]);
            return redirect()->route('forum')->with(['sukses' => 'Data berhasil ditambahkan.']);
        }

        return redirect()->route('forum')->with(['gagal' => 'Data gagal ditambahkan.']);
    }
}
