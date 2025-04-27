<?php

    $host = "localhost";
    $user = "root";
    $password = "";
    $dbName = "jewelleries";

    try{
        $connect = mysqli_connect($host, $user, $password, $dbName);
    }catch(Exception $e){
        echo $e->getMessage();
    }
?>