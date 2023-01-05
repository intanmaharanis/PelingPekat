<div class="row justify-content-center bg-success" style="height: 100vh;">
    <section class="col-md-4 align-self-center col-11 bg-light p-4 border rounded">
        <figure class="d-flex justify-content-center m-4"><img src="<?= base_url('assets/') ?>images/logo1.jpg" alt="Pelik Pekat"></figure>
        <form method="POST" action="<?= base_url('Auth_Admin/Registrasi'); ?>">
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
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Password" name="password1">
                <?= form_error('password1', '<small class="text-danger pl-2">', '</small>'); ?>
            </div>
            <div class="form-group">
                <label for="password">Ulangi Password</label>
                <input type="password" class="form-control" id="password" placeholder="Password" name="password2">
            </div>
            <button type="submit" class="btn btn-primary col-12 mb-4">Daftar</button>
            <div class="text-center mb-2"><a href="<?= base_url('Auth_Admin') ?>">Sudah Punya Akun?</a></div>

        </form>
    </section>
</div>