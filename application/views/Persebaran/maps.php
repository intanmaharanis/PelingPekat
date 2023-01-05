<div class="container mb-5">
    <h1 class="sub-judul pl-0 pt-5 text-center text-md-left">Pesebaran Wilayah Masyarakat Pra-Sejahtera</h1>
    <p class="judul-deskripsi pl-0 pb-0">Persebaran berdasarkan persentase penduduk miskin wilayah kabupaten dan kota di Indonesia</p>
    <p size="3" class="pb-3">Sumber data: Badan Pusat Statistik <a href="https://www.bps.go.id/">(https://www.bps.go.id/)</a></p>
    <div class="col-md-4 pl-0 pb-3">
        <form action="maps" method="post">
            <div class="input-group">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Kelompok</label>
                </div>
                <select class="form-control" id="cl" name="cl">
                    <?php if (!isset($_POST['cl'])) {
                        echo '<option>Rendah</option>';
                        echo '<option>Sedang</option>';
                        echo '<option selected>Tinggi</option>';
                    } else {
                        if ($_POST['cl'] == 'Tinggi') {
                            echo '<option>Rendah</option>';
                            echo '<option>Sedang</option>';
                            echo '<option selected>Tinggi</option>';
                        } else if ($_POST['cl'] == 'Sedang') {
                            echo '<option>Rendah</option>';
                            echo '<option selected>Sedang</option>';
                            echo '<option>Tinggi</option>';
                        } else if ($_POST['cl'] == 'Rendah') {
                            echo '<option selected>Rendah</option>';
                            echo '<option>Sedang</option>';
                            echo '<option>Tinggi</option>';
                        }
                    }

                    ?>
                </select>
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary">Lihat</button>
                </div>
            </div>
        </form>
    </div>
    <div id="map-canvas" style="width: 100%; height: 500px"></div>

    <section class="mt-3">
        Jumlah Wilayah :
        <?php echo count($C1) ?>
    </section>
</div>


<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDK0Wk9CEkyOK4MtWPFkzvhBmxly_5TpU0&amp;libraries=weather&libraries=places&callback"></script>

<script>
    var marker1 = <?php echo json_encode($C1);
                    ?>;

    var jmlCL = <?php echo json_encode($jmlCL); ?>;


    function initialize() {
        var mapCanvas = document.getElementById('map-canvas');
        var mapOptions = {
            mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        var map = new google.maps.Map(mapCanvas, mapOptions)

        var infowindow = new google.maps.InfoWindow(),
            marker, i;
        var bounds = new google.maps.LatLngBounds(); // diluar looping
        for (i = 0; i < jmlCL; i++) {
            pos = new google.maps.LatLng(marker1[i]['da_lat'], marker1[i]['da_long']);
            bounds.extend(pos); // di dalam looping
            marker = new google.maps.Marker({
                position: pos,
                map: map
            });
            google.maps.event.addListener(marker, 'click', (function(marker, i) {

                return function() {

                    infowindow.setContent("Wilayah :  " + marker1[i]['da_wilayah'] + " <br/> Persentase <br/> 2020 :  " + marker1[i]['da_2019'] + " %  <br/> 2021  :  " + marker1[i]['da_2020'] + '% <br/> ');
                    infowindow.open(map, marker);
                }
            })(marker, i));
            map.fitBounds(bounds); // setelah looping
        }

    }

    google.maps.event.addDomListener(window, 'load', initialize);
</script>