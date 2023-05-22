<?php

class Register extends Controller
{
    public function index()
    {
        $this->view('register/index');
    }
    public function simpanUser()
    {
        if ($_POST['password'] == $_POST['ulangi_password']) {
            $row = $this->model('RegisterModel')->cekUsername();
            if ($row['username'] == $_POST['username']) {
                Flasher::setMessage('Gagal', 'Username yang anda masukan sudah pernah digunakan!', 'danger');
                header('location: ' . base_url . '/register');
                exit;
            } else {
                if ($this->model('RegisterModel')->tambahUser($_POST) > 0) {
                    Flasher::setMessage('Berhasil', 'ditambahkan', 'success');
                    header('location: ' . base_url . '/login_pembeli');
                    exit;
                } else {
                    Flasher::setMessage('Gagal', 'ditambahkan', 'danger');
                    header('location: ' . base_url . '/register');
                    exit;
                }
            }
        } else {
            Flasher::setMessage('Gagal', 'password tidak sama.', 'danger');
            header('location: ' . base_url . '/register');
            exit;
        }
    }
}
