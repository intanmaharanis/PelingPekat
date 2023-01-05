<div class="card mt-3 col-11 mx-auto p-0">
    <div class="card-header">
        <h5 class="font-weight-bold">Laporan Tahun <?= $judul ?></h5>
    </div>
    <div class="card-body px-0">
        <form method="GET" action="<?= base_url('Admin/Bulanan'); ?>" class="mt-2 mb-4 ml-5">
            <label for="tahun">Pilh Tahun</label>
            <select id="tahun" name="tahun" class="p-2">
                <option value="2022">2022</option>
                <option value="2021">2021</option>
                <option value="2020">2020</option>
                <option value="2019">2019</option>
                <option value="2018">2018</option>
            </select>
            <span><button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-search"></i> cari </button></span>
        </form>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Bulan</th>
                        <th>Donasi</th>
                        <th>Donatur</th>
                        <th>Penerima</th>
                        <th>User</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Januari</td>
                        <td><?= $d_januari ?></td>
                        <td><?= $don_januari ?></td>
                        <td><?= $p_januari ?></td>
                        <td><?= $u_januari ?></td>
                    </tr>
                    <tr>
                        <td>Februari</td>
                        <td><?= $d_februari ?></td>
                        <td><?= $don_februari ?></td>
                        <td><?= $p_februari ?></td>
                        <td><?= $u_februari ?></td>
                    </tr>
                    <tr>
                        <td>Maret</td>
                        <td><?= $d_maret ?></td>
                        <td><?= $don_maret ?></td>
                        <td><?= $p_maret ?></td>
                        <td><?= $u_maret ?></td>
                    </tr>
                    <tr>
                        <td>April</td>
                        <td><?= $d_april ?></td>
                        <td><?= $don_april ?></td>
                        <td><?= $p_april ?></td>
                        <td><?= $u_april ?></td>
                    </tr>
                    <tr>
                        <td>Mei</td>
                        <td><?= $d_mei ?></td>
                        <td><?= $don_mei ?></td>
                        <td><?= $p_mei ?></td>
                        <td><?= $u_mei ?></td>
                    </tr>
                    <tr>
                        <td>Juni</td>
                        <td><?= $d_juni ?></td>
                        <td><?= $don_juni ?></td>
                        <td><?= $p_juni ?></td>
                        <td><?= $u_juni ?></td>

                    </tr>
                    <tr>
                        <td>Juli</td>
                        <td><?= $d_juli ?></td>
                        <td><?= $don_juli ?></td>
                        <td><?= $p_juli ?></td>
                        <td><?= $u_juli ?></td>
                    </tr>
                    <tr>
                        <td>Agustus</td>
                        <td><?= $d_agustus ?></td>
                        <td><?= $don_agustus ?></td>
                        <td><?= $p_agustus ?></td>
                        <td><?= $u_agustus ?></td>
                    </tr>
                    <tr>
                        <td>September</td>
                        <td><?= $d_september ?></td>
                        <td><?= $don_september ?></td>
                        <td><?= $p_september ?></td>
                        <td><?= $u_september ?></td>
                    </tr>
                    <tr>
                        <td>Oktober</td>
                        <td><?= $d_oktober ?></td>
                        <td><?= $don_oktober ?></td>
                        <td><?= $p_oktober ?></td>
                        <td><?= $u_oktober ?></td>

                    </tr>
                    <tr>
                        <td>November</td>
                        <td><?= $d_november ?></td>
                        <td><?= $don_november ?></td>
                        <td><?= $p_november ?></td>
                        <td><?= $u_november ?></td>

                    </tr>
                    <tr>
                        <td>Desember</td>
                        <td><?= $d_desember ?></td>
                        <td><?= $don_desember ?></td>
                        <td><?= $p_desember ?></td>
                        <td><?= $u_desember ?></td>
                    </tr>
                    <tr>
                        <td>Total</td>
                        <td><?= $d_total ?></td>
                        <td><?= $don_total ?></td>
                        <td><?= $p_total ?></td>
                        <td><?= $u_total ?></td>
                    </tr>

                </tbody>

            </table>
        </div>
    </div>
</div>