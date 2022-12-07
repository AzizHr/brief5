<?php

$existProduct = new ProductController();
    if(isset($_POST['id'])) {
        $getIt = $existProduct->getOneProduct();
    }

?>
<link rel="stylesheet" href="views/css/update.css">
<form>
<h1 class="contact-heading">Update A Product</h1>

    <div class="form-controll">
        <label>Product Id</label>
        <input type="text" name="id" class="input">
    </div>
    <div class="form-controll">
        <label>Product Image</label>
        <input type="file" name="image" class="file">
    </div>

    <div class="form-controll">
        <label>Product Name</label>
        <input type="text" name="name" class="input">
    </div>
    <div class="form-controll">
        <label>Product Quantite</label>
        <input type="text" name="quantite" class="input">
    </div>
    <div class="form-controll">
        <label>Product Price</label>
        <input type="text" name="price" class="input">
    </div>

    <div class="form-controll">
        <button type="submit" name="update" class="update">Update</button>
    </div>

</form>