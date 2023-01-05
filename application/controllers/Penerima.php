<?php

class Penerima extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_donasi');
        $this->load->helper('date');
    }
    public function index()
    {

        $data['transaksi'] = $this->db->query("SELECT tgl_selesai, status FROM transaksi")->result_array();
        $tgl = date('d-m-Y');
        $h_1 = date('d-m-Y', mktime(0, 0, 0, date('n'), date('j') - 1, date('Y')));
        $h_2 = date('d-m-Y', mktime(0, 0, 0, date('n'), date('j') - 2, date('Y')));
        $h_3 = date('d-m-Y', mktime(0, 0, 0, date('n'), date('j') - 3, date('Y')));
        $h_4 = date('d-m-Y', mktime(0, 0, 0, date('n'), date('j') - 4, date('Y')));
        $h_5 = date('d-m-Y', mktime(0, 0, 0, date('n'), date('j') - 5, date('Y')));
        $h_6 = date('d-m-Y', mktime(0, 0, 0, date('n'), date('j') - 6, date('Y')));
        $tahun = date('Y');
        $data['totalpenerima'] = $this->db->query("SELECT * FROM transaksi WHERE FROM_UNIXTIME(tgl_selesai,  '%d-%m-%Y') = '$tgl' AND status ='selesai' AND penerima = 'Penerima'")->num_rows();
        $data['penerimah1'] = $this->db->query("SELECT * FROM transaksi WHERE FROM_UNIXTIME(tgl_selesai,  '%d-%m-%Y') = '$h_1' AND status ='selesai' AND penerima = 'Penerima'")->num_rows();
        $data['penerimah2'] = $this->db->query("SELECT * FROM transaksi WHERE FROM_UNIXTIME(tgl_selesai,  '%d-%m-%Y') = '$h_2' AND status ='selesai' AND penerima = 'Penerima'")->num_rows();
        $data['penerimah3'] = $this->db->query("SELECT * FROM transaksi WHERE FROM_UNIXTIME(tgl_selesai,  '%d-%m-%Y') = '$h_3' AND status ='selesai' AND penerima = 'Penerima'")->num_rows();
        $data['penerimah4'] = $this->db->query("SELECT * FROM transaksi WHERE FROM_UNIXTIME(tgl_selesai,  '%d-%m-%Y') = '$h_4' AND status ='selesai' AND penerima = 'Penerima'")->num_rows();
        $data['penerimah5'] = $this->db->query("SELECT * FROM transaksi WHERE FROM_UNIXTIME(tgl_selesai,  '%d-%m-%Y') = '$h_5' AND status ='selesai' AND penerima = 'Penerima'")->num_rows();
        $data['penerimah6'] = $this->db->query("SELECT * FROM transaksi WHERE FROM_UNIXTIME(tgl_selesai,  '%d-%m-%Y') = '$h_6' AND status ='selesai' AND penerima = 'Penerima'")->num_rows();
        $data['totalrelawan'] = $this->db->query("SELECT * FROM transaksi WHERE FROM_UNIXTIME(tgl_selesai,  '%d-%m-%Y') = '$tgl' AND status ='selesai' AND penerima = 'Relawan'")->num_rows();
        $data['relawanh1'] = $this->db->query("SELECT * FROM transaksi WHERE FROM_UNIXTIME(tgl_selesai,  '%d-%m-%Y') = '$h_1' AND status ='selesai' AND penerima = 'Relawan'")->num_rows();
        $data['relawanh2'] = $this->db->query("SELECT * FROM transaksi WHERE FROM_UNIXTIME(tgl_selesai,  '%d-%m-%Y') = '$h_2' AND status ='selesai' AND penerima = 'Relawan'")->num_rows();
        $data['relawanh3'] = $this->db->query("SELECT * FROM transaksi WHERE FROM_UNIXTIME(tgl_selesai,  '%d-%m-%Y') = '$h_3' AND status ='selesai' AND penerima = 'Relawan'")->num_rows();
        $data['relawanh4'] = $this->db->query("SELECT * FROM transaksi WHERE FROM_UNIXTIME(tgl_selesai,  '%d-%m-%Y') = '$h_4' AND status ='selesai' AND penerima = 'Relawan'")->num_rows();
        $data['relawanh5'] = $this->db->query("SELECT * FROM transaksi WHERE FROM_UNIXTIME(tgl_selesai,  '%d-%m-%Y') = '$h_5' AND status ='selesai' AND penerima = 'Relawan'")->num_rows();
        $data['relawanh6'] = $this->db->query("SELECT * FROM transaksi WHERE FROM_UNIXTIME(tgl_selesai,  '%d-%m-%Y') = '$h_6' AND status ='selesai' AND penerima = 'Relawan'")->num_rows();
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
        $hari_input = $this->input->get('hari');
        if ($hari_input != "") {
            $hari_input = $this->input->get('hari');
        } else {
            $hari_input = 14;
        }
        $tgl_1 = strtotime(date('d-m-Y', mktime(0, 0, 0, date('n'), date('j') -  $hari_input, date('Y'))));
        $data['testimoni'] = $this->M_donasi->testimoni($tgl_1);
        $this->load->view('Templates/Header');
        $this->load->view('Templates/Navigation');
        $this->load->view('Testimoni/Index', $data);
        $this->load->view('Templates/Footer');
    }

    public function isiTesti($id_transaksi)
    {
        $data['id_transaksi'] = $this->db->get_where('transaksi', ['id_transaksi' => $id_transaksi])->row_array();
        $this->load->view('Templates/Header');
        $this->load->view('Templates/Navigation');
        $this->load->view('Testimoni/IsiTesti', $data);
        $this->load->view('Templates/Footer');
    }

    public function FormTesti()
    {
        $id_transaksi = $this->input->post('id_transaksi');
        $data['id_transaksi'] = $this->db->get_where('transaksi', ['id_transaksi' => $id_transaksi])->row_array();

        $this->form_validation->set_rules('pesantesti', 'Pesan Testi', 'required|trim', [
            'required' => 'Pesan Harus Diisi'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view('Templates/Header');
            $this->load->view('Templates/Navigation');
            $this->load->view('Testimoni/IsiTesti', $data);
            $this->load->view('Templates/Footer');
        } else {
            $upload_gambar = $_FILES['gambartesti']['name'];
            if ($upload_gambar) {
                $config['upload_path']          = './assets/images/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg|mp4|webm|ogv';
                $config['max_size']             = 100000;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambartesti')) {
                    $gambar = $this->upload->data('file_name');
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $input = [
                'id_transaksi' => $this->input->post('id_transaksi'),
                'id_produk' => $this->input->post('id_produk'),
                'id_user' => $this->session->userdata('id_user'),
                'gambartesti' => $gambar,
                'pesantesti' => htmlspecialchars($this->input->post('pesantesti', true)),
                'tgl_testi' => time()

            ];

            $this->db->insert('testimoni', $input);
            redirect('Penerima');
        }
    }
}
