<?php

namespace App\models;

use App\core\Database;

class Product
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function create($data)
    {
        $this->db->query('INSERT INTO product (image , name , quantite , price , id_cat) VALUES(:image, :name , :quantite , :price , :id_cat)');

        return $this->db->execute($data);
    }

    public function all()
    {
        $this->db->query('SELECT p.id , p.image , p.name , p.quantite , p.price , p.id_cat , c.id AS "cat_id" , c.name AS "cat_name" FROM product p , category c WHERE p.id_cat = c.id');

        return $this->db->all();
      }

    public function find($id)
    {
        $this->db->query('SELECT * FROM product WHERE id = :id');

        return $this->db->single(['id' => $id]);
    }


    public function update($id , $data)
    {
        $this->db->query('UPDATE product SET image = :image , name = :name , quantite = :quantite , price = :price , id_cat = :id_cat WHERE id = :id');

        $data['id'] = $id;

        if ($this->db->execute($data)) {
            return true;
        } else {
            return false;
        }
    }

    public function updateWithoutImage($id , $data)
    {
        $this->db->query('UPDATE product SET name = :name , quantite = :quantite , price = :price , id_cat = :id_cat WHERE id = :id');

        $data['id'] = $id;

        if ($this->db->execute($data)) {
            return true;
        } else {
            return false;
        }
    }
    public function delete($id)
    {
        $this->db->query('DELETE FROM product WHERE id = :id');

        if ($this->db->execute(['id' => $id])) {
            return true;
        } else {
            return false;
        }
    }
}
