<?php

namespace App\core;

use PDO;
use PDOException;

class Database
{

  private $host = DB_HOST;
  private $port = DB_PORT;
  private $user = DB_USER;
  private $pass = DB_PASS;
  private $dbname = DB_NAME;

  private $connection;
  private $statement;

  public function __construct()
  {

    $dsn = "pgsql:host=" . $this->host . ";port=" . $this->port . ";dbname=" . $this->dbname;
    $options = array(
      PDO::ATTR_PERSISTENT => true,
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    );

    try {
      $this->connection = new PDO($dsn, $this->user, $this->pass, $options);
      echo 'Connected successfully' . '<br />';
    } catch (PDOException $e) {
      echo $e->getMessage() . '<br />';
    }
  }

  public function query($sql)
  {
    $this->statement = $this->connection->prepare($sql);
  }

  public function execute(array $data = [])
  {
    return $this->statement->execute($data);
  }

  public function all($data = [])
  {
    $this->execute($data);
    return $this->statement->fetchAll(PDO::FETCH_OBJ);
  }

  public function single($data = [])
  {
    $this->execute($data);
    return $this->statement->fetch(PDO::FETCH_OBJ);
  }

  public function count()
  {
    return $this->statement->rowCount();
  }
}
