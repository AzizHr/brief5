<?php

class AdminController {

    public function loginAdmin() {

        if(isset($_POST['login'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $admin = Admin::login($username, $password);

            if($admin['username'] == $username && $admin['password'] == $password) {
                $management = new HomeController();
                $management->index('management');
            }
            else {
                echo 'error';
            }
        }
    }

}

$admin = new AdminController();
$admin->loginAdmin();