<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('admin')}}}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SMARTCITY</div>
    </a>
  
    <!-- Divider -->
    <hr class="sidebar-divider my-0">
  
    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{route('admin')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>
  
    <!-- Divider -->
    <hr class="sidebar-divider">
  
    <!-- Heading -->
    <div class="sidebar-heading">
        Pengajuan Software
    </div>
  
    <!-- Nav Item - Menu -->
    <li class="nav-item">
        <a class="nav-link" href="/admin/listpengajuan/{{1}}">
            <i class="fas fa-fw fa-cog"></i>
            <span>Pengajuan</span>
        </a>
    </li>
  
    <!-- Divider -->
    <hr class="sidebar-divider">
  
    <!-- Heading -->
    <div class="sidebar-heading">
        Pengembang Software
    </div>
  
    <!-- Nav Item - Pages Menu -->
    <li class="nav-item">
        <a class="nav-link" href="/admin/pengembangan/umum/status-dikembangkan/{{0}}" >
            <i class="fas fa-fw fa-folder"></i>
            <span>Pengembangan Umum</span>
        </a>
    </li>
    <!-- Nav Item - Pages Menu -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('pengembangan-dinkominfo')}}" >
            <i class="fas fa-fw fa-folder"></i>
            <span>Pengembangan Dinkominfo</span>
        </a>
    </li>
  
    <!-- Divider -->
    <hr class="sidebar-divider">
  
    <!-- Heading -->
    <div class="sidebar-heading">
        User
    </div>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Pengembang</span>
        </a>
    </li>
  
    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('show-instansi')}}">
            <i class="fas fa-fw fa-table"></i>
            <span>Instansi</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
  
    <!-- Heading -->
    <div class="sidebar-heading">
        Software
    </div>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('repositori')}}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Repositori</span>
        </a>
    </li>
  
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
  
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
  
  </ul>
  <!-- End of Sidebar -->