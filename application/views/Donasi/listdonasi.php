<section class="p-3 col-12 mx-auto" style="min-height: 100vh;">
    <h1 class="sub-judul text-center">Riwayat Donasi Makanan</h1>
    <?= $this->session->flashdata('message'); ?>
    <?php
    if (count($donasi) > 0) { ?>
        <div class="card-body px-0">
            <div class="table-responsive">
                <table class="table table-striped" id="table">
                    <thead>
                        <tr>
                            <th class="pl-4">No.</th>
                            <th>Nama Produk</th>
                            <th>Pemesan</th>
                            <th>Peran</th>
                            <th>Tanggal Donasi</th>
                            <th>Status</th>
                            <th>Ubah Status</th>
                            <th>Opsi Donasi</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($donasi as $list) :
                        ?>
                            <tr>
                                <td class="pl-4"><?= $no++ ?></td>
                                <td><?= $list->nama_produk ?></td>
                                <td><?php if ($list->requester != "") {
                                    ?>
                                        <?= $list->requester ?>
                                    <?php
                                    } else {
                                    ?>
                                        belum ada
                                    <?php
                                    } ?>
                                </td>
                                <td><?php if ($list->requester != "") {
                                    ?>
                                        <?= $list->penerima ?>
                                    <?php
                                    } else {
                                    ?>
                                        -
                                    <?php
                                    } ?>
                                </td>
                                <td>
                                    <?= date("d - m - Y", $list->tgl_donasi) ?>
                                </td>
                                <td>
                                    <?= status_badge($list->status); ?>
                                </td>
                                <td class="">
                                    <?php if ($list->status != "") {
                                    ?>
                                        <button class="badge badge-success " onclick="UpdateStatus('<?= $list->id_transaksi ?>','selesai')" <?= $list->status != "dipesan" ? 'hidden' : ''; ?>>selesai</button>
                                        <button class="badge badge-danger mt-1 mt-md-0" onclick="UpdateBatal('<?= $list->id_transaksi ?>')" <?= $list->status != "dipesan" ? 'hidden' : ''; ?>>batal</button>
                                    <?php
                                    } else {
                                    ?>
                                        -
                                    <?php
                                    } ?>


                                </td>
                                <td>
                                    <a href="<?= base_url('Makanan/') ?>Detail/<?= $list->produk_id ?>" class="btn btn-primary btn-sm ">Lihat Donasi</a>
                                    <a href="<?= base_url('Donasi/') ?>hapusDonasi/<?= $list->produk_id ?>" class="btn btn-danger btn-sm mt-1 mt-md-0" onclick="return confirm('Yakin Ingin Mengahapus Donasi?')">Hapus Donasi</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>

                </table>
            </div>
        </div>
    <?php  } else {
        echo "Anda belum berdonasi";
    }

    ?>

</section>