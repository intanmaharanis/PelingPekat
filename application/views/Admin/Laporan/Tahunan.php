<div class="card mt-3 col-11 mx-auto p-0">
    <div class="card-header">
        <h5 class="font-weight-bold">Laporan 5 Tahun Terakhir</h5>
    </div>
    <div class="card-body px-0">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>2018</th>
                        <th>2019</th>
                        <th>2020</th>
                        <th>2021</th>
                        <th>2022</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Donasi</td>
                        <td><?= $d_2018 ?></td>
                        <td><?= $d_2019 ?></td>
                        <td><?= $d_2020 ?></td>
                        <td><?= $d_2021 ?></td>
                        <td><?= $d_2022 ?></td>
                        <td><?= $d_2018 + $d_2019 + $d_2020 + $d_2021 + $d_2022 ?></td>
                    </tr>
                    <tr>
                        <td>Donatur</td>
                        <td><?= $don_2018 ?></td>
                        <td><?= $don_2019 ?></td>
                        <td><?= $don_2020 ?></td>
                        <td><?= $don_2021 ?></td>
                        <td><?= $don_2022 ?></td>
                        <td><?= $don_2018 + $don_2019 + $don_2020 + $don_2021 + $don_2022 ?></td>
                    </tr>
                    <tr>
                        <td>Penerima</td>
                        <td><?= $p_2018 ?></td>
                        <td><?= $p_2019 ?></td>
                        <td><?= $p_2020 ?></td>
                        <td><?= $p_2021 ?></td>
                        <td><?= $p_2022 ?></td>
                        <td><?= $p_2018 + $p_2019 + $p_2020 + $p_2021 + $p_2022 ?></td>
                    </tr>
                    <tr>
                        <td>User</td>
                        <td><?= $u_2018 ?></td>
                        <td><?= $u_2019 ?></td>
                        <td><?= $u_2020 ?></td>
                        <td><?= $u_2021 ?></td>
                        <td><?= $u_2022 ?></td>
                        <td><?= $u_2018 + $u_2019 + $u_2020 + $u_2021 + $u_2022 ?></td>
                    </tr>
                </tbody>

            </table>
        </div>
    </div>
</div>