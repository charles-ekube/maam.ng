<?php
include_once "../database/dbconfig.php";
if(isset($_POST['login_btn'])) {
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $sql = "select * from admin where email ='$email' and password = '$pass'";
    $query = mysqli_query($conn, $sql);
    if($query){
        header("location:admin.php");
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
    <div class="container z-depth-1 login_container">
        <h1 class="center">Welcome Back!</h1>
        <div class="container">
            <form action="login.php" class="login_form" method="post">
                <input type="email" name="email" placeholder="Email">
                <input type="password" name="password" placeholder="Password">
                <button type="submit" name="login_btn">Login</button>
            </form>
        </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/materialize.js"></script>
</body>
</html>