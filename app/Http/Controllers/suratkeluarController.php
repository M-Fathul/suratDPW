<?php

namespace App\Http\Controllers;

use App\Models\Suratkeluar;
use App\Models\Attachment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class suratkeluarController extends Controller
{
    public function getSuratKeluar()
    {
        return Suratkeluar::all();
    }
    
    public function index()
    {
        $data = $this->getSuratKeluar();
        return view('surat_keluar.index', [
            'data' => $data,
        ]);
    }

    public function apiindex()
    {
        $data = $this->getSuratKeluar();
        return response()->json([
            'message' => 'Data berhasil diambil',
            'data' => $data
        ]);
    }


    function create()
    {
        return view('surat_keluar.create');
    }

    public function store(Request $request)
    {


        Suratkeluar::create([
            'email_user' =>  Auth::user()->email, 
            'Nomor_surat' => $request->Nomor_surat,
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
                    'tipe_surat' => 'keluar',
                ]);
            }
        }

        return redirect('/dashboard/surat_keluar');
    }

    public function edit(string $id)
    {
        $data = Suratkeluar::where('id', $id)->first();
        return view('surat_keluar/edit', ['data' => $data]);
    }

    public function update(Request $request, string $id)
    {

        $data = [
            'Nomor_surat' => $request->Nomor_surat,
            'penerima' => $request->penerima,
            'deskripsi' => $request->deskripsi,
            'tanggal_surat' => $request->tanggal_surat,
            'tanggal_terima' => $request->tanggal_terima,
            'klasifikasi' => $request->klasifikasi,
        ];
        if ($request->hasFile('attachments')) {
            foreach ($request->attachments as $attachment) {
                $extension = $attachment->getClientOriginalExtension();
                if (!in_array($extension, ['png', 'jpg', 'jpeg', 'pdf'])) continue;
                $filename = $attachment->getClientOriginalName();
                $filename = str_replace('', '', $filename);
                $attachment->storeAs('public/attachments', $filename);
                Attachment::where('id', $id)->update([
                    'filename' => $filename,
                    'extension' => $extension,
                    'email_user' => Auth::user()->email,
                    'Nosuratnya' => $request->Nomor_surat,
                    'tipe_surat' => 'keluar',
                ]);
            }
        }

        Suratkeluar::where('id', $id)->update($data);

        return redirect('/dashboard/surat_keluar');
    }

    public function destroy(string $id)
    {
        Suratkeluar::where('id', $id)->delete();
        return redirect('/dashboard/surat_keluar');
    }
}
