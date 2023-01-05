<div class="container">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row mt-3">
        <div class="col-md-3">
            <form action="pesebaran" method="post">
                <div class="input-group">
                    <label>Jumlah Iterasi</label>
                    <input type="text" class="form-control" placeholder="" id="jmlIterasi" name="jmlIterasi" value="5">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary">Proses</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">


            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Wilayah</th>
                        <th scope="col">2019</th>
                        <th scope="col">2020</th>
                        <!-- <th scope="col">latitude</th>
			      <th scope="col">longitude</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($dAwal as $da) : ?>
                        <tr>
                            <th scope="row"><?= $i++ ?></th>
                            <td><?= $da['da_wilayah']; ?></td>
                            <td><?= $da['da_2019']; ?></td>
                            <td><?= $da['da_2020']; ?></td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>


        </div>
    </div>

</div>