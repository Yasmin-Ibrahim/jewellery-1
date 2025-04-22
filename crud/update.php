<?php
include_once "../shared/head.php";
include_once "../config/connect.php";

if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $sel_edit = "SELECT * FROM `jewellery-collection` WHERE id = $id";
    $query_edit = mysqli_query($connect, $sel_edit);
    $data = mysqli_fetch_array($query_edit);

    if(isset($_POST['update'])){
        $name = $_POST['name'];
        $karat = $_POST['karat'];
        $color = $_POST['color'];
        $size = $_POST['size'];
        $price = $_POST['price'];
        
        if(empty($_FILES['image']['name'])){
            $image_name = $data['image'];
        }else{
            $image_name = time() . $_FILES['image']['name'];
            $image_tmp = $_FILES['image']['tmp_name'];
            $location = "../images/$image_name";
            move_uploaded_file($image_tmp, $location);

            unlink("../images/".$data['image']);
        }
        $sel_update = "UPDATE `jewellery-collection` SET name='$name', karat=$karat, color='$color', size=$size, price=$price, image='$image_name' WHERE id = $id";

        $qry_update = mysqli_query($connect, $sel_update);

        header("location:/yasmin/projects/jewelleries/crud/view.php");
    }
}
?>
<div class="bg-body">
    <div class="container col-6">
        <div class="row">
            <div class="card">
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
                            <input type="file" class="form-control file" name="image" accept="image/*">
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