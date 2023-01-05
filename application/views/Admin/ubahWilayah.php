<div class="card mt-3  col-11  col-md-6 mx-auto mt-5 p-0">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h6 class="col-5 p-0">Tambah Data Wilayah</h6>
        <a href="<?= base_url('Admin/') ?>Pesebaran" class="btn btn-secondary btn-sm" style="font-size: 12px">
            <span><i class="fas fa-arrow-left mr-2"></i>Kembali</span>
        </a>
    </div>
    <div class="card-body">
        <form action="<?= base_url('Admin/ubahWilayah'); ?>" method="post">
            <div class="form-group">
                <label for="nama">Nama Wilayah</label>
                <input type="text" class="form-control col-12" id="nama" name="nama" value="<?= $wilayah['da_wilayah'] ?>">
                <?php if (validation_errors()) : ?>
                    <div class="small text-danger"><?= validation_errors(); ?></div>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="2019">Persentase 2020</label>
                <input type="text" class="form-control col-12" id="2019" name="2019" value="<?= $wilayah['da_2019'] ?>">
                <?php if (validation_errors()) : ?>
                    <div class="small text-danger"><?= validation_errors(); ?></div>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="2020">Persentase 2021</label>
                <input type="text" class="form-control col-12" id="2020" name="2020" value="<?= $wilayah['da_2020'] ?>">
                <?php if (validation_errors()) : ?>
                    <div class="small text-danger"><?= validation_errors(); ?></div>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="lat">Latitude</label>
                <input type="text" class="form-control col-12" id="lat" name="lat" value="<?= $wilayah['da_lat'] ?>">
                <?php if (validation_errors()) : ?>
                    <div class="small text-danger"><?= validation_errors(); ?></div>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="long">Longitude</label>
                <input type="text" class="form-control col-12" id="long" name="long" value="<?= $wilayah['da_long'] ?>">
                <?php if (validation_errors()) : ?>
                    <div class="small text-danger"><?= validation_errors(); ?></div>
                <?php endif; ?>
            </div>
            <button type="submit" class="btn btn-primary" name="tambahktg">Ubah Data</button>
        </form>
    </div>
</div>