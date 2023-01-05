<main class="penerima-container row m-md-5 m-3 justify-content-center">
    <section class="col-12">
        <h1 class="sub-judul text-center pt-0 " style="font-size:36px">Penerima dan Relawan</h1>
        <p class="judul-deskripsi text-center pb-3">Mereka yang sudah menerima dan menyalurkan makanan</p>
    </section>
    <form method="GET" action="<?= base_url('Penerima'); ?>" class="mt-md-5 mb-3 col-12 d-flex d-block d-sm-none">
        <div class="col-6 p-0 m-0">
            <select id="hari" name="hari" class="custom-select">
                <option value="7">7 hari lalu</option>
                <option value="30">1 bulan lalu</option>
                <option value="365">1 tahun lalu</option>
            </select>
        </div>
        <div class="col-5"><button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> cari </button></div>
    </form>
    <section class="col-2 border mr-5 pb-5 d-none d-sm-block" style="height: 100%;">
        <article class="text-center">
            <h6 class=" pt-5 font-weight-bold">Total Penerima Hari Ini</h6>
            <h2 class="pt-3 border pb-3 w-75 mt-3 text-light ml-auto mr-auto  bg-success rounded">
                <?= $totalpenerima ?>
            </h2>
            <h6 class=" pt-4 font-weight-bold">Total Relawan Hari Ini</h6>
            <h2 class="pt-3 border pb-3 w-75 mt-3 text-light ml-auto mr-auto  bg-success rounded">
                <?= $totalrelawan ?>
            </h2>
        </article>
        <article>
            <p class=" pt-5 font-weight-bold">Total Penerima Hari :</p>
            <div class="row pb-2">
                <span class="col-8 p-0 align-self-center" style="letter-spacing: 1px;">
                    <?php
                    $h_1 = date('N-d-m-Y', mktime(0, 0, 0, date('n'), date('j') - 1, date('Y')));
                    echo strtok(tanggal_indonesia($h_1), " ");

                    ?>
                </span>
                <span class="col-3 border rounded pt-2 pb-2 border-secondary font-weight-bold">
                    <?= $penerimah1 ?>
                </span>
            </div>
            <div class="row pb-2">
                <span class="col-8 p-0 align-self-center" style="letter-spacing: 1px;">
                    <?php
                    $h_2 = date('N-d-m-Y', mktime(0, 0, 0, date('n'), date('j') - 2, date('Y')));
                    echo strtok(tanggal_indonesia($h_2), " ");

                    ?>
                </span>
                <span class="col-3 border rounded pt-2 pb-2 border-secondary font-weight-bold">
                    <?= $penerimah2 ?>
                </span>
            </div>
            <div class="row pb-2">
                <span class="col-8 p-0 align-self-center" style="letter-spacing: 1px;">
                    <?php
                    $h_3 = date('N-d-m-Y', mktime(0, 0, 0, date('n'), date('j') - 3, date('Y')));
                    echo strtok(tanggal_indonesia($h_3), " ");

                    ?>
                </span>
                <span class="col-3 border rounded pt-2 pb-2 border-secondary font-weight-bold">
                    <?= $penerimah3 ?>
                </span>
            </div>
            <div class="row pb-2">
                <span class="col-8 p-0 align-self-center" style="letter-spacing: 1px;">
                    <?php
                    $h_4 = date('N-d-m-Y', mktime(0, 0, 0, date('n'), date('j') - 4, date('Y')));
                    echo strtok(tanggal_indonesia($h_4), " ");

                    ?>
                </span>
                <span class="col-3 border rounded pt-2 pb-2 border-secondary font-weight-bold">
                    <?= $penerimah4 ?>
                </span>
            </div>
            <div class="row pb-2">
                <span class="col-8 p-0 align-self-center" style="letter-spacing: 1px;">
                    <?php
                    $h_5 = date('N-d-m-Y', mktime(0, 0, 0, date('n'), date('j') - 5, date('Y')));
                    echo strtok(tanggal_indonesia($h_5), " ");

                    ?>
                </span>
                <span class="col-3 border rounded pt-2 pb-2 border-secondary font-weight-bold">
                    <?= $penerimah5 ?>
                </span>
            </div>
            <div class="row pb-2">
                <span class="col-8 p-0 align-self-center  " style="letter-spacing: 1px;">
                    <?php
                    $h_6 = date('N-d-m-Y', mktime(0, 0, 0, date('n',), date('j') - 6, date('Y')));
                    echo strtok(tanggal_indonesia($h_6), " ");

                    ?>
                </span>
                <span class="col-3 border rounded pt-2 pb-2 border-secondary font-weight-bold">
                    <?= $penerimah6 ?>
                </span>
            </div>
        </article>
        <article>
            <p class=" pt-5 font-weight-bold">Total Relawan Hari :</p>
            <div class="row pb-2">
                <span class="col-8 p-0 align-self-center" style="letter-spacing: 1px;">
                    <?php
                    $h_1 = date('N-d-m-Y', mktime(0, 0, 0, date('n',), date('j') - 1, date('Y')));
                    echo strtok(tanggal_indonesia($h_1), " ");

                    ?>
                </span>
                <span class="col-3 border rounded pt-2 pb-2 border-secondary font-weight-bold">
                    <?= $relawanh1 ?>
                </span>
            </div>
            <div class="row pb-2">
                <span class="col-8 p-0 align-self-center" style="letter-spacing: 1px;">
                    <?php
                    $h_2 = date('N-d-m-Y', mktime(0, 0, 0, date('n',), date('j') - 2, date('Y')));
                    echo strtok(tanggal_indonesia($h_2), " ");

                    ?>
                </span>
                <span class="col-3 border rounded pt-2 pb-2 border-secondary font-weight-bold">
                    <?= $relawanh2 ?>
                </span>
            </div>
            <div class="row pb-2">
                <span class="col-8 p-0 align-self-center" style="letter-spacing: 1px;">
                    <?php
                    $h_3 = date('N-d-m-Y', mktime(0, 0, 0, date('n',), date('j') - 3, date('Y')));
                    echo strtok(tanggal_indonesia($h_3), " ");

                    ?>
                </span>
                <span class="col-3 border rounded pt-2 pb-2 border-secondary font-weight-bold">
                    <?= $relawanh3 ?>
                </span>
            </div>
            <div class="row pb-2">
                <span class="col-8 p-0 align-self-center" style="letter-spacing: 1px;">
                    <?php
                    $h_4 = date('N-d-m-Y', mktime(0, 0, 0, date('n',), date('j') - 4, date('Y')));
                    echo strtok(tanggal_indonesia($h_4), " ");

                    ?>
                </span>
                <span class="col-3 border rounded pt-2 pb-2 border-secondary font-weight-bold">
                    <?= $relawanh4 ?>
                </span>
            </div>
            <div class="row pb-2">
                <span class="col-8 p-0 align-self-center" style="letter-spacing: 1px;">
                    <?php
                    $h_5 = date('N-d-m-Y', mktime(0, 0, 0, date('n',), date('j') - 5, date('Y')));
                    echo strtok(tanggal_indonesia($h_5), " ");

                    ?>
                </span>
                <span class="col-3 border rounded pt-2 pb-2 border-secondary font-weight-bold">
                    <?= $relawanh5 ?>
                </span>
            </div>
            <div class="row pb-2">
                <span class="col-8 p-0 align-self-center  " style="letter-spacing: 1px;">
                    <?php
                    $h_6 = date('N-d-m-Y', mktime(0, 0, 0, date('n',), date('j') - 6, date('Y')));
                    echo strtok(tanggal_indonesia($h_6), " ");

                    ?>
                </span>
                <span class="col-3 border rounded pt-2 pb-2 border-secondary font-weight-bold">
                    <?= $relawanh6 ?>
                </span>
            </div>
        </article>
    </section>

    <section class="col-12 col-md-6 mr-md-5">
        <?php

        foreach ($testimoni as $data) {

        ?>
            <div class="card mb-3 border">
                <div class="card-body row border-bottom p-3">
                    <div class="avatar-penerima text-uppercase col-2">
                        <?php
                        $arr = explode(" ", $data->pemesan);
                        $singkatan = ' ';
                        foreach ($arr as $kata) {
                            $singkatan .= substr($kata, 0, 1);
                        }
                        echo substr($singkatan, 1, 2);
                        ?>
                    </div>
                    <div class="detail-penerima  pt-2 ml-3 pl-1 col-9">
                        <?php if ($data->penerima == 'Penerima') { ?>
                            <h6><strong><?= ucwords($data->pemesan) ?></strong> menerima <strong><?= ucwords($data->nama_produk) ?></strong> dari <strong><?= ucwords($data->donatur) ?></strong></h6>
                            <div class="detail-informasi">
                                <span class="text-success mr-3"> <i class="fas fa-user mr-1"></i> <?= ucwords($data->penerima) ?></span>
                                <span class="small"><i class="fas fa-map-marker-alt small "></i> <?= ucwords($data->provinsi) ?></span>

                            </div>
                        <?php } else { ?>
                            <h6><strong><?= ucwords($data->pemesan) ?></strong> menyalurkan <strong><?= ucwords($data->nama_produk) ?></strong> dari <strong><?= ucwords($data->donatur) ?></strong></h6>
                            <div class="detail-informasi">
                                <span class="text-success mr-3"> <i class="fas fa-user mr-1"></i> <?= ucwords($data->penerima) ?></span>
                                <span class="small"><i class="fas fa-map-marker-alt small "></i> <?= ucwords($data->provinsi) ?></span>
                            </div>

                        <?php } ?>
                    </div>
                </div>
                <div class="card-body">
                    <?php if ($data->id_testimoni !== NULL) { ?>
                        <p class=" mb-4"><?= ucfirst($data->pesantesti) ?></p>
                        <?php $pecah = explode(".", $data->gambartesti);
                        if ($pecah[1] == 'mp4' || $pecah[1] == 'webm' || $pecah[1] == 'ogv') {  ?>
                            <div class="gambar-testi m-auto">
                                <video controls>
                                    <source src="<?= base_url('assets/') ?>images\<?= $data->gambartesti ?>" type="video/mp4">
                                    <source src="<?= base_url('assets/') ?>images\<?= $data->gambartesti ?>" type="video/ogg">
                                    Your browser does not support HTML video.
                                </video>
                            </div>
                        <?php } else { ?>

                            <div class="gambar-testi m-auto">
                                <img src="<?= base_url('assets/') ?>images\<?= $data->gambartesti ?>" alt="Gambar Makanan" />
                            </div>
                        <?php } ?>
                    <?php } else {
                        if ($data->penerima == 'Penerima') {
                            echo "Terimakasih Kak " . ucwords($data->donatur) . " atas makananya :)";
                        } else {
                            echo "Saya telah menyalurkan makanannya ke yang membutuhkan. Terimakasih Kak " . ucwords($data->donatur) . ":).  ";
                        }
                    ?>


                    <?php } ?>
                </div>
                <div class="card-footer text-muted">
                    <?php
                    $now = time();
                    $waktu = timespan($data->tgl_selesai, $now);
                    echo waktu($waktu) . " yang lalu";
                    ?>
                </div>
            </div>
        <?php

        }

        ?>
    </section>
    <section class="col-2 border pb-5 d-none d-sm-block" style="height: 100%;">
        <form method="GET" action="<?= base_url('Penerima'); ?>" class="mt-5">
            <label for="hari">Saring Data</label>
            <select id="hari" name="hari" class="p-2 m-0 mb-3">
                <option value="7">Seminggu yang lalu</option>
                <option value="30">Sebulan yang lalu</option>
                <option value="365">Setahun yang lalu</option>
            </select>
            <span><button type="submit" class="btn btn-primary btn-sm col-12"><i class="fa fa-search"></i> cari </button></span>
        </form>
        <article class="donasi-hari">
            <p class=" pt-5 font-weight-bold">Total Donasi Per Bulan:</p>
            <div class="row pb-2">
                <span class="col-8 p-0 align-self-center" style="letter-spacing: 1px;">
                    Januari
                </span>
                <span class="col-4  pt-2 pb-2 border-secondary font-weight-bold">
                    <?= $p_januari ?></td>
                </span>
            </div>
            <div class="row pb-2">
                <span class="col-8 p-0 align-self-center" style="letter-spacing: 1px;">
                    Februari
                </span>
                <span class="col-4  pt-2 pb-2 border-secondary font-weight-bold">
                    <?= $p_februari ?>
                </span>
            </div>
            <div class="row pb-2">
                <span class="col-8 p-0 align-self-center" style="letter-spacing: 1px;">
                    Maret
                </span>
                <span class="col-4  pt-2 pb-2 border-secondary font-weight-bold">
                    <?= $p_maret ?>
                </span>
            </div>
            <div class="row pb-2">
                <span class="col-8 p-0 align-self-center" style="letter-spacing: 1px;">
                    April
                </span>
                <span class="col-4  pt-2 pb-2 border-secondary font-weight-bold">
                    <?= $p_april ?>
                </span>
            </div>
            <div class="row pb-2">
                <span class="col-8 p-0 align-self-center" style="letter-spacing: 1px;">
                    Mei
                </span>
                <span class="col-4  pt-2 pb-2 border-secondary font-weight-bold">
                    <?= $p_mei ?>
                </span>
            </div>
            <div class="row pb-2">
                <span class="col-8 p-0 align-self-center  " style="letter-spacing: 1px;">
                    Juni
                </span>
                <span class="col-4  pt-2 pb-2 border-secondary font-weight-bold">
                    <?= $p_juni ?>
                </span>
            </div>
            <div class="row pb-2">
                <span class="col-8 p-0 align-self-center  " style="letter-spacing: 1px;">
                    Juli
                </span>
                <span class="col-4  pt-2 pb-2 border-secondary font-weight-bold">
                    <?= $p_juli ?>
                </span>
            </div>
            <div class="row pb-2">
                <span class="col-8 p-0 align-self-center  " style="letter-spacing: 1px;">
                    Agustus
                </span>
                <span class="col-4  pt-2 pb-2 border-secondary font-weight-bold">
                    <?= $p_agustus ?>
                </span>
            </div>
            <div class="row pb-2">
                <span class="col-8 p-0 align-self-center  " style="letter-spacing: 1px;">
                    September
                </span>
                <span class="col-4  pt-2 pb-2 border-secondary font-weight-bold">
                    <?= $p_september ?>
                </span>
            </div>
            <div class="row pb-2">
                <span class="col-8 p-0 align-self-center  " style="letter-spacing: 1px;">
                    Oktober
                </span>
                <span class="col-4  pt-2 pb-2 border-secondary font-weight-bold">
                    <?= $p_oktober ?>
                </span>
            </div>
            <div class="row pb-2">
                <span class="col-8 p-0 align-self-center  " style="letter-spacing: 1px;">
                    November
                </span>
                <span class="col-4  pt-2 pb-2 border-secondary font-weight-bold">
                    <?= $p_november ?>
                </span>
            </div>
            <div class="row pb-2">
                <span class="col-8 p-0 align-self-center  " style="letter-spacing: 1px;">
                    Desember
                </span>
                <span class="col-4  pt-2 pb-2 border-secondary font-weight-bold">
                    <?= $p_desember ?>
                </span>
            </div>



        </article>
    </section>
</main>