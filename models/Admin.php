<?php

class Admin {

    static public function login($username , $password) {

        try {
            $query = 'SELECT * FROM admin   WHERE username = :username AND password = :password';
        $stmt = Db::connect()->prepare($query);
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":password", $password);
        $stmt->execute();
        $admin = $stmt->fetch();
        return $admin;
        }catch (PDOException $e) {
            return 'error' . $e->getMessage();
        }
        
    }

}