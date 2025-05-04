<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Dashboard')</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  @yield('link')
  <link rel="stylesheet" href="{{ asset('asset/style/mainAdmin.css') }}">

</head>
<body>

  <!-- Hamburger Button for Mobile -->
  <button class="btn btn-dark d-md-none mobile-menu-button" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileSidebar">
    <i class="bi bi-list"></i>
  </button>

  <!-- Mobile Sidebar (Offcanvas) -->
  <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="mobileSidebar">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title"></h5>
      <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body">
      @include('partials.admin-sidebar')
    </div>
  </div>

  <div class="d-flex">
    <!-- Desktop Sidebar -->
    <nav class="sidebar d-none d-md-flex">
      @include('partials.admin-sidebar')
    </nav>

    <!-- Content Area -->
    <div class="content-area flex-grow-1">
      <main>
        @yield('content')
      </main>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
