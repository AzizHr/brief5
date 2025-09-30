<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="container my-5">
    <div class="row mt-5">
        <div class="col-md-6 mx-auto">
            <h2>Add A Product</h2>
            <p>Please fill out this form to add a product</p>
            <form action="<?php echo URLROOT . 'products/add' ?>" method="post" enctype="multipart/form-data">
                <div class="form-group mt-3">
                    <label for="name">Name: <sup>*</sup></label>
                    <input type="text" name="name" class="form-control form-control-lg <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['name'] ; ?>">
                    <span class="invalid-feedback"><?php echo $data['name_err']; ?></span>
                </div>
                <div class="form-group mt-3">
                    <label for="name">Quantite: <sup>*</sup></label>
                    <input type="number" name="quantite" class="form-control form-control-lg <?php echo (!empty($data['quantite_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['quantite'] ; ?>">
                    <span class="invalid-feedback"><?php echo $data['quantite_err']; ?></span>
                </div>
                <div class="form-group mt-3">
                    <label for="name">Price: <sup>*</sup></label>
                    <input type="text" name="price" class="form-control form-control-lg <?php echo (!empty($data['price_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['price'] ; ?>">
                    <span class="invalid-feedback"><?php echo $data['price_err']; ?></span>
                </div>
                <div class="form-group mt-3">
                    <label for="name">Image: <sup>*</sup></label>
                    <input type="file" name="image" class="form-control form-control-lg <?php echo (!empty($data['image_err'])) ? 'is-invalid' : ''; ?>">
                    <span class="invalid-feedback"><?php echo $data['image_err']; ?></span>
                </div>
                <div class="form-group mt-3">
                    <label for="id_cat">Choose a category: <sup>*</sup></label>
                    <select name="id_cat" class="form-select form-select-lg">
                    <?php foreach($data['categories'] as $category): ?>
                        <option value="<?php echo $category['id'] ?>"><?php echo $category['name'] ?></option>
                    <?php endforeach ?>
                </select>
                </div>
                
                <div class="row mt-3">
                    <div class="col">
                        <input type="submit" value="Add" class="btn btn-success btn-block">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>