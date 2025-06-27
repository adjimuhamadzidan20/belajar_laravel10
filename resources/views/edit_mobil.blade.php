@extends('layout.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Mobil</h1>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Mobil</li>
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
                                <form method="post" action="{{ route('admin.mobil.update', ['id' => $mobil->id]) }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label for="exampleInputTipe" class="form-label">Tipe Rumah</label>
                                        <input type="text" class="form-control" id="exampleInputTipe" name="tipe" placeholder="Tipe Rumah Anda" value="{{ $mobil->type_mobil }}">
                                        @error('tipe')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputTahun" class="form-label">Tahun Pembelian</label>
                                        <input type="text" class="form-control" id="exampleInputTahun" name="tahun" placeholder="Tahun Pembelian" value="{{ $mobil->tahun_pembelian }}">
                                        @error('tahun')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputHarga" class="form-label">Harga</label>
                                        <input type="text" class="form-control" id="exampleInputHarga" name="harga" placeholder="Harga Mobil" value="{{ $mobil->harga_mobil }}">
                                        @error('harga')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary">Edit</button>
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