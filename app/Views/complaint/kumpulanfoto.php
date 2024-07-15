<?= $this->extend('template/index') ?>

<?= $this->section('content') ?>
<!-- Begin Page Content -->
 <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $tittle ;?></h1>

    <!-- Tampilkan daftar gambar -->
    <?php if($data) : ?>
        <?php foreach ($data as $num => $row) :?>
            <div class="p-3">
            <h4>Pengirimnya :</h4>
            <p><?= $row ['pelapor']; ?></p>
            <img src="<?= base_url('img/complaint/' . $row['gambar']); ?>" alt="Gambar Pengaduan" class="img-fluid">
            </div>
        <?php endforeach;?>
    <?php endif ; ?>

</div>

<script type="module">
        import { postRequest } from '<?= base_url()?>/js/postRequest.js';
        
        const form = document.getElementById('formSaveComplaint');
        const url = '/complaint/store';
        const btnSubmit = document.getElementById('btn-save-complaint');

        postRequest(form, url, btnSubmit); 
</script>
<!-- /.container-fluid -->
<?= $this->endSection('content') ?>

