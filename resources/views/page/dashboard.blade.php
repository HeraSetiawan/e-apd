<x-template-app>
    @push('script')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
             // Data produk dan warna
    var permintaan = {!! $jsonPermintaan  !!};
    var produkLabels = Object.keys(permintaan);
    var produkDatas = Object.values(permintaan);

    var warnaProduk = ['#baffc9',];
          // Fungsi untuk menambahkan warna baru
        function tambahWarna() {
          // Mendapatkan warna terakhir dari array
          var warnaTerakhir = warnaProduk[warnaProduk.length - 1];

          // Mengonversi warna dari hex ke desimal
          var desimalWarna = parseInt(warnaTerakhir.slice(1), 16);

          // Menambahkan offset warna
          desimalWarna += 1000;

          // Mengonversi kembali ke hex
          var hexWarna = '#' + desimalWarna.toString(16);

          // Menambahkan warna baru ke array
          warnaProduk.push(hexWarna);

          // Mengembalikan warna baru
          return hexWarna;
        }

        // Contoh penggunaan
        var warnaBaru = tambahWarna();

    // Membuat chart
    var ctx = document.getElementById('doughnutChart').getContext('2d');
    var doughnutChart = new Chart(ctx, {
      type: 'doughnut',
      data: {
        labels: produkLabels,
        datasets: [{
          data: produkDatas,
          backgroundColor: warnaProduk,
        }]
      },
      options: {
        title: {
          display: true,
          text: 'Doughnut Chart - Data Produk'
        }
      }
    });
        </script>
        <script>
            // Data produk dan warna
            let top10 = {!! $top10 !!}
            var produkLabels10  = Object.keys(top10);
            var produkDatas10  = Object.values(top10);
           // Membuat fungsi untuk menghasilkan warna secara dinamis
function dynamicBackground(context) {
  var value = context.dataset.data[context.dataIndex];
  // Menggunakan warna gradient dari merah ke hijau
  var red = Math.round(255 - (value * 60));
  var green = Math.round(value * 20);
  return 'rgba(' + red + ', ' + green + ', 256, 0.6)';
}
        
            // Membuat chart
            var ctx = document.getElementById('barChart').getContext('2d');
            var barChart = new Chart(ctx, {
              type: 'bar',
              data: {
                labels: produkLabels10,
                datasets: [{
                  data: produkDatas10,
                  label: 'Top 10 data',
                  backgroundColor: dynamicBackground,
                  borderWidth: 1
                }]
              },
              options: {
                title: {
                  display: true,
                  text: 'Bar Chart - Data Produk'
                },
                scales: {
                  y: {
                    beginAtZero: true
                  }
                }
              }
            });
          </script>
    @endpush
    <form action="" method="get">
    <div class="hstack gap-2">
        <div id="judul">
            <h3 style="font-family: Arial, Helvetica, sans-serif" class="my-0">Selamat Datang, {{ Auth::user()->nama_lengkap }} </h3>
            <p style="font-family: Arial, Helvetica, sans-serif" class="text-muted">Dashboard Super Admin</p>
        </div>
        <div class="ms-auto">
            <div>
              <x-select name="keyBulan" label="Pilih Bulan">
                <option @selected(request('keyBulan') == "01") value="01">Januari</option>
                <option @selected(request('keyBulan') == "02") value="02">Februari</option>
                <option @selected(request('keyBulan') == "03") value="03">Maret</option>
                <option @selected(request('keyBulan') == "04") value="04">April</option>
                <option @selected(request('keyBulan') == "05") value="05">Mei</option>
                <option @selected(request('keyBulan') == "06") value="06">Juni</option>
                <option @selected(request('keyBulan') == "07") value="07">Juli</option>
                <option @selected(request('keyBulan') == "08") value="08">Agustus</option>
                <option @selected(request('keyBulan') == "09") value="09">September</option>
                <option @selected(request('keyBulan') == "10") value="10">Oktober</option>
                <option @selected(request('keyBulan') == "11") value="11">November</option>
                <option @selected(request('keyBulan') == "12") value="12">Desember</option>
            </x-select>
            </div>
        </div>
        <div class="mb-3">
          <label for="" class="form-label">Tahun</label>
          <input type="number" value="{{ request('keyTahun') }}" name="keyTahun" class="form-control" placeholder="masukan tahun">
        </div>
        <button
            type="submit"
            class="btn btn-primary border-0 bg-gradient mt-2"
        >
            <i class="bi-search"></i>
        </button>
        <a href="{{ url('dashboard') }}" class="btn btn-success mt-2"><i class="bi-arrow-counterclockwise"></i></a>
      </div>
    </form>
        <hr>

        <div class="row gap-1">
            <div class="col-lg-3 py-4 rounded-4" style="background-color: honeydew">
                <div class="card-body">
                    <h4 class="card-title text-uppercase">Permintaan Area</h4>
                    <p class="card-subtitle text-muted mb-3">Data pengajuan permintaan dari area</p>
                    <canvas id="doughnutChart"></canvas>
                </div>
            </div>
            <div class="col-lg-5 py-4 rounded-4" style="background-color: lightcyan">
                <div class="card-body">
                    <h4 class="card-title text-uppercase">TOP 10 APD</h4>
                    <p class="card-subtitle text-muted mb-3">Data apd yang paling sering diminta</p>
                    <canvas id="barChart"></canvas>
                </div>
            </div>
            <div class="col-lg-3">
              <div class="hstack ps-4" style="width: auto;height: 150px;background: linear-gradient(90deg, #e3ffe7 0%, #d9e7ff 100%); border-radius: 15px">
              <div>
                <h1 class="display-3">
                  <i class="bi-person"></i>
                </h1>
              </div>
              <div>
                <h5 class="ps-3 my-0">Jumlah Total Kru</h5>
                <h2 class="ps-3 my-0">{{ $jumlah_kru }} Orang</h2>
              </div>
              </div>
        
              <div class="hstack ps-4 mt-3" style="width: auto;height: 150px;background: linear-gradient(90deg, #e3ffe7 0%, #d9e7ff 100%); border-radius: 15px">
              <div>
                <h1 class="display-3">
                  <i class="bi-box2"></i>
                </h1>
              </div>
              <div>
                <h5 class="ps-3 my-0">Jumlah Total APD</h5>
                <h2 class="ps-3 my-0">{{ $jumlah_stok }} Item</h2>
              </div>
              </div>
            </div>
        </div>
</x-template-app>