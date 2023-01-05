<nav class=" navbar navbar-expand-md navbar-light sticky-top bg-success user-nav " id="navbar">
    <a class="navbar-brand ml-lg-5" href="<?= base_url('Home') ?>"><img src="<?= base_url('assets/') ?>images/logo-1.png" alt="Pelik Pekat"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span><i class="fas fa-bars" style="color:black;"></i></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">

        <ul class="navbar-nav mt-4 mt-lg-0 ml-auto">
            <li class="nav-item ">
                <a class="link-nav" href="<?= base_url('') ?>" id="nav-link">Beranda</a>
            </li>
            <li class="nav-item">
                <a class="link-nav" href="<?= base_url('Makanan') ?>">Makanan Tersedia</a>
            </li>
            <li class="nav-item">
                <a class="link-nav" href="<?= base_url('Donasi') ?>">Donasi</a>
            </li>
            <li class="nav-item">
                <a class="link-nav" href="<?= base_url('Penerima') ?>">Penerima</a>
            </li>
            <li class="nav-item">
                <a class="link-nav" href="<?= base_url('Pesebaran') ?>/maps">Pesebaran Wilayah</a>
            </li>

            <?php if ($this->session->userdata('nama')) { ?>
                <li class="nav-item dropdown mr-2">
                    <a class="link-nav dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user pr-2"> </i> <?= $this->session->userdata('nama') ?>
                    </a>
                    <div class="dropdown-menu bg-success" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?= base_url('Donasi/') ?>pesananSaya">Pesanan Saya</a>
                        <a class="dropdown-item" href="<?= base_url('Donasi/') ?>Donasi_Saya">Donasi Saya</a>
                        <a class="dropdown-item" href="<?= base_url('Auth/logout') ?>">Logout</a>
                    </div>
                </li>
            <?php } else { ?>

                <li>
                    <a class="link-nav" href="<?= base_url('Auth/') ?>">Masuk</a>
                </li>
            <?php   } ?>

        </ul>


    </div>
</nav>

<script>
    $(document).ready(function() {
        $('a[href$="' + location.pathname + '"]').addClass('link-aktif');
    });
</script>