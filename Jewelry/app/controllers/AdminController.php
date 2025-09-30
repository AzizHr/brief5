<?php

namespace App\controllers;

use App\core\Controller;
use App\models\Admin;

class AdminController extends Controller
{
  private $admin;

  public function __construct()
  {
    $this->admin = new Admin;
  }

  public function showLogin()
  {
    $this->view('admin/auth');
  }
}
