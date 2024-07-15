<?= $this->extend('template/index') ?>

<?= $this->section('content') ?>
<!-- Begin Page Content -->
 <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $tittle ;?></h1>

     <div class="card shadow">
        <div class="card-header">
            <!-- <a href="/complaint/create" class="btn btn-primary"><i class="fa fa-plus"></i>Tambah Data</a> -->
            <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalStoreComplaint">
                <i class="fa fa-plus">Tambah Pengaduan Baru</i>
            </button> -->
        </div>

        <div class="card-body">
            <table class="table table-bordered" id="tableComplaint">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Judul</th>
                        <th>Pelapor</th>
                        <!-- <th>Status</th> -->
                        <th>Detail</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($data) : ?>
                        <?php foreach ($data as $num => $row) :?>
                            <tr>
                                <td><?= $num + 1; ?></td>
                                <td><?= $row ['judul']; ?></td>
                                <!-- <td>
                                    <?= $row['status'] == 0 ? '<span class="badge-primary p-1 rounded-sm">Baru</span>' : ($row['status'] == 1 ? '<span class="badge-warning p-1 rounded-sm">Diproses</span>' : '<span class="badge-success p-1 rounded-sm">Selesai</span>') ?>
                                </td> -->
                                <td><?= $row ['pelapor']; ?></td>
                                <td>
                                    <button class="btn btn-info" data-toggle="modal" data-target="#modalDetail<?= $row['pengaduan_id']; ?>">
                                        Lihat Detail
                                    </button>

                                </td>
                                <td>
                                <a href="<?= route_to('complaint-delete', $row['pengaduan_id']); ?>" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                                </td>
                              
                               
                            </tr>

                            <!-- Modal for Detail -->
                            <div class="modal fade" id="modalDetail<?= $row['pengaduan_id']; ?>" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Detail Pengaduan - <?= $row ['judul']; ?></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div>
                                                <h4>Detail Informasinya :</h4>
                                                <p><?= $row ['detail']; ?></p>
                                            </div>
                                            <div>
                                                <h4>Pengirimnya :</h4>
                                                <p><?= $row ['pelapor']; ?></p>
                                            </div>
                                            <div>
                                                <h4>Nomor Telpon :</h4>
                                                <p><?= $row ['no_telpon']; ?></p>
                                            </div>
                                            <div style="width: 300px; height: 300px">
                                                <h4>Bukti foto :</h4>
                                                <img src="<?= base_url('img/complaint/' . $row['gambar']); ?>" alt="Gambar Pengaduan" class="img-fluid"  >
                                            </div>
                                            <div>
                                                <h4>Titik Lokasi :</h4>
                                                <iframe src="https://www.google.com/maps?q=<?php echo $row ['latitude']; ?>, <?php echo $row ['longitude']; ?>&h1=es;z=14&output=embed" frameborder="0"></iframe>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        <?php endforeach;?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4">
                                <h3 class="text-gray-700 text-center"> Data Belum ada</h3>
                            </td>
                        </tr>
                    <?php endif;?>
                </tbody>
            </table>
        </div>

    </div>
    
    <!-- Modal Pengisian
    <div class="modal fade" id="modalStoreComplaint" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            
        <form action="" id="formSaveComplaint" class="formSaveComplaint">
        <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-gray-800">Form Tambah Pengaduan</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="judul" class="text-gray-800">Perihal Laporan</label>
                                <input type="text" name="judul" id="judul" class="form-control" value="<?= old('judul'); ?>">
                                <small class="text-danger"></small>
                            </div>
                            <div class="form-group">
                                <label for="detail" class="text-gray-800">Jelaskan lebih rinci</label>
                                <textarea name="detail" id="detail" cols="30" rows="10" class="form-control"><?= old('detail'); ?></textarea>
                                <small class="text-danger"></small>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="namaAnonym" class="text-gray-800">Nama Pelapor</label>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input anonym"  name="pelapor" id="namaAnonym" value="anonym" checked>
                                    <label for="namaAnonym" class="form-check-label">
                                        <span class="text-gray-800">Samarkan (Anonym)</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input"  name="pelapor" id="namaSendiri">
                                    <label for="namaSendiri" class="form-check-label">
                                        <span class="text-gray-800">Gunakan Nama Sendiri</span>
                                    </label>
                                </div>
                                                            
                                <div class="form-group">
                                    <label for="no_telp" class="text-gray-800">No. HP/WhatsApp</label>
                                    <input type="text" name="no_telpon" id="no_telpon" class="form-control" value="<?= old('no_telpon');?>">
                                    <small class="text-danger"></small>
                                </div>
                                <div class="form-group">
                                        <label for="gambar" class="text-gray-800">Upload foto</label>
                                        <div class="mb-3">
                                            <p class="mb-0 text-info">Ukuran maksimal 2 mb, tipe file: jpg, jpeg, png</p>
                                        </div>
                                        <input type="file" name="gambar" id="gambar" class="form-control">
                                        <input type="hidden" name="latitude"  class="form-control" value="">
                                        <input type="hidden" name="longitude" class="form-control" value="">
                                        <small class="text-danger"></small>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btn-close">Close</button>
                    <button type="submit" class="btn btn-primary" id="btn-save-complaint">Save</button>
                </div>
            </div>
        </div>
    </div>
    </form>
    

</div> -->

<script type="module">
        import { postRequest } from '<?= base_url()?>/js/postRequest.js';
        
        const form = document.getElementById('formSaveComplaint');
        const url = '/complaint/store';
        const btnSubmit = document.getElementById('btn-save-complaint');

        postRequest(form, url, btnSubmit); 
</script>

<script type="text/javascript">
    function getLocation(){
        if(navigator.geolocation){
            navigator.geolocation.getCurrentPosition(showPosition);
        }
    }
    function showPosition(position){
        document.querySelector('.formSaveComplaint input[name="latitude"]').value = position.coords.latitude;
        document.querySelector('.formSaveComplaint input[name="longitude"]').value = position.coords.longitude;
    }

    function showError(error){
        switch(error.code){
            case error.PERMISSION_DENIED:
            alert("Nyalain titik lokasinya")
            loction.reload();
            break;
        }
    }

</script>
<!-- /.container-fluid -->
<?= $this->endSection('content') ?>

<?= $this->section('scriptjs');?>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const pelapor = document.querySelector('.pelapor');
            const radioButtons = document.querySelectorAll('input[type="radio"]')
        
            function tooglePelaporDisplay() {
                pelapor.style.display = this.classList.contains('anonym') ? 'none' : '' ;
            }

            radioButtons.forEach(function (radioButton){
                radioButton.addEventListener('click', tooglePelaporDisplay);

            }) 

            tooglePelaporDisplay.call(document.querySelector('input[name="pelapor"]:checked'));
            
            // reset form annd remove errors
            const form = document.getElementById('formSaveComplaint');
            const btnClose = document.getElementById('btn-close');
            const formControlElements = document.querySelectorAll('input.form-control,textarea.form-control');
        
            btnClose.addEventListener('click', function (){
                form.reset();
                formControlElements.forEach(function (element){
                    element.classList.remove('is-invalid');

                    const errorElement = element.nextElementSibling;
                    if(errorElement && errorElement.classList.contains('text-danger')){
                        errorElement.textContent = '';
                    }
                })
            })

            getLocation();
        })


    </script>
<?= $this->endSection();?>





