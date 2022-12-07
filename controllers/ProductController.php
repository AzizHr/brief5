<?php

class ProductController{

    public function getAllProducts(){

        $products = Product::getAll();
        return $products;
    }

    public function getOneProduct() {
        if(isset($_POST['id'])) {
            $data = array(
                'id' => $_POST['id']
            );
            $product = Product::getProduct($data);
            return $product;
        }
    }

    // public function deleteOneProduct() {
    //     if(isset($_POST['id'])) {
    //         $data['id'] = $_POST['id'];
    //         $product = Product::delete($data);
    //         if($product === 'ok') {
    //             Session::set('success', 'Employe Deleted');
    //             Redirect::to('home');
    //         }else {
    //             echo $product;
    //         }
    //     }
    // }

    // public function addProduct() {
    //     if(isset($_POST['submit'])) {
    //         $data = array(
    //             'nom' => $_POST['nom'],
    //             'prenom' => $_POST['prenom'],
    //             'matricule' => $_POST['matricule'],
    //             'poste' => $_POST['poste'],
    //             'status' => $_POST['status']
    //         );

    //         $result = Product::add($data);

    //         if($result === 'ok') {
    //             Session::set('success', 'Employe Added');
    //             Redirect::to('home');
    //         }else {
    //             echo $result;
    //         }
    //     }
    // }

    public function updateProduct() {

        if(isset($_POST['update'])) {
            $data = array(
                'id' => $_POST['id'],
                'image' => $_POST['image'],
                'name' => $_POST['name'],
                'quantite' => $_POST['quantite'],
                'price' => $_POST['price']
            );

            $result = Product::update($data);

            if($result === 'ok') {
                header('Location:views/management');
            }else {
                echo $result;
            }
        }
    }
}

$products = new ProductController();
$product = $products->getAllProducts();


