<?php
include_once "./core/connect.php";
include_once "./shared/head.php";
include_once "./shared/header.php";

auth(2,3,4,5);

$select = "SELECT * FROM `jewellery-collection`";
$data = mysqli_query($connect, $select);

?>

<div class="container boxes mt-5">
    <?php foreach($data as $pro): ?>
        <div class="box-in col-4">
            <div class="box">
                <div class="image">
                    <img src="./images/<?= $pro['image'] ?>">
                </div>
                <div class="box-body">
                    <h3><?= $pro['name'] ?></h3>
                    <div>The <?= $pro['color'] . " " . $pro['name'] . " in " . $pro['karat'] . "k" ?></div>
                    <p class="size">
                        <?= "Size is " . $pro['size'] ?>
                    </p>
                    <p class="price text-danger">
                        <?= "EGP " . $pro['price'] ?>
                    </p>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
    

<?php
include_once "./shared/footer.php"
?>