<?php require_once 'controllers/ProductController.php' ?>
<link rel="stylesheet" href="views/css/products.css">
<h2 class="welcome-heading">browse your favourite jeweleries now</h2>

<div class="cards">
    <?php
        foreach(get_all_products() as $_product) {
            echo '<div class="card">
                <img src="views/images/' . $_product['image'] . '" alt="">
                <h3>' . $_product['name'] . '</h3>
                <h2>' . $_product['price'] . '$</h2>
                </div>';
        }
    ?>
</div>