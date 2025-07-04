@extends('layout.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Tambah Asset Baru</h1>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Tambah Asset</li>
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
                                <form method="post" action="{{ route('admin.asset.store') }}">
                                    @csrf
                                    <div class="mb-4">
                                        <label for="exampleInputAsset" class="form-label">Nama Asset</label>
                                        <input type="text" class="form-control" id="exampleInputAsset" name="asset" placeholder="Masukkan Nama Asset">
                                        @error('asset')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <a href="{{ route('admin.asset') }}" class="btn btn-primary">Kembali</a>
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