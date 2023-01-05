<section class="container p-md-3 p-1 mb-4">
    <h1 class="sub-judul">Makanan Tersedia</h1>
    <p class="judul-deskripsi">Untuk kamu yang membutuhkan atau kenalanmu yang membutuhkan</p>
    <div class="makanan-wrap row justify-content-around  ">
        <div class="filter-makanan border rounded border-1 col-11 col-md-3 mt-3 pb-4 h-50 pt-3">
            <input type="hidden" name="lat" id="lat">
            <input type="hidden" name="lng" id="lng">
            <font size="2">Urutkan</font>
            <select name="urutkan" id="urutkan" class="form-control m-0 mb-3">
                <option value=" ">All</option>
                <option value="terbaru">Terbaru</option>
                <option value="3">Stok lebih dari 3</option>
                <option value="2">Stok kurang dari 3</option>
            </select>
            <font size="2">Jenis Makanan</font>
            <div class="form-group p-0">
                <select name="jenisMakanan" class="custom-select col-md-12 m-0" id="kategori">
                    <option value="">All</option>
                    <?php
                    foreach ($jenis as $j) :
                    ?>
                        <option value="<?= $j['id_jenis'] ?>"><?= $j['nama'] ?></option>
                    <?php endforeach; ?>
                </select>
                <?= form_error('namaMakanan', '<small class="text-danger pl-2">', '</small>'); ?>
            </div>
            <font size="2">Jenis Donasi</font>
            <select name="jenisdonasi" id="jenisdonasi" class="form-control m-0 mb-3">
                <option value="">All</option>
                <option value="Personal">Personal</option>
                <option value="Restoran">Restoran</option>
            </select>
            <font size="2">Radius</font>
            <select name="jarak" id="jarak" class="form-control m-0">
                <option value="">All</option>
                <option value="1">0 - 1 Km</option>
                <option value="2">1 - 2 Km</option>
                <option value="100">1 - 100 Km</option>
            </select>
            <br>
            <button onclick="filterdata()" class="btn btn-sm btn-primary col-12"><i class="fa fa-search"></i> Cari</button>
            <section class="pt-md-4 pb-md-5 p-0 d-none d-sm-block">
                <article class="text-center total-donasi-h">
                    <h6 class=" pt-5 font-weight-bold">Total Donasi Hari Ini</h6>
                    <h2 class="pt-3 border pb-3 w-md-75 w-50 mt-3 text-light ml-auto mr-auto  bg-success rounded">
                        <?= $totalmakanan ?>
                    </h2>
                </article>
                <article class="donasi-hari d-none d-sm-block">
                    <p class=" pt-5 font-weight-bold">Total Donasi Hari :</p>
                    <div class="row pb-2">
                        <span class="col-8 p-0 align-self-center" style="letter-spacing: 1px;">
                            <?php
                            $h_1 = date('N-d-m-Y', mktime(0, 0, 0, date('n',), date('j') - 1, date('Y')));
                            echo strtok(tanggal_indonesia($h_1), " ");

                            ?>
                        </span>
                        <span class="col-3  pt-2 pb-2 border-secondary font-weight-bold">
                            <?= $makananh1 ?>
                        </span>
                    </div>
                    <div class="row pb-2 ">
                        <span class="col-8 p-0 align-self-center" style="letter-spacing: 1px;">
                            <?php
                            $h_2 = date('N-d-m-Y', mktime(0, 0, 0, date('n',), date('j') - 2, date('Y')));
                            echo strtok(tanggal_indonesia($h_2), " ");

                            ?>
                        </span>
                        <span class="col-3  pt-2 pb-2 border-secondary font-weight-bold">
                            <?= $makananh2 ?>
                        </span>
                    </div>
                    <div class="row pb-2">
                        <span class="col-8 p-0 align-self-center" style="letter-spacing: 1px;">
                            <?php
                            $h_3 = date('N-d-m-Y', mktime(0, 0, 0, date('n',), date('j') - 3, date('Y')));
                            echo strtok(tanggal_indonesia($h_3), " ");

                            ?>
                        </span>
                        <span class="col-3  pt-2 pb-2 border-secondary font-weight-bold">
                            <?= $makananh3 ?>
                        </span>
                    </div>
                    <div class="row pb-2">
                        <span class="col-8 p-0 align-self-center" style="letter-spacing: 1px;">
                            <?php
                            $h_4 = date('N-d-m-Y', mktime(0, 0, 0, date('n',), date('j') - 4, date('Y')));
                            echo strtok(tanggal_indonesia($h_4), " ");

                            ?>
                        </span>
                        <span class="col-3  pt-2 pb-2 border-secondary font-weight-bold">
                            <?= $makananh4 ?>
                        </span>
                    </div>
                    <div class="row pb-2">
                        <span class="col-8 p-0 align-self-center" style="letter-spacing: 1px;">
                            <?php
                            $h_5 = date('N-d-m-Y', mktime(0, 0, 0, date('n',), date('j') - 5, date('Y')));
                            echo strtok(tanggal_indonesia($h_5), " ");

                            ?>
                        </span>
                        <span class="col-3  pt-2 pb-2 border-secondary font-weight-bold">
                            <?= $makananh5 ?>
                        </span>
                    </div>
                    <div class="row pb-2">
                        <span class="col-8 p-0 align-self-center  " style="letter-spacing: 1px;">
                            <?php
                            $h_6 = date('N-d-m-Y', mktime(0, 0, 0, date('n',), date('j') - 6, date('Y')));
                            echo strtok(tanggal_indonesia($h_6), " ");

                            ?>
                        </span>
                        <span class="col-3  pt-2 pb-2 border-secondary font-weight-bold">
                            <?= $makananh6 ?>
                        </span>
                    </div>




                </article>
                <article class="donasi-hari d-none d-sm-block">
                    <p class=" pt-5 font-weight-bold">Total Donasi Per Bulan:</p>
                    <div class="row pb-2">
                        <span class="col-8 p-0 align-self-center" style="letter-spacing: 1px;">
                            Januari
                        </span>
                        <span class="col-4  pt-2 pb-2 border-secondary font-weight-bold">
                            <?= $d_januari ?></td>
                        </span>
                    </div>
                    <div class="row pb-2">
                        <span class="col-8 p-0 align-self-center" style="letter-spacing: 1px;">
                            Februari
                        </span>
                        <span class="col-4  pt-2 pb-2 border-secondary font-weight-bold">
                            <?= $d_februari ?>
                        </span>
                    </div>
                    <div class="row pb-2">
                        <span class="col-8 p-0 align-self-center" style="letter-spacing: 1px;">
                            Maret
                        </span>
                        <span class="col-4  pt-2 pb-2 border-secondary font-weight-bold">
                            <?= $d_maret ?>
                        </span>
                    </div>
                    <div class="row pb-2">
                        <span class="col-8 p-0 align-self-center" style="letter-spacing: 1px;">
                            April
                        </span>
                        <span class="col-4  pt-2 pb-2 border-secondary font-weight-bold">
                            <?= $d_april ?>
                        </span>
                    </div>
                    <div class="row pb-2">
                        <span class="col-8 p-0 align-self-center" style="letter-spacing: 1px;">
                            Mei
                        </span>
                        <span class="col-4  pt-2 pb-2 border-secondary font-weight-bold">
                            <?= $d_mei ?>
                        </span>
                    </div>
                    <div class="row pb-2">
                        <span class="col-8 p-0 align-self-center  " style="letter-spacing: 1px;">
                            Juni
                        </span>
                        <span class="col-4  pt-2 pb-2 border-secondary font-weight-bold">
                            <?= $d_juni ?>
                        </span>
                    </div>
                    <div class="row pb-2">
                        <span class="col-8 p-0 align-self-center  " style="letter-spacing: 1px;">
                            Juli
                        </span>
                        <span class="col-4  pt-2 pb-2 border-secondary font-weight-bold">
                            <?= $d_juli ?>
                        </span>
                    </div>
                    <div class="row pb-2">
                        <span class="col-8 p-0 align-self-center  " style="letter-spacing: 1px;">
                            Agustus
                        </span>
                        <span class="col-4  pt-2 pb-2 border-secondary font-weight-bold">
                            <?= $d_agustus ?>
                        </span>
                    </div>
                    <div class="row pb-2">
                        <span class="col-8 p-0 align-self-center  " style="letter-spacing: 1px;">
                            September
                        </span>
                        <span class="col-4  pt-2 pb-2 border-secondary font-weight-bold">
                            <?= $d_september ?>
                        </span>
                    </div>
                    <div class="row pb-2">
                        <span class="col-8 p-0 align-self-center  " style="letter-spacing: 1px;">
                            Oktober
                        </span>
                        <span class="col-4  pt-2 pb-2 border-secondary font-weight-bold">
                            <?= $d_oktober ?>
                        </span>
                    </div>
                    <div class="row pb-2">
                        <span class="col-8 p-0 align-self-center  " style="letter-spacing: 1px;">
                            November
                        </span>
                        <span class="col-4  pt-2 pb-2 border-secondary font-weight-bold">
                            <?= $d_november ?>
                        </span>
                    </div>
                    <div class="row pb-2">
                        <span class="col-8 p-0 align-self-center  " style="letter-spacing: 1px;">
                            Desember
                        </span>
                        <span class="col-4  pt-2 pb-2 border-secondary font-weight-bold">
                            <?= $d_desember ?>
                        </span>
                    </div>

                </article>
        </div>
        <div class="col-12 col-md-8">
            <div id="display"></div>
        </div>
    </div>

</section>

<script>
    getLocation();

    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            x.innerHTML = "Geolocation is not supported by this browser.";
        }
    }

    function showPosition(position) {
        var lat = position.coords.latitude;
        var long = position.coords.longitude;
        $('#lat').val(lat);
        $('#lng').val(long);
        filterdata();
    }

    function filterdata(get) {
        var lat = $('#lat').val();
        var long = $('#lng').val();
        var jenis = $('#kategori').val();
        var jarak = $('#jarak').val();
        var urutkan = $('#urutkan').val();
        var jenisdonasi = $('#jenisdonasi').val();
        $.ajax({
            url: '<?php echo base_url() ?>Makanan/filterdata',
            type: 'POST',
            async: false,
            data: {
                lat: lat,
                long: long,
                jenis: jenis,
                jarak: jarak,
                urutkan: urutkan,
                jenisdonasi: jenisdonasi,

            },
            success: function(data) {
                document.getElementById('display').innerHTML = data;
            }
        });
    }
</script>