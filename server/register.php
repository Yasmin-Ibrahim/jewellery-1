<?php
include_once "../core/connect.php";
include_once "../core/functions.php";

if(isset($_POST['register'])){
    $name = filterValidation($_POST['name']);
    $email = filterValidation($_POST['email']);
    $password = filterValidation($_POST['password']);
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    $phone = filterValidation($_POST['phone']);
    $country = filterValidation($_POST['country']);
    $age = filterValidation($_POST['age']);

    $valiadtions = [
        'name' => [
            'valid' => stringValidation($name),
            'message' => "Please, Enter The Valid Name and min=3 & max=50"
        ],
        
        'email' => [
            'valid' => emailValidation($email),
            'message' => "Please, Enter The Valid Email and min=3 & max=50"
        ],

        'password' => [
            'valid' => stringValidation($password),
            'message' => "Please, Enter The Valid Password and min=3 & max=50"
        ],

        'phone' => [
            'valid' => stringValidation($phone, 7, 15),
            'message' => "Please, Enter The Valid phone and min=7 & max=15"
        ],

        'country' => [
            'valid' => stringValidation($country),
            'message' => "Please, Enter The Valid country and min=3 & max=50"
        ],

        'age' => [
            'valid' => numberValidation($age),
            'message' => "Please, Enter The Valid Age"
        ],

    ];

    foreach($valiadtions as $valid){
        if($valid['valid']){
            $_SESSION['invalidMessage'][] = $valid['message'];
        }
    }

    $search_email = "SELECT * FROM users WHERE email = '$email'";
    $qury_search = mysqli_query($connect, $search_email);
    $num_rows = mysqli_fetch_assoc($qury_search);

    if($num_rows > 0){
        $_SESSION['invalidMessage'][] = "This email already exist";
        redirect('pages/register.php');
    }else{
        if(empty($_SESSION['invalidMessage'])){
            $insert = "INSERT INTO users VALUES (null, '$name', '$email', '$password_hash', '$phone', $age, '$country', Default)";
            $qury_ins = mysqli_query($connect, $insert);
        
            redirect('pages/login.php');
        }else{
            redirect('pages/register.php');
        }
    }
}
?>