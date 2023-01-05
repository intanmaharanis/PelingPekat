<div class="col-11 mx-auto mt-4 d-flex justify-content-end p-0">
    <a href="<?= base_url('Admin') ?>/tambahJenis" class="btn btn-primary btn-md">
        <span><i class="fas fa-plus mr-3 col-1 p-0"></i>Tambah Jenis Makanan</span>
    </a>
</div>
<div class="card mt-3 col-11 mx-auto p-0">
    <div class="card-header">
        <h5 class="font-weight-bold">Jenis Makanan</h5>
    </div>
    <div class="card-body px-0">
        <div class="table-responsive">
            <table class="table table-striped" id="table">
                <thead>
                    <tr>
                        <th class="pl-4">No.</th>
                        <th>Jenis Makanan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($jenis as $j) :
                    ?>
                        <tr>
                            <td class="pl-4"><?= $no++ ?></td>
                            <td><?= $j['nama'] ?></td>
                            <td style="font-size: 20px">
                                <a href="<?= base_url('Admin') ?>/ubahJenis/<?= $j['id_jenis'] ?>" data-toggle="tooltip" data-placement="bottom" title="Edit Data"><i class="fas fa-edit text-primary mr-3"></i></a>
                                <a href="<?= base_url('Admin') ?>/hapusJenis/<?= $j['id_jenis'] ?>" data-toggle="tooltip" data-placement="bottom" title="Delete Data"><i class="fas fa-trash-alt text-danger" onclick="return confirm('Yakin Menghapus Kategori?')"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>

            </table>
        </div>

    </div>
</div>