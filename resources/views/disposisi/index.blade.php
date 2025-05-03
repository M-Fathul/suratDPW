@extends('dashboard')

@section('content')
<main id="main">
    <div class="container mt-5">
        <div class="pagetitle">
            <div class="mb-3 justify-content-between mx-2">
                <h1>Disposisi Surat</h1>
            </div>
            <nav class="ms-2">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.html">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item">{{ Request::segment(2) }}</li>
                </ol>
            </nav>
        </div>
        <table class="table datatable">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Disposisi</th>
                    <th scope="col">Status</th>
                    <th scope="col">Nomor Surat</th>
                    <th scope="col">Pengirim</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Tanggal Surat</th>
                    <th scope="col">Tanggal Terima</th>
                    <th scope="col">Klasifikas Surat</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $d)
                @if ($d->email_user == Auth::user()->email)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $d->disposisi }}</td>
                    <td>{{ $d->Status }}</td>
                    <td>{{ $d->Nomor_surat }}</td>
                    <td>{{ $d->pengirim }}</td>
                    <td>{{ $d->deskripsi }}</td>
                    <td>{{ $d->tanggal_surat }}</td>
                    <td>{{ $d->tanggal_terima }}</td>
                    <td>{{ $d->klasifikasi }}</td>
                    <td>
                        <img src="{{ asset($d->gambar) }}" alt="" width="100px">
                    </td>
                    <td>
                        <div class="d-flex items-center justify-center gap-2">
                            <a href="/dashboard/disposisi/{{$d->id}}/disposisi" class="mr-2 btn btn-primary">Disposisi</a>
                        </div>
                    </td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
</main>
@endsection