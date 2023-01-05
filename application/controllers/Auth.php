<?php

class Auth extends CI_Controller
{

    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
            'required' => 'Email harus diisi',
            'valid_email' => 'Email Tidak Valid',
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim', [
            'required' => 'Password harus diisi'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('Templates/Header');
            $this->load->view('Auth/Login');
        } else {
            $this->_login();
        }
    }
    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('users', ['email' => $email])->row_array();

        if ($user) {
            if ($user['is_active'] == 1) {
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'id_user' => $user['id_user'],
                        'email' => $user['email'],
                        'nama' => $user['nama'],
                        'no_hp' => $user['no_hp']
                    ];

                    $this->session->set_userdata($data);
                    redirect('Makanan');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Password yang anda masukan salah
                    </div>');
                    redirect('Auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Email anda belum diaktivasi
                </div>');
                redirect('Auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Email anda belum terdaftar
                </div>');
            redirect('Auth');
        }
    }
    public function Registrasi()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Nama harus diisi'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]', [
            'required' => 'Email harus diisi',
            'valid_email' => 'Email Tidak Valid',
            'is_unique' => 'Email sudah terdaftar'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|matches[password2]', [
            'required' => 'Password harus diisi',
            'min_length' => 'Password terlalu pendek',
            'matches' => 'Password tidak sama'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
        $this->form_validation->set_rules('nohp', 'Nomor Handphone', 'required|trim|max_length[13]|min_length[10]', [
            'required' => 'Nomor Handphone harus diisi',
            'max_length' => 'Nomor Handphone tidak valid',
            'min_length' => 'Nomor Handphone tidak valid'
        ]);
        $this->form_validation->set_rules('usia', 'Usia', 'required|trim', [
            'required' => 'Silahkan Masukkan Usia Anda'
        ]);
        $this->form_validation->set_rules('jeniskelamin', 'Jenis Kelamin', 'required|trim', [
            'required' => 'Jenis Kelamin harus diisi'
        ]);
        $this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required|trim', [
            'required' => 'Silahkan Masukkan Pekerjaan Anda'
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
            'required' => 'Alamat harus diisi'
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



        if ($this->form_validation->run() == false) {
            $this->load->view('Templates/Header');
            $this->load->view('Auth/Registrasi');
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'usia' => htmlspecialchars($this->input->post('usia', true)),
                'jeniskelamin' => htmlspecialchars($this->input->post('jeniskelamin', true)),
                'pekerjaan' => htmlspecialchars($this->input->post('pekerjaan', true)),
                'no_hp' => htmlspecialchars($this->input->post('nohp', true)),
                'alamat' => htmlspecialchars($this->input->post('alamat', true)),
                'kelurahan' => htmlspecialchars($this->input->post('kelurahan', true)),
                'kecamatan' => htmlspecialchars($this->input->post('kecamatan', true)),
                'kota' => htmlspecialchars($this->input->post('kota', true)),
                'provinsi' => htmlspecialchars($this->input->post('provinsi', true)),
                'is_active' => 1,
                'tgl_buat' => time()
            ];

            $this->db->insert('users', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Selamat akun anda berhasil dibuat! Silahkan Login
                </div>');
            redirect('Auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('id_user');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('nama');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Kamu berhasil keluar 
                </div>');
        redirect('');
    }
}
