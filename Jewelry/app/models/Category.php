<?php

namespace App\models;

use App\core\Database;

class Category
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getCategories()
    {
        $this->db->query('SELECT * FROM category');

        $row = $this->db->resultSet();

        return $this->db->count() > 0 ? $row : false;

      }
}
