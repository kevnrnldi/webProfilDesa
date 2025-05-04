<div class="sidebar-header">
    <div class="avatar-wrapper">
      <img src="https://cdn-icons-png.freepik.com/512/9703/9703596.png" alt="Admin">
    </div>
    <div class="sidebar-user">{{ Auth::user()->name ?? 'Admin' }}</div>
  </div>
  
  <ul class="nav flex-column">
    <li class="nav-item">
      <a href="{{ route('admin.dashboard') }}" class="nav-link {{ Request::is('admin/dashboard') ? 'active' : '' }}">
        <i class="bi bi-speedometer2"></i> Dashboard
      </a>
    </li>
  
    <li class="nav-item">
      <a class="nav-link dropdown-toggle {{ Request::is('admin/visimisi*')||Request::is('admin/katasambutan*')||Request::is('admin/struktur*') ? 'active' : '' }}" data-bs-toggle="collapse" href="#profilSubmenu" role="button">
        <i class="bi bi-building"></i> Profil Kelurahan
      </a>
      <ul class="collapse list-unstyled {{ Request::is('admin/visi-misi*')||Request::is('admin/katasambutan*')||Request::is('admin/struktur*') ? 'show' : '' }}" id="profilSubmenu">
        <li><a href="{{ route('admin.visimisi.index') }}" class="nav-link {{ Request::is('admin/visi-misi*') ? 'active' : '' }}">Visi & Misi</a></li>
        <li><a href="{{ route('admin.katasambutan.index') }}" class="nav-link {{ Request::is('admin/katasambutan*') ? 'active' : '' }}">Kata Sambutan</a></li>
        <li><a href="{{ route('admin.struktur.index') }}" class="nav-link {{ Request::is('admin/struktur*') ? 'active' : '' }}">Struktur Organisasi</a></li>
      </ul>
    </li>
  
    <li class="nav-item"><a href="{{ route('admin.demografi.index') }}" class="nav-link {{ Request::is('admin/demografi*') ? 'active' : '' }}"><i class="bi bi-people-fill"></i> Demografi</a></li>
    <li class="nav-item"><a href="{{ route('admin.layanan.index') }}" class="nav-link {{ Request::is('admin/layanan*') ? 'active' : '' }}"><i class="bi bi-file-earmark-text-fill"></i> Layanan</a></li>
    <li class="nav-item"><a href="{{ route('admin.kelembagaan.index') }}" class="nav-link {{ Request::is('admin/kelembagaan*') ? 'active' : '' }}"><i class="bi bi-diagram-3-fill"></i> Kelembagaan</a></li>
    <li class="nav-item"><a href="{{ route('berita.index') }}" class="nav-link {{ Request::is('admin/berita*') ? 'active' : '' }}"><i class="bi bi-newspaper"></i> Berita</a></li>
    <li class="nav-item"><a href="{{ route('admin.pengaduan.index') }}" class="nav-link {{ Request::is('admin/pengaduan*') ? 'active' : '' }}"><i class="bi bi-exclamation-diamond-fill"></i> Pengaduan</a></li>
  
    <li class="nav-item">
      <a class="nav-link dropdown-toggle {{ Request::is('admin/akun*')||Request::is('admin/banner*') ? 'active' : '' }}" data-bs-toggle="collapse" href="#pengaturanSubmenu" role="button">
        <i class="bi bi-gear-fill"></i> Pengaturan
      </a>
      <ul class="collapse list-unstyled {{ Request::is('admin/akun*')||Request::is('admin/banner*') ? 'show' : '' }}" id="pengaturanSubmenu">
        <li><a href="{{ route('admin.akun.index') }}" class="nav-link {{ Request::is('admin/akun*') ? 'active' : '' }}">Akun</a></li>
        <li><a href="{{ route('pengumuman.index') }}" class="nav-link {{ Request::is('admin/banner*') ? 'active' : '' }}">Banners</a></li>
      </ul>
    </li>
  </ul>
  
  <div class="logout-button">
    <form method="POST" action="{{ route('logout') }}">
      @csrf
      <button type="submit" class="btn">
        <i class="bi bi-box-arrow-right"></i> Logout
      </button>
    </form>
  </div>
  