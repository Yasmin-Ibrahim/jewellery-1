<?php
include_once "../shared/head.php";
include_once "../shared/header.php";
include_once "../core/connect.php";

auth(3,4);

$select = "SELECT * FROM `jewellery-collection`";
$data = mysqli_query($connect, $select);

$count = 1;

if(isset($_GET['del'])){
    $id = $_GET['del'];
    $sel_del = "SELECT * FROM `jewellery-collection` WHERE id = $id";
    $qury_del = mysqli_query($connect, $sel_del);
    $data = mysqli_fetch_assoc($qury_del);
    unlink("../images/" . $data['image']);

    $del = "DELETE FROM `jewellery-collection` WHERE id = $id";
    mysqli_query($connect, $del);

    $_SESSION['validMessage'] = "Delete This Product Successfully";

    redirect('crud/view.php');
}
?>
<div class="bg-body">
    <div class="container col-10">
        <div class="card-edit">
            <?php if(isset($_SESSION['validMessage'])): ?>
                <div id="alert_message" class="alert alert-info alert-dismissible fade show" role="alert">
                    <strong>Message!</strong>
                    <?=$_SESSION['validMessage'] ?>
                    <form action="<?=url('core/functions.php')?>" method="POST">
                        <input type="hidden" name="old_path" value="<?=$current_url?>">
                        <button type="submit" name="delete_message" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </form>
                </div>
            <?php endif ?>
            <crad-title>
                <h3>Jewelleries</h3>
            </crad-title>
            <table class="text-center">
                <tr>
                    <th>Product</th>
                    <th>Name</th>
                    <th>Karat</th>
                    <th>Color</th>
                    <th>Size</th>
                    <th>Price</th>
                    <th colspan="2">Action</th>
                </tr>
                <?php foreach($data as $item): ?>
                    <tr>
                        <td><?= $count++ ?></td>
                        <td><?= $item['name'] ?></td>
                        <td><?= $item['karat'] ?></td>
                        <td><?= $item['color'] ?></td>
                        <td><?= $item['size'] ?></td>
                        <td><?= $item['price'] ?></td>
                        <td><a class="icon-edit"  href="./update.php?edit=<?= $item['id'] ?>"><i class="fa-solid fa-pen-to-square"></i></a></td>
                        <td><a class="icon-del" href="./view.php?del=<?= $item['id'] ?>"><i class="fa-regular fa-trash-can"></i></a></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>
<?php
include_once "../shared/footer.php";
?>