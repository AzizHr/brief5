<?php

namespace App\controllers;

use App\core\Controller;
use App\models\Product;

class Pages extends Controller
{
  protected $product;

  public function __construct()
  {
    $this->product = new Product;
  }

  public function index()
  {
    if (isset($_SESSION['admin_id'])) {
      redirect('products/index');
    }
    $this->view('pages/index');
  }

  public function contact()
  {
    if (isset($_SESSION['admin_id'])) {
      redirect('products/index');
    }
    $this->view('pages/contact');
  }

  public function about()
  {
    if (isset($_SESSION['admin_id'])) {
      redirect('products/index');
    }
    $this->view('pages/about');
  }

  public function products()
  {
    if (isset($_SESSION['admin_id'])) {
      redirect('products/index');
    }
    $products = $this->product->all();
    $data = [
      'products' => $products
    ];
    $this->view('pages/products', $data);
  }
}
