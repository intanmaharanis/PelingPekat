<div class="card mt-3 col-11 mx-auto p-0">
    <div class="card-header">
        <h5 class="font-weight-bold">Data Donasi</h5>
    </div>
    <form method="GET" action="<?= base_url('Admin/dataMakanan'); ?>" class="mt-5">
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

    <div>
        <div class="card-body px-0">
            <div class="table-responsive" style="font-size: 16px;">
                <table class="table table-striped" id="table">
                    <thead>
                        <tr>
                            <th class="pl-4">No</th>
                            <th>Nama Produk</th>
                            <th>Jenis Makanan</th>
                            <th>stok</th>
                            <th>Kadaluarsa</th>
                            <th>Deskripsi</th>
                            <th>Jenis Donasi</th>
                            <th>Tanggal Donasi</th>
                            <th>Donatur</th>
                            <th>Email</th>
                            <th>Handphone</th>
                            <th>Alamat</th>
                            <th>Kelurahan</th>
                            <th>Kecamatan</th>
                            <th>Kota</th>
                            <th>Provinsi</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($makanan as $mkn) {
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $mkn['nama_produk'] ?></td>
                                <td><?= $mkn['jenis'] ?></td>
                                <td><?= $mkn['stok'] ?></td>
                                <td><?= date("d-m-Y", strtotime($mkn['tgl_kadaluarsa'])) ?></td>
                                <td><?= $mkn['deskripsi'] ?></td>
                                <td><?= $mkn['jenisdonasi'] ?></td>
                                <td><?= date("d-m-Y", $mkn['tgl_donasi']) ?></td>
                                <td><?= $mkn['donatur'] ?></td>
                                <td><?= $mkn['email'] ?></td>
                                <td><?= $mkn['nohp'] ?></td>
                                <td><?= $mkn['alamat'] ?></td>
                                <td><?= $mkn['kelurahan'] ?></td>
                                <td><?= $mkn['kecamatan'] ?></td>
                                <td><?= $mkn['kota'] ?></td>
                                <td><?= $mkn['provinsi'] ?></td>
                                <td style="font-size: 20px">
                                    <a href="<?= base_url('Admin') ?>/hapusMakanan/<?= $mkn['produk_id'] ?>" data-toggle="tooltip" data-placement="bottom" title="Delete Data" onclick=" return confirm('Yakin Ingin Mengahapus Data?')"><i class="fas fa-trash-alt"></i></a>
                                </td>

                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>

</div>