<?php

class Admin extends Controller {

  private $adminModel;

public function __construct()
{
  $this->adminModel = $this->model('AdminModel');
}
public function auth()
  {
    // Check for POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Process form
      // Sanitize POST data
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      // Init data
      $data = [
        'email' => trim($_POST['email']),
        'password' => trim($_POST['password']),
        'email_err' => '',
        'password_err' => '',
      ];

      // Validate Email
      if (empty($data['email'])) {
        $data['email_err'] = 'Pleae enter email';
      }

      // Validate Password
      if (empty($data['password'])) {
        $data['password_err'] = 'Please enter password';
      }

      // Check for user/email
      if ($this->adminModel->findAdminByEmail($data['email'])) {
        // User found

      } else {
        // User not found
        $data['email_err'] = 'No admin found';
      }

      // Make sure errors are empty
      if (empty($data['email_err']) && empty($data['password_err'])) {
        // Validated
        // Check and set logged in user
        $loggedInAdmin = $this->adminModel->login($data['email'], $data['password']);

        if ($loggedInAdmin) {
          // Create Session
          $this->createAdminSession($loggedInAdmin);
        } else {
          $data['password_err'] = 'Password incorrect';

          $this->view('admin/auth', $data);
        }
      } else {
        // Load view with errors
        $this->view('admin/auth', $data);
      }
    } else {
      if(isset($_SESSION['admin_id'])){
        redirect('products/index');
    }
      // Init data
      $data = [
        'email' => '',
        'password' => '',
        'email_err' => '',
        'password_err' => '',
      ];

      // Load view
      $this->view('admin/auth', $data);
    }
  }

  public function createAdminSession($admin)
  {
    $_SESSION['admin_id'] = $admin['id'];
    $_SESSION['admin_email'] = $admin['email'];
    $_SESSION['admin_name'] = $admin['name'];
    // $_SESSION['user_name'] = $user->first_name;
    redirect('products/index');
  }

  public function logout()
  {
    unset($_SESSION['admin_id']);
    unset($_SESSION['admin_email']);
    unset($_SESSION['admin_name']);
    session_destroy();
    redirect('admin/auth');
  }

  public function isLoggedIn()
  {
    if (isset($_SESSION['admin_id'])) {
      return true;
    } else {
      return false;
    }
  }

}