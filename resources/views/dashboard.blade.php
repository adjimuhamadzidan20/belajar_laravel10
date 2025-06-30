@extends('layout.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Beranda</li>
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
                @can('view_dashboard')
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-4 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>150</h3>

                                    <p>Data User</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a href="{{ route('admin.user') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-4 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>150</h3>

                                    <p>Data Mobil</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a href="{{ route('admin.mobil') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-4 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>44</h3>

                                    <p>Data Rumah</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a href="{{ route('admin.rumah') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                    <!-- ./col -->
                    </div>
                @endcan
                
                @can('view_chart_on_dashboard')
                    <div class="row pb-4">
                        <div class="col">
                            <div class="card text-center">
                                <div class="card-header">
                                    Featured
                                </div>
                                <div class="card-body ">
                                    <center>
                                        <h5 class="card-text mb-3">Special title treatment</h5>
                                    </center>
                                    <div class="row justify-content-center">
                                        <div class="col-7 mb-4">
                                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id tempore pariatur a voluptates voluptatibus obcaecati blanditiis. Nobis in possimus sed ratione enim, ad, ducimus magni, molestiae non labore minus tempore. Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique, eligendi amet aperiam quaerat distinctio pariatur voluptate consequatur a facilis animi accusamus cum id libero dolorem sint illo voluptatum sit illum?</p>
                                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id tempore pariatur a voluptates voluptatibus obcaecati blanditiis. Nobis in possimus sed ratione enim, ad, ducimus magni, molestiae non labore minus tempore. Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique, eligendi amet aperiam quaerat distinctio pariatur voluptate consequatur a facilis animi accusamus cum id libero dolorem sint illo voluptatum sit illum?</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endcan
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection