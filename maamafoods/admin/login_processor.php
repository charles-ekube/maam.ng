<?php
include_once "../database/dbconfig.php";

if(isset($_POST['login_btn'])){
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $sql = "select * from register where email ='$email' and password = '$pass'";
    $query = mysqli_query($connection, $sql);
    $data = mysqli_fetch_assoc($query);
    if($data['usertype'] == 'user') {
        header("location:../home.php");
    }
    if($data['usertype'] == 'admin') {
        $_SESSION['username']=$email;
        header("location:home.php");
    }
}