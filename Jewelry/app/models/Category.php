<?php
class Category
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    // Get All Categories
    public function getCategories(){
        $this->db->query('SELECT * FROM category');

        $row = $this->db->resultSet();

        if ($row) {
            return $row;
        } else {
            return false;
        }

      }
}
