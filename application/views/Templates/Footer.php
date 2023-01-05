<footer class="footer bg-success p-4 text-center text-light">
    <div class="col-md-5 col-12 m-auto">
        <a class="footer-img" href="<?= base_url('Home') ?>"><img src="<?= base_url('assets/') ?>images/logo.jpg" alt="Pelik Pekat"></a>
        <p class="mt-3 ">Peling Pekat merupakan sebuah wadah untuk berbagi makanan berlebih yang berpotensi tebuang untuk masyarakat pra-sejahtera</p>
    </div>

</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

<script>
    $(document).ready(function() {
        $('#table').DataTable();
    });
</script>

<script>
    function UpdateStatus(id_transaksi, get) {
        var isidata = get;
        var isi = document.getElementById('status');
        if (confirm('apakah kamu yakin ingin mengubah status?')) {
            $.ajax({
                url: '<?php echo base_url() ?>Donasi/updatestatus',
                type: 'POST',
                async: false,
                data: {
                    id_transaksi: id_transaksi,
                    isidata: isidata,
                },
                success: function(data) {
                    swal(" Terimakasih.", data, "success");
                    setInterval('location.reload()', 2000);
                }
            });


        }
    }

    function UpdateBatal(id_transaksi, get) {
        var isidata = get;
        var isi = document.getElementById('status');
        if (confirm('apakah kamu yakin ingin mengubah status?')) {
            $.ajax({
                url: '<?php echo base_url() ?>Donasi/UpdateBatal',
                type: 'POST',
                async: false,
                data: {
                    id_transaksi: id_transaksi,
                    isidata: isidata,
                },
                success: function(data) {
                    swal(" Terimakasih.", data, "success");
                    setInterval('location.reload()', 2000);
                }
            });


        }
    }
</script>

<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>

</body>


</html>