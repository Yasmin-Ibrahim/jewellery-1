<?php
define('base_url', 'http://localhost/yasmin/projects/jewelleries/');
$current_url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

session_start();

function url($file=null){
    return base_url . $file;
}

function redirect($var=null){
    echo "<script>
            window.location.replace('http://localhost/yasmin/projects/jewelleries/$var')
        </script>";
}

// delete the session
if(isset($_POST['delete_message'])){

    $old_path = $_POST['old_path'];
    unset($_SESSION['invalidMessage']);
    unset($_SESSION['validMessage']);
    echo "<script>
    window.location.replace('$old_path')
</script>";
}

function auth($role2=null, $role3=null, $role4=null, $role5=null){

    if($_SESSION['user']){
        $role = $_SESSION['user']['role_id'];
        if($role == 1 || $role == $role2 || $role == $role3 || $role == $role4 || $role == $role5){

        }else{
            redirect('shared/error.php');
        }
    }else{
        redirect('pages/login.php');
    }
}

// log out
if(isset($_GET['logout'])){

    session_unset();
    session_destroy();
    redirect('pages/login.php');
}

//validation
function filterValidation($input){

    $input = rtrim($input);
    $input = ltrim($input);
    $input = stripslashes($input);
    $input = strip_tags($input);
    $input = htmlspecialchars($input);

    return $input;
}

function stringValidation($input, $min=3, $max=50){

    $isEmpty = empty($input);
    $ismin = strlen($input) < $min;
    $ismax = strlen($input) > $max;
    if($isEmpty || $ismin || $ismax){
        return true;
    }else{
        return false;
    }
}

function emailValidation($input, $min=3, $max=50){

    $isEmpty = empty($input);
    $ismin = strlen($input) < $min;
    $ismax = strlen($input) > $max;
    $isEmail = !filter_var($input, FILTER_VALIDATE_EMAIL);

    if($isEmpty || $ismin || $ismax || $isEmail){
        return true;
    }else{
        return false;
    }
}

function numberValidation($input, $min=null, $max=null, $num1=null, $num2=null, $num3=null, $num4=null, $num5=null){

    $isEmpty = empty($input);
    $inNegative = $input < 0;
    $ismin = !is_null($min) && $input < $min;
    $ismax = !is_null($max) && $input > $max;
    $isNumber = filter_var($input, FILTER_VALIDATE_FLOAT);

    $foundNumber = array_filter([$num1, $num2, $num3, $num4, $num5]);

    $isFound = !empty($foundNumber) && !in_array($input, $foundNumber);

    if($isEmpty || $inNegative || !$isNumber || $ismin || $ismax || $isFound){
        return true;
    }else{
        return false;
    }
}

function sizeImageValidation($file_size, $require_size = 2) {

    $megaSize = ($file_size / 1024) / 1024;

    return $megaSize > $require_size;
}

function typeImageValidation($type_img, $type1=null, $type2=null, $type3=null, $type4=null, $type5=null){

    $foundTypes = array_filter([$type1, $type2, $type3, $type4, $type5]);

    $isFound = !empty($foundTypes) && !in_array($type_img, $foundTypes);

    if($isFound){
        return true;
    }else{
        return false;
    }
}

?>