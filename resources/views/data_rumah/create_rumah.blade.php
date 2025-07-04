@extends('layout.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Tambah Rumah Baru</h1>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Tambah Rumah</li>
                        </ol>
                    </div>
                    <!-- /.col -->
                </div><!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <form method="post" action="{{ route('admin.rumah.store') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="exampleInputTipe" class="form-label">Tipe Rumah</label>
                                        <input type="text" class="form-control" id="exampleInputTipe" name="tipe" placeholder="Tipe Rumah Anda">
                                        @error('tipe')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputHarga" class="form-label">Harga</label>
                                        <input type="text" class="form-control" id="exampleInputHarga" name="harga" placeholder="Masukkan Email">
                                        @error('harga')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label for="exampleInputLokasi" class="form-label">Lokasi Rumah</label>
                                        <input type="text" class="form-control" id="exampleInputLokasi" name="lokasi" placeholder="Lokasi Rumah Anda">
                                        @error('lokasi')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <a href="{{ route('admin.rumah') }}" class="btn btn-primary">Kembali</a>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div> 
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection