@extends('dashboard')

@section('content')
<div class="main-container p-5">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div>
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Disposisi Surat</h4>
                        </div>
                        <nav class="ms-2">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="/dashboard">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="/dashboard/surat_masuk">Disposisi</a>
                                </li>
                                <li class="breadcrumb-item">{{ Request::segment(3) }}</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-6 col-sm-12 text-right">
                        <a href="/dashboard/disposisi" class="btn btn-primary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Default Basic Forms Start -->


        <!-- horizontal Basic Forms Start -->
        <div class="pd-20 card-box mb-20">
            <div class="clearfix">
                <div class="pull-left">
                    <h4 class="text-blue h4">Tambah Data Disposisi</h4>
                </div>
                <div class="pull-right">
                </div>
            </div>
            <form action="/dashboard/disposisi/{{($data->id)}}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="#disposisi" class="form-label">Tujuan</label>
                    <input class="form-control" type="text" id="disposisi" name="disposisi" placeholder="Masukan Kepada..." value="{{ $data->disposisi }}" />
                </div>
                <div class="form-group">
                    <label for="#Status" class="form-label">Status Surat</label><br>
                    <select class="form-control" id="Status" name="Status">
                        <option value="">pilih Status</option>
                        <option value="Penting">Penting</option>
                        <option value="Rahasia">Rahasia</option>
                        <option value="Biasa">Biasa</option>
                    </select>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" style="width: 100%" type="submit">Tetapkan</button>
                </div>
            </form>
        </div>
    </div>
    <!-- horizontal Basic Forms End -->
</div>
</div>
</div>
@endsection