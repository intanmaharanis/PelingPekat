<?php

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Admin');
    }

    public function index()
    {
        $data['h'] = 'Hari ini';
        $data['h_1'] = strtok(tanggal_indonesia(date('N-d-m-Y', mktime(0, 0, 0, date('n'), date('j') - 1, date('Y')))), ' ');
        $data['h_2'] = strtok(tanggal_indonesia(date('N-d-m-Y', mktime(0, 0, 0, date('n'), date('j') - 2, date('Y')))), ' ');
        $data['h_3'] = strtok(tanggal_indonesia(date('N-d-m-Y', mktime(0, 0, 0, date('n'), date('j') - 3, date('Y')))), ' ');
        $data['h_4'] = strtok(tanggal_indonesia(date('N-d-m-Y', mktime(0, 0, 0, date('n'), date('j') - 4, date('Y')))), ' ');
        $data['h_5'] = strtok(tanggal_indonesia(date('N-d-m-Y', mktime(0, 0, 0, date('n'), date('j') - 5, date('Y')))), ' ');
        $data['h_6'] = strtok(tanggal_indonesia(date('N-d-m-Y', mktime(0, 0, 0, date('n'), date('j') - 6, date('Y')))), ' ');
        $h_1 = date('d-m-Y', mktime(0, 0, 0, date('n'), date('j') - 1, date('Y')));
        $h_2 = date('d-m-Y', mktime(0, 0, 0, date('n'), date('j') - 2, date('Y')));
        $h_3 = date('d-m-Y', mktime(0, 0, 0, date('n'), date('j') - 3, date('Y')));
        $h_4 = date('d-m-Y', mktime(0, 0, 0, date('n'), date('j') - 4, date('Y')));
        $h_5 = date('d-m-Y', mktime(0, 0, 0, date('n'), date('j') - 5, date('Y')));
        $h_6 = date('d-m-Y', mktime(0, 0, 0, date('n'), date('j') - 6, date('Y')));
        $h = date('d-m-Y');
        $data['jml_h1'] =  $this->db->query("SELECT COUNT(*) as total FROM `donasi` WHERE FROM_UNIXTIME(tgl_buat,  '%d-%m-%Y') = '$h_1'")->row_array();
        $data['jml_h2'] =  $this->db->query("SELECT COUNT(*) as total FROM `donasi` WHERE FROM_UNIXTIME(tgl_buat,  '%d-%m-%Y') = '$h_2'")->row_array();
        $data['jml_h3'] =  $this->db->query("SELECT COUNT(*) as total FROM `donasi` WHERE FROM_UNIXTIME(tgl_buat,  '%d-%m-%Y') = '$h_3'")->row_array();
        $data['jml_h4'] =  $this->db->query("SELECT COUNT(*) as total FROM `donasi` WHERE FROM_UNIXTIME(tgl_buat,  '%d-%m-%Y') = '$h_4'")->row_array();
        $data['jml_h5'] =  $this->db->query("SELECT COUNT(*) as total FROM `donasi` WHERE FROM_UNIXTIME(tgl_buat,  '%d-%m-%Y') = '$h_5'")->row_array();
        $data['jml_h6'] =  $this->db->query("SELECT COUNT(*) as total FROM `donasi` WHERE FROM_UNIXTIME(tgl_buat,  '%d-%m-%Y') = '$h_6'")->row_array();
        $data['jml_h'] =  $this->db->query("SELECT COUNT(*) as total FROM `donasi` WHERE FROM_UNIXTIME(tgl_buat,  '%d-%m-%Y') = '$h'")->row_array();
        $data['totalpenerima'] = $this->db->query("SELECT * FROM transaksi WHERE FROM_UNIXTIME(tgl_selesai,  '%d-%m-%Y') = '$h' AND status ='selesai'")->num_rows();
        $data['penerimah1'] = $this->db->query("SELECT * FROM transaksi WHERE FROM_UNIXTIME(tgl_selesai,  '%d-%m-%Y') = '$h_1' AND status ='selesai'")->num_rows();
        $data['penerimah2'] = $this->db->query("SELECT * FROM transaksi WHERE FROM_UNIXTIME(tgl_selesai,  '%d-%m-%Y') = '$h_2' AND status ='selesai'")->num_rows();
        $data['penerimah3'] = $this->db->query("SELECT * FROM transaksi WHERE FROM_UNIXTIME(tgl_selesai,  '%d-%m-%Y') = '$h_3' AND status ='selesai'")->num_rows();
        $data['penerimah4'] = $this->db->query("SELECT * FROM transaksi WHERE FROM_UNIXTIME(tgl_selesai,  '%d-%m-%Y') = '$h_4' AND status ='selesai'")->num_rows();
        $data['penerimah5'] = $this->db->query("SELECT * FROM transaksi WHERE FROM_UNIXTIME(tgl_selesai,  '%d-%m-%Y') = '$h_5' AND status ='selesai'")->num_rows();
        $data['penerimah6'] = $this->db->query("SELECT * FROM transaksi WHERE FROM_UNIXTIME(tgl_selesai,  '%d-%m-%Y') = '$h_6' AND status ='selesai'")->num_rows();
        $data['jumlah'] =  $this->db->count_all('donasi');
        $data['transaksi'] =  $this->db->count_all('transaksi');
        $data['transaksi_h'] =  $this->db->query("SELECT * FROM transaksi WHERE FROM_UNIXTIME(tgl_buat, '%d-%m-%Y') = '$h'")->num_rows();
        $data['tersedia'] =  $this->db->query('SELECT COUNT(*) as total_tersedia FROM `donasi` as d LEFT JOIN transaksi as t ON d.id_produk=t.id_produk WHERE t.id_transaksi IS NULL;')->row_array();
        $data['dipesan_h'] =  $this->db->query("SELECT COUNT(*) as total_tersedia FROM `donasi` as d LEFT JOIN transaksi as t ON d.id_produk=t.id_produk WHERE FROM_UNIXTIME(t.tgl_buat,  '%d-%m-%Y') = '$h' AND t.status= 'dipesan'")->row_array();
        $data['dipesan'] =  $this->db->query('SELECT COUNT(*) as total_tersedia FROM `donasi` as d LEFT JOIN transaksi as t ON d.id_produk=t.id_produk WHERE t.status= "dipesan"')->row_array();
        $data['selesai'] =  $this->db->query('SELECT COUNT(*) as total_tersedia FROM `donasi` as d LEFT JOIN transaksi as t ON d.id_produk=t.id_produk WHERE t.status = "selesai";')->row_array();
        $data['selesai_h'] =  $this->db->query("SELECT COUNT(*) as total_tersedia FROM `donasi` as d LEFT JOIN transaksi as t ON d.id_produk=t.id_produk WHERE FROM_UNIXTIME(tgl_selesai,  '%d-%m-%Y') = '$h' AND t.status = 'selesai'")->row_array();
        $data['judulHalaman'] = "Selamat Datang, " . $this->session->userdata('nama');
        $data['donatur'] =
            $this->db->query("SELECT u.nama,count(d.id_user) as total_donasi FROM `donasi` as d LEFT JOIN users as u ON u.id_user=d.id_user GROUP by d.id_user ORDER BY total_donasi DESC LIMIT 5 ;")->result_array();

        $data['jmldonatur'] = $this->db->query("SELECT COUNT(id_user) FROM donasi GROUP BY id_user;")->result_array();
        $data['user'] =  $this->db->count_all('users');
        $this->load->view('Templates/Header');
        $this->load->view('Templates/adminHeader', $data);
        $this->load->view('Admin/Home');
        $this->load->view('Templates/adminFooter');
    }

    public function dataMakanan()
    {
        $data['judulHalaman'] = "Data Donasi";
        $tgl_1 = strtotime($this->input->get('tanggal_awal'));
        $tgl_2 = strtotime($this->input->get('tanggal_akhir'));
        if ($tgl_1 != "" and $tgl_2 != "") {
            $data['makanan'] = $this->M_Admin->getAllMakanan($tgl_1, $tgl_2);
        } else {
            $data['makanan'] = $this->M_Admin->getAllTransaksi();
        }

        $this->load->view('Templates/Header');
        $this->load->view('Templates/adminHeader', $data);
        $this->load->view('Admin/dataMakanan', $data);
        $this->load->view('Templates/adminFooter');
    }

    public function Donatur()
    {
        $data['judulHalaman'] = "Data Donatur";
        $tgl_1 = strtotime($this->input->get('tanggal_awal'));
        $tgl_2 = strtotime($this->input->get('tanggal_akhir'));
        if ($tgl_1 != "" and $tgl_2 != "") {
            $data['makanan'] = $this->M_Admin->getdonaturbyPeriode($tgl_1, $tgl_2);
        } else {
            $data['donatur'] = $this->M_Admin->getAllDonatur();
        }
        $data['donatur'] = $this->M_Admin->getAllDonatur();
        $this->load->view('Templates/Header');
        $this->load->view('Templates/adminHeader', $data);
        $this->load->view('Admin/dataDonatur', $data);
        $this->load->view('Templates/adminFooter');
    }

    public function jenisMakanan()
    {
        $data['judulHalaman'] = "Jenis Makanan";
        $data['jenis'] = $this->M_Admin->getAllJenis();
        $this->load->view('Templates/Header');
        $this->load->view('Templates/adminHeader', $data);
        $this->load->view('Admin/JenisMakanan', $data);
        $this->load->view('Templates/adminFooter');
    }
    public function ubahJenis($id)
    {
        $data['judulHalaman'] = "Ubah Jenis Makanan";
        $data['jenis'] = $this->M_Admin->getJenisbyId($id);

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Templates/Header');
            $this->load->view('Templates/adminHeader', $data);
            $this->load->view('Admin/ubahJenis', $data);
            $this->load->view('Templates/adminFooter');
        } else {
            $this->M_Admin->ubahJenis($id);
            $this->session->set_flashdata('alert', 'Diubah');
            redirect('Admin/JenisMakanan');
        }
    }

    public function hapusJenis($id)
    {
        $this->M_Admin->hapusJenis($id);
        $this->session->set_flashdata('alert', 'Dihapus');
        redirect('Admin/JenisMakanan');
    }

    public function tambahJenis()
    {

        $data['judulHalaman'] = "Tambah Data Jenis Makanan";
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Templates/Header');
            $this->load->view('Templates/adminHeader', $data);
            $this->load->view('Admin/TambahJenis');
            $this->load->view('Templates/adminFooter');
        } else {
            $this->M_Admin->tambahJenis();
            $this->session->set_flashdata('alert', 'Ditambahkan');
            redirect('Admin/JenisMakanan');
        }
    }

    public function users()
    {
        $data['judulHalaman'] = "Data Users";
        $tgl_1 = strtotime($this->input->get('tanggal_awal'));
        $tgl_2 = strtotime($this->input->get('tanggal_akhir'));
        if ($tgl_1 != "" and $tgl_2 != "") {
            $data['users'] = $this->M_Admin->getuserbyPeriode($tgl_1, $tgl_2);
        } else {
            $data['users'] = $this->M_Admin->getAllUsers();
        }

        $this->load->view('Templates/Header');
        $this->load->view('Templates/adminHeader', $data);
        $this->load->view('Admin/Users', $data);
        $this->load->view('Templates/adminFooter');
    }

    public function Tersedia()
    {
        $data['judulHalaman'] = "Makanan Tersedia";
        $tgl_1 = strtotime($this->input->get('tanggal_awal'));
        $tgl_2 = strtotime($this->input->get('tanggal_akhir'));
        $where = '';
        if ($tgl_1 != "" and $tgl_2 != "") {
            $where = ' WHERE d.tgl_buat BETWEEN  "' .  $tgl_1 . '" AND "' . $tgl_2 . '" ORDER BY d.tgl_buat DESC';
            $data['makanan'] = $this->M_Admin->gettransaksibyPeriode($where);
        } else {
            $data['makanan'] = $this->M_Admin->getAllTransaksi();
        }
        $this->load->view('Templates/Header');
        $this->load->view('Templates/adminHeader', $data);
        $this->load->view('Admin/Makanan/Tersedia', $data);
        $this->load->view('Templates/adminFooter');
    }

    public function Dipesan()
    {
        $data['judulHalaman'] = "Makanan di Pesan";
        $tgl_1 = strtotime($this->input->get('tanggal_awal'));
        $tgl_2 = strtotime($this->input->get('tanggal_akhir'));
        $where = '';
        if ($tgl_1 != "" and $tgl_2 != "") {
            $where = ' WHERE t.tgl_buat BETWEEN  "' .  $tgl_1 . '" AND "' . $tgl_2 . '" ORDER BY t.tgl_buat DESC';
            $data['makanan'] = $this->M_Admin->gettransaksibyPeriode($where);
        } else {
            $data['makanan'] = $this->M_Admin->getAllTransaksi();
        }
        $this->load->view('Templates/Header');
        $this->load->view('Templates/adminHeader', $data);
        $this->load->view('Admin/Makanan/Dipesan', $data);
        $this->load->view('Templates/adminFooter');
    }
    public function Selesai()
    {
        $data['judulHalaman'] = "Makanan Terselesaikan";
        $tgl_1 = strtotime($this->input->get('tanggal_awal'));
        $tgl_2 = strtotime($this->input->get('tanggal_akhir'));
        $where = '';
        if ($tgl_1 != "" and $tgl_2 != "") {
            $where = ' WHERE t.tgl_selesai BETWEEN  "' .  $tgl_1 . '" AND "' . $tgl_2 . '" ORDER BY t.tgl_selesai DESC';
            $data['makanan'] = $this->M_Admin->gettransaksibyPeriode($where);
        } else {
            $data['makanan'] = $this->M_Admin->getAllTransaksi();
        }

        $this->load->view('Templates/Header');
        $this->load->view('Templates/adminHeader', $data);
        $this->load->view('Admin/Makanan/Selesai', $data);
        $this->load->view('Templates/adminFooter');
    }

    public function Pesebaran()
    {
        $data['judulHalaman'] = "Data Pesebaran Wilayah";
        $data['wilayah'] = $this->M_Admin->getAllPesebaran();
        $this->load->view('Templates/Header');
        $this->load->view('Templates/adminHeader', $data);
        $this->load->view('Admin/Pesebaran', $data);
        $this->load->view('Templates/adminFooter');
    }

    public function hapusMakanan($id)
    {
        $this->M_Admin->hapusMakanan($id);
        $this->session->set_flashdata('alert', 'Dihapus');
        redirect('Admin/dataMakanan');
    }

    public function tambahWilayah()
    {

        $data['judulHalaman'] = "Tambah Data Pesebaran Wilayah";
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('2019', 'Persentase', 'required');
        $this->form_validation->set_rules('2020', 'Persentase', 'required');
        $this->form_validation->set_rules('lat', 'Latitude', 'required');
        $this->form_validation->set_rules('long', 'Longitude', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Templates/Header');
            $this->load->view('Templates/adminHeader', $data);
            $this->load->view('Admin/tambahWilayah');
            $this->load->view('Templates/adminFooter');
        } else {
            $data = [
                'da_wilayah' => htmlspecialchars($this->input->post('nama', true)),
                'da_2019' => htmlspecialchars($this->input->post('2019', true)),
                'da_2020' => htmlspecialchars($this->input->post('2020', true)),
                'da_lat' => htmlspecialchars($this->input->post('lat', true)),
                'da_long' => htmlspecialchars($this->input->post('long', true)),
            ];

            $this->db->insert('data_awal', $data);
            $this->session->set_flashdata('alert', 'Ditambahkan');
            redirect('Admin/Pesebaran');
        }
    }


    public function ubahWilayah($id)
    {
        $data['judulHalaman'] = "Ubah Jenis Makanan";
        $data['wilayah'] = $this->M_Admin->getWilayahbyId($id);

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('2019', 'Persentase', 'required');
        $this->form_validation->set_rules('2020', 'Persentase', 'required');
        $this->form_validation->set_rules('lat', 'Latitude', 'required');
        $this->form_validation->set_rules('long', 'Longitude', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Templates/Header');
            $this->load->view('Templates/adminHeader', $data);
            $this->load->view('Admin/ubahWilayah', $data);
            $this->load->view('Templates/adminFooter');
        } else {
            $this->M_Admin->ubahWilayah($id);
            $this->session->set_flashdata('alert', 'Diubah');
            redirect('Admin/Pesebaran');
        }
    }

    public function hapusWilayah($id)
    {
        $this->M_Admin->hapusWilayah($id);
        $this->session->set_flashdata('alert', 'Dihapus');
        redirect('Admin/Pesebaran');
    }

    public function Tahunan()
    {
        $data['judulHalaman'] = "";
        $data['d_2018'] = $this->db->query('SELECT * FROM `donasi` WHERE FROM_UNIXTIME(tgl_buat, "%Y") = "2018";')->num_rows();
        $data['d_2019'] = $this->db->query('SELECT * FROM `donasi` WHERE FROM_UNIXTIME(tgl_buat, "%Y") = "2019";')->num_rows();
        $data['d_2020'] = $this->db->query('SELECT * FROM `donasi` WHERE FROM_UNIXTIME(tgl_buat, "%Y") = "2020";')->num_rows();
        $data['d_2021'] = $this->db->query('SELECT * FROM `donasi` WHERE FROM_UNIXTIME(tgl_buat, "%Y") = "2021";')->num_rows();
        $data['d_2022'] = $this->db->query('SELECT * FROM `donasi` WHERE FROM_UNIXTIME(tgl_buat, "%Y") = "2022";')->num_rows();
        $data['don_2018'] = $this->db->query("SELECT u.nama,FROM_UNIXTIME(d.tgl_buat, '%Y'), count(d.id_user) as total_donasi FROM `donasi` as d LEFT JOIN users as u ON u.id_user=d.id_user WHERE FROM_UNIXTIME(d.tgl_buat, '%Y')='2018' GROUP by d.id_user;")->num_rows();
        $data['don_2019'] = $this->db->query("SELECT u.nama,FROM_UNIXTIME(d.tgl_buat, '%Y'), count(d.id_user) as total_donasi FROM `donasi` as d LEFT JOIN users as u ON u.id_user=d.id_user WHERE FROM_UNIXTIME(d.tgl_buat, '%Y')='2019' GROUP by d.id_user;")->num_rows();
        $data['don_2020'] = $this->db->query("SELECT u.nama,FROM_UNIXTIME(d.tgl_buat, '%Y'), count(d.id_user) as total_donasi FROM `donasi` as d LEFT JOIN users as u ON u.id_user=d.id_user WHERE FROM_UNIXTIME(d.tgl_buat, '%Y')='2020' GROUP by d.id_user;")->num_rows();
        $data['don_2021'] = $this->db->query("SELECT u.nama,FROM_UNIXTIME(d.tgl_buat, '%Y'), count(d.id_user) as total_donasi FROM `donasi` as d LEFT JOIN users as u ON u.id_user=d.id_user WHERE FROM_UNIXTIME(d.tgl_buat, '%Y')='2021' GROUP by d.id_user;")->num_rows();
        $data['don_2022'] = $this->db->query("SELECT u.nama,FROM_UNIXTIME(d.tgl_buat, '%Y'), count(d.id_user) as total_donasi FROM `donasi` as d LEFT JOIN users as u ON u.id_user=d.id_user WHERE FROM_UNIXTIME(d.tgl_buat, '%Y')='2022' GROUP by d.id_user;")->num_rows();
        $data['p_2018'] = $this->db->query("SELECT * FROM transaksi WHERE FROM_UNIXTIME(tgl_selesai, '%Y') = '2018' AND status ='selesai';")->num_rows();
        $data['p_2019'] = $this->db->query("SELECT * FROM transaksi WHERE FROM_UNIXTIME(tgl_selesai, '%Y') = '2019' AND status ='selesai';")->num_rows();
        $data['p_2020'] = $this->db->query("SELECT * FROM transaksi WHERE FROM_UNIXTIME(tgl_selesai, '%Y') = '2020' AND status ='selesai';")->num_rows();
        $data['p_2021'] = $this->db->query("SELECT * FROM transaksi WHERE FROM_UNIXTIME(tgl_selesai, '%Y') = '2021' AND status ='selesai';")->num_rows();
        $data['p_2022'] = $this->db->query("SELECT * FROM transaksi WHERE FROM_UNIXTIME(tgl_selesai, '%Y') = '2022' AND status ='selesai';")->num_rows();
        $data['u_2018'] = $this->db->query("SELECT * FROM users WHERE FROM_UNIXTIME(tgl_buat, '%Y') = '2018'")->num_rows();
        $data['u_2019'] = $this->db->query("SELECT * FROM users WHERE FROM_UNIXTIME(tgl_buat, '%Y') = '2019'")->num_rows();
        $data['u_2020'] = $this->db->query("SELECT * FROM users WHERE FROM_UNIXTIME(tgl_buat, '%Y') = '2020'")->num_rows();
        $data['u_2021'] = $this->db->query("SELECT * FROM users WHERE FROM_UNIXTIME(tgl_buat, '%Y') = '2021'")->num_rows();
        $data['u_2022'] = $this->db->query("SELECT * FROM users WHERE FROM_UNIXTIME(tgl_buat, '%Y') = '2022'")->num_rows();



        $this->load->view('Templates/Header');
        $this->load->view('Templates/adminHeader', $data);
        $this->load->view('Admin/Laporan/Tahunan', $data);
        $this->load->view('Templates/adminFooter');
    }

    public function Bulanan()
    {
        $data['judulHalaman'] = "";

        $tahun = $this->input->get('tahun');
        if ($tahun != "") {
            $tahun = $this->input->get('tahun');
        } else {
            $tahun = "2022";
        }
        $data['judul'] = $tahun;


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
        $data['don_januari'] = $this->db->query("SELECT u.nama,FROM_UNIXTIME(d.tgl_buat, '%m-%Y'), count(d.id_user) as total_donasi FROM `donasi` as d LEFT JOIN users as u ON u.id_user=d.id_user WHERE FROM_UNIXTIME(d.tgl_buat, '%m-%Y') = '01-$tahun' GROUP by d.id_user;")->num_rows();
        $data['don_februari'] = $this->db->query("SELECT u.nama,FROM_UNIXTIME(d.tgl_buat, '%m-%Y'), count(d.id_user) as total_donasi FROM `donasi` as d LEFT JOIN users as u ON u.id_user=d.id_user WHERE FROM_UNIXTIME(d.tgl_buat, '%m-%Y') = '02-$tahun' GROUP by d.id_user;")->num_rows();
        $data['don_maret'] = $this->db->query("SELECT u.nama,FROM_UNIXTIME(d.tgl_buat, '%m-%Y'), count(d.id_user) as total_donasi FROM `donasi` as d LEFT JOIN users as u ON u.id_user=d.id_user WHERE FROM_UNIXTIME(d.tgl_buat, '%m-%Y') = '03-$tahun' GROUP by d.id_user;")->num_rows();
        $data['don_april'] = $this->db->query("SELECT u.nama,FROM_UNIXTIME(d.tgl_buat, '%m-%Y'), count(d.id_user) as total_donasi FROM `donasi` as d LEFT JOIN users as u ON u.id_user=d.id_user WHERE FROM_UNIXTIME(d.tgl_buat, '%m-%Y') = '04-$tahun' GROUP by d.id_user;")->num_rows();
        $data['don_mei'] = $this->db->query("SELECT u.nama,FROM_UNIXTIME(d.tgl_buat, '%m-%Y'), count(d.id_user) as total_donasi FROM `donasi` as d LEFT JOIN users as u ON u.id_user=d.id_user WHERE FROM_UNIXTIME(d.tgl_buat, '%m-%Y') = '05-$tahun' GROUP by d.id_user;")->num_rows();
        $data['don_juni'] = $this->db->query("SELECT u.nama,FROM_UNIXTIME(d.tgl_buat, '%m-%Y'), count(d.id_user) as total_donasi FROM `donasi` as d LEFT JOIN users as u ON u.id_user=d.id_user WHERE FROM_UNIXTIME(d.tgl_buat, '%m-%Y') = '06-$tahun'  GROUP by d.id_user;")->num_rows();
        $data['don_juni'] = $this->db->query("SELECT u.nama,FROM_UNIXTIME(d.tgl_buat, '%m-%Y'), count(d.id_user) as total_donasi FROM `donasi` as d LEFT JOIN users as u ON u.id_user=d.id_user WHERE FROM_UNIXTIME(d.tgl_buat, '%m-%Y') = '06-$tahun' GROUP by d.id_user; ")->num_rows();
        $data['don_juni'] = $this->db->query("SELECT u.nama,FROM_UNIXTIME(d.tgl_buat, '%m-%Y'), count(d.id_user) as total_donasi FROM `donasi` as d LEFT JOIN users as u ON u.id_user=d.id_user WHERE FROM_UNIXTIME(d.tgl_buat, '%m-%Y') = '06-$tahun' GROUP by d.id_user;")->num_rows();
        $data['don_juli'] = $this->db->query("SELECT u.nama,FROM_UNIXTIME(d.tgl_buat, '%m-%Y'), count(d.id_user) as total_donasi FROM `donasi` as d LEFT JOIN users as u ON u.id_user=d.id_user WHERE FROM_UNIXTIME(d.tgl_buat, '%m-%Y') = '07-$tahun' GROUP by d.id_user;")->num_rows();
        $data['don_agustus'] = $this->db->query("SELECT u.nama,FROM_UNIXTIME(d.tgl_buat, '%m-%Y'), count(d.id_user) as total_donasi FROM `donasi` as d LEFT JOIN users as u ON u.id_user=d.id_user WHERE FROM_UNIXTIME(d.tgl_buat, '%m-%Y') = '08-$tahun' GROUP by d.id_user;")->num_rows();
        $data['don_september'] = $this->db->query("SELECT u.nama,FROM_UNIXTIME(d.tgl_buat, '%m-%Y'), count(d.id_user) as total_donasi FROM `donasi` as d LEFT JOIN users as u ON u.id_user=d.id_user WHERE FROM_UNIXTIME(d.tgl_buat, '%m-%Y') = '09-$tahun' GROUP by d.id_user;")->num_rows();
        $data['don_oktober'] = $this->db->query("SELECT u.nama,FROM_UNIXTIME(d.tgl_buat, '%m-%Y'), count(d.id_user) as total_donasi FROM `donasi` as d LEFT JOIN users as u ON u.id_user=d.id_user WHERE FROM_UNIXTIME(d.tgl_buat, '%m-%Y') = '10-$tahun' GROUP by d.id_user;")->num_rows();
        $data['don_november'] = $this->db->query("SELECT u.nama,FROM_UNIXTIME(d.tgl_buat, '%m-%Y'), count(d.id_user) as total_donasi FROM `donasi` as d LEFT JOIN users as u ON u.id_user=d.id_user WHERE FROM_UNIXTIME(d.tgl_buat, '%m-%Y') = '11-$tahun' GROUP by d.id_user;")->num_rows();
        $data['don_desember'] = $this->db->query("SELECT u.nama,FROM_UNIXTIME(d.tgl_buat, '%m-%Y'), count(d.id_user) as total_donasi FROM `donasi` as d LEFT JOIN users as u ON u.id_user=d.id_user WHERE FROM_UNIXTIME(d.tgl_buat, '%m-%Y') = '12-$tahun' GROUP by d.id_user;")->num_rows();
        $data['p_januari'] = $this->db->query("SELECT * FROM `transaksi` WHERE FROM_UNIXTIME(tgl_selesai, '%m-%Y') = '01-$tahun' AND status ='selesai';")->num_rows();
        $data['p_februari'] = $this->db->query("SELECT * FROM `transaksi` WHERE FROM_UNIXTIME(tgl_selesai, '%m-%Y') = '02-$tahun' AND status ='selesai';")->num_rows();
        $data['p_maret'] = $this->db->query("SELECT * FROM `transaksi` WHERE FROM_UNIXTIME(tgl_selesai, '%m-%Y') = '03-$tahun' AND status ='selesai';")->num_rows();
        $data['p_april'] = $this->db->query("SELECT * FROM `transaksi` WHERE FROM_UNIXTIME(tgl_selesai, '%m-%Y') = '04-$tahun' AND status ='selesai';")->num_rows();
        $data['p_mei'] = $this->db->query("SELECT * FROM `transaksi` WHERE FROM_UNIXTIME(tgl_selesai, '%m-%Y') = '05-$tahun' AND status ='selesai';")->num_rows();
        $data['p_juni'] = $this->db->query("SELECT * FROM `transaksi` WHERE FROM_UNIXTIME(tgl_selesai, '%m-%Y') = '06-$tahun' AND status ='selesai';")->num_rows();
        $data['p_juli'] = $this->db->query("SELECT * FROM `transaksi` WHERE FROM_UNIXTIME(tgl_selesai, '%m-%Y') = '07-$tahun' AND status ='selesai';")->num_rows();
        $data['p_agustus'] = $this->db->query("SELECT * FROM `transaksi` WHERE FROM_UNIXTIME(tgl_selesai, '%m-%Y') = '08-$tahun' AND status ='selesai';")->num_rows();
        $data['p_september'] = $this->db->query("SELECT * FROM `transaksi` WHERE FROM_UNIXTIME(tgl_selesai, '%m-%Y') = '09-$tahun' AND status ='selesai';")->num_rows();
        $data['p_oktober'] = $this->db->query("SELECT * FROM `transaksi` WHERE FROM_UNIXTIME(tgl_selesai, '%m-%Y') = '10-$tahun' AND status ='selesai';")->num_rows();
        $data['p_november'] = $this->db->query("SELECT * FROM `transaksi` WHERE FROM_UNIXTIME(tgl_selesai, '%m-%Y') = '11-$tahun' AND status ='selesai';")->num_rows();
        $data['p_desember'] = $this->db->query("SELECT * FROM `transaksi` WHERE FROM_UNIXTIME(tgl_selesai, '%m-%Y') = '12-$tahun' AND status ='selesai';")->num_rows();
        $data['u_januari'] = $this->db->query("SELECT * FROM users WHERE FROM_UNIXTIME(tgl_buat, '%m-%Y') = '01-$tahun'")->num_rows();
        $data['u_februari'] = $this->db->query("SELECT * FROM users WHERE FROM_UNIXTIME(tgl_buat, '%m-%Y') = '02-$tahun'")->num_rows();
        $data['u_maret'] = $this->db->query("SELECT * FROM users WHERE FROM_UNIXTIME(tgl_buat, '%m-%Y') = '03-$tahun'")->num_rows();
        $data['u_april'] = $this->db->query("SELECT * FROM users WHERE FROM_UNIXTIME(tgl_buat, '%m-%Y') = '04-$tahun'")->num_rows();
        $data['u_mei'] = $this->db->query("SELECT * FROM users WHERE FROM_UNIXTIME(tgl_buat, '%m-%Y') = '05-$tahun'")->num_rows();
        $data['u_juni'] = $this->db->query("SELECT * FROM users WHERE FROM_UNIXTIME(tgl_buat, '%m-%Y') = '06-$tahun'")->num_rows();
        $data['u_juli'] = $this->db->query("SELECT * FROM users WHERE FROM_UNIXTIME(tgl_buat, '%m-%Y') = '07-$tahun'")->num_rows();
        $data['u_agustus'] = $this->db->query("SELECT * FROM users WHERE FROM_UNIXTIME(tgl_buat, '%m-%Y') = '08-$tahun'")->num_rows();
        $data['u_september'] = $this->db->query("SELECT * FROM users WHERE FROM_UNIXTIME(tgl_buat, '%m-%Y') = '09-$tahun'")->num_rows();
        $data['u_oktober'] = $this->db->query("SELECT * FROM users WHERE FROM_UNIXTIME(tgl_buat, '%m-%Y') = '10-$tahun'")->num_rows();
        $data['u_november'] = $this->db->query("SELECT * FROM users WHERE FROM_UNIXTIME(tgl_buat, '%m-%Y') = '11-$tahun'")->num_rows();
        $data['u_desember'] = $this->db->query("SELECT * FROM users WHERE FROM_UNIXTIME(tgl_buat, '%m-%Y') = '12-$tahun'")->num_rows();
        $data['d_total'] = $this->db->query("SELECT * FROM `donasi` WHERE FROM_UNIXTIME(tgl_buat, '%Y') = '$tahun';")->num_rows();
        $data['don_total'] = $this->db->query("SELECT u.nama,FROM_UNIXTIME(d.tgl_buat, '%Y'), count(d.id_user) as total_donasi FROM `donasi` as d LEFT JOIN users as u ON u.id_user=d.id_user WHERE FROM_UNIXTIME(d.tgl_buat, '%Y')='$tahun' GROUP by d.id_user;")->num_rows();
        $data['p_total'] = $this->db->query("SELECT * FROM transaksi WHERE FROM_UNIXTIME(tgl_selesai, '%Y') = '$tahun' AND status ='selesai';")->num_rows();
        $data['u_total'] = $this->db->query("SELECT * FROM users WHERE FROM_UNIXTIME(tgl_buat, '%Y') = '$tahun'")->num_rows();
        $this->load->view('Templates/Header');
        $this->load->view('Templates/adminHeader', $data);
        $this->load->view('Admin/Laporan/Bulanan', $data);
        $this->load->view('Templates/adminFooter');
    }
}
