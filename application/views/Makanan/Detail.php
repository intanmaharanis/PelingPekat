<section class="detail-makanan container mt-3 mb-5 ">
    <h1 class="sub-judul pb-4">Detail Makanan</h1>
    <div class="row justify-content-around">
        <div class="image-detail col-12 col-md-5"><img src="<?= base_url('assets/') ?>images\<?= $makanan['gambarmakanan'] ?>" alt="Gambar Makanan"></div>
        <div class="detail col-12 pt-3 pl-4 col-md-6 pt-md-0">
            <p class="text-capitalize"><strong><?= $makanan['nama_donatur'] ?></strong> memberikan makanan</p>
            <h1 class="detail-produk text-capitalize"><?= $makanan['nama_produk'] ?></h1>
            <div class="detail-donasi row mt-2 mb-2" style="font-size:14px">
                <span><i class="far fa-clock mr-1"></i><strong><?= waktu($waktu) ?> yang lalu</strong></span>
                <span class="ml-3 text-success"><i class="fas fa-user"></i> <?= $makanan['jenisdonasi'] ?></span>
            </div>
            <div class="tanggal-detail" style="color: #373737;">Waktu Pengambilan :</div>
            <div class="mt-1 font-weight-bold" style="color:#373737;font-size:15px"><i class="fas fa-calendar-alt mr-1"></i> <?= date("d F Y", strtotime($makanan['tgl_ambil'])) ?> <i class="fas fa-clock mr-1 ml-3"></i> Jam :
                <?= substr($makanan['jam_ambil'], 0, 5) ?>
            </div>
            <div class="tanggal-detail">Batas Waktu :</div>
            <div class="mt-1 font-weight-bold" style="color:#373737;font-size:15px"><i class="fas fa-calendar-alt mr-1"></i> <?= date("d F Y", strtotime($makanan['tgl_batas'])) ?> <i class="fas fa-clock mr-1 ml-3"></i> Jam :
                <?= substr($makanan['jam_batas'], 0, 5) ?>
            </div>
            <div class="pt-4 pb-3">Stok : <span class="border border-dark p-1 ml-2 pl-4 pr-4 rounded"><?= $makanan['stok'] ?> </span> </div>
            <div class="">Deskripsi Makanan :</div>
            <div class="detail-deskripsi mt-2 p-2 border border-success rounded">
                <?= $makanan['deskripsi'] ?> . Kadaluarsa <?= date("d F Y", strtotime($makanan['tgl_kadaluarsa'])) ?>
            </div>
            <div class="note small text-info pt-3">
                *Perhatikan tanggal pengambilan, Pastikan pengambilan makanan sesuai tanggal dan waktu yang ditentukan<br>
                *Pesan jika memang membutuhkan dan dipastikan bisa mengambil
            </div>
            <button type="button" class="btn btn-success col-12 mt-3" data-toggle="modal" data-target="<?= data_target($this->session->userdata('id_user')); ?>" onclick="cekAkun(<?= $this->session->userdata('id_user') ?>)" <?= status_makanan($makanan['id_produk']) == 'selesai' || status_makanan($makanan['id_produk']) == 'dipesan' ? 'disabled' : ' '; ?>><?= $bid->num_rows() == 0 || status_makanan($makanan['id_produk']) == 'batal' ? 'Saya Mau' : 'Sudah Dipesan'; ?></button>
            <form class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header border-bottom-0">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body pt-0">
                            <h3 class="text-center p-2">Informasi Tambahan</h3>
                            <div class="form-group">
                                <input type="hidden" class="form-control" id="id_produk" name="id_produk" value="<?= $makanan['id_produk'] ?>">
                            </div>
                            <div class="form-group">
                                <input type="hidden" class="form-control" id="nama_donatur" name="nama_donatur" value="<?= $makanan['nama_donatur'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="waktuambil">Waktu Ambil</label>
                                <input type="text" class="form-control" id="waktu_ambil" name="waktu_ambil" placeholder="Contoh: Hari ini jam 14.00" required>
                                <small id="emailHelp" class="form-text text-danger">*waktu pengambilan sesuai rentang waktu yang telah ditentukan donatur</small>
                            </div>
                            <div class="form-group">
                                <label for="penerima">Penerima</label>
                                <select class="custom-select m-0" id="penerima" name="penerima" required>
                                    <option disabled selected>Untuk siapa makanan ini?</option>
                                    <option value="Penerima">Diri Sendiri</option>
                                    <option value="Relawan">Orang Lain</option>

                                </select>
                                <?= form_error('jenisdonasi', '<small class="text-danger pl-2">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="pesan">Pesan</label>
                                <textarea name="pesan" class="form-control" id="pesan" style="height:100px;" placeholder="contoh : Saya akan mengambil makanan, Saya akan berikan makanan ini ke yang membutuhkan" required></textarea>
                            </div>
                            <div class="modal-footer border-top-0 d-flex justify-content-center">
                                <button class="btn btn-success col-12" onclick="OrderBook()">Pesan Makanan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content p-2">
                        <div class="modal-header border-bottom-0">
                            <h4>Silahkan Login Terlebih Dahulu</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>

                        </div>
                        <div class="modal-footer border-top-0 d-flex justify-content-center">
                            <a class="btn btn-success col-12" href="<?= base_url('Auth/') ?>">Masuk</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 m-md-4">
        <label for="alamat">Alamat : </label>
        <p class="text-capitalize"> <?= $makanan['alamat'] ?>, <?= $makanan['kelurahan'] ?>, <?= $makanan['kecamatan'] ?>, <?= $makanan['kota'] ?>, <?= $makanan['provinsi'] ?> <span class="pl-2"> ( <?= $makanan['alamat_detail'] ?> ) </span></p>

        <p id="location"></p>
        <?= form_error('email', '<small class="text-danger pl-2">', '</small>'); ?>
        <input type="hidden" id="latitude" style="width: 200px" name="latitude" value="<?= $makanan['latitude'] ?>" />
        <input type="hidden" id="longtitude" style="width: 200px" name="longtitude" value="<?= $makanan['longtitude'] ?>" />
        <div id="googleMap" style="width:100%;height:400px;"></div>
    </div>

    <!-- <div id="googleMap" style="width: 100%; height: 400px;"></div> -->
</section>


<script>
    // Prosesn Simpan Pesanan
    function OrderBook(get) {
        var id_produk = $('#id_produk').val();
        var nama_donatur = $('#nama_donatur').val();
        var waktu_ambil = $('#waktu_ambil').val();
        var pesan = $('#pesan').val();
        var penerima = $('#penerima').val();
        console.log(id_produk, nama_donatur, waktu_ambil, pesan, penerima)
        $.ajax({
            url: '<?php echo base_url() ?>Makanan/transaksi', // ini URL controller
            type: 'POST', // metod form , kan ada GET, ada POST. nah ini pakai POST
            async: false,
            data: {
                id_produk: id_produk, // data apa aja yang mau dikirim
                nama_donatur: nama_donatur,
                waktu_ambil: waktu_ambil,
                pesan: pesan,
                penerima: penerima // data apa aja yang mau dikirim
            },
            success: function(data) { // data = hasil output yang dicontroller.
                swal("Yeay!", data, "success");
                setInterval('location.reload()', 6000);

            }
        });
    }

    function cekAkun(id_user) {
        console.log(id_user);
        $.ajax({
            url: '<?php echo base_url() ?>Makanan/cekAkun', // ini URL controller
            type: 'POST', // metod form , kan ada GET, ada POST. nah ini pakai POST
            async: false,
            data: {
                id_user: id_user, // data apa aja yang mau dikirim

            },
            success: function() { // data = hasil output yang dicontroller.
                swal({
                    title: "silahkan login",
                });
                // setInterval('location.reload()', 6000);

            }
        });
    }
</script>

<script>
    function myMap() {
        var lat = document.getElementById('latitude').value;
        var long = document.getElementById('longtitude').value;
        var mapProp = {
            center: new google.maps.LatLng(lat, long),
            zoom: 15,

        };
        var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
        const marker = new google.maps.Marker({
            position: new google.maps.LatLng(lat, long),
            map: map,
        });
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDK0Wk9CEkyOK4MtWPFkzvhBmxly_5TpU0&callback=myMap"></script>