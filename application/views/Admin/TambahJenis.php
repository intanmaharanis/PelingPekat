<div class="card mt-3  col-11  col-md-6 mx-auto mt-5 p-0">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h6 class="col-5 p-0">Tambah Jenis Makanan</h6>
        <a href="<?= base_url('Admin/') ?>JenisMakanan" class="btn btn-secondary btn-sm" style="font-size: 12px">
            <span><i class="fas fa-arrow-left mr-2"></i>Kembali</span>
        </a>
    </div>
    <div class="card-body">
        <form action="<?= base_url('Admin/tambahJenis'); ?>" method="post">
            <div class="form-group">
                <label for="nama">Nama Kategori:</label>
                <input type="text" class="form-control col-12" id="nama" name="nama">
                <?php if (validation_errors()) : ?>
                    <div class="small text-danger"><?= validation_errors(); ?></div>
                <?php endif; ?>
            </div>
            <button type="submit" class="btn btn-primary" name="tambahktg">Tambah Jenis</button>
        </form>
    </div>
</div>