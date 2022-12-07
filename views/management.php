<?php require_once 'controllers/ProductController.php' ?>
<link rel="stylesheet" href="views/css/management.css">
<table>
    <tr>
        <th>Image</th>
        <th>Name</th>
        <th>Price</th>
        <th>Quantite</th>
        <th>Update</th>
        <th>Delete</th>
    </tr>

        <?php 
        
            foreach($product as $_product) {
            echo '<tr><td><img src="views/images/' . $_product['image'] . '" alt=""></td>
                <td>' . $_product['name'] . '</td>
                <td>' . $_product['price'] . '$</td>
                <td>' . $_product['quantite'] . '</td>
                <td><form action="update" method="post">
                    <input type="text"  name="edited" value="' . $_product['id'] . '" hidden>
                    <button class="fa fa-edit edit" name="edit"></button>
                </form></td>
                <td><form action="" method="post">
                    <input type="text" hidden name="removed" value="' . $_product['id'] . '">
                    <button class="fa fa-trash trash" name="remove"></button>
                </form></td></tr>';
            }
        
        ?>
    <!-- <tr>
        <td>Product1</td>
        <td>100 $</td>
        <td>12</td>
        <td><a href="" class="fa fa-edit edit"></a></td>
        <td><a href="" class="fa fa-trash trash"></a></td>
    </tr>
    <tr>
        <td>Product1</td>
        <td>100 $</td>
        <td>12</td>
        <td><a href="" class="fa fa-edit edit"></a></td>
        <td><a href="" class="fa fa-trash trash"></a></td>
    </tr> -->
</table>