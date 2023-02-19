<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
    <div class="sidebar-brand-icon">
      <i class="fas fa-church 2x"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Admin HKBP</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item active">
    <a class="nav-link" href="{{ route('dashboard') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span>
    </a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
      Interface
  </div>

  <!-- Nav Item -->
  <li class="nav-item mb-0">
    <a class="nav-link mb-0 pb-0" href="{{ route('profil.index') }}">
      <i class="fas fa-church"></i>
      <span>Profil</span>
    </a>
  </li>
  <li class="nav-item mb-0">
    <a class="nav-link mb-0 pb-0" href="{{ route('pastur.index') }}">
      <i class="fas fa-user"></i>
      <span>Pendeta Resort</span>
    </a>
  </li>
  <li class="nav-item mb-0">
    <a class="nav-link mb-0 pb-0" href="{{ route('sektor.index') }}">
      <i class="fas fa-map-marker"></i>
      <span>Sektor</span>
    </a>
  </li>
  <li class="nav-item mb-0">
    <a class="nav-link mb-0 pb-0" href="{{ route('news.index') }}">
      <i class="fa-solid fa-file"></i>
      <span>Warta</span>
    </a>
  </li>
  <li class="nav-item mb-0">
    <a class="nav-link mb-0 pb-0" href="{{ route('berita.index') }}">
      <i class="fa-solid fa-newspaper"></i>
      <span>Berita</span>
    </a>
  </li>
  <li class="nav-item mb-0">
    <a class="nav-link collapsed mb-0 pb-0" href="#" data-toggle="collapse" data-target="#keluarga" aria-expanded="true" aria-controls="keluarga">
      <i class="fas fa-fw fa-male"></i>
      <span>Master Keluarga</span>
    </a>
    <div id="keluarga" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Data Keluarga</h6>
        <a class="collapse-item" href="{{ route('keluarga.index') }}">Keluarga</a>
        <a class="collapse-item" href="{{ route('member.index') }}">Anggota Keluarga</a>
        <a class="collapse-item" href="{{ route('kawin') }}">Kawin</a>
        <a class="collapse-item" href="{{ route('sidi.index') }}">Sidi</a>
        <a class="collapse-item" href="{{ route('monding.index') }}">Monding</a>
        <a class="collapse-item" href="{{ route('baptis.index') }}">Baptis</a>
      </div>
    </div>
  </li>
  <li class="nav-item mb-0">
    <a class="nav-link mb-0 pb-0 collapsed" href="#" data-toggle="collapse" data-target="#akun" aria-expanded="true" aria-controls="akun">
      <i class="fas fa-fw fa-cog"></i>
      <span>Setting</span>
    </a>
    <div id="akun" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Akun</h6>
        <a class="collapse-item" href="{{ route('admin.index') }}">Admin</a>
        <a class="collapse-item" href="{{ route('banner.index') }}">Banner</a>
      </div>
    </div>
  </li>
  <li class="nav-item mb-0">
    <a class="nav-link mb-0 pb-0" href="{{ route('print') }}">
      <i class="fa-solid fa-print"></i>
      <span>Cetak Laporan</span>
    </a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>