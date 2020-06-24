<?php
include_once "database/dbconfig.php";
session_start();
$rows_ids = array();
//session_destroy();

//check if the order button is submitting
if(filter_input(INPUT_POST, 'order')){
    if(isset($_SESSION['food_cart'])){

//        keep track of how many items are in the food_cart
        $count = count($_SESSION['food_cart']);

//        create sequential arrary for matching array keys to items  id's
        $rows_ids = array_column($_SESSION['food_cart'], 'id');

        if (!in_array(filter_input(INPUT_GET, 'id'), $rows_ids)){
            $_SESSION['food_cart'][$count] = array(
                'id' => filter_input(INPUT_GET, 'id'),
                'dish' => filter_input(INPUT_POST, 'dish'),
                'price'=> filter_input(INPUT_POST, 'price'),
                'quantity' => filter_input(INPUT_POST, 'quantity')
            );
        }
        else {
//            product already exists, increase quantity
//            match array key to id of the item being added to the food_cart
            for ($i = 0; $i < count($rows_ids); $i++){
                if($rows_ids[$i] == filter_input(INPUT_GET, 'id')){

//                    add item quantity to the existing item in the array
                    $_SESSION['food_cart'][$i]['quantity'] += filter_input(INPUT_POST, 'quantity');
                    header("location: rice-menu.php");
                    exit;
                }

            }
        }
    }
    else {
        $_SESSION['food_cart'][0]= array(
            'id' => filter_input(INPUT_GET, 'id'),
            'dish' => filter_input(INPUT_POST, 'dish'),
            'price'=> filter_input(INPUT_POST, 'price'),
            'quantity' => filter_input(INPUT_POST, 'quantity')
        );
    }
}

if(filter_input(INPUT_GET, 'action') == 'delete'){

//    loop through all items in the food_cart until it matches the id

    foreach ($_SESSION['food_cart'] as $key => $row){
        if ($row['id'] == filter_input(INPUT_GET, 'id')){

            //remove product from the food_cart when it matches with the geGET id

            unset($_SESSION['food_cart'][$key]);
        }
    }
    //reset session array keys so they match with $row_ids numeric array

    $_SESSION['food_cart'] = array_values($_SESSION['food_cart']);
}

//pre_r($_SESSION);
//function pre_r($array){
//    echo '<pre>';
//    print_r($array);
//    echo '</pre>';
//}
?>
<!DOCTYPE html>
<html>
<head>
    <title>New</title>
    <link rel="stylesheet" type="text/css" href="css/materialize.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome-4.7.0/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" href="css/mediaqueries.css">
</head>
<body>
<div class="navbar-fixed">
    <nav>
        <div class="nav-wrapper white">
            <a href="#" data-target="slide-out" class="sidenav-trigger black-text"><b>Menu</b></a>
            <a href="#!" class="brand-logo center-on-small-only black-text"><b>Logo</b></a>
            <a class='dropdown-trigger black-text right' href='#' data-target='dropdown1' style="padding: 0 5px;"><i class="fa fa-shopping-cart fa-2x"></i></a>
            <ul class="right hide-on-med-and-down">
                <li><a href="index.php" class="black-text">Home</a></li>
                <li><a href="menu.php" class="black-text">Menu</a></li>
                <li><a href="contact-us.php" class="black-text">Contact Us</a></li>
            </ul>
            <ul id='dropdown1' class='dropdown-content show-on-small'>
                <li>
                    <h4>FOOD CART</h4>
                    <table>
                        <tr>
                            <th>Item</th>
                            <th>Qty</th>
                            <th>Price</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                        <?php

                        if(!empty($_SESSION['food_cart']));

                        $total = 0;
                        foreach ($_SESSION['food_cart'] as $key => $row):

                            ?>

                            <tr>
                                <td><?=$row['dish'];?></td>
                                <td><?=$row['quantity'];?></td>
                                <td><?=$row['price'];?></td>
                                <td><?=number_format($row['quantity'] * $row['price'], 2);?></td>
                                <td>
                                    <a href="waffles-menu.php?action=delete&id=<?=$row['id'];?>">
                                        <div class="btn">Remove</div>
                                    </a>
                                </td>
                            </tr>

                            <?php
                            $total = $total + ($row['quantity'] * $row['price']);

                        endforeach;
                        ?>

                        <tr>
                            <td>Total</td>
                            <td>NGN <?=number_format($total, 2); ?></td>
                            <td></td>
                        </tr>

                        <tr>
                            <!--                            show checkout button only if the food_cart is not empty-->
                            <td>
                                <?php

                                if(isset($_SESSION['food_cart'])):
                                    if(count($_SESSION['food_cart']) > 0):

                                        ?>

                                        <a href="checkout.php" class="btn">Checkout</a>
                                    <?php endif; endif; ?>
                            </td>
                        </tr>
                    </table>
                </li>


            </ul>
        </div>
    </nav>
</div>
<ul id="slide-out" class="sidenav">
    <li>
        <div>
            <img src="images/cherries.jpg" alt="" width="100%" height="250">
        </div>
    </li>
    <li><a href="index.php" class="black-text">Home</a></li>
    <li><a href="menu.php">Menu</a></li>
    <li><a href="contact-us.php">Contact Us</a></li>
</ul>

<div style="padding: 20px;">
    <table class=" z-depth-1 waffles_table">
        <?php

        $query = "SELECT * FROM waffles_menu";
        $query_run = mysqli_query($conn, $query);
        ?>
        <thead>
        <tr>
            <!--            <th>ID</th>-->
            <th>Items</th>
            <th>Price</th>
            <th>Qty</th>
            <th>Place Order</th>
        </tr>
        </thead>

        <tbody>
        <?php
        if (mysqli_num_rows($query_run) > 0) {
            while ($row = mysqli_fetch_assoc($query_run)) {

                ?>
                <form action="waffles-menu.php?action=add&id=<?=$row['id'];?>" method="post" >
                    <tr>
                        <!--                        <td>--><?//=$row['id'];?><!--</td>-->
                        <td><?=$row['dish'];?></td>
                        <td><?=$row['price'];?></td>
                        <td><input type="text" name="quantity" value="1" style="width: 30px !important;"/></td>
                        <input type="hidden" name="dish" value="<?=$row['dish'];?>">
                        <input type="hidden" name="price" value="<?=$row['price'];?>">
                        <td><input type="submit" class="btn" name="order" value="Order"></td>
                    </tr>
                </form>
                <?php
            }
        } else {
            echo 'No Record Found';
        }
        ?>
        </tbody>
    </table>
</div>

<div style="padding: 20px;">
    <table class=" z-depth-1 waffles_table">
        <?php

        $query = "SELECT * FROM waffles_sandwiches_menu";
        $query_run = mysqli_query($conn, $query);
        ?>
        <thead>
        <tr>
            <!--            <th>ID</th>-->
            <th>Items</th>
            <th>Price</th>
            <th>Qty</th>
            <th>Place Order</th>
        </tr>
        </thead>

        <tbody>
        <?php
        if (mysqli_num_rows($query_run) > 0) {
            while ($row = mysqli_fetch_assoc($query_run)) {

                ?>
                <form action="waffles-menu.php?action=add&id=<?=$row['id'];?>" method="post" >
                    <tr>
                        <!--                        <td>--><?//=$row['id'];?><!--</td>-->
                        <td><?=$row['dish'];?></td>
                        <td><?=$row['price'];?></td>
                        <td><input type="text" name="quantity" value="1" style="width: 30px !important;"/></td>
                        <input type="hidden" name="dish" value="<?=$row['dish'];?>">
                        <input type="hidden" name="price" value="<?=$row['price'];?>">
                        <td><input type="submit" class="btn" name="order" value="Order"></td>
                    </tr>
                </form>
                <?php
            }
        } else {
            echo 'No Record Found';
        }
        ?>
        </tbody>
    </table>
</div>

<div style="padding: 20px;">
    <table class=" z-depth-1 waffles_table">
        <?php

        $query = "SELECT * FROM waffles_baby_menu";
        $query_run = mysqli_query($conn, $query);
        ?>
        <thead>
        <tr>
            <!--            <th>ID</th>-->
            <th>Items</th>
            <th>Price</th>
            <th>Qty</th>
            <th>Place Order</th>
        </tr>
        </thead>

        <tbody>
        <?php
        if (mysqli_num_rows($query_run) > 0) {
            while ($row = mysqli_fetch_assoc($query_run)) {

                ?>
                <form action="waffles-menu.php?action=add&id=<?=$row['id'];?>" method="post" >
                    <tr>
                        <!--                        <td>--><?//=$row['id'];?><!--</td>-->
                        <td><?=$row['dish'];?></td>
                        <td><?=$row['price'];?></td>
                        <td><input type="text" name="quantity" value="1" style="width: 30px !important;"/></td>
                        <input type="hidden" name="dish" value="<?=$row['dish'];?>">
                        <input type="hidden" name="price" value="<?=$row['price'];?>">
                        <td><input type="submit" class="btn" name="order" value="Order"></td>
                    </tr>
                </form>
                <?php
            }
        } else {
            echo 'No Record Found';
        }
        ?>
        </tbody>
    </table>
</div>

<div style="padding: 20px;">
    <table class=" z-depth-1 waffles_table">
        <?php

        $query = "SELECT * FROM waffles_toppings_menu";
        $query_run = mysqli_query($conn, $query);
        ?>
        <thead>
        <tr>
            <!--            <th>ID</th>-->
            <th>Items</th>
            <th>Price</th>
            <th>Qty</th>
            <th>Place Order</th>
        </tr>
        </thead>

        <tbody>
        <?php
        if (mysqli_num_rows($query_run) > 0) {
            while ($row = mysqli_fetch_assoc($query_run)) {

                ?>
                <form action="waffles-menu.php?action=add&id=<?=$row['id'];?>" method="post" >
                    <tr>
                        <!--                        <td>--><?//=$row['id'];?><!--</td>-->
                        <td><?=$row['dish'];?></td>
                        <td><?=$row['price'];?></td>
                        <td><input type="text" name="quantity" value="1" style="width: 30px !important;"/></td>
                        <input type="hidden" name="dish" value="<?=$row['dish'];?>">
                        <input type="hidden" name="price" value="<?=$row['price'];?>">
                        <td><input type="submit" class="btn" name="order" value="Order"></td>
                    </tr>
                </form>
                <?php
            }
        } else {
            echo 'No Record Found';
        }
        ?>
        </tbody>
    </table>
</div>

<div style="padding: 20px;">
    <table class=" z-depth-1 waffles_table">
        <?php

        $query = "SELECT * FROM waffles_sides_menu";
        $query_run = mysqli_query($conn, $query);
        ?>
        <thead>
        <tr>
            <!--            <th>ID</th>-->
            <th>Items</th>
            <th>Price</th>
            <th>Qty</th>
            <th>Place Order</th>
        </tr>
        </thead>

        <tbody>
        <?php
        if (mysqli_num_rows($query_run) > 0) {
            while ($row = mysqli_fetch_assoc($query_run)) {

                ?>
                <form action="waffles-menu.php?action=add&id=<?=$row['id'];?>" method="post" >
                    <tr>
                        <!--                        <td>--><?//=$row['id'];?><!--</td>-->
                        <td><?=$row['dish'];?></td>
                        <td><?=$row['price'];?></td>
                        <td><input type="text" name="quantity" value="1" style="width: 30px !important;"/></td>
                        <input type="hidden" name="dish" value="<?=$row['dish'];?>">
                        <input type="hidden" name="price" value="<?=$row['price'];?>">
                        <td><input type="submit" class="btn" name="order" value="Order"></td>
                    </tr>
                </form>
                <?php
            }
        } else {
            echo 'No Record Found';
        }
        ?>
        </tbody>
    </table>
</div>



<script src="js/jquery.min.js"></script>
<script  src="js/materialize.js"></script>
<script src="js/main.js"></script>
</body>
</html>