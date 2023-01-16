<?php
class Pages extends Controller
{
  public function __construct()
  {
    $this->productModel = $this->model('Product');
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
    $products = $this->productModel->getProducts();
    $data = [
      'products' => $products
    ];
    $this->view('pages/products', $data);
  }
}
