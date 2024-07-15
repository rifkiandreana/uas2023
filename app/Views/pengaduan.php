<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $tittle ?></title>

     <!-- Custom fonts for this template-->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url()?>css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary" onload="getLocation();">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5 mx-auto col-lg-10">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <form class="user" id="formSave">
                  <div class="row">
                     <div class="col-lg">
                           <div class="p-5">
                              <div class="text-center">
                                 <h1 class="h4 text-gray-900 mb-3">Silahkan Adukan!!!!</h1>
                              </div>

                              <?php if($session->has('success')) : ?>
                                        <div class="alert alert-success" role="alert">
                                            <p class="mb-0"><?= $session->getFlashdata('success'); ?></p>
                                        </div>
                                <?php endif; ?>

                              <?php if($session->has('failed')) : ?>
                                 <div class="alert alert-danger" role="alert">
                                       <p class="mb-0"><?= $session->getFlashdata('failed'); ?></p>
                                 </div>
                              <?php endif; ?>


                              <div class="row">
                           <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                              <div class="form-group">
                                 <label for="judul" class="text-gray-800">Perihal Laporan</label>
                                 <input type="text" name="judul" id="judul" class="form-control" value="<?= old('judul'); ?>" placeholder="Jenis sampahnya seperti apa">
                                 <small class="text-danger"></small>
                              </div>
                              <div class="form-group">
                                 <label for="detail" class="text-gray-800">Jelaskan lebih rinci</label>
                                 <textarea placeholder="Deskripsikan keadanya" name="detail" id="detail" cols="30" rows="10" class="form-control"><?= old('detail'); ?></textarea>
                                 <small class="text-danger"></small>
                              </div>
                           </div>
                           <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                              <div class="form-group">

                                 <div class="form-group">
                                       <label for="no_telp" class="text-gray-800">Nama</label>
                                       <input type="text" placeholder="Nama sendiri/Anonym Jika tidak ingin diketahui" name="pelapor" id="pelapor" class="form-control" value="<?= old('nama');?>">
                                       <small class="text-danger"></small>
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
                                          <input type="file" name="gambar" id="gambar" class="form-control my-3">
                                          <input type="hidden" name="latitude"  class="form-control" value="">
                                          <input type="hidden" name="longitude" class="form-control" value="">
                                          <small class="text-danger"></small>
                                 </div>
                                 
                              </div>
                           </div>
                        </div>
                     </form>
                     <div class="form-group">                          
                           <button type="submit" class="btn btn-primary btn-block" id="btn-save">Daftar</button>
                     </div>
                     <a href="/">kembali</a>
                  </div>

    <!-- Bootstrap core JavaScript-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/js/bootstrap.bundle.min.js" integrity="sha512-wV7Yj1alIZDqZFCUQJy85VN+qvEIly93fIQAN7iqDFCPEucLCeNFz4r35FCo9s6WrpdDQPi80xbljXB8Bjtvcg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Core plugin JavaScript-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js" integrity="sha512-0QbL0ph8Tc8g5bLhfVzSqxe9GERORsKhIn1IrpxDAgUsbBGz/V7iSav2zzW325XGd1OMLdL4UiqRJj702IeqnQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url()?>js/sb-admin-2.min.js"></script>

    <script type="module">
        import { postRequest } from '<?= base_url()?>/js/postRequest.js';
        
        const form = document.getElementById('formSave');
        const url = '/pengaduan/store';
        const btnSubmit = document.getElementById('btn-save');

        postRequest(form, url, btnSubmit); 
    </script>

   <script type="text/javascript">
      function getLocation(){
         if(navigator.geolocation){
               navigator.geolocation.getCurrentPosition(showPosition);
         }
      }
      function showPosition(position){
         document.querySelector('#formSave input[name="latitude"]').value = position.coords.latitude;
         document.querySelector('#formSave input[name="longitude"]').value = position.coords.longitude;
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

            tooglePelaporDisplay.call(document.querySelector('input :checked'));
            
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

</body>

</html>