@extends('dashboard')

@section('content')
<main id="main">
    <div class="container mt-5">
        <div class="pagetitle">
            <div class="mb-3 justify-content-between mx-2">
                <h1>Surat Keluar</h1>
                <a href="/dashboard/surat_keluar/tambah" class="btn btn-primary">Tambah Baru</a>
            </div>

            <nav class="ms-2">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/dashboard">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item">{{ Request::segment(2) }}</li>
                </ol>
            </nav>
        </div>
        <table class="table datatable">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nomor Surat</th>
                    <th scope="col">Penerima</th>
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
                    <td>{{ $d->Nomor_surat }}</td>
                    <td>{{ $d->penerima }}</td>
                    <td>{{ $d->deskripsi }}</td>
                    <td>{{ $d->tanggal_surat }}</td>
                    <td>{{ $d->tanggal_terima }}</td>
                    <td>{{ $d->klasifikasi }}</td>
                    <td>
                        <div class="d-flex items-center justify-center gap-2">
                            <a href="/dashboard/surat_keluar/{{$d->id}}/edit" class="mr-2 btn btn-warning">edit</a>
                            <form action="/dashboard/surat_keluar/{{$d->id}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger">delete</button>
                            </form>
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