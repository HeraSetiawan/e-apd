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
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css">
  </head>
  <body>
<header class="navbar navbar-dark sticky-top flex-md-nowrap p-0 shadow bg-gradient" style="background-color: darkcyan">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="{{ url('/dashboard') }}">{{ config('app.name') }}</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="navbar-nav">
    <div class="nav-item text-nowrap hstack">
      @if (Auth::user()->role === 'SA')
        <div class="position-relative">
          <a href="{{ url('/permintaan') }}">
            <i class="bi-bell-fill text-light fs-4">
            </i>
            <span class="badge bg-danger rounded-circle position-absolute start-100 translate-middle top-0 mt-2 ">
              {{ \App\Models\Permintaan::where('status', "0")->count() }}
            </span>
          </a>
        </div>
      @endif
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
          <span class="badge bg-success bg-gradient mx-5 text-uppercase mb-1">{{ Auth::user()->jabatan }}</span>
          <div><small>Lokasi:</small></div>
          <div class="text-center text-uppercase  mx-4">{{ Auth::user()->asal_rig }}</div>
          <hr>
        </div>
        <ul class="nav  flex-column">
          
          @if (Auth::user()->role === "SA")
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" href="{{ url('dashboard') }}">
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
            <a class="nav-link {{ Request::is('permintaan*') ? 'active' : '' }}" href="{{ url('permintaan') }}">
              <span data-feather="truck" class="align-text-bottom"></span>
              Permintaan APD
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('riwayat*') ? 'active' : '' }}" href="{{ url('riwayat') }}">
              <span data-feather="feather" class="align-text-bottom"></span>
              Riwayat Pengeluaran
            </a>
          </li>
          @endif

          @if (Auth::user()->role === "SS")
            <li class="nav-item">
              <a class="nav-link {{ Request::is('dashboard*') ? 'active' : '' }}" href="{{ url('dashboard/admin') }}">
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
            <li class="nav-item">
              <a class="nav-link {{ Request::is('riwayat*') ? 'active' : '' }}" href="{{ url('riwayat/admin/apd') }}">
                <span data-feather="book-open" class="align-text-bottom"></span>
                Riwayat Permintaan APD
              </a>
            </li>
          @endif

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
              <a class="nav-link {{ Request::is('dashboard*') ? 'active' : '' }}" href="{{ url('dashboard/kru') }}">
                <span data-feather="home" class="align-text-bottom"></span>
                Dashboard
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ Request::is('permintaan*') ? 'active' : '' }}" href="{{ url('permintaan/kru') }}">
                <span data-feather="feather" class="align-text-bottom"></span>
                Riwayat Permintaan
              </a>
            </li>
          @endif

          

        </ul>
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-lg-3">
      {{ $slot }}
    </main>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.bootstrap5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.colVis.min.js"></script>
<script>
  $(document).ready(function() {
    var table = $('#dataTable').DataTable( {
        lengthChange: false,
        buttons: [ 'copy', 'excel', 'pdf', 'colvis' ]
    } );
 
    table.buttons().container()
        .appendTo( '#dataTable_wrapper .col-md-6:eq(0)' );
} );
</script>

    <script src="https://getbootstrap.com/docs/5.2/dist/js/bootstrap.bundle.min.js" ></script>
      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" ></script>
      <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
      <script src="https://getbootstrap.com/docs/5.2/examples/dashboard/dashboard.js"></script>
      @livewireScripts
      @stack('script')

  </body>
</html>
