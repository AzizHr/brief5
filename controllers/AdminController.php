<?php

class AdminController {

    public function loginAdmin() {

        if(isset($_POST['login'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $admin = Admin::login($username, $password);
            
            return $admin;
        }
    }

    public function logout() {
        if(isset($_POST['logout'])) {
            session_unset();
            session_destroy();
            header('Location:' . BASE_URL . 'login');
        }
    }

}

function logging() {
    if(isset($_POST['login'])) {
        $admin = new AdminController();
        $data = $admin->loginAdmin();
        if($data){
            $_SESSION['logged'] = $data['username'];
            header('Location:' . BASE_URL . 'management');
        }
        
        
    }
}
logging();