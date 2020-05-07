<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/admin">
      <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
      </div>
      <div class="sidebar-brand-text mx-3">Smartcity</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
      <a class="nav-link" href="/admin">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      Pengajuan Software
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link" href="/admin/listpengajuan/{{$encrypted1}}">
        <i class="fas fa-comments"></i>
        <span>List Pengajuan</span></a>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link" href="/admin/listpengajuan/{{$encrypted2}}">
        <i class="fas fa-clipboard-list"></i>
        <span>Pengajuan Disetujui</span></a>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link" href="/admin/listpengajuan/{{$encrypted3}}">
        <i class="far fa-pause-circle"></i>
        <span>Pengajuan Dipertimbangkan</span></a>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link" href="/admin/listpengajuan/{{$encrypted4}}">
        <i class="fas fa-times-circle"></i>
        <span>Pengajuan Ditolak</span></a>
    </li>
    
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      Master Software
    </div>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
      <a class="nav-link" href="/admin/list-software">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>List Software</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
      <a class="nav-link" href="/admin/input-software">
        <i class="fas fa-fw fa-table"></i>
        <span>Input Software</span></a>
    </li>

    <!-- Heading -->
    <div class="sidebar-heading">
      Pengembangan
    </div>

    <!-- Nav Item - Pengembangan -->
    <li class="nav-item">
      <a class="nav-link" href="/admin/pengembangan-umum">
        <i class="fas fa-fw fa-pause-circle"></i>
        <span>Pengembangan Umum</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="/admin/pengembangan-dinkominfo">
        <i class="fas fa-fw fa-pause-circle"></i>
        <span>Pengembangan DINKOMINFO</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

  </ul>
  <!-- End of Sidebar -->