<?php

class Auth_Admin extends CI_Controller
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
            $this->load->view('Auth/Admin/Login');
            $this->load->view('Templates/Footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('admin', ['email' => $email])->row_array();

        if ($user) {
            if ($user['is_active'] == 1) {
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'id_admin' => $user['id_admin'],
                        'email' => $user['email'],
                        'nama' => $user['nama'],
                    ];

                    $this->session->set_userdata($data);
                    redirect('Admin');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Password yang anda masukan salah
                    </div>');
                    redirect('Auth_Admin');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Email anda belum diaktivasi
                </div>');
                redirect('Auth_Admin');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Email anda belum terdaftar
                </div>');
            redirect('Auth_Admin');
        }
    }

    public function Registrasi()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Nama harus diisi'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[admin.email]', [
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

        if ($this->form_validation->run() == false) {
            $this->load->view('Templates/Header');
            $this->load->view('Auth/Admin/Registrasi');
            $this->load->view('Templates/Footer');
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'is_active' => 1,
                'tgl_buat' => date('Y-m-d H:i:s')
            ];

            $this->db->insert('admin', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Selamat akun anda berhasil dibuat! Silahkan Login
                </div>');
            redirect('Auth_Admin');
        }
    }
}
