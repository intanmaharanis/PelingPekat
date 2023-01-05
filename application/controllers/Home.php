<?php

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_donasi');
    }
    public function index()
    {

        $data['jumlah'] =  $this->db->count_all('donasi');
        $data['transaksi'] =  $this->db->count_all('transaksi');
        $donatur = $this->db->query("SELECT u.nama,count(d.id_user) as total_donasi FROM `donasi` as d LEFT JOIN users as u ON u.id_user=d.id_user GROUP by d.id_user ORDER BY total_donasi DESC LIMIT 4;")->result_array();
        if (count($donatur) < 1) {
            $data['top_1'] = "TOP 1";
            $data['top_2'] = "TOP 2";
            $data['top_3'] = "TOP 3";
            $data['jml_top_1'] = 0;
            $data['jml_top_2'] = 0;
            $data['jml_top_3'] = 0;
        } else if (count($donatur) < 2) {
            $data['top_1'] = $donatur[0]['nama'];
            $data['top_2'] = "TOP 2";
            $data['top_3'] = "TOP 3";
            $data['jml_top_1'] = $donatur[0]['total_donasi'];
            $data['jml_top_2'] = 0;
            $data['jml_top_3'] = 0;
        } else if (count($donatur) < 3) {
            $data['top_1'] = $donatur[0]['nama'];
            $data['top_2'] = $donatur[1]['nama'];
            $data['top_3'] = "TOP 3";
            $data['jml_top_1'] = $donatur[0]['total_donasi'];
            $data['jml_top_2'] = $donatur[1]['total_donasi'];
            $data['jml_top_3'] = 0;
        } else {
            $data['top_1'] = $donatur[0]['nama'];
            $data['top_2'] = $donatur[1]['nama'];
            $data['top_3'] = $donatur[2]['nama'];
            $data['jml_top_1'] = $donatur[0]['total_donasi'];
            $data['jml_top_2'] = $donatur[1]['total_donasi'];
            $data['jml_top_3'] = $donatur[2]['total_donasi'];
        }
        $data['selesai'] =  $this->db->query("SELECT * FROM transaksi WHERE status = 'selesai'")->num_rows();
        $data['jmldonatur'] = $this->db->query("SELECT COUNT(id_user) FROM donasi GROUP BY id_user;")->result_array();
        $this->load->view('Templates/Header');
        $this->load->view('Templates/Navigation');
        $this->load->view('Home/Index', $data);
        $this->load->view('Templates/Footer');
    }

    public function makanantersedia()
    {
        $lat = $this->input->post('lat');
        $long = $this->input->post('long');
        var_dump($lat);
        $data['list'] = $this->db->query("SELECT * , CONCAT(ROUND((6371 * acos( cos( radians(d.latitude) ) * cos( radians( $lat ) ) * cos( radians( $long ) - radians(d.longtitude) ) + sin( radians(d.latitude) ) * sin( radians( $lat ) ) ) ),3),'') as distance FROM donasi as d
         ORDER BY CONCAT(ROUND((6371 * acos( cos( radians(d.latitude) ) * cos( radians( $lat ) ) * cos( radians( $long ) - radians(d.longtitude) ) + sin( radians(d.latitude) ) * sin( radians( $lat ) ) ) ),1),'') 
        ");;
        $this->load->view('home/display', $data);
    }
}
