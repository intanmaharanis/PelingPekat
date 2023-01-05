<?php
class M_donasi extends CI_Model
{
    public function insertdata($input)
    {
        return $this->db->insert('donasi', $input);
    }

    public function tampildata($lat = '', $long = '',  $wherejenis = '', $wheredonasi = '',  $batas_waktu, $whereurut = '')
    {

        return $this->db->query("SELECT * , CONCAT(ROUND((6371 * acos( cos( radians(d.latitude) ) * cos( radians( $lat ) ) * cos( radians( $long ) - radians(d.longtitude) ) + sin( radians(d.latitude) ) * sin( radians( $lat ) ) ) ),3),'') as distance FROM donasi as d
        WHERE tgl_batas >= '$batas_waktu' $wherejenis $wheredonasi $whereurut
        ORDER BY CONCAT(ROUND((6371 * acos( cos( radians(d.latitude) ) * cos( radians( $lat ) ) * cos( radians( $long ) - radians(d.longtitude) ) + sin( radians(d.latitude) ) * sin( radians( $lat ) ) ) ),1),'') 
        ");
    }
    public function tampildetail($lat = '', $long = '')
    {

        return $this->db->query("SELECT * , CONCAT(ROUND((6371 * acos( cos( radians(d.latitude) ) * cos( radians( $lat ) ) * cos( radians( $long ) - radians(d.longtitude) ) + sin( radians(d.latitude) ) * sin( radians( $lat ) ) ) ),3),'') as distance FROM donasi as d
        ORDER BY CONCAT(ROUND((6371 * acos( cos( radians(d.latitude) ) * cos( radians( $lat ) ) * cos( radians( $long ) - radians(d.longtitude) ) + sin( radians(d.latitude) ) * sin( radians( $lat ) ) ) ),1),'') 
        ");
    }

    public function getAllJenis()
    {
        return $this->db->get('jenis_makanan')->result_array();
    }

    public function getAllMakanan($id_produk)
    {

        return $this->db->get_where('donasi', ['id_produk' => $id_produk])->row_array();
    }

    public function donasiSaya($user)
    {

        return $this->db->query("        SELECT
        req.nama as requester,
        don.nama as donatur,
        d.id_produk as produk_id,
        d.tgl_buat as tgl_donasi,
        t.tgl_buat as tgl_pesan,
        d.*,
        t.*
        FROM `donasi` as d 
        LEFT JOIN transaksi as t ON t.id_produk=d.id_produk
        LEFT JOIN users as req ON req.id_user=t.id_user
        LEFT JOIN users as don ON don.id_user=d.id_user
        WHERE don.id_user='$user' ORDER BY t.tgl_buat DESC")->result();
    }

    public function pesananSaya($user)
    {
        return $this->db->query("SELECT
        req.nama as pemesan,
        don.nama as donatur,
        d.id_produk as produk_id,
        don.tgl_buat as tgl_donasi,
        t.tgl_buat as tgl_pesan,
        t.id_transaksi as transaksi_id,
        d.*,
        t.*,
        testi.*
        FROM `donasi` as d 
        LEFT JOIN transaksi as t ON t.id_produk=d.id_produk
        LEFT JOIN users as req ON req.id_user=t.id_user
        LEFT JOIN users as don ON don.id_user=d.id_user
        LEFT JOIN testimoni as testi ON testi.id_produk = d.id_produk
        WHERE t.id_user='$user' ORDER BY tgl_pesan DESC")->result();
    }

    public function hapusBarang($id_produk)
    {
        $this->db->delete('donasi', ['id_produk' => $id_produk]);
    }

    public function
    testimoni($tgl_1)
    {
        return $this->db->query("  SELECT
        req.nama as pemesan,
        don.nama as donatur,
        d.id_produk as produk_id,
        d.tgl_buat as tgl_donasi,
        t.tgl_buat as tgl_pesan,
        d.*,
        t.*,
        testi.*
        FROM `transaksi` as t 
        LEFT JOIN donasi as d ON d.id_produk=t.id_produk
        LEFT JOIN testimoni as testi ON testi.id_transaksi = t.id_transaksi
        LEFT JOIN users as req ON req.id_user=t.id_user
        LEFT JOIN users as don ON don.id_user=d.id_user
        WHERE tgl_selesai >= $tgl_1

        ORDER BY tgl_selesai DESC
        ")->result();
    }
}
