<?php

  class Database {
    
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_NAME;

    private $connection;
    private $statement;
    private $error;

    public function __construct()
    {

      $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
      $options = array(
        PDO::ATTR_PERSISTENT => true,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
      );

      try{
        $this-$connection = new PDO($dsn, $this->user, $this->pass, $options);
      } catch(PDOException $e){
        $this->error = $e->getMessage();
        echo $this->error;
      }
    }

    public function query($sql)
    {
      $this->statement = $this-$connection->prepare($sql);
    }

    public function execute(array $data = [])
    {
      return $this->statement->execute($data);
    }

    public function resultSet()
    {
      $this->execute();
      return $this->statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function single()
    {
      $this->execute();
      return $this->statement->fetch(PDO::FETCH_ASSOC);
    }

    public function count()
    {
      return $this->statement->rowCount();
    }
  }