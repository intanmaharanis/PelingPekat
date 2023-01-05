<div class="col-12 mx-auto mt-5 dashboard mb-5">
    <div class="d-flex justify-content-between flex-wrap">
        <div class="col-md-12 p-0 ml-2">
            <h4 class="font-weight-bold">Laporan Hari Ini</h4>
            <p class="pb-1"><?= tanggal_indonesia(date('N-d-m-Y')) ?></p>
        </div>
        <div class="col-md-3 col-12 pl-2 pr-2 mb-4">
            <div class="card text-light" style="background:#0B6767 ">
                <div class="row ">
                    <div class=" card-body col-8">
                        <h6 class="card-title text-capitalize">
                            Transaksi
                        </h6>
                        <h2><?= $transaksi_h ?></h2>
                    </div>
                    <div class="col-3 d-flex align-items-center">
                        <i class="fas fa-utensils" style="font-size: 55px;"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-12 pl-2 pr-2">
            <div class="card text-light" style="background:#390B67 ">
                <div class="row">
                    <div class=" card-body col-8">
                        <h6 class="card-title text-capitalize">
                            Dipesan
                        </h6>
                        <h2><?= $dipesan_h['total_tersedia'] ?></h2>
                    </div>
                    <div class="col-3 d-flex align-items-center p-1">
                        <i class="fas fa-download" style="font-size: 55px"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-12 pl-2 pr-2">
            <div class="card text-light" style="background:#670B0B ">
                <div class="row">
                    <div class=" card-body col-8">
                        <h6 class="card-title text-capitalize">
                            Selesai
                        </h6>
                        <h2><?= $selesai_h['total_tersedia'] ?></h2>
                    </div>
                    <div class="col-3 d-flex align-items-center p-1">
                        <i class="fas fa-check-square" style="font-size: 55px"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-12 pl-2 pr-2">
            <div class="card text-light" style="background:#39670B ">
                <div class="row">
                    <div class=" card-body col-8">
                        <h6 class="card-title text-capitalize">
                            Donasi
                        </h6>
                        <h2><?= $jml_h['total'] ?></h2>
                    </div>
                    <div class="col-3 d-flex align-items-center p-1">
                        <i class="fas fa-upload" style="font-size: 55px"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 p-0 ml-2 mt-3">
            <h4 class="font-weight-bold">Laporan Data</h4>
        </div>
        <div class="d-flex justify-content-between flex-wrap">
            <div class="col-md-3 col-12 pl-2 pr-2">
                <div class="card" style="border-bottom:none;border-left:4px solid #39670B; ">
                    <div class="row">
                        <div class=" card-body col-8">
                            <h6 class="card-title text-capitalize">
                                Total Transaksi
                            </h6>
                            <h2><?= $transaksi ?></h2>
                        </div>
                        <div class="col-3 d-flex align-items-center">
                            <i class="fas fa-utensils" style="font-size: 55px;color: #6B4C7F"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-12 pl-2 pr-2">
                <div class="card" style="border-bottom:none;border-left:4px solid #5C12A6; ">
                    <div class="row">
                        <div class=" card-body col-8">
                            <h6 class="card-title text-capitalize">
                                Dipesan
                            </h6>
                            <h2><?= $dipesan['total_tersedia'] ?></h2>
                        </div>
                        <div class="col-3 d-flex align-items-center p-1">
                            <i class="fas fa-download" style="font-size: 55px;color: #6B4C7F"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-12 pl-2 pr-2">
                <div class="card" style="border-bottom:none;border-left:4px solid #0B6767; ">
                    <div class="row">
                        <div class=" card-body col-8">
                            <h6 class="card-title text-capitalize">
                                Selesai
                            </h6>
                            <h2><?= $selesai['total_tersedia'] ?></h2>
                        </div>
                        <div class="col-3 d-flex align-items-center p-1">
                            <i class="fas fa-check-square" style="font-size: 55px;color: #6B4C7F"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-12 pl-2 pr-2">
                <div class="card" style="border-bottom:none;border-left:4px solid #670B0B; ">
                    <div class="row">
                        <div class=" card-body col-8">
                            <h6 class="card-title text-capitalize">
                                Tersedia
                            </h6>
                            <h2><?= $tersedia['total_tersedia'] ?></h2>
                        </div>
                        <div class="col-3 d-flex align-items-center p-1">
                            <i class="fas fa-upload" style="font-size: 55px;color: #6B4C7F"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-12 pl-2 pr-2 mt-4 ">
                <div class="card text-light p-2" style="border-bottom:none;background:#390B67; ">
                    <div class="card-body col-12">
                        <h4 class="card-title text-capitalize text-center p-2 ">
                            TOTAL DONASI
                        </h4>
                        <h1 class="font-weight-bold text-center pb-2" style="font-size: 50px;"><?= $jumlah ?></h1>
                    </div>

                </div>
                <div class='row mt-2'>
                    <div class="text-light col-6 p-1">
                        <div class="card" style="border-bottom:none;border-left:4px solid #670B0B;background:#39670B; ">
                            <div class="card-body col-12">
                                <h4 class="card-title text-capitalize text-center p-2 ">
                                    Total Donatur
                                </h4>
                                <h1 class="font-weight-bold text-center"><?= count($jmldonatur) ?></h1>
                            </div>
                        </div>
                    </div>
                    <div class="text-light col-6 p-1">
                        <div class="card" style="border-bottom:none;border-left:4px solid #390B67;background:#39670B; ">
                            <div class="card-body col-12">
                                <h4 class="card-title text-capitalize text-center p-2 ">
                                    Total User
                                </h4>
                                <h1 class="font-weight-bold text-center"><?= $user ?></h1>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <div class="col-md-6 col-12 pl-2 pr-2 mt-4 ">
                <div class="card" style="border-bottom:none;border-left:4px solid #5C12A6; ">
                    <div class="card-header">
                        <h5 class="font-weight-bold text-center">Lima Teratas Donatur Makanan</h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="pl-4">No.</th>
                                        <th>Nama Donatur</th>
                                        <th>Jumlah Donasi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($donatur as $d) :
                                    ?>
                                        <tr>
                                            <td class="pl-4"><?= $no++ ?></td>
                                            <td><?= $d['nama'] ?></td>
                                            <td><?= $d['total_donasi'] ?></td>

                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>

                            </table>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-6 p-2  mt-4 ">
                <div class="card">
                    <h5 class="card-header text-center font-weight-bold">
                        Jumlah Donasi Makanan 7 Hari Terakhir
                    </h5>
                    <div class="card-body">

                        <canvas id="chartDonasi"></canvas>

                    </div>
                </div>
            </div>
            <div class="col-md-6 p-2  mt-4 ">
                <div class="card">
                    <h5 class="card-header text-center font-weight-bold">
                        Jumlah Penerima Makanan 7 Hari Terakhir
                    </h5>
                    <div class="card-body">

                        <canvas id="chartPenerima"></canvas </div>

                    </div>
                </div>
            </div>

        </div>

        <script>
            var ctx = document.getElementById("chartDonasi").getContext('2d');
            var chartDonasi = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [
                        "<?php echo $h_6; ?>",
                        "<?php echo $h_5; ?>",
                        "<?php echo $h_4; ?>",
                        "<?php echo $h_3; ?>",
                        "<?php echo $h_2; ?>",
                        "<?php echo $h_1; ?>",
                        "<?php echo $h; ?>"

                    ],
                    datasets: [{
                        label: '',
                        data: [
                            <?= $jml_h6['total'];
                            ?>,
                            <?= $jml_h5['total'];
                            ?>,
                            <?= $jml_h4['total'];
                            ?>,
                            <?= $jml_h3['total'];
                            ?>,
                            <?= $jml_h2['total'];
                            ?>,
                            <?= $jml_h1['total'];
                            ?>,
                            <?= $jml_h['total'];
                            ?>
                        ],
                        backgroundColor: [
                            "#1F618D",
                            "#76448A",
                            "#48C9B0",
                            "#5499C7",
                            "#CB4335",
                            "#873600",
                            "#B9770E"
                        ],
                        borderWidth: 1,
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    },

                    legend: {
                        display: false
                    },
                }
            });
        </script>
        <script>
            var ctx = document.getElementById("chartPenerima").getContext('2d');
            var chartPenerima = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [
                        "<?php echo $h_6; ?>",
                        "<?php echo $h_5; ?>",
                        "<?php echo $h_4; ?>",
                        "<?php echo $h_3; ?>",
                        "<?php echo $h_2; ?>",
                        "<?php echo $h_1; ?>",
                        "<?php echo $h; ?>"

                    ],
                    datasets: [{
                        label: '',
                        data: [
                            <?= $penerimah6;
                            ?>,
                            <?= $penerimah5;
                            ?>,
                            <?= $penerimah4;
                            ?>,
                            <?= $penerimah3;
                            ?>,
                            <?= $penerimah2;
                            ?>,
                            <?= $penerimah1;
                            ?>,
                            <?= $totalpenerima;
                            ?>
                        ],
                        backgroundColor: [
                            "#1F618D",
                            "#76448A",
                            "#48C9B0",
                            "#5499C7",
                            "#CB4335",
                            "#873600",
                            "#B9770E"
                        ],
                        borderWidth: 1,
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    },

                    legend: {
                        display: false
                    },
                }
            });
        </script>