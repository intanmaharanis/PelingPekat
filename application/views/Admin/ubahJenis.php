<div class="card mt-3  col-11 col-md-6 mt-5	mx-auto p-0">
    <div class="card-header">
        <h6 class="col-7 p-0">Form Ubah Jenis </h6>
    </div>
    <div class="card-body">
        <form action="" method="post">
            <div class="form-group">
                <label for="nama">Nama Kategori:</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?= $jenis['nama'] ?>">
                <?php if (validation_errors()) : ?>
                    <div class="small text-danger"><?= validation_errors(); ?></div>
                <?php endif; ?>
            </div>
            <button type="submit" class="btn btn-primary" name="tambahktg">Ubah Kategori</button>
        </form>
    </div>
</div>