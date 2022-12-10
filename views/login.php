<?php require_once 'controllers/AdminController.php' ?>
<?php 
if(isset($_SESSION['logged'])) {
    header('Location:' . BASE_URL . 'management');
}

?>
<link rel="stylesheet" href="views/css/login.css">
<form class="form" method="post">
    <h1>Welcome Back !!</h1>
    <div class="form-controll">
        <label>Username</label>
        <input type="text" name="username" placeholder="Enter your username">
    </div>
    <div class="form-controll">
        <label>Password</label>
        <input type="password" name="password" placeholder="Enter your password">
    </div>

    <button type="submit" name="login">Login</button>
</form>