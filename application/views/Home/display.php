<?php
if ($list->num_rows() > 0) {
    $n = 1;
    foreach ($list->result() as $data) {
        if ($data->distance <= '100' and $n <= 3) {


?>
            <div class=" p-1 col-md-4 p-2">
                <div class="col-12 makanan p-0 row">
                    <div class="gambar col-5 p-0"><img src="<?= base_url('assets/') ?>images/<?= $data->gambarmakanan ?>" alt="Card image cap"></div>
                    <div class="col-7 pt-2 p-md-4">
                        <h5 class="card-title"><?= $data->nama_produk ?></h5>
                        <div class="info-makanan row mb-2">
                            <span class="user col-4 p-0"><i class="fas fa-user"> <?= strtok($data->nama_donatur, " ") ?></i></span>
                            <span class="stok col-4 pl-2"><i class="fas fa-shopping-cart"> <?= $data->stok ?></i> </span>
                            <span class="lokasi col-4 p-0"><i class="fas fa-map-marker-alt">

                                    <?php if ($data->distance < 1) { ?>
                                        <?= $data->distance * 1000 ?> m
                                </i>
                            <?php } else { ?>
                                <?= substr($data->distance, 0, 4) ?> km</i>
                            <?php } ?>

                            </span>
                        </div>
                        <p class="makanan-deskripsi"><?= $data->deskripsi ?></p>
                        <a href="<?= base_url('Makanan/') ?>Detail/<?= $data->id_produk ?>" class="btn btn-primary btn-md">Lihat Detail</a>
                    </div>
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