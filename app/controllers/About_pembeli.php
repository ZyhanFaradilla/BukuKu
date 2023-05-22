<?php

class About_pembeli extends Controller
{
	public function __construct()
	{
		if ($_SESSION['session_login'] != 'sudah_login') {
			Flasher::setMessage('Login', 'Tidak ditemukan.', 'danger');
			header('location: ' . base_url . '/login_pembeli');
			exit;
		}
	}
	public function index()
	{
		$data['title'] = 'Halaman About BukuKu';

		$this->view('templates_pembeli/header', $data);
		$this->view('templates_pembeli/sidebar', $data);
		$this->view('about_pembeli/index', $data);
		$this->view('templates_pembeli/footer');
	}
}
