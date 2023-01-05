<div class="card mt-3  col-11  col-md-6 mx-auto mt-5 p-0">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h6 class="col-5 p-0">Tambah Data Wilayah</h6>
        <a href="<?= base_url('Admin/') ?>Pesebaran" class="btn btn-secondary btn-sm" style="font-size: 12px">
            <span><i class="fas fa-arrow-left mr-2"></i>Kembali</span>
        </a>
    </div>
    <div class="card-body">
        <form action="<?= base_url('Admin/tambahWilayah'); ?>" method="post">
            <div class="form-group">
                <label for="nama">Nama Wilayah</label>
                <input type="text" class="form-control col-12" id="nama" name="nama">
                <?php if (validation_errors()) : ?>
                    <div class="small text-danger"><?= validation_errors(); ?></div>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="2020">Persentase 2020</label>
                <input type="text" class="form-control col-12" id="2020" name="2020">
                <?php if (validation_errors()) : ?>
                    <div class="small text-danger"><?= validation_errors(); ?></div>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="2021">Persentase 2021</label>
                <input type="text" class="form-control col-12" id="2021" name="2021">
                <?php if (validation_errors()) : ?>
                    <div class="small text-danger"><?= validation_errors(); ?></div>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="lat">Latitude</label>
                <input type="text" class="form-control col-12" id="lat" name="lat">
                <?php if (validation_errors()) : ?>
                    <div class="small text-danger"><?= validation_errors(); ?></div>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="long">Longitude</label>
                <input type="text" class="form-control col-12" id="long" name="long">
                <?php if (validation_errors()) : ?>
                    <div class="small text-danger"><?= validation_errors(); ?></div>
                <?php endif; ?>
            </div>
            <button type="submit" class="btn btn-primary" name="tambahktg">Tambah Data</button>
        </form>
    </div>
</div>