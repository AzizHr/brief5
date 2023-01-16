<nav class="navbar navbar-expand-lg bg-light NAV">
        <div class="container">
            <a class="navbar-brand" href="<?php echo URLROOT ?>">
            <img src="<?php echo URLROOT ?>img/logo.svg" alt="">
            <span>
              JEWELLERY
            </span>
        </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <?php if(!isset($_SESSION['admin_id'])): ?>
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="<?php echo URLROOT ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo URLROOT ?>pages/products">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo URLROOT ?>pages/about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo URLROOT ?>pages/contact">Contact</a>
                    </li>
                </ul>
                <ul class="navbar-nav mx-auto d-flex gap-2">
                    <li class="nav-item">
                        <a class="btn btn-outline-dark" href="<?php echo URLROOT ?>/admin/auth">Login</a>
                    </li>
                </ul>
                <?php endif ?>
                <?php if(isset($_SESSION['admin_id'])): ?>
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="<?php echo URLROOT ?>products/index">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo URLROOT ?>products/add">Add New Product</a>
                    </li>
                </ul>
                <ul class="navbar-nav mx-auto d-flex gap-2">
                <li class="nav-item">
                        <a class="nav-link" href=""><?php echo $_SESSION['admin_name'] ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-outline-dark" href="<?php echo URLROOT ?>admin/logout">Logout</a>
                    </li>
                </ul>
                <?php endif ?>
            </div>
        </div>
    </nav>