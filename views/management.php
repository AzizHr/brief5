<?php require_once 'controllers/AdminController.php' ?>
<?php require_once 'controllers/ProductController.php' ?>
<?php 

if(!isset($_SESSION['logged'])) {
    header('Location:' . BASE_URL . 'login');
}

$logout = new AdminController();
$logout->logout();



?>
<link rel="stylesheet" href="views/css/management.css">
<h1>Admin Name : <?php echo $_SESSION['logged'] ?></h1>
<table>
    <tr><td><a href="<?php echo BASE_URL . 'add' ?>" class="fa fa-plus add"></a></td></tr>
    <tr>
        <th>Image</th>
        <th>Name</th>
        <th>Price</th>
        <th>Quantite</th>
        <th>Update</th>
        <th>Delete</th>
    </tr>
        <?php foreach(get_all_products() as $_product): ?>
            <tr><td>
                <img src="views/images/<?php echo $_product['image']; ?>" alt=""></td>
                <td><?php echo $_product['name']; ?></td>
                <td><?php echo $_product['price']; ?> $</td>
                <td><?php echo $_product['quantite']; ?></td>
                <td>
                <form action="update" method="POST">
                    <input type="text" name="id" value="<?php echo $_product['id']; ?>" hidden>
                    <button class="fa fa-edit edit"></button>
                </form>
                </td>
                <td><form action="" method="post">
                    <input type="text" hidden name="id" value="<?php echo $_product['id']; ?>" hidden>
                    <button class="fa fa-trash trash" name="delete"></button>
                </form></td></tr>
             
        <?php endforeach?>
</table>