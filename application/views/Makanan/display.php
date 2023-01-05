<?php
if ($list->num_rows() > 0) {
    $n = 1;
    foreach ($list->result() as $data) {
        if ($data->distance <= $jarak and status_makanan($data->id_produk) != 'selesai') {

?>
            <div class=" row  p-0 mt-3 makanan">

                <div class="gambar col-4 p-0 col-md-5"><img src="<?= base_url('assets/') ?>images/<?= $data->gambarmakanan ?>" alt="Card image cap"></div>
                <div class="col-8 p-md-4 pt-2 col-md-7">
                    <h5 class="card-title"><?= $data->nama_produk ?></h5>
                    <div class="info-makanan row mb-2">
                        <span class="user col-4 p-0"><i class="fas fa-user"> <?= strtok($data->nama_donatur, " ") ?></i></span>
                        <span class="stok col-4 p-0 text-center"><i class="fas fa-shopping-cart"> <?= $data->stok ?></i> </span>
                        <span class="lokasi col-4 p-0"><i class="fas fa-map-marker-alt">
                                <!-- $data->distance * 1000 -->
                                <?php if ($data->distance < 1) { ?>
                                    <?= $data->distance * 1000 ?> m
                            </i>
                        <?php } else { ?>
                            <?= round($data->distance, 2) ?> km</i>
                        <?php } ?>

                        </span>
                    </div>
                    <p class="makanan-deskripsi"><?= $data->deskripsi ?></p>
                    <a href="<?= base_url('Makanan/') ?>Detail/<?= $data->id_produk ?>" class="btn btn-primary">Lihat Detail</a>
                </div>

            </div>
<?php

        }
        $n++;
    }
} else {
    echo 'Tidak ada data';
}

?>