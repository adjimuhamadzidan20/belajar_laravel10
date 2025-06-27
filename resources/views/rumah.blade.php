@extends('layout.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-1">
                    <div class="col-sm-6">
                        <h1 class="m-0">Data Rumah</h1>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Data Rumah</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row mb-3">
                    <div class="col">
                        <a href="{{ route('admin.rumah.create') }}" class="btn btn-dark">Tambah</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col d-flex align-items-center">
                                        <h3 class="card-title">Tabel data rumah</h3>
                                    </div>
                                    <div class="col-4">
                                        <form action="{{ route('admin.rumah') }}" method="get">
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Pencarian.." name="cari" value="{{ $request->get('cari') }}">
                                                <button class="btn btn-outline-secondary" type="submit">Cari</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                @if ($pesan = Session::get('success'))
                                    <div class="alert alert-success" role="alert">
                                       {{ $pesan }}
                                    </div>            
                                @endif
                        
                                <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tipe Rumah</th>
                                        <th>Harga Rumah</th>
                                        <th>Lokasi Rumah</th>
                                        <th class="text-center">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rumah as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->type_rumah }}</td>
                                        <td>{{ $data->harga_rumah }}</td>
                                        <td>{{ $data->lokasi_rumah }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('admin.rumah.edit', ['id' => $data->id]) }}" class="btn btn-primary btn-sm">Edit</a>
                                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-default{{ $data->id }}">Delete</button>
                                        </td>
                                    </tr>

                                    <div class="modal fade" id="modal-default{{ $data->id }}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Hapus Data Rumah</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Anda yakin ingin menghapus tipe rumah {{ $data->type_rumah }}?</p>
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                                    <a href="{{ route('admin.rumah.delete', ['id' => $data->id]) }}" class="btn btn-dark">Delete</a>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                    <!-- /.modal -->

                                    @endforeach
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <!-- /.row (main row) -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection