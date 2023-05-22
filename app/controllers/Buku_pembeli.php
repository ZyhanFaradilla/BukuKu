<?php

class Buku_pembeli extends Controller
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
		$data['title'] = 'Data Buku';
		$data['buku'] = $this->model('BukuModel')->getAllBuku();
		$this->view('templates_pembeli/header', $data);
		$this->view('templates_pembeli/sidebar', $data);
		$this->view('buku_pembeli/index', $data);
		$this->view('templates_pembeli/footer');
	}

	public function addCart()
	{
		if ($this->model('CartModel')->addCartBuku($_POST) > 0) {
			Flasher::setMessage('Berhasil', 'diupdate', 'success');
			header('location: ' . base_url . '/buku_pembeli');
			exit;
		} else {
			Flasher::setMessage('Gagal', 'diupdate', 'danger');
			header('location: ' . base_url . '/buku_pembeli');
			exit;
		}
	}

	public function cari()
	{
		$data['title'] = 'Data Buku';
		$data['buku'] = $this->model('BukuModel')->cariBuku();
		$data['key'] = $_POST['key'];
		$this->view('templates_pembeli/header', $data);
		$this->view('templates_pembeli/sidebar', $data);
		$this->view('buku_pembeli/index', $data);
		$this->view('templates_pembeli/footer');
	}
}
