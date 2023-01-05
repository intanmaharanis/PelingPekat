<div class="card mt-3 col-11 mx-auto p-0">
    <div class="card-header">
        <h5 class="font-weight-bold">Data User</h5>
    </div>
    <form method="GET" action="<?= base_url('Admin/users'); ?>" class="mt-5">
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
                        <th>Nama User</th>
                        <th>Usia</th>
                        <th>Jenis Kelamin</th>
                        <th>Pekerjaan</th>
                        <th>No Handphone</th>
                        <th>Email</th>>
                        <th>Alamat</th>
                        <th>Kelurahan</th>
                        <th>Kecamatan</th>
                        <th>Kota</th>
                        <th>Provinsi</th>
                        <th>Tanggal Buat</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($users as $user) :
                    ?>
                        <tr>
                            <td class="pl-4"><?= $no++ ?></td>
                            <td><?= $user['nama'] ?></td>
                            <td><?= $user['usia'] ?></td>
                            <td><?= $user['jeniskelamin'] ?></td>
                            <td><?= $user['pekerjaan'] ?></td>
                            <td><?= $user['no_hp'] ?></td>
                            <td><?= $user['email'] ?></td>
                            <td><?= $user['alamat'] ?></td>
                            <td><?= $user['kelurahan'] ?></td>
                            <td><?= $user['kecamatan'] ?></td>
                            <td><?= $user['kota'] ?></td>
                            <td><?= $user['provinsi'] ?></td>
                            <td><?= date("d-m-Y", $user['tgl_buat']) ?></td>
                            <td>
                                <?php
                                if ($user['is_active'] == 1) { ?>
                                    <span class="badge badge-pill badge-primary">Active</span>
                                <?php  } else {
                                    echo 'no active';
                                }
                                ?>

                            </td>

                        </tr>
                    <?php endforeach; ?>
                </tbody>

            </table>
        </div>

    </div>
</div>