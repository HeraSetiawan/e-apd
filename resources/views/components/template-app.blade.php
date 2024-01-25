<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>{{ config('app.name') }}</title>
    <link href="https://getbootstrap.com/docs/5.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('styleku.css') }}">
    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/5.2/examples/dashboard/dashboard.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    @stack('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
  </head>
  <body>
<header class="navbar navbar-dark sticky-top flex-md-nowrap p-0 shadow bg-gradient" style="background-color: darkcyan">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="{{ url('/dashboard') }}">{{ config('app.name') }}</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <form action="{{ url('logout') }}" method="post">
        @csrf
        <button type="submit" class="btn border-0 nav-link px-3 btn-outline-success rounded-0 text-light"><i class="bi-power"></i> Sign out</button>
      </form>
    </div>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3 sidebar-sticky">
        <div class="vstack text-center">
        @if (Auth::user()->foto)
          <img src="{{ asset(Auth::user()->foto) }}" width="75" class="rounded-circle img-thumbnail d-block mx-auto" style="aspect-ratio:1/1">
          @else
          <img src="https://placehold.co/75?text=Avatar" width="75" class="rounded-circle img-thumbnail d-block mx-auto" style="aspect-ratio:1/1">
        @endif
          <h5 class="text-capitalize">{{ Auth::user()->nama_lengkap }}</h5>
          <span class="badge bg-success bg-gradient mx-5">{{ Auth::user()->jabatan }}</span>
          <div class="text-center">{{ Auth::user()->asal_rig }}</div>
          <hr>
        </div>
        <ul class="nav  flex-column">
          
          @if (in_array(Auth::user()->role, ["SA","SS"]))
          <li class="nav-item">
            <a class="nav-link {{ Request::is('karyawan*') ? 'active' : '' }}" href="{{ Auth::user()->role == "SA" ? url('karyawan') : url('karyawan/admin ') }}">
              <span data-feather="users" class="align-text-bottom"></span>
              Karyawan
            </a>
          </li>
          @endif
          
          @if (Auth::user()->role === "KRU")
            <li class="nav-item">
              <a class="nav-link {{ Request::is('dashboard*') ? 'active' : '' }}" aria-current="page" href="{{ url('dashboard/kru') }}">
                <span data-feather="home" class="align-text-bottom"></span>
                Dashboard
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ Request::is('permintaan*') ? 'active' : '' }}" aria-current="page" href="{{ url('permintaan/kru') }}">
                <span data-feather="feather" class="align-text-bottom"></span>
                Riwayat Permintaan
              </a>
            </li>
          @endif

          @if (Auth::user()->role === "SA")
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="{{ url('dashboard') }}">
              <span data-feather="home" class="align-text-bottom"></span>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('stokbarang*') ? 'active' : '' }}" href="{{ url('stokbarang') }}">
              <span data-feather="box" class="align-text-bottom"></span>
              Stok Barang
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('permintaan*') ? 'active' : '' }}" href="{{ route('permintaan') }}">
              <span data-feather="truck" class="align-text-bottom"></span>
              Permintaan APD
            </a>
          </li>
          @endif

          @if (Auth::user()->role === "SS")
            <li class="nav-item">
              <a class="nav-link {{ Request::is('dashboard*') ? 'active' : '' }}" aria-current="page" href="{{ url('dashboard/admin') }}">
                <span data-feather="home" class="align-text-bottom"></span>
                Dashboard
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ Request::is('stokbarang*') ? 'active' : '' }}" href="{{ url('stokbarang/admin') }}">
                <span data-feather="box" class="align-text-bottom"></span>
                Stok Area
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ Request::is('permintaan*') ? 'active' : '' }}" href="{{ route('permintaan admin') }}">
                <span data-feather="truck" class="align-text-bottom"></span>
                Permintaan APD
              </a>
            </li>
          @endif

        </ul>

        {{-- <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
          <span>Saved reports</span>
          <a class="link-secondary" href="#" aria-label="Add a new report">
            <span data-feather="plus-circle" class="align-text-bottom"></span>
          </a>
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text" class="align-text-bottom"></span>
              Current month
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text" class="align-text-bottom"></span>
              Last quarter
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text" class="align-text-bottom"></span>
              Social engagement
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text" class="align-text-bottom"></span>
              Year-end sale
            </a>
          </li>
        </ul> --}}
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-lg-3">
      {{ $slot }}
    </main>
  </div>
</div>
    <script src="https://getbootstrap.com/docs/5.2/dist/js/bootstrap.bundle.min.js" ></script>
      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" ></script>
      <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
      <script src="https://getbootstrap.com/docs/5.2/examples/dashboard/dashboard.js"></script>
      @livewireScripts
      @stack('script')
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
<script>
  new DataTable('#dataTable');
</script>
  </body>
</html>
