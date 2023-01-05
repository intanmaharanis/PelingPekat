<?php

class Makanan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_donasi');
        // $this->load->helper('product_helper');
        // $this->load->helper('date');
    }
    public function index()
    {
        $tgl = date('d-m-Y');
        $h_1 = date('d-m-Y', mktime(0, 0, 0, date('n'), date('j') - 1, date('Y')));
        $h_2 = date('d-m-Y', mktime(0, 0, 0, date('n'), date('j') - 2, date('Y')));
        $h_3 = date('d-m-Y', mktime(0, 0, 0, date('n'), date('j') - 3, date('Y')));
        $h_4 = date('d-m-Y', mktime(0, 0, 0, date('n'), date('j') - 4, date('Y')));
        $h_5 = date('d-m-Y', mktime(0, 0, 0, date('n'), date('j') - 5, date('Y')));
        $h_6 = date('d-m-Y', mktime(0, 0, 0, date('n'), date('j') - 6, date('Y')));
        $tahun = date('Y');
        $data['totalmakanan'] = $this->db->query("SELECT * FROM donasi WHERE FROM_UNIXTIME(tgl_buat,  '%d-%m-%Y') = '$tgl'")->num_rows();
        $data['makananh1'] = $this->db->query("SELECT * FROM donasi WHERE FROM_UNIXTIME(tgl_buat,  '%d-%m-%Y') = '$h_1'")->num_rows();
        $data['makananh2'] = $this->db->query("SELECT * FROM donasi WHERE FROM_UNIXTIME(tgl_buat,  '%d-%m-%Y') = '$h_2'")->num_rows();
        $data['makananh3'] = $this->db->query("SELECT * FROM donasi WHERE FROM_UNIXTIME(tgl_buat,  '%d-%m-%Y') = '$h_3'")->num_rows();
        $data['makananh4'] = $this->db->query("SELECT * FROM donasi WHERE FROM_UNIXTIME(tgl_buat,  '%d-%m-%Y') = '$h_4'")->num_rows();
        $data['makananh5'] = $this->db->query("SELECT * FROM donasi WHERE FROM_UNIXTIME(tgl_buat,  '%d-%m-%Y') = '$h_5'")->num_rows();
        $data['makananh6'] = $this->db->query("SELECT * FROM donasi WHERE FROM_UNIXTIME(tgl_buat,  '%d-%m-%Y') = '$h_6'")->num_rows();
        $data['jenis'] = $this->M_donasi->getAllJenis();
        $data['d_januari'] = $this->db->query("SELECT * FROM `donasi` WHERE FROM_UNIXTIME(tgl_buat, '%m-%Y') = '01-$tahun'")->num_rows();
        $data['d_februari'] = $this->db->query("SELECT * FROM `donasi` WHERE FROM_UNIXTIME(tgl_buat, '%m-%Y') = '02-$tahun'")->num_rows();
        $data['d_maret'] = $this->db->query("SELECT * FROM `donasi` WHERE FROM_UNIXTIME(tgl_buat, '%m-%Y') = '03-$tahun'")->num_rows();
        $data['d_april'] = $this->db->query("SELECT * FROM `donasi` WHERE FROM_UNIXTIME(tgl_buat, '%m-%Y') = '04-$tahun'")->num_rows();
        $data['d_mei'] = $this->db->query("SELECT * FROM `donasi` WHERE FROM_UNIXTIME(tgl_buat, '%m-%Y') = '05-$tahun'")->num_rows();
        $data['d_juni'] = $this->db->query("SELECT * FROM `donasi` WHERE FROM_UNIXTIME(tgl_buat, '%m-%Y') = '06-$tahun'")->num_rows();
        $data['d_juli'] = $this->db->query("SELECT * FROM `donasi` WHERE FROM_UNIXTIME(tgl_buat, '%m-%Y') = '07-$tahun'")->num_rows();
        $data['d_agustus'] = $this->db->query("SELECT * FROM `donasi` WHERE FROM_UNIXTIME(tgl_buat, '%m-%Y') = '08-$tahun'")->num_rows();
        $data['d_september'] = $this->db->query("SELECT * FROM `donasi` WHERE FROM_UNIXTIME(tgl_buat, '%m-%Y') = '09-$tahun'")->num_rows();
        $data['d_oktober'] = $this->db->query("SELECT * FROM `donasi` WHERE FROM_UNIXTIME(tgl_buat, '%m-%Y') = '10-$tahun'")->num_rows();
        $data['d_november'] = $this->db->query("SELECT * FROM `donasi` WHERE FROM_UNIXTIME(tgl_buat, '%m-%Y') = '11-$tahun'")->num_rows();
        $data['d_desember'] = $this->db->query("SELECT * FROM `donasi` WHERE FROM_UNIXTIME(tgl_buat, '%m-%Y') = '12-$tahun'")->num_rows();
        $this->load->view('Templates/Header');
        $this->load->view('Templates/Navigation');
        $this->load->view('Makanan/Index', $data);
        $this->load->view('Templates/Footer');
    }

    public function filterdata()
    {
        $lat = $this->input->post('lat');
        $long = $this->input->post('long');
        $wherejenis = '';
        $wheredonasi = '';
        $whereurut = '';
        $jenis = $this->input->post('jenis');
        $jarak = $this->input->post('jarak');
        $jenisdonasi = $this->input->post('jenisdonasi');
        $urutkan = $this->input->post('urutkan');
        $batas_waktu = date('Y-m-d', mktime(0, 0, 0, date('n'), date('j') - 1, date('Y')));
        $terbaru = date('Y-m-d', mktime(0, 0, 0, date('n'), date('j') - 3, date('Y')));

        $date = date('Y-m-d', mktime(0, 0, 0, date('n'), date('j') + 1, date('Y')));
        if ($jenis != "") {
            $wherejenis = 'AND id_jenis="' . $jenis . '" ';
        }
        if ($jenisdonasi != "") {
            $wheredonasi = ' AND jenisdonasi="' . $jenisdonasi . '" ';
        }

        if ($urutkan == "terbaru") {
            $whereurut = ' AND FROM_UNIXTIME(tgl_buat, "%Y-%m-%d") BETWEEN  "' . $terbaru . '" AND "' . $date . '"';
        } else if ($urutkan == "3") {
            $whereurut = ' AND stok > 3';
        } else if ($urutkan == "2") {
            $whereurut = ' AND stok <= 3';
        }

        $data['jarak'] = radius();
        if ($jarak != "") {
            $data['jarak'] = $jarak;
        }
        $data['list'] = $this->M_donasi->tampildata($lat, $long, $wherejenis, $wheredonasi, $batas_waktu, $whereurut);
        $this->load->view('Makanan/display', $data);
    }

    public function Detail($id_produk)
    {
        $data['list'] = $this->M_donasi->tampildetail('-6.2807955', '106.837246');
        $data['makanan'] = $this->M_donasi->getAllMakanan($id_produk);
        $data['bid'] = $this->db->query("SELECT * FROM transaksi WHERE id_produk='$id_produk'");
        $now = time();
        $data['waktu'] = timespan($data['makanan']['tgl_buat'], $now);
        // echo waktu($data['waktu']);
        $this->load->view('Templates/Header');
        $this->load->view('Templates/Navigation');
        $this->load->view('Makanan/Detail', $data);
        $this->load->view('Templates/Footer');
    }

    public function transaksi()
    {
        $data['id_user']      = $this->session->userdata('id_user');
        $data['id_produk']    = $this->input->post('id_produk');
        $data['waktu_ambil']  = $this->input->post('waktu_ambil');
        $data['penerima']     = $this->input->post('penerima');
        $data['pesan']        = $this->input->post('pesan');
        $data['status']       = 'dipesan'; // Default Status
        $data['tgl_buat']     = time();
        $data['tgl_selesai']  = 0;



        // Pengecekan, apakah produk tersebut sudah ada yang dipesan ? 
        $id_produk = $this->input->post('id_produk');
        $cek = $this->db->query("SELECT * FROM transaksi WHERE id_produk='$id_produk' ");;
        if ($cek->num_rows() > 0) {
            echo "Maaf, Makanan yang anda dipesan sudah tidak tersedia.";
        } else {
            $this->form_validation->set_rules('waktu_ambil', 'Waktu Ambil', 'required|trim', [
                'required' => 'Waktu Ambil harus diisi'
            ]);

            $this->form_validation->set_rules('penerima', 'Penerima', 'required|trim', [
                'required' => 'Penerima harus diisi'
            ]);
            $this->form_validation->set_rules('pesan', 'Pesan', 'required|trim', [
                'required' => 'Pesan harus diisi'
            ]);
            if ($this->form_validation->run() == false || $data['id_user'] == 0) {
                $this->load->view('Templates/Header');
                $this->load->view('Templates/Navigation');
                $this->load->view('Makanan/Detail/', $data['id_produk']);
                $this->load->view('Templates/Footer');
            } else {
                $insert = $this->db->insert('transaksi', $data);

                // Kirim email notifikasi 
                $id_produk = $this->input->post('id_produk');
                $produk = $this->db->query("SELECT * FROM donasi WHERE id_produk='$id_produk' ")->row_array();
                $pemesan              = $this->session->userdata('nama');
                $nama_donatur         = $this->input->post('nama_donatur');
                $waktu_ambil          = $this->input->post('waktu_ambil');
                $pesan                = $this->input->post('pesan');
                $no_hp                 = $this->session->userdata('no_hp');
                send_mail(
                    $produk['email'],
                    $produk['nama_produk'],
                    $waktu_ambil,
                    $pesan,
                    $nama_donatur,
                    $pemesan,
                    $no_hp
                );


                if ($insert) {
                    echo 'Hai ' . $this->session->userdata('nama') . ', Pastikan kamu suka sama makanan ini dan bisa untuk mengambilnya ya, kami akan memberitahu donatur untuk konfirmasi pengambilan. Terimakasih sudah menjadi bagian dari peduli linkungan.';
                } else {
                    echo 'Order book failed!';
                }
            }
        }
    }
}
