@extends('layout.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit User</h1>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit User</li>
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
                                <form method="post" action="{{ route('admin.user.update', ['id' => $user->id]) }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <input type="text" name="profil_lama" value="{{ $user->image }}" hidden>
                                    <img src="{{ asset('storage/profil_foto/'. $user->image) }}" class="img-thumbnail" alt="profil" width="150">
                                    <div class="mb-3 mt-3">   
                                        <label for="exampleInputNama" class="form-label">Foto Profil</label>
                                        <input type="file" class="form-control" id="exampleInputNama" name="profil">
                                        @error('profil')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputNama" class="form-label">Nama</label>
                                        <input type="text" class="form-control" id="exampleInputNama" name="nama" value="{{ $user->name }}">
                                        @error('nama')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="exampleInputEmail" name="email" value="{{ $user->email }}">
                                        @error('email')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="exampleInputPassword" name="password" placeholder="Masukkan Password Baru">
                                        @error('password')
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