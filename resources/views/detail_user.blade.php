@extends('layout.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Detail User</h1>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Detail User</li>
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
                                <img src="{{ asset('storage/profil_foto/'. $user->image) }}" class="mb-3 img-thumbnail" alt="profil" width="150">
                                
                                <div class="mb-3">
                                    <label class="form-label">Nama User</label>
                                    <p>{{ $user->name }}</p>
                                </div>
                                 <div class="mb-3">
                                    <label class="form-label">NIK</label>
                                    <p>{{ $user->ktp->nik ?? '' }}</p>
                                </div>
                                <div class="mb-5">
                                    <label class="form-label">Email</label>
                                    <p>{{ $user->email }}</p>
                                </div>

                                <div>
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Tipe Rumah</th>
                                                <th>Harga Rumah</th>
                                                <th>Lokasi Rumah</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($user->rumahs as $data)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $data->type_rumah }}</td>
                                                    <td>{{ $data->harga_rumah }}</td>
                                                    <td>{{ $data->lokasi_rumah }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
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