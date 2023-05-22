<?php

class RegisterModel
{
    private $table = 'user';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function cekUsername()
    {
        $username = $_POST['username'];
        $this->db->query("SELECT * FROM user WHERE username = :username");
        $this->db->bind('username', $username);
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
}
