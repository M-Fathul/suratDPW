<?php

namespace App\Http\Controllers;

use App\Models\Attachment;
use Illuminate\Http\Request;

class LampiranController extends Controller
{
    public function keluar()
    {
        $data = Attachment::all();
        return view('lampiran.keluar', [
            'data' => $data,
        ]);
    }

    public function masuk()
    {
        $data = Attachment::all();
        return view('lampiran.masuk', [
            'data' => $data,
        ]);
    }
}
