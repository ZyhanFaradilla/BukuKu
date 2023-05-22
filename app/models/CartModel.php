<?php
class CartModel
{
    private $table = 'cart';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllBuku()
    {
        $this->db->query("SELECT cart.*, buku.* FROM cart join buku on buku.id=cart.id");
        return $this->db->resultSet();
    }

    public function addCartBuku($data)
    {
        $query = "select * from cart where id_user='" . $data['id_user'] . "' and id='" . $data['id'] . "'";
        $this->db->query($query);
        $this->db->execute();
        if ($this->db->rowCount() > 0) {
            $dataJumlah = $this->getAllBuku()[0];
            $query = "UPDATE cart set jumlah='" . ($dataJumlah['jumlah'] + 1) . "' where id_user='" . $data['id_user'] . "' and id='" . $data['id'] . "'";
            $this->db->query($query);
            $this->db->execute();
        } else {
            $query = "INSERT INTO cart (id_user, id, jumlah) VALUES(:id_user, :id, :jumlah)";
            $this->db->query($query);
            $this->db->bind('id_user', $data['id_user']);
            $this->db->bind('id', $data['id']);
            $this->db->bind('jumlah', $data['jumlah']);
            $this->db->execute();
        }

        return $this->db->rowCount();
    }

    public function deleteCart($id_cart)
    {
        $this->getAllBuku();
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE id_cart=:id_cart');
        $this->db->bind('id_cart', $id_cart);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getAllCart()
    {
        $this->db->query("SELECT detail_cart.*, cart.* FROM detail_cart join cart on detail_cart.id_cart=cart.id_cart");
        return $this->db->resultSet();
    }

    public function addDetailCart($data)
    {

        $this->getAllCart();
        $query = "INSERT INTO detail_cart (id_detail, id_cart, id_buku) VALUES(:id_detail, :id_cart, :id_buku)";
        $this->db->query($query);
        $this->db->bind('id_detail', $data['id_detail']);
        $this->db->bind('id_cart', $data['id_cart']);
        $this->db->bind('id_buku', $data['id_buku']);
        $this->db->execute();

        return $this->db->rowCount();
    }
}
