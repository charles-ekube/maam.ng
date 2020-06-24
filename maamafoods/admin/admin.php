<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
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
                    <!-- Dropdown Trigger -->


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
<div class="grid_layout">
    <div class="grid_inner_layout">
        <div class="row">
            <div class="col s12 m6">
                <div class="card blue-grey darken-1">
                    <div class="card-content white-text">
                        <span class="card-title">Card Title</span>
                        <p>I am a very simple card. I am good at containing small bits of information.
                            I am convenient because I require little markup to use effectively.</p>
                    </div>
                    <div class="card-action">
                        <a href="#">This is a link</a>
                        <a href="#">This is a link</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="grid_inner_layout">
        <div class="row">
            <div class="col s12 m6">
                <div class="card blue-grey darken-1">
                    <div class="card-content white-text">
                        <span class="card-title">Card Title</span>
                        <p>I am a very simple card. I am good at containing small bits of information.
                            I am convenient because I require little markup to use effectively.</p>
                    </div>
                    <div class="card-action">
                        <a href="#">This is a link</a>
                        <a href="#">This is a link</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="grid_inner_layout">
        <div class="row">
            <div class="col s12 m6">
                <div class="card blue-grey darken-1">
                    <div class="card-content white-text">
                        <span class="card-title">Card Title</span>
                        <p>I am a very simple card. I am good at containing small bits of information.
                            I am convenient because I require little markup to use effectively.</p>
                    </div>
                    <div class="card-action">
                        <a href="#">This is a link</a>
                        <a href="#">This is a link</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="grid_inner_layout">
        <div class="row">
            <div class="col s12 m6">
                <div class="card blue-grey darken-1">
                    <div class="card-content white-text">
                        <span class="card-title">Card Title</span>
                        <p>I am a very simple card. I am good at containing small bits of information.
                            I am convenient because I require little markup to use effectively.</p>
                    </div>
                    <div class="card-action">
                        <a href="#">This is a link</a>
                        <a href="#">This is a link</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="js/jquery.min.js"></script>
<script src="js/materialize.js"></script>
<script src="js/admin.js"></script>
</body>
</html>