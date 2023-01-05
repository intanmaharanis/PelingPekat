<div class="row justify-content-center bg-success" style="height: 100vh;">
    <section class="col-md-4 align-self-center col-11 bg-light p-5 border rounded">
        <figure class="d-flex justify-content-center m-4"><img src="<?= base_url('assets/') ?>images/logo1.jpg" alt="Pelik Pekat"></figure>
        <form method="POST" action="<?= base_url('auth'); ?>">
            <?= $this->session->flashdata('message'); ?>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" placeholder="Enter email" name="email" name="email" value="<?= set_value('email'); ?>">
                <?= form_error('email', '<small class="text-danger pl-2">', '</small>'); ?>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                <?= form_error('password', '<small class="text-danger pl-2">', '</small>'); ?>
            </div>
            <button type="submit" class="btn btn-primary col-12 mb-4">Masuk</button>
            <div class="text-center mb-2"><a href="<?= base_url('Auth/') ?>Registrasi">Belum Punya Akun?</a></div>
            <div class="text-center"><a href="<?= base_url('Auth_Admin/') ?>">Login Admin</a></div>
        </form>
    </section>
</div>