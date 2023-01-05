<?php
class M_Admin extends CI_Model
{

    public function getAllJenis()
    {
        return $this->db->get('jenis_makanan')->result_array();
    }

    public function tambahJenis()
    {
        $data = [
            "nama" => $this->input->post('nama', true)
        ];
        $this->db->insert('jenis_makanan', $data);
    }

    public function ubahJenis($id)
    {
        $data = [
            "nama " => $this->input->post('nama', true)
        ];
        $this->db->where('id_jenis', $id);
        $this->db->update('jenis_makanan', $data);
    }

    public function getJenisbyId($id)
    {
        return $this->db->get_where('jenis_makanan', ['id_jenis' => $id])->row_array();
    }

    public function hapusJenis($id)
    {
        return $this->db->delete('jenis_makanan', ['id_jenis' => $id]);
    }

    public function getAllUsers()
    {
        return $this->db->get('users')->result_array();
    }

    public function getAllDonatur()
    {
        return $this->db->query("SELECT u.*,count(d.id_user) as total_donasi FROM `donasi` as d LEFT JOIN users as u ON u.id_user=d.id_user GROUP by d.id_user ORDER BY count(d.id_user) DESC ;")->result_array();
    }

    public function getAllTransaksi()
    {
        return $this->db->query("        SELECT
        req.nama as requester,
        don.nama as donatur,
        d.id_produk as produk_id,
        t.tgl_buat as tgl_transaksi,
        d.tgl_buat as tgl_donasi,
        j.nama as jenis,
        d.*,
        t.*
        FROM `donasi` as d 
        LEFT JOIN transaksi as t ON t.id_produk=d.id_produk
        LEFT JOIN users as req ON req.id_user=t.id_user
        LEFT JOIN users as don ON don.id_user=d.id_user
        LEFT JOIN jenis_makanan as j ON j.id_jenis = d.id_jenis
        ORDER BY tgl_donasi DESC
         ")->result_array();
    }

    public function
    getAllMakanan($tgl_1, $tgl_2)
    {
        return $this->db->query("SELECT req.nama as requester, don.nama as donatur, d.id_produk as produk_id, t.tgl_buat as tgl_transaksi, d.tgl_buat as tgl_donasi, j.nama as jenis, d.*, t.* FROM `donasi` as d LEFT JOIN transaksi as t ON t.id_produk=d.id_produk LEFT JOIN users as req ON req.id_user=t.id_user LEFT JOIN users as don ON don.id_user=d.id_user LEFT JOIN jenis_makanan as j ON j.id_jenis = d.id_jenis WHERE d.tgl_buat BETWEEN  $tgl_1 AND $tgl_2 ORDER BY d.tgl_buat ASC;
         ")->result_array();
    }
    public function
    gettransaksibyPeriode($where)
    {
        return $this->db->query("        SELECT
        req.nama as requester,
        don.nama as donatur,
        d.id_produk as produk_id,
        t.tgl_buat as tgl_transaksi,
        d.tgl_buat as tgl_donasi,
        j.nama as jenis,
        d.*,
        t.*
        FROM `donasi` as d 
        LEFT JOIN transaksi as t ON t.id_produk=d.id_produk
        LEFT JOIN users as req ON req.id_user=t.id_user
        LEFT JOIN users as don ON don.id_user=d.id_user
        LEFT JOIN jenis_makanan as j ON j.id_jenis = d.id_jenis
        $where")->result_array();
    }
    public function
    getuserbyPeriode($tgl_1, $tgl_2)
    {
        return $this->db->query("SELECT *  FROM `users` WHERE tgl_buat BETWEEN  $tgl_1 AND $tgl_2 ORDER BY tgl_buat ASC;")->result_array();
    }
    public function getAllPesebaran()
    {
        return $this->db->get('data_awal')->result_array();
    }

    public function hapusMakanan($id)
    {
        $this->db->delete('donasi', ['id_produk' => $id]);
    }

    public function getWilayahbyId($id)
    {
        return $this->db->get_where('data_awal', ['da_id' => $id])->row_array();
    }

    public function ubahWilayah($id)
    {

        $data = [
            'da_wilayah' => htmlspecialchars($this->input->post('nama', true)),
            'da_2019' => htmlspecialchars($this->input->post('2019', true)),
            'da_2020' => htmlspecialchars($this->input->post('2020', true)),
            'da_lat' => htmlspecialchars($this->input->post('lat', true)),
            'da_long' => htmlspecialchars($this->input->post('long', true))
        ];

        $this->db->where('da_id', $id);
        $this->db->update('data_awal', $data);
    }

    public function hapusWilayah($id)
    {
        $this->db->delete('data_awal', ['da_id' => $id]);
    }
}
