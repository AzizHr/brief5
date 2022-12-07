<?php

class Admin {

    static public function login($username , $password) {
        $query = 'SELECT * FROM admin   WHERE username = :username AND password = :password';
        $stmt = Db::connect()->prepare($query);
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":password", $password);
        $stmt->execute();
        $res = $stmt->fetch();
        return $res;
    }

}