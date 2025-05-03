@extends('dashboard')

@section('content')
<div class="main-container p-5">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div>
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Edit Surat</h4>
                        </div>
                        <nav class="ms-2">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="/dashboard">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="/dashboard/surat_keluar">Surat Keluar</a>
                                </li>
                                <li class="breadcrumb-item">{{ Request::segment(3) }}</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-6 col-sm-12 text-right">
                        <a href="/dashboard/surat_keluar" class="btn btn-primary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Default Basic Forms Start -->


        <!-- horizontal Basic Forms Start -->
        <div class="pd-20 card-box mb-20">
            <div class="clearfix">
                <div class="pull-left">
                    <h4 class="text-blue h4">Edit Data Surat</h4>
                </div>
                <div class="pull-right">
                </div>
            </div>
            <form action="/dashboard/surat_keluar/{{($data->id)}}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="#Nomor_surat" class="form-label">Nomor Surat</label>
                    <input class="form-control" type="text" id="Nomor_surat" name="Nomor_surat" placeholder="Masukan Nomor surat" value="{{ $data->Nomor_surat }}" />
                </div>
                <div class="form-group">
                    <label for="#penerima" class="form-label">Penerima</label>
                    <input class="form-control" type="text" id="penerima" name="penerima" placeholder="Penerima.." value="{{ $data->penerima }}" />
                </div>
                <div class="form-group">
                    <label for="#deskripsi" class="form-label">Deskripsi</label>
                    <input class="form-control" type="text" id="deskripsi" name="deskripsi" placeholder="Masukan Deskripsi" value="{{ $data->deskripsi }}" />
                </div>
                <div class="form-group">
                    <label for="#tanggal_surat" class="form-label">Tanggal Surat</label>
                    <input class="form-control" type="date" id="tanggal_surat" name="tanggal_surat" placeholder="tanggal surat" value="{{ $data->tanggal_surat }}" />
                </div>
                <div class="form-group">
                    <label for="#tanggal_terima" class="form-label">Tanggal Terima</label>
                    <input class="form-control" type="date" id="tanggal_terima" name="tanggal_terima" placeholder="tanggal terima" value="{{ $data->tanggal_terima }}" />
                </div>
                <div class="form-group">
                    <label for="#klasifikasi" class="form-label">klasifikasi Surat</label><br>
                    <select class="form-control" id="klasifikasi" name="klasifikasi">
                        <option value="{{ $data->klasifikasi }}">pilih kalsifikasi</option>
                        <option value="Edaran">Edaran</option>
                        <option value="Perintah">Perintah</option>
                        <option value="permohonan">Permohonan</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="attachments" class="form-label">Lampiran</label>
                    <input type="file" class="form-control @error('attachments') is-invalid @enderror" id="attachments" name="attachments[]" multiple />
                    <span class="error invalid-feedback">{{ $errors->first('attachments') }}</span>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" style="width: 100%" type="submit">Perbarui</button>
                </div>
            </form>
        </div>
    </div>
    <!-- horizontal Basic Forms End -->
</div>
</div>
</div>
@endsection