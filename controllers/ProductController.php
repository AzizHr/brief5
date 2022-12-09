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

    public function deleteOneProduct() {
        if(isset($_POST['delete'])) {
            if(isset($_POST['id'])) {
                $data['id'] = $_POST['id'];
                $product = Product::delete($data);
                if($product === 'ok') {
                    header('Location:management');
                }else {
                    echo $product;
                }
            }
        }
    }

    public function addProduct() {
        if(isset($_POST['add'])) {
            $data = array(
                'image' => $_POST['image'],
                'name' => $_POST['name'],
                'quantite' => $_POST['quantite'],
                'price' => $_POST['price']
            );

            $result = Product::add($data);

            if($result === 'ok') {
                header('Location:management');
            }else {
                echo $result;
            }
        }
    }

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
                header('Location:management');
            }else {
                echo $result;
            }
        }
    }
}

function get_all_products() {
    $products = new ProductController();
    $_products = $products->getAllProducts();
    return $_products;
}

function get_one_product() {
    if(isset($_POST['id'])) {
        $existProduct = new ProductController();
        $getIt = $existProduct->getOneProduct();
        return $getIt;
    }
}

function update_one_product() {
    if(isset($_POST['update'])) {
        $update = new ProductController();
        $update->updateProduct();
    }
}

update_one_product();

function add_new_product() {
    if(isset($_POST['add'])) {
        $add = new ProductController();
        $add->addProduct();
    }
}

add_new_product();

function delete_one_product() {
    $delete = new ProductController();
    $delete->deleteOneProduct();
}

delete_one_product();


