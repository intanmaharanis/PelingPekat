<nav class="navbar navbar-expand-sm  nav-admin justify-content-between nav-top  pt-1 pb-1 pl-5">
    <a class="navbar-brand" href="<?= base_url('Admin') ?>/index" style="color:white">
        <img src="<?= base_url('assets/') ?>images/logoadmin.png" alt="Pelik Pekat"></a>
    </a>
    <ul class="navbar-nav  mr-2 d-none d-md-flex">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                <i class="fa fa-user mr-1"></i>
                <span class="text-capitalize"><?= $this->session->userdata('nama') ?></span>
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item text-dark" href="<?= base_url() ?>Auth/logout">
                    <i class="fas fa-sign-out-alt mr-1"></i>
                    <span>Sign Out</span>
                </a>
            </div>
        </li>
    </ul>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="fas fa-align-justify" style="color: white;font-size: 25px"></span>
    </button>
</nav>
<div class="row">
    <div class="sidebar col-md-2 col-2 pt-3 pl-2 pr-0  m-0 collapse show " id="collapsibleNavbar">
        <nav class="navbar">
            <ul class="navbar-nav text-center text-md-left">
                <li class="nav-item ">
                    <a class="nav-link" href="<?= base_url('Admin') ?>">
                        <i class="fas fa-home  text-light"></i>
                        <span class="ml-md-1 text-light">Halaman Utama</span>
                    </a>
                </li>
                <li class="nav-link font-weight-bold mt-2 text-light" style="font-size: 10px;">
                    DATA MASTER
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('Admin/') ?>dataMakanan">
                        <i class="fas fa-utensils"></i>
                        <span class="ml-md-1">Data Donasi</span></a>
                </li>
                <li class="navbar-expand-md" data-toggle="collapse" data-target="#barangdrop">
                    <a class="nav-item d-none d-md-block nav-link" href="<?= base_url('Admin') ?>/Donatur">
                        <i class="fas fa-hand-holding-heart"></i>
                        <span class="ml-md-2">Data Donatur</span>
                    </a>
                    <a class="nav-link navbar-toggler" href="<?= base_url('Admin') ?>/Donatur" type=" button" data-toggle="collapse" data-target="#collapsiblebarang">
                        <i class="fas fa-hand-holding-heart col-12 col-md-1 p-md-1"></i>
                        <span class="ml-md-2">Data Donasi <i class="fas fa-hand-holding-heart"></i></span>
                    </a>
                    <div class="collapse navbar-collapse mt-2" id="collapsiblebarang">
                        <ul class="navbar-nav d-md-block">
                            <li class="nav-item">
                                <a class="nav-link d-block d-md-none" href="<?= base_url('Admin') ?>/Donatur" style=" font-size: 14px;">
                                    <i class="fas fa-bezier-curve col-12 col-md-1"></i>
                                    <span class="ml-2">Data Donasi</span></a>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('Admin'); ?>/jenisMakanan" style="font-size: 14px;">
                                    <i class="fas fa-seedling"></i>
                                    <span class="ml-2">Jenis makanan</span></a>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('Admin/') ?>users">
                        <i class="fas fa-users"></i>
                        <span class="ml-md-1">Data User</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('Admin/') ?>Pesebaran">
                        <i class="fas fa-map-marked"></i>
                        <span class="ml-md-1">Data Persebaran</span></a>
                </li>
                <li class="nav-link font-weight-bold mt-3 mt-md-2" style="font-size: 10px">
                    TRANSAKSI MAKANAN
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('Admin/') ?>Tersedia">
                        <i class="fas fa-upload"></i>
                        <span class="ml-md-1">Tersedia</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('Admin/') ?>Dipesan">
                        <i class="fas fa-download"></i>
                        <span class="ml-md-1">Dipesan</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('Admin/') ?>Selesai">
                        <i class="fas fa-check-square"></i>
                        <span class="ml-md-1">Selesai</span></a>
                </li>
                <li class="nav-link font-weight-bold mt-3" style="font-size: 10px">
                    Laporan
                </li>

                <li class="nav-item">
                    <a class="nav-link" href=" <?= base_url('Admin/') ?>Bulanan">
                        <i class="fas fa-calendar-week"></i>
                        <span class="ml-md-1">Bulanan</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('Admin/') ?>Tahunan">
                        <i class="fas fa-calendar"></i>
                        <span class="ml-md-1">Tahunan</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <div class="col-md-10 col-10 mx-auto" style="background: #f9f0ff">
        <h3 class="col-11 m-3 p-0 mt-4 font-weight-bold text-center text-md-left text-capitalize" style="color: #39670B;">
            <?= $judulHalaman ?>
        </h3>
        <?php if ($this->session->flashdata('alert')) : ?>
            <div class="alert alert-success alert-dismissible mt-3 col-11 col-md-7 ml-4 ml-md-5">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                Data <strong>Berhasil <?= $this->session->flashdata('alert'); ?> !</strong>
            </div>
        <?php endif; ?>

        <script>
            $(document).ready(function() {
                $('a[href$="' + location.pathname + '"]').addClass('aktif');
            });
        </script>