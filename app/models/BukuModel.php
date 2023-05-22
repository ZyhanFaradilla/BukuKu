<?php

class BukuModel
{

	private $table = 'buku';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getAllBuku()
	{
		$this->db->query("SELECT buku.*, kategori.nama_kategori FROM " . $this->table . " JOIN kategori ON kategori.id = buku.kategori_id");
		return $this->db->resultSet();
	}

	public function getBukuById($id)
	{
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
		$this->db->bind('id', $id);
		return $this->db->single();
	}

	public function tambahBuku($data)
	{
		$query = "INSERT INTO buku (judul, penerbit, pengarang, tahun, kategori_id, harga, gambar, keterangan) VALUES(:judul, :penerbit, :pengarang, :tahun, :kategori_id, :harga, :gambar, :keterangan)";
		$this->db->query($query);
		$this->db->bind('judul', $data['judul']);
		$this->db->bind('penerbit', $data['penerbit']);
		$this->db->bind('pengarang', $data['pengarang']);
		$this->db->bind('tahun', $data['tahun']);
		$this->db->bind('kategori_id', $data['kategori_id']);
		$this->db->bind('harga', $data['harga']);
		$this->db->bind('keterangan', $data['keterangan']);
		$this->db->bind('gambar', $data['gambar'] = $this->upload());
		$this->db->execute();
		return $this->db->rowCount();
	}
	public function upload()
	{
		$namaFile = $_FILES["gambar"]["name"];
		$ukuranFile = $_FILES["gambar"]["size"];
		$error = $_FILES["gambar"]["error"];
		$tmpName = $_FILES["gambar"]["tmp_name"];

		if ($error === 4) {
			echo "<script>
            alert('pilih gambar terlebih dahulu!');
            </script>";
			return false;
		}

		$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
		$ekstensiGambar = explode('.', $namaFile);
		$ekstensiGambar = strtolower(end($ekstensiGambar));
		if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
			echo "<script>
            alert('yang anda upload bukan gambar!');
            </script>";
			return false;
		}

		if ($ukuranFile > 1000000) {
			echo "<script>
            alert('ukuran gambar terlalu besar!');
            </script>";
		}

		$namaFileBaru = uniqid();
		$namaFileBaru .= ".";
		$namaFileBaru .= $ekstensiGambar;

		move_uploaded_file($tmpName, '../public/dist/img/' . $namaFileBaru);

		return $namaFileBaru;
	}

	public function updateDataBuku($data)
	{
		$query = "UPDATE buku SET judul=:judul, penerbit=:penerbit, pengarang=:pengarang, pengarang=:pengarang, tahun=:tahun, kategori_id=:kategori_id, harga=:harga, gambar=:gambar, keterangan=:keterangan WHERE id=:id";
		$this->db->query($query);
		$this->db->bind('id', $data['id']);
		$this->db->bind('judul', $data['judul']);
		$this->db->bind('penerbit', $data['penerbit']);
		$this->db->bind('pengarang', $data['pengarang']);
		$this->db->bind('tahun', $data['tahun']);
		$this->db->bind('kategori_id', $data['kategori_id']);
		$this->db->bind('harga', $data['harga']);
		$this->db->bind('keterangan', $data['keterangan']);
		$this->db->bind('gambar', $data['gambar'] = $this->upload());
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function deleteBuku($id)
	{
		$this->db->query('DELETE FROM ' . $this->table . ' WHERE id=:id');
		$this->db->bind('id', $id);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function cariBuku()
	{
		$key = $_POST['key'];
		$this->db->query("SELECT * FROM " . $this->table . " WHERE judul LIKE :key");
		$this->db->bind('key', "%$key%");
		return $this->db->resultSet();
	}
}
