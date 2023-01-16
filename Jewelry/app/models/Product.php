<?php
class Product
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    // Add Port
    public function addProduct($data)
    {
        $this->db->query('INSERT INTO product (image , name , quantite , price , id_cat) VALUES(:image, :name , :quantite , :price , :id_cat)');
        // Bind values
        $this->db->bind(':image', $data['image']);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':quantite', $data['quantite']);
        $this->db->bind(':price', $data['price']);
        $this->db->bind(':id_cat', $data['id_cat']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Get All Ports
    public function getProducts(){
        $this->db->query('SELECT p.id , p.image , p.name , p.quantite , p.price , p.id_cat , c.id AS "cat_id" , c.name AS "cat_name" FROM product p , category c WHERE p.id_cat = c.id');

        $row = $this->db->resultSet();

        if ($row) {
            return $row;
        } else {
            return false;
        }

      }

    // Get One Port
    public function getProduct($id)
    {
        $this->db->query('SELECT * FROM product WHERE id = :id');
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        if ($row) {
            return $row;
        } else {
            return false;
        }
    }


    // Edit One Port
    public function editProduct($id , $data)
    {
        $this->db->query('UPDATE product SET image = :image , name = :name , quantite = :quantite , price = :price , id_cat = :id_cat WHERE id = :id');
        $this->db->bind(':id', $id);
        $this->db->bind(':image', $data['image']);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':quantite', $data['quantite']);
        $this->db->bind(':price', $data['price']);
        $this->db->bind(':id_cat', $data['id_cat']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function editProductWithoutImage($id , $data)
    {
        $this->db->query('UPDATE product SET name = :name , quantite = :quantite , price = :price , id_cat = :id_cat WHERE id = :id');
        $this->db->bind(':id', $id);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':quantite', $data['quantite']);
        $this->db->bind(':price', $data['price']);
        $this->db->bind(':id_cat', $data['id_cat']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    // Delete One Port
    public function deleteProduct($id)
    {
        $this->db->query('DELETE FROM product WHERE id = :id');
        $this->db->bind(':id', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
