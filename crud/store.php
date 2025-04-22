<?php
include_once "../config/connect.php";
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $karat = $_POST['karat'];
    $color = $_POST['color'];
    $size = $_POST['size'];
    $price = $_POST['price'];

    if(!empty($_FILES['image']['name'])){
        $image_name = time() . $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $location = "../images/$image_name";
        move_uploaded_file($image_tmp, $location);
    }
}else{
    header("location: yasmin/projects/jewelleries/shared/error.php");
}

$query = "INSERT INTO `jewellery-collection` VALUES(null, '$name', $karat, '$color', $size, $price, '$image_name')";

$excute = mysqli_query($connect, $query);

header("location:/yasmin/projects/jewelleries/index.php");
?>