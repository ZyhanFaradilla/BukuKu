<?php

class Login_pembeli extends Controller
{
	public function index()
	{
		$data['title'] = 'Halaman Login';

		$this->view('login_pembeli/login', $data);
	}

	public function prosesLogin()
	{
		if ($row = $this->model('LoginModel')->checkLoginUser($_POST) > 0) {
			$_SESSION['username'] = $row['username'];
			$_SESSION['nama'] = $row['nama'];
			$_SESSION['session_login'] = 'sudah_login';

			//$this->model('LoginModel')->isLoggedIn($_SESSION['session_login']);

			header('location: ' . base_url . '/home_pembeli');
		} else {
			Flasher::setMessage('Username / Password', 'salah.', 'danger');
			header('location: ' . base_url . '/login_pembeli');
			exit;
		}
	}
}
