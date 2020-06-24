<?php
include_once "../database/dbconfig.php";

$msg  = $fname = $email = $password = $confirm_password = '';
if(isset($_POST['fname'])) {
    extract($_POST);
    if (empty($fname) or empty($email) or empty($password) or empty($confirm_password)) {
        $msg = "<div class='alert alert-danger'>All fields must be filled</div>";
    } elseif (strlen($password) < 6) {
        $msg = "<div class='alert alert-danger'>Password Must be at least 6</div>";
    } elseif ($password != $confirm_password) {
        $msg = "<div class='alert alert-danger'>Passwords Don't Match</div>";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) === true) {
        $msg = "<div class='alert alert-danger'>Please Input a Valid Email</div>";
    } else {
        $password = password_hash($password, PASSWORD_BCRYPT);
        $query = "INSERT INTO admin (fullname, email, password) VALUES ('$fname','$email','$password')";

        $query_run = mysqli_query($conn, $query);
        if ($query_run) {
            header("location:login.php");
        }
    }

}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="css/materialize.css">
    <link rel="stylesheet" href="css/font-awesome-4.7.0/font-awesome-4.7.0/css/font-awesome.min.css'">
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>
<div class="container reg_container">
    <div class="reg_form z-depth-1">
        <h1>SIGN UP</h1>
        <h6><?=$msg ?></h6>
        <form action="register.php" method="post">
            <input type="text" name="fname" placeholder="Full Name">
            <input type="email" name="email" placeholder="Email">
            <input type="password" name="password" placeholder="Password">
            <input type="password" name="confirm_password" placeholder="Confirm Password">
            <button type="submit" name="reg_btn">Sign Up</button>
        </form>
    </div>
</div>
<script src="js/jquery.min.js"></script>
<script src="js/materialize.js"></script>
</body>
</html>
