<?php

class Donasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_donasi');
    }
    public function index()
    {
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['jenis'] = $this->M_donasi->getAllJenis();
        $id_user = $this->session->userdata('id_user');
        $this->form_validation->set_rules('namaMakanan', 'Nama Makanan', 'required|trim', [
            'required' => 'Nama Makanan harus diisi'
        ]);

        $this->form_validation->set_rules('jenisMakanan', 'Jenis Makanan', 'required|trim', [
            'required' => 'Jenis Makanan harus diisi'
        ]);
        $this->form_validation->set_rules('stok', 'Jumlah Makanan', 'required|trim', [
            'required' => 'Jumlah Makanan harus diisi'
        ]);
        $this->form_validation->set_rules('kadaluarsa', 'Tanggal Kadaluarsa', 'required|trim', [
            'required' => 'Tanggal Kadaluarsa harus diisi'
        ]);
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim', [
            'required' => 'Deskripsi Makanan harus diisi'
        ]);
        $this->form_validation->set_rules('tglambil', 'Batas ambil', 'required|trim', [
            'required' => 'Batas ambil harus diisi'
        ]);
        $this->form_validation->set_rules('tglbatas', 'Waktu Ambil', 'required|trim', [
            'required' => 'Waktu Ambil harus diisi'
        ]);
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'required|trim', [
            'required' => 'Lokasi Ambil harus diisi'
        ]);
        $this->form_validation->set_rules('kelurahan', 'Kelurahan', 'required|trim', [
            'required' => 'Nama Kelurahan Harus Diisi'
        ]);
        $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required|trim', [
            'required' => 'Nama Kecamatan Harus Diisi'
        ]);
        $this->form_validation->set_rules('kota', 'Kota/Kabupaten', 'required|trim', [
            'required' => 'Nama Kota/Kabupaten Harus Diisi'
        ]);
        $this->form_validation->set_rules('provinsi', 'Provinsi', 'required|trim', [
            'required' => 'Nama Provinsi Harus Diisi'
        ]);
        $this->form_validation->set_rules('alamat_detail', 'Alamat', 'required|trim', [
            'required' => 'Detail Alamat harus diisi'
        ]);
        $this->form_validation->set_rules('jenisdonasi', 'Jenis Donasi', 'required|trim', [
            'required' => 'Jenis Donasi harus diisi'
        ]);
        if ($this->form_validation->run() == false || $id_user == 0) {
            $this->load->view('Templates/Header');
            $this->load->view('Templates/Navigation');
            $this->load->view('Donasi/Index', $data);
            $this->load->view('Templates/Footer');
        } else {
            $upload_gambar = $_FILES['gambarmakanan']['name'];
            if ($upload_gambar) {
                $config['upload_path']          = './assets/images/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 10000;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambarmakanan')) {
                    $gambar = $this->upload->data('file_name');
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $input = [
                'nama_produk' => htmlspecialchars($this->input->post('namaMakanan', true)),
                'id_jenis' => htmlspecialchars($this->input->post('jenisMakanan', true)),
                'id_user' => $this->session->userdata('id_user'),
                'stok' => $this->input->post('stok', true),
                'tgl_kadaluarsa' => $this->input->post('kadaluarsa', true),
                'deskripsi' => htmlspecialchars($this->input->post('deskripsi', true)),
                'tgl_ambil' => $this->input->post('tglambil', true),
                'jam_ambil' => $this->input->post('jamambil', true),
                'tgl_batas' => $this->input->post('tglbatas', true),
                'jam_batas' => $this->input->post('jambatas', true),
                'jenisdonasi' => htmlspecialchars($this->input->post('jenisdonasi', true)),
                'nama_donatur' => htmlspecialchars($this->input->post('nama', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'nohp' => htmlspecialchars($this->input->post('nohp', true)),
                'alamat' => htmlspecialchars($this->input->post('lokasi', true)),
                'kelurahan' => htmlspecialchars($this->input->post('kelurahan', true)),
                'kecamatan' => htmlspecialchars($this->input->post('kecamatan', true)),
                'kota' => htmlspecialchars($this->input->post('kota', true)),
                'provinsi' => htmlspecialchars($this->input->post('provinsi', true)),
                'alamat_detail' => htmlspecialchars($this->input->post('alamat_detail', true)),
                'latitude' => $this->input->post('lat', true),
                'longtitude' => $this->input->post('long', true),
                'gambarmakanan' => $gambar,
                'tgl_buat' => time()

            ];

            $this->M_donasi->insertdata($input);
            redirect('Makanan');
        }
    }

    public function Donasi_Saya()
    {
        $user = $this->session->userdata('id_user');
        $data['donasi'] = $this->M_donasi->donasiSaya($user);

        $this->load->view('Templates/Header');
        $this->load->view('Templates/Navigation');
        $this->load->view('Donasi/listdonasi', $data);
        $this->load->view('Templates/Footer');
        // $this->db->get_where('donasi', ['id_user' => $this->session->userdata('id_user')])->result_array();
    }

    public function updatestatus()
    {
        $status = $this->input->post('isidata');
        $id_transaksi = $this->input->post('id_transaksi');
        $tgl_pesan = time();
        $update = $this->db->query("UPDATE transaksi SET `status`='$status' , `tgl_selesai`='$tgl_pesan' WHERE id_transaksi='$id_transaksi' ");
        if ($update) {
            echo "Status berhasil diperbarui.";
        }
    }


    public function UpdateBatal()
    {
        $id_transaksi = $this->input->post('id_transaksi');
        $update =
            $this->db->delete('transaksi', ['id_transaksi' => $id_transaksi]);
        if ($update) {
            echo "Status berhasil diperbarui.";
        }
    }

    public function pesananSaya()
    {
        $user = $this->session->userdata('id_user');
        $data['pesanan'] = $this->M_donasi->pesananSaya($user);
        $this->load->view('Templates/Header');
        $this->load->view('Templates/Navigation');
        $this->load->view('Donasi/pesanan', $data);
        $this->load->view('Templates/Footer');
    }

    public function hapusDonasi($id_produk)
    {
        $this->M_donasi->hapusBarang($id_produk);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
               Donasi anda berhasil dihapus
                </div>');
        redirect('donasi/Donasi_Saya');
    }
}
