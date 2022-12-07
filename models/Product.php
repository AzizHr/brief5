<?php

class Product extends Db {

    static public function getAll() {
        $stmt = Db::connect()->prepare('SELECT * FROM product');
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // static public function add($data) {
    //     $stmt = Db::connect()->prepare('INSERT INTO product (image , name , quantite , price) VALUES (:image , :name , :quantite , :price)');
    //     $stmt->bindParam(':image', $data['image']);
    //     $stmt->bindParam(':name', $data['name']);
    //     $stmt->bindParam(':quantite', $data['quantite']);
    //     $stmt->bindParam(':price', $data['price']);

    //     if($stmt->execute()) {
    //         return 'ok';
    //     }else {
    //         return 'error';
    //     }
    // }
    

    static public function update($data) {
        $stmt = Db::connect()->prepare('UPDATE product SET image = :image , name = :name , quantite = :quantite , price = :price WHERE id = :id');
        $stmt->bindParam(':id', $data['id']);
        $stmt->bindParam(':image', $data['image']);
        $stmt->bindParam(':name', $data['name']);
        $stmt->bindParam(':quantite', $data['quantite']);
        $stmt->bindParam(':price', $data['price']);

        if($stmt->execute()) {
            return 'ok';
        }else {
            return 'error';
        }
    }

    static public function getProduct($data) {
        $id = $data['id'];

        try {
            $query = 'SELECT * FROM product WHERE id = :id';
            $stmt = Db::connect()->prepare($query);
            $stmt->execute(array(":id" => $id));
            $employe = $stmt->fetch(PDO::FETCH_OBJ);
            return $employe;
        }catch(PDOException $e) {
            echo 'error' . $e->getMessage();
        }
    }

    // static public function delete($data) {
    //     $id = $data['id'];
    //     $query = 'DELETE FROM product WHERE id = :id';
    //     $stmt = Db::connect()->prepare($query);
    //     $stmt->bindParam(":id", $id);
    //     if($stmt->execute()) {
    //         return 'ok';
    //     }else {
    //         return 'error';
    //     }   
    // }

}