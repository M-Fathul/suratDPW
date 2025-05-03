@extends('dashboard')

@section('content')
<main id="main">
    <div class="container mt-5">
        <div class="pagetitle">
            <div class="mb-3 justify-content-between mx-2">
                <h1>Lampiran Surat Keluar</h1>
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
                    <th scope="col">Nama File</th>
                    <th scope="col">Ekstensi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $d)
                @if ($d->email_user == Auth::user()->email)
                @if ($d->tipe_surat == 'keluar')
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $d->Nosuratnya }}</td>
                    <td>{{ $d->filename }}</td>
                    <td>{{ $d->extension }}</td>
                    <td>
                        <div class="d-flex items-center justify-center gap-2">
                            <a class="btn my-3 btn-primary" download="{{ $d->filename }}" href="{{ $d->path }}">Download</a>
                        </div>
                    </td>
                </tr>
                @endif
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
</main>
@endsection