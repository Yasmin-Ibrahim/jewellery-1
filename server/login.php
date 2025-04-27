<?php
include_once "../core/connect.php";
include_once "../core/functions.php";

if(isset($_POST['login'])){
    $email = filterValidation($_POST['email']);
    $password = $_POST['password'];

    if(stringValidation($password)){
        $_SESSION['invalidMessage'][] = "Please, Enter The Valid Password";
        redirect('pages/login.php');
    }

    $select_check = "SELECT * FROM users WHERE email = '$email'";
    $query = mysqli_query($connect, $select_check);
    $num_rows = mysqli_num_rows($query);

    if($num_rows == 1){
        $data = mysqli_fetch_assoc($query);
        if(!password_verify($data['password'], $password)){
            redirect('');
            $_SESSION['user'] = [
                'id' => $data['id'],
                'name' => $data['name'],
                'email' => $email,
                'password' => $data['password'],
                'phone' => $data['phone'],
                'age' => $data['age'],
                'country' => $data['country'],
                'role_id' => $data['role_id']
            ];
        }else{
            $_SESSION['invalidMessage'][] = "Password is Wrong, Please enter the valid password";
            redirect('pages/login.php');
        }
    }else{
        $_SESSION['invalidMessage'][] = "The email is Wrong, Please enter the valid email";
        redirect('pages/login.php');
    }

}
?>