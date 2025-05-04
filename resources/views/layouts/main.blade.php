<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Layout</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('asset/style/main.css') }}">
    
    @yield('link')
   
   @php
    // Ambil data kelembagaan dari database
    use App\Models\Kelembagaan;
    $menus = Kelembagaan::all();
  @endphp
  </head>

  <body>

    <nav id="mainNavbar" class="navbar navbar-expand-lg fixed-top" style="transition: background-color 0.3s ease; background-color: transparent;">
      <div class="container-fluid mx-5">
          <a class="navbar-brand" href="#">
              <img src='https://upload.wikimedia.org/wikipedia/commons/9/98/Kota_Bengkulu.png' width="50" alt="Logo Kota Bengkulu">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse ms-auto" id="navbarNav">
            <ul class="navbar-nav ms-auto gap-3">
              <li class="nav-item">
                <a class="nav-link {{ Request::is('home') ? 'active' : '' }}" href="{{ route('home') }}">Beranda</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ Request::is('profil.kelurahan') ? 'active' : '' }}" href="{{ route('profil.kelurahan') }}">Profile Kelurahan</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ Request::is('demografi.index') ? 'active' : '' }}" href="{{ route('demografi.index') }}">Demografi Penduduk</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ Request::is('berita.user') ? 'active' : '' }}" href="{{ route('berita.user') }}">Berita</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ Request::is('layanan') ? 'active' : '' }}" href="{{ route('layanan.index') }}">Layanan</a>
              </li>

              <!-- Kelembagaan -->
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle kelembagaan-link" href="#" id="navKelembagaan" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Kelembagaan
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navKelembagaan">
                  @if($menus->isEmpty())
                    <li><a class="dropdown-item" href="#">Kelembagaan belum ada</a></li>
                  @else
                    @foreach($menus as $menu)
                      <li>
                        <a class="dropdown-item {{ Request::is('kelembagaan/'.$menu->id) ? 'active' : '' }}" href="{{ route('kelembagaan.user.show', $menu->id) }}">
                          {{ $menu->nama_kelembagaan }}
                        </a>
                      </li>
                    @endforeach
                  @endif
                </ul>
              </li>


              <li class="nav-item">
                <a class="nav-link {{ Request::is('pengaduan.create') ? 'active' : '' }}" href="{{ route('pengaduan.create') }}">Pengaduan</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ Request::is('login') ? 'active' : '' }}" href="{{ route('login') }}">Masuk</a>
              </li>
            </ul>
          </div>
      </div>
    </nav>

    <div>
      @yield('content')
    </div>

      <footer class=" text-white pt-5 pb-4">
        <div class="container text-center">
            <div class="row">
                <!-- Logo & Info Kelurahan Section -->
                <div class="col-md-6 mb-3 d-flex justify-content-center align-items-center">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/9/98/Kota_Bengkulu.png" alt="logo" width="100" height="100" class="me-3">
                    <div>
                        <h5 class="fw-bold">Kelurahan Lempuing</h5>
                        <p class="mb-0">Jl. Kuala, Lempuing, Kec. Ratu Agung, Kota Bengkulu</p>
                    </div>
                </div>
    
                <!-- Kontak Section -->
                <div class="col-md-6 mb-3 d-flex justify-content-center flex-column align-items-center">
                    <h6 class="fw-bold">Kontak</h6>
                    <p><i class="bi bi-telephone-fill"></i> 08123456789</p>
                    <p><i class="bi bi-envelope-fill"></i> kelurahanlempuing@bengkulu.id</p>
                </div>
            </div>
    
            <!-- Copyright Section -->
            <div class="text-center mt-4">
                <small>© 2025 Powered by Kelurahan Lempuing <span class="fw-bold text-warning">Indonesia</span></small>
            </div>
        </div>
    </footer>
  
  
  

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
    @yield('script')

    <script src="{{ asset('asset/javascript/main.js') }}"></script>
  </body>
</html>
