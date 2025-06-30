<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('template') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light text-uppercase ml-1">Belajar Laravel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('template') }}/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="/" class="d-block text-uppercase">{{ auth()->user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Master Data
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.user') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.rumah') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Rumah</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.mobil') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Mobil</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.ktp') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data KTP</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.asset') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Asset</p>
                </a>
              </li>
            </ul>
          </li>
          {{-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Datatable
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.clientside') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data User (Client Side)</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.serverside') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data User (Server Side)</p>
                </a>
              </li>
            </ul>
          </li> --}}
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Import Data
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.import-excel') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Import Excel (Single)</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.import-excel-multisheet') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Import Excel (Multi)</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-default-logout">
              <i class="nav-icon fas fa-power-off"></i>
              <p>Logout</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<div class="modal fade" id="modal-default-logout">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title">Keluar dari dashboard</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              <p>Anda yakin ingin meninggalkan dashboard?</p>
          </div>
          <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
              <a href="{{ route('logout') }}" class="btn btn-dark">Logout</a>
          </div>
      </div>
      <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->