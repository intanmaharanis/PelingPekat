<section class="form-donasi m-1 mt-2 mb-5">
    <h1 class="sub-judul text-center">Berbagi Makanan</h1>
    <p class="judul-deskripsi text-center">Silahkan lengkapi formulir di bawah ini </p>
    <?php if ($this->session->userdata('email') == "") { ?>
        <div class="small ml-4 text-danger">*Harap login terlebih dahulu</div>
    <?php } ?>

    <?php echo form_open_multipart('Donasi'); ?>
    <div class="row justify-content-around">
        <div class="form-data-diri col-11 col-md-6 border border-1  p-3 mt-2">
            <h3 class="text-center">Informasi Makanan</h3>
            <div class="row pt-2">
                <img class="gambar-makanan col-11 col-md-4 m-auto" id="output" />
                <input type="file" class="align-self-center col-12 col-md-6 p-2 " id="gambar" name="gambarmakanan" value="<?= set_value('namaMakanan'); ?>" onchange="loadFile(event)">
                <?= form_error('gambarmakanan', '<small class="text-danger pl-2">', '</small>'); ?>

            </div>
            <div class="form-group">
                <label for="namaMakanan">Nama Makanan</label>
                <input type="text" class="form-control" id="namaMakanan" placeholder="Nama Makanan" name="namaMakanan" value="<?= set_value('namaMakanan'); ?>">
                <?= form_error('namaMakanan', '<small class="text-danger pl-2">', '</small>'); ?>
            </div>
            <div class="form-group">
                <label class="col-md-12 p-0" for="kategori">Jenis Makanan</label>
                <select name="jenisMakanan" class="custom-select col-md-12 m-0" id="kategori">
                    <option disabled selected>Pilih Jenis Makanan</option>
                    <?php
                    foreach ($jenis as $j) :
                    ?>
                        <option value="<?= $j['id_jenis'] ?>"><?= $j['nama'] ?></option>
                    <?php endforeach; ?>
                </select>
                <?= form_error('jenisMakanan', '<small class="text-danger pl-2">', '</small>'); ?>
            </div>
            <div class="form-group">
                <label for="stok">Stok</label>
                <input type="number" class="form-control" id="stok" placeholder="Stok Tersedia" name="stok" min='1' value="<?= set_value('stok'); ?>">
                <?= form_error('stok', '<small class="text-danger pl-2">', '</small>'); ?>
            </div>
            <div class="form-group">
                <label for="kadaluarsa">Perkiraan Tanggal Kadaluarsa</label>
                <input type="date" class="form-control" id="kadaluarsa" placeholder="dd/mm/yyy" name="kadaluarsa" min='1' value="<?= set_value('kadaluarsa'); ?>">
                <?= form_error('kadaluarsa', '<small class="text-danger pl-2">', '</small>'); ?>
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi Makanan</label>
                <textarea name="deskripsi" style="height:150px;" class="form-control" id="deskripsi" placeholder="Contoh : roti lapis  isi daging, salada dan mayonaise. tersedia daerah pejaten" value="<?= set_value('deskripsi'); ?>"></textarea>
                <?= form_error('deskripsi', '<small class="text-danger pl-2">', '</small>'); ?>
            </div>
            <div class="form-group">
                <label for="pengambilan">Waktu Pengambilan</label>
                <div class="row">
                    <div class="col-8 p-0">
                        <input type="date" class="form-control" placeholder="tanggal" name="tglambil" value="<?= set_value('tglambil'); ?>">
                        <?= form_error('tglambil', '<small class="text-danger pl-2">', '</small>'); ?>
                    </div>
                    <div class="col-4">
                        <input type="time" class="form-control" placeholder="waktu" name="jamambil" value="<?= set_value('jamambil'); ?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="pengambilan">Batas Pengambilan</label>
                <div class="row">
                    <div class="col-8 p-0">
                        <input type="date" class="form-control" placeholder="tanggal" name="tglbatas" value="<?= set_value('tglbatas'); ?>">
                        <?= form_error('tglbatas', '<small class="text-danger pl-2">', '</small>'); ?>
                    </div>
                    <div class="col-4">
                        <input type="time" class="form-control" placeholder="waktu" name="jambatas" value="<?= set_value('jambatas'); ?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="jenisdonasi">Jenis Donasi</label>
                <select class="custom-select m-0" id="jenisdonasi" required name="jenisdonasi">
                    <option disabled selected> - Pilih Jenis Donasi -</option>
                    <option value="Personal">Personal</option>
                    <option value="Restoran">Restoran</option>
                </select>
                <?= form_error('jenisdonasi', '<small class="text-danger pl-2">', '</small>'); ?>
            </div>
        </div>
        <div class="form-data-diri col-11 col-md-5 border border-1  p-3 mt-2">
            <h3 class="text-center pb-2">Informasi Pribadi</h3>
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" placeholder="Nama Donatur/Perusahaan/Restoran" name="nama" value="<?= set_value('nama'); ?>">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" placeholder="Email Donatur" name="email" value="<?= $this->session->userdata('email') ?>">
            </div>
            <div class="form-group">
                <label for="nohp">No Handphone</label>
                <input type="text" class="form-control" id="nohp" placeholder="Nomor Handphone Donatur" name="nohp" value="<?= $this->session->userdata('nama') != NULL ? $user['no_hp'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="location">Alamat</label>
                <input type="text" class="form-control" name="lokasi" placeholder="Nama Jalan, Nomor Rumah, RT/RW" value="<?= $this->session->userdata('nama') != NULL ? $user['alamat'] : '' ?>" />
                <?= form_error('email', '<small class="text-danger pl-2">', '</small>'); ?>
                <input type="hidden" class="form-control" style="width: 110px" id="lat" name="lat" />
                <input type="hidden" class="form-control" style="width: 110px" id="long" name="long" />
            </div>
            <div class="form-row form-group">
                <div class="col">
                    <input type="text" class="form-control" id="kelurahan" placeholder="Kelurahan" name="kelurahan" value="<?= $this->session->userdata('nama') != NULL ? $user['kelurahan'] : '' ?>">
                    <?= form_error('kelurahan', '<small class="text-danger pl-2">', '</small>'); ?>
                </div>
                <div class="col">
                    <input type="text" class="form-control" id="kecamatan" placeholder="Kecamatan" name="kecamatan" value="<?= $this->session->userdata('nama') != NULL ? $user['kecamatan'] : '' ?>">
                    <?= form_error('kecamatan', '<small class="text-danger pl-2">', '</small>'); ?>
                </div>
            </div>
            <div class="form-row form-group">
                <div class="col">
                    <input type="text" class="form-control" id="kota" placeholder="Kota/Kabupaten" name="kota" value="<?= $this->session->userdata('nama') != NULL ? $user['kota'] : '' ?>">
                    <?= form_error('kota', '<small class="text-danger pl-2">', '</small>'); ?>
                </div>
                <div class="col">
                    <input type="text" class="form-control" id="provinsi" placeholder="Provinsi" name="provinsi" value="<?= $this->session->userdata('nama') != NULL ? $user['provinsi'] : '' ?>">
                    <?= form_error('provinsi', '<small class="text-danger pl-2">', '</small>'); ?>
                </div>
            </div>
            <div id="googleMap" style="width:100%; height: 400px;"></div>
            <div class="form-group mt-5">
                <label for="alamat">Detail Alamat</label>
                <input type="text" name="alamat_detail" class="form-control " id="alamat" placeholder="Contoh :Pagar Hitam, samping rumah cat biru" value="<?= set_value('alamat_detail'); ?>"></input>
                <?= form_error('alamat_detail', '<small class="text-danger pl-2">', '</small>'); ?>
            </div>

        </div>
    </div>
    <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-success mt-4 col-11 col-md-6" onclick=" return confirm('Donasi anda sudah benar?')">Berbagi</button>
    </div>

    </form>
</section>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDK0Wk9CEkyOK4MtWPFkzvhBmxly_5TpU0&amp;libraries=weather&libraries=places&callback"></script>
<script type="text/javascript" src="https://rawgit.com/Logicify/jquery-locationpicker-plugin/master/dist/locationpicker.jquery.js"></script>
<script src="<?= base_url('assets/') ?>js/donasiMaps.js" type="text/javascript"></script>
<script>
    var loadFile = function(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('output');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    };
</script>