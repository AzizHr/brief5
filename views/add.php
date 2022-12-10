<?php require_once 'controllers/ProductController.php' ?>
<link rel="stylesheet" href="views/css/add.css">
<form class="add-form" method="POST">
    <h1 class="contact-heading">Add New Product</h1>
    <div class="form-controll">
        <label>Product Image</label>
        <input type="file" name="image" class="file">
    </div>

    <div class="form-controll">
        <label>Product Name</label>
        <input type="text" placeholder="Enter product name"  name="name" class="input">
    </div>
    <div class="form-controll">
        <label>Product Quantite</label>
        <input type="text" placeholder="Enter product quantite" name="quantite" class="input">
    </div>
    <div class="form-controll">
        <label>Product Price</label>
        <input type="text" placeholder="Enter product price" name="price" class="input">
    </div>

    <div class="form-controll">
        <button type="submit" name="add" class="add">Add</button>
    </div>

</form>