<div class="card mt-3 col-11 mx-auto p-0">
    <div class="card-header">
        <h5 class="font-weight-bold">Data Donatur</h5>
    </div>
    <div class="card-body px-0">
        <div class="table-responsive">
            <table class="table table-striped" id="table">
                <thead>
                    <tr>
                        <th class="pl-4">No.</th>
                        <th>Nama Donatur</th>
                        <th>Jumlah Donasi</th>
                        <th>Email</th>
                        <th>Handphone</th>
                        <th>Usia</th>
                        <th>Jenis Kelamin</th>
                        <th>Pekerjaan</th>
                        <th>Alamat</th>
                        <th>Kelurahan</th>
                        <th>Kecamatan</th>
                        <th>Kota</th>
                        <th>Provinsi</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($donatur as $d) :
                    ?>
                        <tr>
                            <td class="pl-4"><?= $no++ ?></td>
                            <td><?= $d['nama'] ?></td>
                            <td><?= $d['total_donasi'] ?></td>
                            <td><?= $d['email'] ?></td>
                            <td><?= $d['no_hp'] ?></td>
                            <td><?= $d['usia'] ?></td>
                            <td><?= $d['jeniskelamin'] ?></td>
                            <td><?= $d['pekerjaan'] ?></td>
                            <td><?= $d['alamat'] ?></td>
                            <td><?= $d['kelurahan'] ?></td>
                            <td><?= $d['kecamatan'] ?></td>
                            <td><?= $d['kota'] ?></td>
                            <td><?= $d['provinsi'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>

            </table>
        </div>
    </div>
</div>