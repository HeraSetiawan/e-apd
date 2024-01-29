<div class="col-lg-6 mx-auto my-2">
    <img src="{{ asset('assets/gambar/logo.png') }}" class="d-block mx-auto" width="100">
    <h2 class="mx-2 mx-lg-0"><i class="bi-buildings-fill"></i> Selamat datang di Aplikasi MyHSEPDS</h2>
    <p class="lead text-capitalize mx-2 mx-2 mx-lg-0">Pertamina drilling service Indonesia project Sumatera bagian selatan Project SBS</p>
    @if (session('pesan'))
      <x-alert warna="danger" :pesan="session('pesan')" />
    @endif
    
    <div class="card shadow">

        <div class="card-header">
          <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
              <a class="nav-link text-secondary {{ $link == 'admin' ? 'active' : '' }}" href="#" wire:click='loginAdmin'>ADMIN</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-secondary {{ $link == 'kru' ? 'active' : '' }}" href="#" wire:click='loginKru'>KRU</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-secondary {{ $link == 'info' ? 'active' : '' }}" href="#" wire:click='info'>Panduan Keselamatan</a>
            </li>
          </ul>
        </div>
        <div class="card-body">
          @if ($link != 'info')
            <h5 class="card-title">
              @if ($link == 'admin')
              <i class="bi-person"></i>
              @else
              <i class="bi-people"></i>
              @endif
              Login
            </h5>
            <p class="card-text">silahkan login untuk menggunakan aplikasi</p>
          @else
            <h4 class="card-title text-center my-0"><i class="bi-volume-down"></i> Pedoman Penggunaan APD</h4>
            <p class="card-subtitle text-center text-muted">Karena keselamataan anda adalah prioritas kami</p>
            <hr>
          @endif
          <form action="{{ url('login') }}" method="post">
            @csrf
            <div class="mb-3">
                @if ($link == 'admin')
                <label class="form-label">Email/Nik</label>
                <input type="text" class="form-control" name="username" placeholder="masukan email atau nik anda">
                @elseif($link == 'kru')
                <label class="form-label">NIK</label>
                <input type="text" class="form-control" name="username" placeholder="masukan nik anda">
                @endif
            </div>
            @if ($link != 'info')
              <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" name="password" placeholder="masukan password anda">
              </div>
              <button type="submit" class="btn btn-primary float-end">Submit</button>
            @else
              <img src="{{ asset('assets/gambar/APD-tenaga-kerja.jpg') }}" class="img-fluid d-block mx-auto" width="500" alt="">
            @endif
          </form>
        </div>
      </div>
</div>
<footer style="height: 10px">

</footer>