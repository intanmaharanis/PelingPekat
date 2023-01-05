<div class="card mt-3 col-11 mx-auto p-0">
    <div class="card-header">
        <h5 class="font-weight-bold">Data Makanan Tersedia</h5>
    </div>
    <form method="GET" action="<?= base_url('Admin/Tersedia'); ?>" class="mt-5">
        <span>
            <font size="3" class="ml-4 mt-5">Data Periode :</font>
        </span>
        <span class="ml-2 mr-2">
            <input type="date" name="tanggal_awal" id="tanggal-input-1">

        </span>
        <span>
            sampai
            <input type="date" name="tanggal_akhir" id="tanggal-input-2" class="ml-2">
        </span>
        <span><button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-search"></i> cari </button></span>
    </form>
    <div class="card-body px-0">
        <div class="table-responsive">
            <table class="table table-striped" id="table">
                <thead>
                    <tr>
                        <th class="pl-4">No.</th>
                        <th>Nama Produk</th>
                        <th>stok</th>
                        <th>Kadaluarsa</th>
                        <th>Deskripsi</th>
                        <th>Jenis Donasi</th>
                        <th>Tanggal Donasi</th>
                        <th>Donatur</th>
                        <th>Email</th>
                        <th>No Handphone</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($makanan as $mkn) {
                        if ($mkn['id_transaksi'] == NULL) {
                    ?>
                            <tr>
                                <td class="pl-4"><?= $no++ ?></td>
                                <td><?= $mkn['nama_produk'] ?></td>
                                <td><?= $mkn['stok'] ?></td>
                                <td><?= date("d-m-Y", strtotime($mkn['tgl_kadaluarsa'])) ?></td>
                                <td><?= $mkn['deskripsi'] ?></td>
                                <td><?= $mkn['jenisdonasi'] ?></td>
                                <td><?= date("d-m-Y", $mkn['tgl_donasi']) ?></td>
                                <td><?= $mkn['donatur'] ?></td>
                                <td><?= $mkn['email'] ?></td>
                                <td><?= $mkn['nohp'] ?></td>

                            </tr>
                    <?php
                        }
                    } ?>
                </tbody>

            </table>
        </div>
    </div>
</div>