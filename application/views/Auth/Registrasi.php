<div class="bg-success p-5">
    <form method="POST" action="<?= base_url('auth/Registrasi'); ?>" class="row border pl-5 pr-5 pt-3 bg-light rounded justify-content-around">
        <figure class="d-flex justify-content-center m-4 col-12"><img src="<?= base_url('assets/') ?>images/logo1.jpg" alt="Pelik Pekat"></figure>
        <section class="col-12 pr-5 pb-3 pt-3 col-md-6">
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" placeholder="Enter Nama" name="nama" value="<?= set_value('nama'); ?>">
                <?= form_error('nama', '<small class="text-danger pl-2">', '</small>'); ?>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" placeholder="Enter email" name="email" value="<?= set_value('email'); ?>">
                <?= form_error('email', '<small class="text-danger pl-2">', '</small>'); ?>
            </div>
            <div class="form-group">
                <label for="nohp">Nomor Handphone</label>
                <input type="tel" class="form-control" id="nohp" placeholder="08xxxxx" name="nohp" value="<?= set_value('nohp'); ?>">
                <?= form_error('nohp', '<small class="text-danger pl-2">', '</small>'); ?>
            </div>
            <div class="form-group">
                <label for="usia">Usia</label>
                <input type="number" class="form-control" id="usia" placeholder="min 17 tahun" name="usia" value="<?= set_value('usia'); ?>" min="17">
                <?= form_error('usia', '<small class="text-danger pl-2">', '</small>'); ?>
            </div>
            <div class="form-group">
                <label for="jeniskelamin">Jenis Kelamin</label>
                <select class="custom-select m-0" id="jeniskelamin" required name="jeniskelamin">
                    <option disabled selected> - Pilih Jenis Kelamin -</option>
                    <option value="Perempuan">Perempuan</option>
                    <option value="Pria">Pria</option>
                </select>
                <div class="invalid-feedback">
                    Please select a valid state.
                </div>
            </div>
        </section>
        <section class="col-12 pr-5 pb-3 pt-3 col-md-6">
            <div class="form-group">
                <label for="pekerjaan">Pekerjaan</label>
                <input type="text" class="form-control" id="pekerjaan" placeholder="Ex:Pengusaha" name="pekerjaan" value="<?= set_value('pekerjaan'); ?>">
                <?= form_error('pekerjaan', '<small class="text-danger pl-2">', '</small>'); ?>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" class="form-control" id="alamat" placeholder="Nama jalan dan nomor rumah" name="alamat" value="<?= set_value('alamat'); ?>">
                <?= form_error('alamat', '<small class="text-danger pl-2">', '</small>'); ?>
            </div>
            <div class="form-row form-group">
                <div class="col">
                    <input type="text" class="form-control" id="kelurahan" placeholder="Kelurahan" name="kelurahan" value="<?= set_value('kelurahan'); ?>">
                    <?= form_error('kelurahan', '<small class="text-danger pl-2">', '</small>'); ?>
                </div>
                <div class="col">
                    <input type="text" class="form-control" id="kecamatan" placeholder="Kecamatan" name="kecamatan" value="<?= set_value('kecamatan'); ?>">
                    <?= form_error('kecamatan', '<small class="text-danger pl-2">', '</small>'); ?>
                </div>
            </div>
            <div class="form-row form-group">
                <div class="col">
                    <input type="text" class="form-control" id="kota" placeholder="Kota/Kabupaten" name="kota" value="<?= set_value('kota'); ?>">
                    <?= form_error('kota', '<small class="text-danger pl-2">', '</small>'); ?>
                </div>
                <div class="col">
                    <input type="text" class="form-control" id="provinsi" placeholder="Provinsi" name="provinsi" value="<?= set_value('provinsi'); ?>">
                    <?= form_error('provinsi', '<small class="text-danger pl-2">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Password" name="password1">
                <?= form_error('password1', '<small class="text-danger pl-2">', '</small>'); ?>
            </div>
            <div class="form-group">
                <label for="password">Ulangi Password</label>
                <input type="password" class="form-control" id="password" placeholder="Ulangi Password" name="password2">
            </div>

        </section>

        <button type="submit" class="btn btn-primary col-12 col-md-6 m-auto">Daftar</button>
        <div class="text-center mb-5 mt-3 col-12"><a href="<?= base_url('Auth') ?>">Sudah Punya Akun?</a></div>
    </form>
</div>