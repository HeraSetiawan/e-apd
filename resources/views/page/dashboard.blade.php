<x-template-app>
    @push('script')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
             // Data produk dan warna
    var produkData = [30, 20, 15, 10, 25];
    var warnaProduk = ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF'];

    // Membuat chart
    var ctx = document.getElementById('doughnutChart').getContext('2d');
    var doughnutChart = new Chart(ctx, {
      type: 'doughnut',
      data: {
        labels: ['Produk 1', 'Produk 2', 'Produk 3', 'Produk 4', 'Produk 5'],
        datasets: [{
          data: produkData,
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
            var produkData = [30, 20, 15, 10, 25];
            var warnaProduk = ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF'];
        
            // Membuat chart
            var ctx = document.getElementById('barChart').getContext('2d');
            var barChart = new Chart(ctx, {
              type: 'bar',
              data: {
                labels: ['Produk 1', 'Produk 2', 'Produk 3', 'Produk 4', 'Produk 5'],
                datasets: [{
                  data: produkData,
                  backgroundColor: warnaProduk,
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
    <div class="hstack">
        <div id="judul">
            <h3 style="font-family: Arial, Helvetica, sans-serif" class="my-0">Selamat Datang, {{ Auth::user()->nama_lengkap }} </h3>
            <p style="font-family: Arial, Helvetica, sans-serif" class="text-muted">Dashboard Super Admin</p>
        </div>
        <div class="ms-auto">
            <div>
                <select class="form-select" name="tahun"id="tahun">
                    <option selected>--pilih Bulan--</option>
                    <option value="">New Delhi</option>
                </select>
            </div>
        </div>
        <div class="mx-2">
            <select class="form-select" name="tahun"id="tahun">
                <option selected>--Pilih Tahun--</option>
                <option value="">New Delhi</option>
            </select>
        </div>
        <button
            type="submit"
            class="btn btn-primary border-0 bg-gradient"
        >
            <i class="bi-search"></i>
        </button>
        
    </div>
        <hr>

        <div class="row gap-2">
            <div class="col-lg-4 py-4 rounded-4" style="background-color: honeydew">
                <div class="card-body">
                    <h4 class="card-title text-uppercase">Total Permintaan</h4>
                    <p class="card-subtitle text-muted mb-3">Data permintaan per area</p>
                    <canvas id="doughnutChart"></canvas>
                </div>
            </div>
            <div class="col-lg-7 py-4 rounded-4" style="background-color: lightcyan">
                <div class="card-body">
                    <h4 class="card-title text-uppercase">Permintaan Pertahun</h4>
                    <p class="card-subtitle text-muted mb-3">Data permintaan pertahun berdasarkan area</p>
                    <canvas id="barChart"></canvas>
                </div>
            </div>
        </div>
</x-template-app>