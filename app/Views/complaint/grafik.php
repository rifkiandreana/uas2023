<?= $this->extend('template/index') ?>

<?= $this->section('content') ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Tambahkan container untuk chart -->
    <div style="width: 80%;">
        <canvas id="myChart"></canvas>
    </div>
    <br>
    <button class="btn btn-primary" onclick="downloadChart()">Download Grafik </button>

</div>
<!-- /.container-fluid -->

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Data contoh (gantilah dengan data sebenarnya dari controller)
    var laporanIds = <?= json_encode($laporanIds) ?>;
    var dataChart = <?= json_encode($dataChart) ?>;

    // Inisialisasi chart
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: laporanIds,
            datasets: [{
                label: 'Jumlah Laporan Sampah Pesisir',
                data: dataChart,
                backgroundColor: 'rgba(75, 192, 192, 8)',
                borderColor: 'rgba(75, 192, 192, 8)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

        // Fungsi untuk mengunduh grafik sebagai PNG
        function downloadChart() {
        // Mengambil data URL dari elemen canvas
        var chartDataURL = document.getElementById('myChart').toDataURL('image/png');

        // Membuat elemen <a> untuk mengunduh
        var downloadLink = document.createElement('a');
        downloadLink.href = chartDataURL;
        downloadLink.download = 'andrehandsome.png';
        downloadLink.click();
    }
</script>
<?= $this->endSection('content') ?>
