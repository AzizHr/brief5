<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="container mt-5">
<a href="<?php echo URLROOT;  ?>products/add" class="btn btn-sm btn-success"><i class="fa fa-plus me-2"></i>Add New Port</a>
</div>
<div class="mx-auto text-center my-5 overflow-scroll">
    <table class="container mt-5 table table-hover">
    
    <thead>
            <tr>
                <th>Id</th>
                <th>Image</th>
                <th>Name</th>
                <th>Quantite</th>
                <th>Price</th>
                <th>Category</th>
                <th>Operations</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['products'] as $product) : ?>
                <tr>
                    <td><?php echo $product['id'] ?></td>
                    <td><img style="width: 80px; height:80px;" src="<?php echo URLROOT . 'uploads/' . $product['image'] ?>" alt=""></td>
                    <td><?php echo $product['name'] ?></td>
                    <td><?php echo $product['quantite'] ?></td>
                    <td><?php echo $product['price'] ?></td>
                    <td><?php echo $product['cat_name'] ?></td>
                    
                    <td>
                        <a href="<?php echo URLROOT . 'products/get/' . $product['id'] ?>" class="btn btn-sm btn-warning m-2"><i class="fa fa-edit"></i></a>
                        <a href="<?php echo URLROOT . 'products/delete/' . $product['id'] ?>" class="btn btn-sm btn-danger m-2"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>