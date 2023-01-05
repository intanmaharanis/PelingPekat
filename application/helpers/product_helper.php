<?php

function cekstok($produk_id = '')
{
    return 0;
}

function radius($radius = '')
{
    return 100;
}


function status_badge($status = '')
{
    switch ($status) {
        case 'selesai':
            return  '<span class="badge badge-primary">Selesai</span>';
            break;
        case 'dipesan':
            return  '<span class="badge badge-warning">Dipesan</span>';
            break;
        case 'batal':
            return  '<span class="badge badge-danger">Batal</span>';
            break;

        default:
            return  '<span class="badge badge-light">Tersedia</span>';
            break;
    }
}

function status_makanan($id_produk = '')
{
    $ci     = &get_instance();
    $info =  $ci->db->query("SELECT * FROM transaksi WHERE id_produk='$id_produk' ");
    if ($info->num_rows() > 0) {
        $data = $info->row_array();
        return $data['status'];
    } else {
        return 'Tersedia';
    }
}

function data_target($id_user = '')
{
    if ($id_user != 0) {
        return '#form';
    } else {
        return '#login';
    }
}

function tanggal_indonesia($tanggal)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );

    $hari = array(
        1 =>   'Senin',
        'Selasa',
        'Rabu',
        'Kamis',
        'Jumat',
        'Sabtu',
        'Minggu',
    );

    $pecahkan = explode('-', $tanggal);

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return $hari[(int)$pecahkan[0]] . ' ' . $pecahkan[1] . ' ' . $bulan[(int)$pecahkan[2]] . ' ' . $pecahkan[3];
}

function waktu($waktu)
{
    $keterangan = array(
        'Year,' =>   'Tahun',
        'Years,' =>   'Tahun',
        'Month,' =>   'Bulan',
        'Months,' =>   'Bulan',
        'Week,' =>   'Minggu',
        'Weeks,' =>   'Minggu',
        'Day,' =>   'Hari',
        'Day' =>   'Hari',
        'Days,' =>   'Hari',
        'Days' =>   'Hari',
        'Hour,' =>   'Jam',
        'Hours,' =>   'Jam',
        'Hours' =>   'Jam',
        'Minutes,', 'Minutes' =>   'Menit',
        'Minute,', 'Minute' =>   'Menit',
        'Second' =>   'Detik',
        'Seconds' =>   'Detik'
    );


    $pecahkan = explode(' ', $waktu);

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return  $pecahkan[0] . ' ' . $keterangan[(string)$pecahkan[1]];
}
