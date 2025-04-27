<?php
include_once "../core/connect.php";
include_once "../core/functions.php";

if(isset($_POST['submit'])){
    $name = filterValidation($_POST['name']);
    $karat = filterValidation($_POST['karat']);
    $color = filterValidation($_POST['color']);
    $size = filterValidation($_POST['size']);
    $price = filterValidation($_POST['price']);
    $image_size = $_FILES['image']['size'];
    $image_type = $_FILES['image']['type'];

    unset($_SESSION['invalidMessage']);
    // $_SESSION['invalidMessage'] = [];

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

    if(!empty($_FILES['image']['name'])){
        $image_name = time() . $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $location = "../images/$image_name";

        if(empty($_SESSION['invalidMessage'])){
            move_uploaded_file($image_tmp, $location);
        }

    }else{
        $_SESSION['invalidMessage'][] = "Please, Enter The Image";
        $image_name = null;
    }
}else{
    redirect('shared/error.php');
}

if(empty($_SESSION['invalidMessage'])){
    $query = "INSERT INTO `jewellery-collection` VALUES(null, '$name', $karat, '$color', $size, $price, '$image_name')";

    $excute = mysqli_query($connect, $query);

    $_SESSION['validMessage'] = "Create new product successfully";

}
    redirect('crud/create.php');
?>
