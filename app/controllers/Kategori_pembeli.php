<?php

class Kategori_pembeli extends Controller
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
		$data['title'] = 'Data Kategori';
		$data['kategori'] = $this->model('KategoriModel')->getAllKategori();
		$this->view('templates_pembeli/header', $data);
		$this->view('templates_pembeli/sidebar', $data);
		$this->view('kategori_pembeli/index', $data);
		$this->view('templates_pembeli/footer');
	}
	public function cari()
	{
		$data['title'] = 'Data Kategori';
		$data['kategori'] = $this->model('KategoriModel')->cariKategori();
		$data['key'] = $_POST['key'];
		$this->view('templates_pembeli/header', $data);
		$this->view('templates_pembeli/sidebar', $data);
		$this->view('kategori_pembeli/index', $data);
		$this->view('templates_pembeli/footer');
	}
}
