<?php
include_once "../database/dbconfig.php";
$msg ="";
if(isset($_POST['update_btn1'])) {
    $dish = $_POST['dish'];
    $price = $_POST['price'];
    $sql = "INSERT INTO  pancakes_menu (dish,price) VALUE ('$dish','$price')";
    $query = mysqli_query($conn, $sql);
    if($query){
        header("location:pancakes_menu.php");
        exit;
    }
}
if(isset($_POST['update_btn2'])) {
    $dish = $_POST['dish'];
    $price = $_POST['price'];
    $sql = "INSERT INTO  pancakes_burgers_menu (dish,price) VALUE ('$dish','$price')";
    $query = mysqli_query($conn, $sql);
    if($query){
        header("location:pancakes_menu.php");
        exit;
    }
}
if(isset($_POST['update_btn3'])) {
    $dish = $_POST['dish'];
    $price = $_POST['price'];
    $sql = "INSERT INTO  pancakes_rolls_menu (dish,price) VALUE ('$dish','$price')";
    $query = mysqli_query($conn, $sql);
    if($query){
        header("location:pancakes_menu.php");
        exit;
    }
}
if(isset($_POST['update_btn4'])) {
    $dish = $_POST['dish'];
    $price = $_POST['price'];
    $sql = "INSERT INTO  pancakes_toppings_menu (dish,price) VALUE ('$dish','$price')";
    $query = mysqli_query($conn, $sql);
    if($query){
        header("location:pancakes_menu.php");
        exit;
    }
}
if(isset($_POST['update_btn5'])) {
    $dish = $_POST['dish'];
    $price = $_POST['price'];
    $sql = "INSERT INTO  pancakes_cereal_menu (dish,price) VALUE ('$dish','$price')";
    $query = mysqli_query($conn, $sql);
    if($query){
        header("location:pancakes_menu.php");
        exit;
    }
}
if(isset($_POST['update_btn6'])) {
    $dish = $_POST['dish'];
    $price = $_POST['price'];
    $sql = "INSERT INTO  pancakes_sides_menu (dish,price) VALUE ('$dish','$price')";
    $query = mysqli_query($conn, $sql);
    if($query){
        header("location:pancakes_menu.php");
        exit;
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
    <title>Menu</title>
    <link rel="stylesheet" href="css/materialize.css">
    <link rel="stylesheet" href="css/font-awesome-4.7.0/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>
<div class="navbar-fixed">
    <nav>
        <div class="nav-wrapper white">
            <a class='dropdown-trigger black-text right' href='#' data-target='dropdown1'>Drop Me!</a>
            <a href="#" class="toggle_button  black-text" onclick="toggleSidebar()"><b>MENU</b></a>
            <ul>
                <li>
                    <!-- Dropdown Structure -->
                    <ul id='dropdown1' class='dropdown-content'>
                        <li><a href="#!">one</a></li>
                        <li class="divider" tabindex="-1"></li>
                        <li><a href="#!">two</a></li>
                        <li class="divider" tabindex="-1"></li>
                        <li><a href="#!">two</a></li>

                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</div>
<div id="sidebar">
    <ul>
        <li><a href="profile.php"><span><i class="fa fa-user-o"></i></span>Profile</a></li>
        <li><a href="#" class='dropdown-trigger' data-target='dropdown2'><span><i class="fa fa-file-archive-o">Menu</i></span>
                <!-- Dropdown Structure -->
                <ul id='dropdown2' class='dropdown-content'>
                    <li><a href="rice_menu.php">Rice Menu</a></li>
                    <li><a href="pancakes_menu.php">Pancake Menu</a></li>
                    <li><a href="waffles_menu.php">Waffles Menu</a></li>
                    <li><a href="milkshake_menu.php">Milkshake Menu</a></li>
                </ul>
            </a></li>
        <li><a href="orders.php"><span><i class="fa fa-first-order"></i></span>Orders</a></li>
    </ul>
</div>
<div class="menu_grid_layout">
    <div class="z-depth-1">
        <div>
            <h1><?=$msg?></h1>
            <div class="row">
                <form class="col s12 form_setup" method="post" action="pancakes_menu.php">
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="dish" type="text" class="validate" name="dish">
                            <label for="dish">Dish</label>
                        </div>
                        <div class="input-field col s12">
                            <input id="price" type="text" class="validate" name="price">
                            <label for="price">Price</label>
                        </div>
                    </div>
                    <div class="modal-footer center-align">
                        <button type="submit" class="waves-effect waves-green btn" name="update_btn1" id="update">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="table_padding">
        <h4 class="center"><b>Pancakes</b></h4>
        <table class=" z-depth-1" style="border-radius: 10px;">
            <?php

            $query = "SELECT * FROM pancakes_menu";
            $query_run = mysqli_query($conn, $query);
            ?>
            <thead>
            <tr>
                <th>ID</th>
                <th>DISH</th>
                <th>PRICE</th>
            </tr>
            </thead>

            <tbody>
            <?php
            if (mysqli_num_rows($query_run) > 0) {
                while ($row = mysqli_fetch_assoc($query_run)) {

                    ?>
                    <tr>
                        <td><?=$row['id'];?></td>
                        <td><?=$row['dish'];?></td>
                        <td><?=$row['price'];?></td>
                    </tr>

                    <?php
                }
            } else {
                echo 'No Record Found';
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
<div class="menu_grid_layout">
    <div class="z-depth-1">
        <div>
            <h1><?=$msg?></h1>
            <div class="row">
                <form class="col s12 form_setup" method="post" action="pancakes_menu.php">
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="dish2" type="text" class="validate" name="dish">
                            <label for="dish2">Dish</label>
                        </div>
                        <div class="input-field col s12">
                            <input id="price2" type="text" class="validate" name="price">
                            <label for="price2">Price</label>
                        </div>
                    </div>
                    <div class="modal-footer center-align">
                        <button type="submit" class="waves-effect waves-green btn" name="update_btn2" id="update">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="table_padding">
        <h4 class="center"><b>Pancake Burgers</b></h4>
        <table class=" z-depth-1" style="border-radius: 10px;">
            <?php

            $query = "SELECT * FROM pancakes_burgers_menu";
            $query_run = mysqli_query($conn, $query);
            ?>
            <thead>
            <tr>
                <th>ID</th>
                <th>DISH</th>
                <th>PRICE</th>
            </tr>
            </thead>

            <tbody>
            <?php
            if (mysqli_num_rows($query_run) > 0) {
                while ($row = mysqli_fetch_assoc($query_run)) {

                    ?>
                    <tr>
                        <td><?=$row['id'];?></td>
                        <td><?=$row['dish'];?></td>
                        <td><?=$row['price'];?></td>
                    </tr>

                    <?php
                }
            } else {
                echo 'No Record Found';
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
<div class="menu_grid_layout">
    <div class="z-depth-1">
        <div>
            <h1><?=$msg?></h1>
            <div class="row">
                <form class="col s12 form_setup" method="post" action="pancakes_menu.php">
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="dish3" type="text" class="validate" name="dish">
                            <label for="dish3">Dish</label>
                        </div>
                        <div class="input-field col s12">
                            <input id="price3" type="text" class="validate" name="price">
                            <label for="price3">Price</label>
                        </div>
                    </div>
                    <div class="modal-footer center-align">
                        <button type="submit" class="waves-effect waves-green btn" name="update_btn3" id="update">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="table_padding">
        <h4 class="center"><b>Pancake Rolls</b></h4>
        <table class=" z-depth-1" style="border-radius: 10px;">
            <?php

            $query = "SELECT * FROM pancakes_rolls_menu";
            $query_run = mysqli_query($conn, $query);
            ?>
            <thead>
            <tr>
                <th>ID</th>
                <th>DISH</th>
                <th>PRICE</th>
            </tr>
            </thead>

            <tbody>
            <?php
            if (mysqli_num_rows($query_run) > 0) {
                while ($row = mysqli_fetch_assoc($query_run)) {

                    ?>
                    <tr>
                        <td><?=$row['id'];?></td>
                        <td><?=$row['dish'];?></td>
                        <td><?=$row['price'];?></td>
                    </tr>

                    <?php
                }
            } else {
                echo 'No Record Found';
            }
            ?>
            </tbody>
        </table>
    </div>
</div>

<div class="menu_grid_layout">
    <div class="z-depth-1">
        <div>
            <h1><?=$msg?></h1>
            <div class="row">
                <form class="col s12 form_setup" method="post" action="pancakes_menu.php">
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="dish4" type="text" class="validate" name="dish">
                            <label for="dish4">Dish</label>
                        </div>
                        <div class="input-field col s12">
                            <input id="price4" type="text" class="validate" name="price">
                            <label for="price4">Price</label>
                        </div>
                    </div>
                    <div class="modal-footer center-align">
                        <button type="submit" class="waves-effect waves-green btn" name="update_btn4" id="update">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="table_padding">
        <h4 class="center"><b>Pancake Toppings</b></h4>
        <table class=" z-depth-1" style="border-radius: 10px;">
            <?php

            $query = "SELECT * FROM pancakes_toppings_menu";
            $query_run = mysqli_query($conn, $query);
            ?>
            <thead>
            <tr>
                <th>ID</th>
                <th>DISH</th>
                <th>PRICE</th>
            </tr>
            </thead>

            <tbody>
            <?php
            if (mysqli_num_rows($query_run) > 0) {
                while ($row = mysqli_fetch_assoc($query_run)) {

                    ?>
                    <tr>
                        <td><?=$row['id'];?></td>
                        <td><?=$row['dish'];?></td>
                        <td><?=$row['price'];?></td>
                    </tr>

                    <?php
                }
            } else {
                echo 'No Record Found';
            }
            ?>
            </tbody>
        </table>
    </div>
</div>

<div class="menu_grid_layout">
    <div class="z-depth-1">
        <div>
            <h1><?=$msg?></h1>
            <div class="row">
                <form class="col s12 form_setup" method="post" action="pancakes_menu.php">
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="dish5" type="text" class="validate" name="dish">
                            <label for="dish5">Dish</label>
                        </div>
                        <div class="input-field col s12">
                            <input id="price5" type="text" class="validate" name="price">
                            <label for="price5">Price</label>
                        </div>
                    </div>
                    <div class="modal-footer center-align">
                        <button type="submit" class="waves-effect waves-green btn" name="update_btn5" id="update">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="table_padding">
        <h4 class="center"><b>Pancake Cereal</b></h4>
        <table class=" z-depth-1" style="border-radius: 10px;">
            <?php

            $query = "SELECT * FROM pancakes_cereal_menu";
            $query_run = mysqli_query($conn, $query);
            ?>
            <thead>
            <tr>
                <th>ID</th>
                <th>DISH</th>
                <th>PRICE</th>
            </tr>
            </thead>

            <tbody>
            <?php
            if (mysqli_num_rows($query_run) > 0) {
                while ($row = mysqli_fetch_assoc($query_run)) {

                    ?>
                    <tr>
                        <td><?=$row['id'];?></td>
                        <td><?=$row['dish'];?></td>
                        <td><?=$row['price'];?></td>
                    </tr>

                    <?php
                }
            } else {
                echo 'No Record Found';
            }
            ?>
            </tbody>
        </table>
    </div>
</div>

<div class="menu_grid_layout">
    <div class="z-depth-1">
        <div>
            <h1><?=$msg?></h1>
            <div class="row">
                <form class="col s12 form_setup" method="post" action="pancakes_menu.php">
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="dish6" type="text" class="validate" name="dish">
                            <label for="dish6">Dish</label>
                        </div>
                        <div class="input-field col s12">
                            <input id="price6" type="text" class="validate" name="price">
                            <label for="price6">Price</label>
                        </div>
                    </div>
                    <div class="modal-footer center-align">
                        <button type="submit" class="waves-effect waves-green btn" name="update_btn6" id="update">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="table_padding">
        <h4 class="center"><b>Pancake Sides</b></h4>
        <table class=" z-depth-1" style="border-radius: 10px;">
            <?php

            $query = "SELECT * FROM pancakes_sides_menu";
            $query_run = mysqli_query($conn, $query);
            ?>
            <thead>
            <tr>
                <th>ID</th>
                <th>DISH</th>
                <th>PRICE</th>
            </tr>
            </thead>

            <tbody>
            <?php
            if (mysqli_num_rows($query_run) > 0) {
                while ($row = mysqli_fetch_assoc($query_run)) {

                    ?>
                    <tr>
                        <td><?=$row['id'];?></td>
                        <td><?=$row['dish'];?></td>
                        <td><?=$row['price'];?></td>
                    </tr>

                    <?php
                }
            } else {
                echo 'No Record Found';
            }
            ?>
            </tbody>
        </table>
    </div>
</div>

<script src="js/jquery.min.js"></script>
<script src="js/materialize.js"></script>
<script src="js/admin.js"></script>
</body>
</html>