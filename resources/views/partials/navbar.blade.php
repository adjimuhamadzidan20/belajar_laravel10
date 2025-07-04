<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      {{-- pilih bahasa --}}
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">Pilih Bahasa</span>
          <div class="dropdown-divider"></div>
          <a href="{{ route('locale', ['locale' => 'id']) }}" class="dropdown-item" style="{{ session()->get('locale') == 'id' ? 'background-color: dodgerblue; color: white;' : '' }}">
            Bahasa Indonesia
            <span class="float-right {{ session()->get('locale') == 'id' ? 'text-white' : 'text-muted' }} text-sm">ID</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="{{ route('locale', ['locale' => 'en']) }}" class="dropdown-item" style="{{ session()->get('locale') == 'en' ? 'background-color: dodgerblue; color: white;' : '' }}">
            Bahasa Inggris
            <span class="float-right {{ session()->get('locale') == 'en' ? 'text-white' : 'text-muted' }} text-sm">EN</span>
          </a>
          <div class="dropdown-divider"></div>
        </div>
      </li>
      <!-- Messages Dropdown Menu -->
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
</nav>