<?php
include_once "../shared/head.php";
include_once "../shared/header.php";
include_once "../core/connect.php";

auth(3);

if(isset($_GET['edit'])){
    $id = intval($_GET['edit']);
    $sel_edit = "SELECT * FROM `jewellery-collection` WHERE id = $id";
    $query_edit = mysqli_query($connect, $sel_edit);
    $data = mysqli_fetch_array($query_edit);

    if(isset($_POST['update'])){
        $name = filterValidation($_POST['name']);
        $karat = filterValidation($_POST['karat']);
        $color = filterValidation($_POST['color']);
        $size = filterValidation($_POST['size']);
        $price = filterValidation($_POST['price']);
        $image_size = $_FILES['image']['size'];
        $image_type = $_FILES['image']['type'];

        $_SESSION['invalidMessage'] = [];

        $validations = [
            'name' => [
                'valid' => stringValidation($name),
                'message' => "Please, Enter The Valid Name of Product and min=3 & max=50"
            ],

            'color' => [
                'valid' => stringValidation($color),
                'message' => "Please, Enter The Valid color and min=3 & max=50"
            ],

            'karat' => [
                'valid' => numberValidation($karat, 14, 24, 14, 18, 21, 22, 24),
                'message' => "Please, Enter The Valid Karat and Karat=14, 18, 21, 22, 24"
            ],

            'size' => [
                'valid' => numberValidation($size, 15, 25),
                'message' => "Please, Enter The Valid Size and min=15 & max=25"
            ],

            'price' => [
                'valid' => numberValidation($price, 5000),
                'message' => "Please, Enter The Valid Price and min=5000"
            ],

            'image_size' => [
                'valid' => sizeImageValidation($image_size),
                'message' => "Please, Enter The Image its size less than 2MB"
            ],

            'image_type' => [
            'valid' => typeImageValidation($image_type, "image/webp", "image/jpg", "image/jpeg"),
            'message' => "Please, Enter The Image its Type webp / jpeg / jpg"
            ],
        ];

        foreach($validations as $valid){
            if($valid['valid']){
                $_SESSION['invalidMessage'][] = $valid['message'];
            }
        }
        
        if(empty($_FILES['image']['name'])){
            $image_name = $data['image'];
        }else{
            $image_name = time() . $_FILES['image']['name'];
            $image_tmp = $_FILES['image']['tmp_name'];
            $location = "../images/$image_name";

            if(empty($_SESSION['invalidMessage'])){
                if(move_uploaded_file($image_tmp, $location)){
                    unlink("../images/".$data['image']);
                }
            }

        }
        if(empty($_SESSION['invalidMessage'])){
            $sel_update = "UPDATE `jewellery-collection` SET name='$name', karat=$karat, color='$color', size=$size, price=$price, image='$image_name' WHERE id = $id";

            $qry_update = mysqli_query($connect, $sel_update);
    
            $_SESSION['validMessage'] = "Update This Product Successfully";
    
            redirect('crud/view.php');
        }
    }
}
?>

<div class="bg-body">
    <div class="container col-6">
        <div class="row">
            <div class="card">
                <?php if(isset($_SESSION['validMessage'])): ?>
                    <div id="alert_message" class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Message!</strong>
                        <?=$_SESSION['validMessage'] ?>
                        <form action="<?=url('core/functions.php')?>" method="POST">
                            <input type="hidden" name="old_path" value="<?=$current_url?>">
                            <button type="submit" name="delete_message" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </form>
                    </div>
                <?php endif ?>

                <?php if(isset($_SESSION['invalidMessage'])): ?>
                    <div id="alert_message" class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul>
                            <?php foreach($_SESSION['invalidMessage'] as $error): ?>
                                <li><?= $error ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <form action="<?=url('core/functions.php')?>" method="POST">
                            <input type="hidden" name="old_path" value="<?=$current_url?>">
                            <button type="submit" name="delete_message" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </form>
                    </div>
                <?php endif ?>

                <div class="card-title">
                    <h3>Update Products <?= $data['id'] ?></h3>
                </div>
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="form-label">Name: </label>
                            <input type="text" class="form-control" name="name" value="<?= $data['name'] ?>">
                        </div>
                        <div class="form-group img-edit">
                            <div class="div-img">
                                <label class="form-label">Image: </label>
                                <img src="../images/<?= $data['image'] ?>" width="40px">
                            </div>
                            <input type="file" class="form-control file" name="image">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Karat: </label>
                            <input type="number" class="form-control" name="karat" value="<?= $data['karat'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Color: </label>
                            <input type="text" class="form-control" name="color" value="<?= $data['color'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Size: </label>
                            <input type="number" class="form-control" name="size" step="0.01" value="<?= $data['size'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Price: </label>
                            <input type="number" class="form-control" name="price" step="0.01" value="<?= $data['price'] ?>">
                        </div>
                        <div class="create d-grid mt-5">
                            <button type="submit" name="update" class="btn">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include_once "../shared/footer.php";
?>