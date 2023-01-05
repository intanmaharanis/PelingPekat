<div class="row justify-content-center bg-success" style="height: 100vh;">
    <section class="col-md-4 align-self-center col-11 bg-light p-5 border rounded">
        <h3 class="text-center font-weight-bold pb-2" style="color: #135a24;letter-spacing:2px">Login Admin</h3>
        <form method="POST" action="<?= base_url('Auth_Admin'); ?>">
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
            <div class="text-center mb-2"><a href="<?= base_url('Auth_Admin/') ?>Registrasi">Belum Punya Akun?</a></div>
        </form>
    </section>
</div>