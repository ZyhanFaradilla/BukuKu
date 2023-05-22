<?php

class UserModel
{

	private $table = 'user';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getAllUser()
	{
		$this->db->query('SELECT * FROM ' . $this->table);
		return $this->db->resultSet();
	}

	public function getUserById($id)
	{
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
		$this->db->bind('id', $id);
		return $this->db->single();
	}

	public function tambahUser($data)
	{
		$query = "INSERT INTO user (username,password) VALUES(:username,:password)";
		$this->db->query($query);
		$this->db->bind('username', $data['username']);
		$this->db->bind('password', md5($data['password']));
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function cekUsername()
	{
		$username = $_POST['username'];
		$this->db->query("SELECT * FROM user WHERE username = :username");
		$this->db->bind('username', $username);
		return $this->db->single();
	}

	public function updateDataUser($data)
	{
		if (empty($_POST['password'])) {
			$query = "UPDATE user SET username=:username WHERE id=:id";
			$this->db->query($query);
			$this->db->bind('id', $data['id']);
			$this->db->bind('username', $data['username']);
		} else {
			$query = "UPDATE user SET username=:username, password=:password WHERE id=:id";
			$this->db->query($query);
			$this->db->bind('id', $data['id']);
			$this->db->bind('username', $data['username']);
			$this->db->bind('password', md5($data['password']));
		}

		$this->db->execute();

		return $this->db->rowCount();
	}

	public function deleteUser($id)
	{
		$this->db->query('DELETE FROM ' . $this->table . ' WHERE id=:id');
		$this->db->bind('id', $id);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function cariUser()
	{
		$key = $_POST['key'];
		$this->db->query("SELECT * FROM " . $this->table . " WHERE username LIKE :key");
		$this->db->bind('key', "%$key%");
		return $this->db->resultSet();
	}
}
