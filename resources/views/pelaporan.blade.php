<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <title>Pelaporan Surat</title>
</head>
<body>
    <h1 class="text-center mb-5">Pelaporan Surat</h1>
  
    <div class="container">
        <!-- Form Pencarian -->
        <form method="GET" action="{{ url('/pelaporan') }}">
            <h2 class="text-left mb-3">Cari Bulan Laporan Surat</h2>
            <div class="row mb-4">
                <div class="col-md-5">
                    <input type="month" name="filter_bulan" class="form-control" placeholder="Filter Bulan">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary">Cari</button>
                </div>
            </div>
        </form>
        
        <div class="row">
            <div class="col-md-6">
                <h2>Statistik Surat Keluar-Masuk</h2>
                <canvas id="chartSuratMasuk"></canvas>
            </div>
            
        </div>
        <div class="row mt-4">
            <div class="col-md-12">
                <h2>Kategori Surat yang Sering Diminta</h2>
                <canvas id="chartKategoriSurat"></canvas>
            </div>
        </div>
    </div>
    
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


    <!-- Mengambil data dari database dan mengolahnya -->
    <?php
    // Ambil filter bulan dari input
    $filterBulan = request('filter_bulan');

    // Ambil data surat masuk dari database berdasarkan judul surat yang ada di LetterSeeder
    $judulSurat = [
        'Surat Pengajuan Izin Bangunan',
        'Surat Keterangan Domisili',
        'Surat Permohonan Keringanan Pajak',
        'Surat Pengajuan Izin Menikah',
        'Surat Pengajuan Tanah',
    ];

    // Inisialisasi array untuk kategori surat
    $kategoriSurat = [];
    foreach ($judulSurat as $judul) {
        $kategori = substr($judul, 6); // Ambil bagian judul setelah "Surat "
        if (!isset($kategoriSurat[$kategori])) {
            $kategoriSurat[$kategori] = 0;
        }
    }

    // Hitung jumlah surat masuk per kategori
    foreach ($judulSurat as $judul) {
        $kategori = substr($judul, 6); // Ambil bagian judul setelah "Surat "
        $count = \App\Models\Letter::where('judul', $judul)
            ->whereMonth('created_at', '=', date('m', strtotime($filterBulan)))
            ->whereYear('created_at', '=', date('Y', strtotime($filterBulan)))
            ->count();
        $kategoriSurat[$kategori] += $count;
    }

    // Ambil data surat yang sudah keluar (yang sudah dibaca oleh kepala desa)
    $suratKeluar = \App\Models\Letter::where('status', 'validated_chief')
        ->whereMonth('created_at', '=', date('m', strtotime($filterBulan)))
        ->whereYear('created_at', '=', date('Y', strtotime($filterBulan)))
        ->count();

    // Inisialisasi array untuk statistik
    $dataSuratMasuk = [
        'labels' => $judulSurat,
        'datasets' => [[
            'label' => 'Surat Masuk',
            'data' => array_values($kategoriSurat), // Menggunakan jumlah surat masuk per kategori
            'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
            'borderColor' => 'rgba(54, 162, 235, 1)',
            'borderWidth' => 1
        ], [
            'label' => 'Surat Keluar',
            'data' => [$suratKeluar],
            'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
            'borderColor' => 'rgba(255, 99, 132, 1)',
            'borderWidth' => 1
        ]]
    ];

    // Data kategori surat yang sering diminta
    $dataKategoriSurat = [
        'labels' => array_keys($kategoriSurat),
        'datasets' => [[
            'label' => 'Jumlah Surat',
            'data' => array_values($kategoriSurat),
            'backgroundColor' => [
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(54, 162, 235, 0.2)',
            ],
            'borderColor' => [
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(54, 162, 235, 1)',
            ],
            'borderWidth' => 1
        ]]
    ];
    ?>

    <script>
        // Inisialisasi chart Surat Masuk
        var ctxSuratMasuk = document.getElementById('chartSuratMasuk').getContext('2d');
        var chartSuratMasuk = new Chart(ctxSuratMasuk, {
            type: 'bar',
            data: <?php echo json_encode($dataSuratMasuk); ?>,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Inisialisasi chart Kategori Surat
        var ctxKategoriSurat = document.getElementById('chartKategoriSurat').getContext('2d');
        var chartKategoriSurat = new Chart(ctxKategoriSurat, {
            type: 'doughnut',
            data: <?php echo json_encode($dataKategoriSurat); ?>,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>


</body>
</html>




