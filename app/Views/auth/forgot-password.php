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

<body class="bg-gradient-primary">

        
<div class="container">


<div class="row justify-content-center">

    <div class="col-xl-6 col-lg-4 mx-auto">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
               
                <div class="row">
                    <div class="col-lg">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-2">Resend Email Verification</h1>
                                <p class="mb-4">We get it, stuff happens. Just enter your email address below
                                            and we'll send you a link to reset your password!</p>
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

                            <form class="user" id="formForgotPassword">
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email"
                                        id="email" aria-describedby="emailHelp"
                                        placeholder="Enter Email Address...">
                                        <small class="text-danger"></small>
                                </div>
                                <button type="submit" class="btn btn-primary btn-blocks" id="btn-forgot-password">Resend</button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="/registrasi">Create an Account!</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="/login">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

</div>

    <!-- Bootstrap core JavaScript-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/js/bootstrap.bundle.min.js" integrity="sha512-wV7Yj1alIZDqZFCUQJy85VN+qvEIly93fIQAN7iqDFCPEucLCeNFz4r35FCo9s6WrpdDQPi80xbljXB8Bjtvcg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Core plugin JavaScript-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js" integrity="sha512-0QbL0ph8Tc8g5bLhfVzSqxe9GERORsKhIn1IrpxDAgUsbBGz/V7iSav2zzW325XGd1OMLdL4UiqRJj702IeqnQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Custom scripts for all pages-->
    <script type="module">
        import { postRequest } from '<?= base_url()?>/js/postRequest.js';
        
        const form = document.getElementById('formForgotPassword');
        
        //menggunakam / untuk menemukan base url
        const url = '/forgot-password/reset-password';
        const btnSubmit = document.getElementById('btn-forgot-password');

        postRequest(form, url, btnSubmit); 
    </script>
   

</body>

</html>




 