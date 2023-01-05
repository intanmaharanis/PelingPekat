<div class="col-11 mx-auto mt-4 d-flex justify-content-end p-0">
    <a href="<?= base_url('Admin') ?>/tambahWilayah" class="btn btn-primary btn-md">
        <span><i class="fas fa-plus mr-3 col-1 p-0"></i>Tambah Wilayah</span>
    </a>
</div>
<div class="card mt-3 col-11 mx-auto p-0">
    <div class="card-header">
        <h5 class="font-weight-bold">Data Persentase Penduduk Miskin per Kabupaten/Kota</h5>
    </div>
    <div class="card-body px-0">
        <div class="table-responsive">
            <table class="table table-striped" id="table">
                <thead>
                    <tr>
                        <th class="pl-4">No.</th>
                        <th>Wilayah</th>
                        <th>2020 (%)</th>
                        <th>2021 (%)</th>
                        <th>Latitude</th>
                        <th>Longitude</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($wilayah as $w) :
                    ?>
                        <tr>
                            <td class="pl-4"><?= $no++ ?></td>
                            <td><?= $w['da_wilayah'] ?></td>
                            <td><?= $w['da_2019'] ?></td>
                            <td><?= $w['da_2020'] ?></td>
                            <td><?= $w['da_lat'] ?></td>
                            <td><?= $w['da_long'] ?></td>
                            <td style="font-size: 20px">
                                <a href="<?= base_url('Admin') ?>/ubahWilayah/<?= $w['da_id'] ?>" data-toggle="tooltip" data-placement="bottom" title="Edit Data"><i class="fas fa-edit mr-3"></i></a>
                                <a href="<?= base_url('Admin/') ?>hapusWilayah/<?= $w['da_id'] ?>" data-toggle="tooltip" data-placement="bottom" title="Delete Data" onclick=" return confirm('Yakin Ingin Mengahapus Data Supplier?')"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>

            </table>
        </div>
    </div>
</div>