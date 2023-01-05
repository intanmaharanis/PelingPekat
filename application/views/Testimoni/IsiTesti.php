<section class="isi-testi row justify-content-center m-5">
    <div class="col-6 border pt-5 pb-5 pl-4 rounded" style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;">
        <?php echo form_open_multipart('Penerima/FormTesti'); ?>
        <h2 class="text-center pb-4">Testimoni Makanan</h2>
        <div class="form-group">
            <input type="hidden" class="form-control" id="id_transaksi" name="id_transaksi" value="<?= $id_transaksi['id_transaksi'] ?>">
        </div>
        <div class="form-group">
            <input type="hidden" class="form-control" id="id_produk" name="id_produk" value="<?= $id_transaksi['id_produk'] ?>">
        </div>
        <div class="form-group">
            <input type="hidden" class="form-control" id="id_user" name="id_user" value=" <?= $id_transaksi['id_user'] ?>">
        </div>
        <div class="form-group">
            <label for="gambartesti">Foto atau Video Makanan</label>
            <input type="file" class="form-control-file" id="gambartesti" name="gambartesti">
            <?= form_error('gambartesti', '<small class="text-danger pl-2">', '</small>'); ?>
        </div>
        <div class="form-group">
            <label for="pesantesti">Bagaimana Makananya?</label>
            <textarea class="form-control" id="pesantesti" rows="3" name="pesantesti"></textarea>
            <?= form_error('pesantesti', '<small class="text-danger pl-2">', '</small>'); ?>
        </div>
        <button type="submit" class="btn btn-success col-12 mt-4">Kirim Testimoni</button>

        </form>
    </div>

</section>