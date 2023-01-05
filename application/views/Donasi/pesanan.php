<section class="p-3 col-12 mx-auto" style="min-height: 100vh;">
    <h1 class="sub-judul text-center">Riwayat Pesanan Makanan</h1>
    <?php
    if (count($pesanan) > 0) { ?>
        <div class="card-body px-0">
            <div class="table-responsive">
                <table class="table table-striped" id="table">
                    <thead>
                        <tr>
                            <th class="pl-4">No.</th>
                            <th>Nama Produk</th>
                            <th>Donatur</th>
                            <th>Peran</th>
                            <th>Tanggal Pesan</th>
                            <th>Status</th>
                            <th>Ubah Status</th>
                            <th>aksi</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($pesanan as $list) :
                        ?>
                            <tr>
                                <td class="pl-4"><?= $no++ ?></td>
                                <td><?= $list->nama_produk ?></td>
                                <td><?= $list->nama_donatur ?></td>
                                <td><?= $list->penerima ?>
                                </td>
                                <td>
                                    <?= date("d - m - Y", $list->tgl_pesan) ?>
                                </td>
                                <td>
                                    <?= status_badge($list->status); ?>
                                </td>
                                <td class="">
                                    <?php if ($list->status != "") {
                                    ?>

                                        <button class="badge badge-danger" onclick="UpdateBatal('<?= $list->transaksi_id ?>')" <?= $list->status != "dipesan" ? 'hidden' : ''; ?>>batal</button>
                                        <button class="badge badge-success " onclick="UpdateStatus('<?= $list->transaksi_id ?>','selesai')" <?= $list->status != "dipesan" ? 'hidden' : ''; ?>>selesai</button>

                                    <?php
                                    }
                                    ?>
                                </td>
                                <td class="">
                                    <a href="<?= base_url('Makanan/') ?>Detail/<?= $list->produk_id ?>" class=" btn btn-primary btn-sm">Lihat Donasi</a>
                                    <?php if ($list->id_testimoni == NULL and $list->status == 'selesai') { ?>
                                        <a href="<?= base_url('Penerima/') ?>isiTesti/<?= $list->transaksi_id ?>" class=" btn btn-primary btn-sm">Testimoni</a>
                                    <?php } else if ($list->id_testimoni != NULL) { ?>
                                        <span class="badge badge-success p-2" style="font-size: 14px;">Sudah diisi</span>
                                    <?php } ?>


                                </td>
                            </tr>



            </div>
        <?php endforeach; ?>
        </tbody>

        </table>
        </div>
        </div>
    <?php  } else {
        echo "Anda belum memesan";
    }

    ?>


</section>
<script>
    function UpdateStatus(id_transaksi, get) {
        var isidata = get;
        var isi = document.getElementById('status');
        if (confirm('apakah kamu yakin ingin mengubah status?')) {
            $.ajax({
                url: '<?php echo base_url() ?>Donasi/updatestatus',
                type: 'POST',
                async: false,
                data: {
                    id_transaksi: id_transaksi,
                    isidata: isidata,
                },
                success: function(data) {
                    swal(" Terimakasih.", data, "success");
                    setInterval('location.reload()', 2000);
                }
            });


        }
    }
</script>