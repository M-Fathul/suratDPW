<?php

namespace App\Http\Controllers;

use App\Models\Suratmasuk;
use App\Models\Attachment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class suratmasukController extends Controller
{
    public function getSuratMasukData()
{
    return Suratmasuk::all();
}

public function index()
{
    $data = $this->getSuratMasukData();
    return view('surat_masuk.index', ['data' => $data]);
}

public function apiIndex()
{
    $data = $this->getSuratMasukData();
    return response()->json([
        'message' => 'Data berhasil diambil',
        'data' => $data
    ]);
}

    function create(){
        return view('surat_masuk.create');
    }

    public function store(Request $request)
    {

        // Suratmasuk::create([
        //     'email_user' =>  Auth::user()->email,
        //     'Nomor_surat' => $request->Nomor_surat,
        //     'pengirim' => $request->pengirim,
        //     'penerima' => $request->penerima,
        //     'deskripsi' => $request->deskripsi,
        //     'tanggal_surat' => $request->tanggal_surat,
        //     'tanggal_terima' => $request->tanggal_terima,
        // ]);
        $suratbaru = Suratmasuk::create([
            'email_user' =>  $request->email_user,
            'Nomor_surat' => $request->Nomor_surat,
            'pengirim' => $request->pengirim,
            'penerima' => $request->penerima,
            'deskripsi' => $request->deskripsi,
            'tanggal_surat' => $request->tanggal_surat,
            'tanggal_terima' => $request->tanggal_terima,
        ]);
        if ($request->hasFile('attachments')) {
            foreach ($request->attachments as $attachment) {
                $extension = $attachment->getClientOriginalExtension();
                if (!in_array($extension, ['png', 'jpg', 'jpeg', 'pdf'])) continue;
                $filename = $attachment->getClientOriginalName();
                $filename = str_replace('', '', $filename);
                $attachment->storeAs('public/attachments', $filename);
                Attachment::create([
                    'filename' => $filename,
                    'extension' => $extension,
                    'email_user' => Auth::user()->email,
                    'Nosuratnya' => $request->Nomor_surat,
                    'tipe_surat' => 'masuk',
                ]);
            }
        }

        // return redirect('/dashboard/surat_masuk');
        return response()->json([
            'message' => 'Data berhasil disimpan',
            'data' => $suratbaru
        ]);
    }

    public function edit(string $id)
    {
        $data = Suratmasuk::where('id', $id)->first();
        return view('surat_masuk/edit', ['data' => $data]);
    }


    public function update(Request $request, string $id)
    {

        $data = [
            'Nomor_surat' => $request->Nomor_surat,
            'pengirim' => $request->pengirim,
            'deskripsi' => $request->deskripsi,
            'tanggal_surat' => $request->tanggal_surat,
            'tanggal_terima' => $request->tanggal_terima,
            'klasifikasi' => $request->klasifikasi,
            'disposisi' => $request->disposisi
        ];
        if ($request->hasFile('attachments')) {
            foreach ($request->attachments as $attachment) {
                $extension = $attachment->getClientOriginalExtension();
                if (!in_array($extension, ['png', 'jpg', 'jpeg', 'pdf'])) continue;
                $filename = $attachment->getClientOriginalName();
                $filename = str_replace(' ', '', $filename);
                $attachment->storeAs('public/attachments', $filename);
                Attachment::where('id', $id)->update([
                    'filename' => $filename,
                    'extension' => $extension,
                    'email_user' => Auth::user()->email,
                    'Nosuratnya' => $request->Nomor_surat,
                    'tipe_surat' => 'masuk',
                ]);
            }
        }

        Suratmasuk::where('id', $id)->update($data);

        return redirect('/dashboard/surat_masuk');
    }

    public function destroy(string $id)
    {
        Suratmasuk::where('id', $id)->delete();
        return redirect('/dashboard/surat_masuk');
    }

    public function indexdisposisi()
    {
        $data = Suratmasuk::all();
        return view('disposisi.index', [
            'data' => $data,
        ]);
    }

    public function disposisi(string $id)
    {
        $data = Suratmasuk::where('id', $id)->first();
        return view('disposisi/disposisisurat', ['data' => $data]);
    }

    public function updatedisposisi(Request $request, string $id)
    {

        $data = [
            'disposisi' => $request->disposisi,
            'Status' => $request->Status
        ];

        Suratmasuk::where('id', $id)->update($data);

        return redirect('/dashboard/disposisi');
    }
}
     