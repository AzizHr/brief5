<?php

namespace App\controllers;

use App\core\Controller;
use App\models\Category;
use App\models\Product;

class Products extends Controller
{
    private $product;
    private $category;

    public function __construct()
    {
        $this->product = new Product;
        $this->category = new Category;
    }

    public function index()
    {
        if (!isset($_SESSION['admin_id'])) {
            redirect('admin/auth');
        }
        $products = $this->product->all();
        $data['products'] = $products;
        $this->view('dashboard/index', $data);
    }
    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $_POST = filter_input_array(INPUT_POST, 513);

            $categories = $this->category->getCategories();

            $data = [
                'image' => $_FILES['image']['name'],
                'name' => trim($_POST['name']),
                'quantite' => trim($_POST['quantite']),
                'price' => trim($_POST['price']),
                'id_cat' => trim($_POST['id_cat']),
                'image_err' => '',
                'name_err' => '',
                'quantite_err' => '',
                'price_err' => '',
                'categories' => $categories
            ];

            move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/' . $data['image']);

            if (empty($data['image'])) {
                $data['image'] = 'Pleae pick an image';
            }
            if (empty($data['name'])) {
                $data['name_err'] = 'Pleae enter a name';
            }

            if (empty($data['quantite'])) {
                $data['quantite_err'] = 'Pleae enter a quantite';
            }

            if (empty($data['price'])) {
                $data['price_err'] = 'Pleae enter a price';
            }

            // Make sure errors are empty
            if (empty($data['image_err']) && empty($data['name_err']) && empty($data['quantite_err'])  && empty($data['price_err'])) {

                if ($this->product->create($data)) {
                    redirect('products/index');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors
                $this->view('dashboard/add', $data);
            }
        } else {
            if (!isset($_SESSION['admin_id'])) {
                redirect('admin/auth');
            }
            $categories = $this->category->getCategories();
            $data = [
                'name' => '',
                'quantite' => '',
                'price' => '',
                'image_err' => '',
                'name_err' => '',
                'quantite_err' => '',
                'price_err' => '',
                'categories' => $categories
            ];

            // Load view
            $this->view('dashboard/add', $data);
        }
    }

    public function edit($id)
    {
        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $_POST = filter_input_array(INPUT_POST, 513);

            $data = [
                'image' => $_FILES['image']['name'],
                'name' => trim($_POST['name']),
                'quantite' => trim($_POST['quantite']),
                'price' => trim($_POST['price']),
                'id_cat' => trim($_POST['id_cat']),
                'image_err' => '',
                'name_err' => '',
                'quantite_err' => '',
                'price_err' => ''
            ];


            if (empty($data['name'])) {
                $data['name_err'] = 'Pleae enter a name';
            }

            if (empty($data['quantite'])) {
                $data['quantite_err'] = 'Pleae enter a quantite';
            }

            if (empty($data['price'])) {
                $data['price_err'] = 'Pleae enter a price';
            }

            // Make sure errors are empty
            if (empty($data['name_err']) && empty($data['quantite_err'])  && empty($data['price_err'])) {

                // die('Here 1');
                if (empty($data['image'])) {
                    if ($this->product->updateWithoutImage($id, $data)) {
                        redirect('products/index');
                    } else {
                        die('Something went wrong');
                    }
                } else {
                    if ($this->product->update($id, $data)) {
                        move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/' . $data['image']);
                        redirect('products/index');
                    } else {
                        die('Something went wrong');
                    }
                }
            } else {
                // Load view with errors
                $this->view('dashboard/edit', $data);
            }
        } else {
            if (!isset($_SESSION['admin_id'])) {
                redirect('admin/auth');
            }
            $product = $this->product->find($id);
            $categories = $this->category->getcategories();
            $data = [
                'image_err' => '',
                'name_err' => '',
                'quantite_err' => '',
                'price_err' => '',
                'categories' => $categories,
                'product' => $product
            ];

            // Load view
            $this->view('dashboard/edit', $data);
        }
    }
    public function get($id)
    {
        if (!isset($_SESSION['admin_id'])) {
            redirect('admin/auth');
        }
        $product = $this->product->find($id);
        $categories = $this->category->getcategories();
        $data = [
            'product' => $product,
            'categories' => $categories
        ];

        $this->view('dashboard/edit', $data);
    }

    public function delete($id)
    {
        if (!isset($_SESSION['admin_id'])) {
            redirect('admin/auth');
        }
        if ($this->product->delete($id)) {
            redirect('products/index');
        } else {
            redirect('products/index');
        }
    }
}
