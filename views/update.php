<?php
require_once 'controllers/ProductController.php';
?>
<link rel="stylesheet" href="views/css/update.css">
<form method="POST">
<h1 class="contact-heading">Update A Product</h1>

    <div class="form-controll">
        <label>Product Id</label>
        <input type="text" name="id" class="input" value="<?php echo get_one_product()->id ?>">
    </div>
    <div class="form-controll">
        <label>Product Image</label>
        <input type="file" name="image" class="file">
    </div>

    <div class="form-controll">
        <label>Product Name</label>
        <input type="text" name="name" class="input" value="<?php echo get_one_product()->name ?>">
    </div>
    <div class="form-controll">
        <label>Product Quantite</label>
        <input type="text" name="quantite" class="input" value="<?php echo get_one_product()->quantite ?>">
    </div>
    <div class="form-controll">
        <label>Product Price</label>
        <input type="text" name="price" class="input" value="<?php echo get_one_product()->price ?>">
    </div>

    <div class="form-controll">
        <button type="submit" name="update" class="update">Update</button>
    </div>

</form>