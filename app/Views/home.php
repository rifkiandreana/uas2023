<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PAUS.ID</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        header {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 1em;
        }

        .navbar {
        border-bottom: 5px solid #007BFF;
        margin-bottom: 2rem;
        }

        section {
            padding: 2em;
        }

        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 1em;
      
            bottom: 0;
            width: 100%;
        }
        
        #btnScrollToTop {
            display: none;
            position: fixed;
            bottom: 20px;
            right: 20px;
            font-size: 20px;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        #btnScrollToTop:hover {
            background-color: #0056b3;
        }

        /* container */
        .padded-boxes {
            display:flex;
            flex-wrap:wrap;
            gap:2rem;
        }

        /* boxes */
        .padded-boxes > * {
            width:100%;
            background:#eee;
            border-radius:.4rem;
        }

        /* headings */
        .padded-boxes .heading {
            background: #007BFF;
            margin:0;
            padding:1rem;
            border-top-left-radius:.4rem;
            border-top-right-radius:.4rem;
        }

        /* padded content */
        .padded-boxes .padded {
            padding:.1rem 1rem;
        }

        /* tablet breakpoint */
        @media (min-width:768px) {
            .padded-boxes > * {
                width:calc((100% - 4rem) / 3);
            }
        }
        .curved-text {
        display: inline-block;
        transform: rotate(-15deg);
        font-size: 85px;
        }

        
        
    </style>
</head>
<body>

    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
            <img src="<?= base_url('img/3.png') ?>" alt="Logo" width="200" height="100" class="d-inline-block "></a>
        
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                <a class="nav-link " aria-current="page" href="#beranda">Beranda</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#about">About</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#tim">Infromasi</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#lokasi">Lokasi</a>
                </li>
            </ul>
            </div>
        </div>
        <hr class="primary">
    </nav>

    <section id="beranda" style="background-image: url('<?= base_url('img/bg4.jpg') ?>'); background-size: cover; background-position: center; width: full; height: 500px; filter: brightness(80%); display: flex; flex-direction: column; align-items: center; justify-content: center;" class="container-xl">
    <h1 class="text-center fw-bold text-primary font-monospace">
        <span class="curved-text">P</span>
        <span class="curved-text">A</span>
        <span class="curved-text">U</span>
        <span class="curved-text">S</span>
        <span class="curved-text">.</span>
        <span class="curved-text">i</span>
        <span class="curved-text">d</span>
    </h1>
        <p class="text-center text-black bg-white fw-bold font-monospace">"Suara Pesisir, Keluhkan Sampahmu Disini!"</p>
        <a class="btn btn-primary" href="/pengaduan">Mau ngadu ahh, banyak sampah nichh</a>
    </section>

    <section id="about" style=" width: full; display: flex; flex-direction: column; align-items: center; justify-content: center; margin-top:4rem; margin-bottom:4rem;" class="container-xl">
        <h2 class="text-center fw-bold text-black bg-white font-monospace">TAU GAK SIH?</h2>
        <p class="text-center text-black font-inconsolata">Sampah yang tidak terurai dengan baik dapat menjadi sumber zat kimia berbahaya yang merugikan ekosistem laut. Ketika sampah tersebut terurai, substansi kimia beracun dapat terlepas, mencemari air laut dan memengaruhi keseimbangan ekosistem. Dampaknya tidak hanya terbatas pada makhluk laut, tetapi juga dapat mencapai manusia dan lingkungan sekitar. Berikut beberapa dampak membuang sampah dipesisir!</p>
        
        <div class="container text-center">
        <div class="row align-items-center">
            <div class="col mb-1">
                <div class="h-50px w-59">
                    <p class="text-black-50 font-inconsolata">Biota Laut</p>
                    <img style="height: 200px; width: 200px; cursor: pointer;" src="<?= base_url('img/penyu.png') ?>" data-bs-toggle="modal" data-bs-target="#modalTahap1">
                </div>
            </div>
            <div class="col mt-2">
                <div class="h-50px w-59">
                    <p class="text-black-50 font-inconsolata">Mangrove</p>
                    <img style="height: 200px; width: 200px; cursor: pointer;" src="<?= base_url('img/mangrove.png') ?>" data-bs-toggle="modal" data-bs-target="#modalTahap2">
                </div>
            </div>
            <div class="col mt-2">
                <div class="h-50px w-59">
                    <p class="text-black-50 font-inconsolata">Air</p>
                    <img style="height: 200px; width: 200px; cursor: pointer;" src="<?= base_url('img/air.png') ?>" data-bs-toggle="modal" data-bs-target="#modalTahap3">
                </div>
            </div>
            <div class="col">
                <div class="h-50px w-59">
                    <p class="text-black-50 font-inconsolata">Lingkungan</p>
                    <img style="height: 200px; width: 200px; cursor: pointer;" src="<?= base_url('img/lingkungan.png') ?>" data-bs-toggle="modal" data-bs-target="#modalTahap4">
                </div>
            </div>
         
            <div class="mt-2 ">
            <br>
                <p class="text-black font-inconsolata">Ayo jaga kebersihan pesisir bersama! Mari kita tinggalkan kebiasaan membuang sampah di pesisir dan menjadi agen perubahan untuk lingkungan yang lebih bersih. Satu tindakan kecil dari kita dapat memberikan dampak besar untuk melindungi kehidupan laut dan menjaga keindahan pesisir.</p>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="modalTahap1" tabindex="-1" aria-labelledby="modalTahap1Label" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalTahap1Label">ANCAMAN TERHADAP HEWAN LAUT</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Isi modal dengan konten yang sesuai -->
                            <img style="width: 100%;" src="<?= base_url('img/Biota Laut.png') ?>" alt="Tahap 1">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="modalTahap2" tabindex="-1" aria-labelledby="modalTahap1Label" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalTahap2Label">KERUSAKAN MANGROVE</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Isi modal dengan konten yang sesuai -->
                            <img style="width: 100%;" src="<?= base_url('img/Pencemaran Mangrove.png') ?>" alt="Tahap 2">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="modalTahap3" tabindex="-1" aria-labelledby="modalTahap3Label" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalTahap3Label">PENCEMARAN AIR</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Isi modal dengan konten yang sesuai -->
                            <img style="width: 100%;" src="<?= base_url('img/Pencemaran Air.png') ?>" alt="Tahap 3">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="modalTahap4" tabindex="-1" aria-labelledby="modalTahap1Label" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalTahap4Label">KERUSAKAN LINGKUNGAN PESISIR</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Isi modal dengan konten yang sesuai -->
                            <img style="width: 100%;" src="<?= base_url('img/Pencemaran Lingkungan.png') ?>" alt="Tahap 4">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>


    
    <section id="tim" style=" width: full; display: flex; flex-direction: column; align-items: center; justify-content: center; margin-top:4rem; margin-bottom:4rem;" class="container-xl">
        <h2>Mengukir Kelestarian dengan Menerapkan Konsep 3R dalam Kehidupan Sehari-hari</h2>
        <div class="padded-boxes">
            <section>
                <h3 class="heading fs-4">Kurangi</h3>
                <br>
                <div class="padded">
                    <!-- box 1 content -->
                    <img style="width: 100%;" src="<?= base_url('img/18.png') ?>" alt="Tahap 1">
                
                        <p class="mt-4">Hal ini dapat dilakukan dengan cara menghindari penggunaan barang-barang yang tidak diperlukan, seperti kantong plastik sekali pakai, botol air minum, dan kemasan makanan sekali pakai. Sebagai gantinya, kita dapat menggunakan kantong belanja yang dapat digunakan kembali, botol air minum yang dapat diisi ulang, dan kemasan makanan yang dapat digunakan kembali. Dengan mengurangi jumlah sampah yang dihasilkan, kita juga dapat mengurangi dampak negatif pada lingkungan.
                        </p>
                </div>
            </section>
            <section>
            
                <h3 class="heading fs-4">Gunakan kembali</h3>
                <div class="padded">
                    <br>
                    <!-- box 2 content -->
                    <img style="width: 100%;" src="<?= base_url('img/16.png') ?>" alt="Tahap 1">
        
                    <p class="mt-4">Misalnya, botol kaca atau botol plastik bekas yang tidak terpakai dapat kita manfaatkan kembali untuk menyimpan minuman atau makanan sehari-hari. Selain itu, kita juga dapat memanfaatkan kembali kertas bekas yang sudah tidak terpakai lagi untuk membuat catatan, memo, atau karya seni kecil. Dengan rutin memanfaatkan kembali barang-barang tersebut, kita tidak hanya dapat mengurangi jumlah sampah yang dihasilkan tetapi juga menghemat uang dan merawat lingkungan dengan lebih baik.</p></p>
                </div>
            </section>
            <section>
                <h3 class="heading fs-4">Daur ulang</h3>
                <div class="padded">
                    <br>
                    <!-- box 3 content -->
                    <img style="width: 100%;" src="<?= base_url('img/17.png') ?>" alt="Tahap 1">

                        <p class="mt-4">Sampah yang dapat didaur ulang meliputi berbagai jenis seperti kertas, plastik, logam, dan kaca. Daur ulang adalah proses pengolahan kembali sampah menjadi bahan baku baru yang dapat digunakan untuk menciptakan produk baru yang inovatif. Dengan mendaur ulang sampah, kita dapat efektif mengurangi jumlah sampah yang dibuang ke tempat pembuangan sampah, menjaga keberlanjutan lingkungan, dan juga menghemat sumber daya alam yang terbatas.</p>
                </div>
            </section>
        </div>
    
        <div class="container" style="margin-top: 4rem;">
            <h4>Menurut International Coastal Cleanup Report oleh jaringan Ocean Conservacy mengungkap 10 jenis sampah ini mendominasi pesisir dunia. Apa saja ya?</h4>
            <p>Ini 10 Jenis Sampah Terbanyak di Pesisir Dunia :</p>
            <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
                <div class="col">
                    <div class="p-3">Puntung Rokok</div>
                    <img style="width: 100%; height: 170px;" src="<?= base_url('img/puntung.jpg') ?>" >
                </div>
                <div class="col">
                    <div class="p-3">Bungkus Makanan</div>
                    <img style="width: 100%; height: 170px;" src="<?= base_url('img/bungkusmakanan.jpg') ?>" >
                </div>
                <div class="col">
                    <div class="p-3">Tutup botol plastik</div>
                    <img style="width: 100%; height: 170px;" src="<?= base_url('img/tutupbotol.jpeg') ?>" >
                </div>
                <div class="col">
                    <div class="p-3">Botol Minuman Plastik</div>
                    <img style="width: 100%; height: 170px;" src="<?= base_url('img/botolplastik.jpg') ?>" >
                </div>
                <div class="col">
                    <div class="p-3">Kaleng Minuman</div>
                    <img style="width: 100%; height: 170px;" src="<?= base_url('img/minumankaleng.jpg') ?>" >
                </div>
                <div class="col">
                    <div class="p-3">Sedotan Plastik</div>
                    <img style="width: 100%; height: 170px;" src="<?= base_url('img/sedotan.jpeg') ?>" >
                </div>
                <div class="col">
                    <div class="p-3">Botol Minuman Kaca</div>
                    <img style="width: 100%; height: 170px;" src="<?= base_url('img/botolkaca.jpeg') ?>" >
                </div>
                <div class="col">
                    <div class="p-3">Tutup Botol Logam</div>
                    <img style="width: 100%; height: 170px;" src="<?= base_url('img/tutupbotollogam.jpeg') ?>" >
                </div>
                <div class="col">
                    <div class="p-3">Tas Belanja Plastik</div>
                    <img style="width: 100%; height: 170px;"  src="<?= base_url('img/kantongbelanja.jpeg') ?>" >
                </div>
                <div class="col">
                    <div class="p-3">Kemasan Plastik Lain</div>
                    <img style="width: 100%; height: 170px;" src="<?= base_url('img/plastiklain.jpg') ?>" >
                </div>
            </div>
        </div>
    </section>

    <!-- <section id="informasi">

    </section> -->

    <section id="lokasi" class="mb-5">
    <div id="bar">
        <div class="row mgt50px">
        <h1 class="center">Lokasi Kami</h1>
        <br>
        <br>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d51057.83017612796!2d106.5305218856256!3d-6.999001402736265!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68279a580f157d%3A0xa0561d5bc3027949!2sKabupaten%20sukabumi%20pelabuhan%20ratu!5e0!3m2!1sid!2sid!4v1703104098509!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" width="1362" height="470" frameborder="0" style="margin-bottom: 0; left: 10px;" allowfullscreen></iframe>
        </div>
    </div>
    </section> 


    <footer>
    <div class="contact-info">
        <p>Kontak:(0266)436428/27</p>
        <p>Email: <a href="mailto:info@paus.id">dlhkabsmi@gmail.coml</a></p>
    </div>
    <p >&copy; <a class="text-white" href="/login">2023</a> PAUS.Id. Hak Cipta Dilindungi.</p>
    </footer>

    

    <button onclick="scrollToTop()" id="btnScrollToTop" title="Kembali ke Atas">^</button>

    <script>
    // Saat halaman dimuat
    window.onload = function() {
        // Tampilkan tombol jika pengguna telah menggulir ke bawah
        window.onscroll = function() {
            scrollFunction();
        };
    };

    function scrollFunction() {
        var btnScrollToTop = document.getElementById("btnScrollToTop");

        // Tampilkan tombol saat pengguna menggulir ke bawah 20px atau lebih
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            btnScrollToTop.style.display = "block";
        } else {
            btnScrollToTop.style.display = "none";
        }
    }

    function scrollToTop() {
        // Gulir kembali ke atas halaman
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }
    </script>

 
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>
