<?php

namespace App\models;

use App\core\Database;

class Admin
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function login($email, $password)
  {
    $this->db->query('SELECT * FROM admin WHERE email = :email');

    $row = $this->db->single(['email' => $email]);

    $hashed_password = $row['password'];

    if ($password == $hashed_password) {
      return $row;
    } else {
      return false;
    }
  }

  public function findByEmail($email)
  {
    $this->db->query('SELECT * FROM admin WHERE email = :email');

    $row = $this->db->single(['email' => $email]);

    return $this->db->count() > 0 ? $row : false;
  }
}
