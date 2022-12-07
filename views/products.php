<?php require_once 'controllers/ProductController.php' ?>
<link rel="stylesheet" href="views/css/products.css">
<h2 class="welcome-heading">browse your favourite jeweleries now</h2>

<div class="cards">

    <?php
        foreach($product as $_product) {
            echo '<div class="card">
                <img src="views/images/' . $_product['image'] . '" alt="">
                <h3>' . $_product['name'] . '</h3>
                <h2>' . $_product['price'] . '$</h2>
                </div>';
        }
    ?>

    <!-- <div class="card">
        <img src="images/necklace.jpg" alt="">
        <h3>Necklace</h3>
        <h2>100 $</h2>
    </div>

    <div class="card">
        <img src="images/necklace.jpg" alt="">
        <h3>Necklace</h3>
        <h2>100 $</h2>
    </div>

    <div class="card">
        <img src="images/ring.jpg" alt="">
        <h3>Ring</h3>
        <h2>100 $</h2>
    </div>

    <div class="card">
        <img src="images/necklace.jpg" alt="">
        <h3>Necklace</h3>
        <h2>100 $</h2>
    </div>

    <div class="card">
        <img src="images/necklace.jpg" alt="">
        <h3>Necklace</h3>
        <h2>100 $</h2>
    </div>

    <div class="card">
        <img src="images/ring.jpg" alt="">
        <h3>Ring</h3>
        <h2>100 $</h2>
    </div>

    <div class="card">
        <img src="images/necklace.jpg" alt="">
        <h3>Necklace</h3>
        <h2>100 $</h2>
    </div>

    <div class="card">
        <img src="images/necklace.jpg" alt="">
        <h3>Necklace</h3>
        <h2>100 $</h2>
    </div> -->
</div>