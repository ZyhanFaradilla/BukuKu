<?php


class Cart extends Controller
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
        $data['title'] = 'Cart';
        $data['cart'] = $this->model('CartModel')->getAllBuku();
        $data['buku'] = $this->model('BukuModel')->getAllBuku();
        $this->view('templates_pembeli/header', $data);
        $this->view('templates_pembeli/sidebar', $data);
        $this->view('cart/index', $data);
        $this->view('templates_pembeli/footer');
    }
    public function hapus($id_cart)
    {
        if ($this->model('CartModel')->deleteCart($id_cart) > 0) {
            Flasher::setMessage('Berhasil', 'dihapus', 'success');
            header('location: ' . base_url . '/cart');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'dihapus', 'danger');
            header('location: ' . base_url . '/cart');
            exit;
        }
    }
    public function addDetailCart()
    {
        if ($this->model('CartModel')->addDetailCart($_POST) > 0) {
            Flasher::setMessage('Berhasil', 'diupdate', 'success');
            header('location: ' . base_url . '/cart');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'diupdate', 'danger');
            header('location: ' . base_url . '/cart');
            exit;
        }
    }
}
