<section class="jumbotron jumbotron-fluid">
    <div class="container pl-5 pt-lg-5 text-white">
        <h1>Peduli Lingkungan Peduli Masyarakat</h1>
        <p class="lead">Saatnya beraksi, perubahan kecil membuat perbedaan besar bagi planet dan masyarakat kita</p>
        <a class="btn btn-size mt-4 " href="<?= base_url('Donasi') ?>" role="button">Mulai Berbagi</a>
    </div>
</section>
<section class="makanan-tersedia" style="margin: 3em 0 6em ;">
    <div class="row">
        <div class="col-12 col-md-8">
            <h1 class="sub-judul">Makanan Tersedia</h1>
            <p class="judul-deskripsi">Untuk kamu yang membutuhkan atau kenalanmu yang membutuhkan</p>
        </div>
        <div class="col-12 col-md-4 align-self-end makanan-link text-right pr-md-5">
            <a href="<?= base_url('Makanan/') ?>">Lihat Lainnya >></a>
        </div>
    </div>
    <div id="display" class="row pr-3 pl-4"></div>
</section>
<section class="top-donatur-container row p-1 pt-4 p-md-5 pb-5 text-capitalize text-light col-12">
    <div class="top-donatur col-12 col-md-6">
        <h3 class="mb-3 mb-md-5 text-center" style="font-size: 32px;">Top 3 Donasi Terbanyak</h3>
        <div class="row col-12 justify-content-center">
            <div class="top-3 align-self-end">
                <div class="top-image text-center ">
                    <img src="<?= base_url('assets/') ?>images/top-donatur-1.png"" alt=" Banner berbagi">
                    <h6 class="pt-2 "><?= $top_2 ?></h6>
                    <h5><?= $jml_top_2 ?></h5>
                </div>
                <div class="kotak-1"></div>
                <div class="kotak-2 kotak">TOP 2</div>
            </div>
            <div class="top-2 align-self-end">
                <div class="top-image text-center">
                    <img src="<?= base_url('assets/') ?>images/top-donatur-2.png"" alt=" Banner berbagi">
                    <h6 class="pt-2"><?= $top_1 ?></h6>
                    <h5><?= $jml_top_1 ?></h5>
                </div>
                <div class="kotak-3"></div>
                <div class="kotak-4 kotak">TOP 1</div>
            </div>
            <div class="top-3 align-self-end">
                <div class="top-image text-center">
                    <img src="<?= base_url('assets/') ?>images/top-donatur-3.png"" alt=" Banner berbagi">
                    <h6 class="pt-2"><?= $top_3 ?></h6>
                    <h5><?= $jml_top_3 ?></h5>
                </div>
                <div class="kotak-5"></div>
                <div class="kotak-6 kotak">TOP 3</div>
            </div>
        </div>
    </div>
    <div class="donatur-berbagi col-12 col-md-6 align-self-center ">
        <h3 class="donasi-deskripsi text-light">Saatnya beraksi, perubahan kecil membuat perbedaan besar bagi planet dan masyarakat kita</h3>
        <div class="text-center">
            <a class="btn btn-success btn-size mt-4 btn0 " href="<?= base_url('Donasi') ?>" role="button">Donasi</a>
        </div>
    </div>
</section>
<section class="dampak-container col-12 pt-md-5" style="margin: 5em 0;">
    <div class="row justify-content-between">
        <div class="col-5 col-md-4 text-center pt-5 ml-md-5">
            <h4>13 juta ton makanan di Indonesia terbuang tiap tahunnya.</h4>
            <p>Kontribusi besar terbuangnya makanan berasal dari hotel, restoran, katering, supermarket, dan masyarakat yang gemar menyisakan makanannya</p>
            <p>&</p>
            <h4>19,4 juta
                orang tidak dapat memenuhi kebutuhan diet mereka</h4>
            <h4>37,2%
                anak di bawah 5 tahun mengalami stunting</h4>
            <p>
                Dalam Global Hunger Index 2021, Indonesia menempati urutan ke-73 dari 116 negara dengan skor 18,0, Indonesia memiliki tingkat kelaparan moderate
            </p>
        </div>
        <div class="col-7 col-md-6 align-self-center">
            <img src="<?= base_url('assets/') ?>images/hero-3.png"" alt=" Banner berbagi" />
        </div>
    </div>
</section>
<section class="total-donasi" style="margin: 8em 0;padding:6em 0">
    <h2 class="pl-2 pr-2 p-md-0">Bergabung Bersama Kami Untuk Perubahan</h2>
    <div class="row justify-content-around mt-3 mt-md-5">
        <div class="col-md-3">
            <h1><?= $jumlah ?></h1>
            <h5>Total Donasi</h5>
        </div>
        <div class="col-md-3">
            <h1> <?= count($jmldonatur) ?></h1>
            <h5>Jumlah Donatur</h5>
        </div>
        <div class="col-md-3">
            <h1><?= $selesai ?></h1>
            <h5>Jumlah Tersalurkan</h5>
        </div>
    </div>
</section>
<section class="cara-memesan-container p-0">
    <div class="row">
        <div class="col-md-6 col-12">
            <iframe width="100%" height="100%" src="https://www.youtube.com/embed/4Eo7lBhnY04" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        <div class="cara-memesan col-md-6 pb-5 col-12">
            <h2 class="pt-4 p-md-0">Cara Memesan Makanan</h2>
            <div class="row mt-4">
                <h3 class="nomor">1</h3>
                <div class="col-10 p-0">
                    <h4>Jelajahi Daftar Makanan</h4>
                    <p>Kamu dapat menemukan makanan tersedia di menu <a href=" <?= base_url('Makanan/') ?>">Makanan Tersedia</a></p>
                </div>
            </div>
            <div class="row mt-4 ">
                <h3 class="nomor">2</h3>
                <div class="col-10 p-0">
                    <h4>Memesan Makanan</h4>
                    <p>Kamu dapat mengirim pesan permintaan dan pastikan dapat mengambilnya ya</p>
                </div>
            </div>
            <div class="row mt-4 ">
                <h3 class="nomor">3</h3>
                <div class="col-10 p-0">
                    <h4>Selamat Menikmati</h4>
                    <p>Hadir di tempat dan waktu yang telah disepakati. Selamat menjadi bagian dari peduli lingkungan</p>
                </div>
            </div>

        </div>

    </div>
</section>
<section class="cara-memberi-container mt-1" style="margin-bottom:8rem;">
    <div class="row">
        <div class="cara-memesan col-md-6 pl-md-5 pt-md-4 col-12">
            <h2>Cara Memberi Makanan</h2>
            <div class="row mt-4">
                <h3 class="nomor">1</h3>
                <div class="col-10 p-0">
                    <h4>Pilih Menu Donasi</h4>
                    <p>Pastikan kamu sudah login aplikasi. Setelah login klik <a href="<?= base_url('Donasi/') ?>">Donasi</a></p>
                </div>
            </div>
            <div class="row mt-4 ">
                <h3 class="nomor">2</h3>
                <div class="col-10 p-0">
                    <h4>Mengisi Formulir Makanan</h4>
                    <p>Pastikan pengisian formulir sudah benar dan makanan yang diberikan masih layak dikonsumsi</p>
                </div>
            </div>
            <div class="row mt-4 ">
                <h3 class="nomor">3</h3>
                <div class="col-10 p-0">
                    <h4>Selamat Berbagi</h4>
                    <p>Makanan anda akan ditampilkan di <a href="<?= base_url('Makanan/') ?>">Makanan Tersedia</a>. Kami akan kabari jika ada yang berminat. Selamat anda menjadi bagian peduli lingkungan dan masyarakat</p>
                </div>
            </div>

        </div>
        <div class="col-md-6 col-12 pt-3 p-md-0">
            <iframe width="100%" height="100%" src="https://www.youtube.com/embed/i2dkZD4Kh5g" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>

    </div>
</section>

<script>
    getLocation();

    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            x.innerHTML = " Geolocation is not supported by this browser.";
        }
    }

    function showPosition(position) {
        var lat = position.coords.latitude;;
        var long = position.coords.longitude;
        $.ajax({
            url: '<?php echo base_url() ?>home/makanantersedia',
            type: 'POST',
            async: false,
            data: {
                lat: lat,
                long: long,
            },
            success: function(data) {
                document.getElementById('display').innerHTML = data;
            }
        });
    }
</script>