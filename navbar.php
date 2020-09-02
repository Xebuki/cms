<!DOCTYPE html>
<?php
include('config.php');
$currentPage = 0;
//global $curretPage;
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

?>
<html>
    <head>


        <meta charset="UTF-8">
        <title></title>
        <!--<link href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"/>-->
        <link rel="stylesheet" type="text/css" href="style.css" />
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    </head>
    <body style="background-color:#FFFFC0;">
        <!--<body>-->
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">

                        <?php
                        if (isset($_SESSION['login'])) {
                            echo 'Logged as: ' . $_SESSION['login'];
                        } else
                            echo 'Not logged';
                        ?>
                    </a>
                </div>
                <ul class="nav navbar-nav">
                    <li <?php
                    if (isset($_SESSION['currentPage'])) {
                        if ($_SESSION['currentPage'] === 'Home') {
                            echo 'class="active"';
                        }
                    }
                    ?>><a href="index.php">Home</a></li>
                    <li <?php
                    if (isset($_SESSION['currentPage'])) {
                        if ($_SESSION['currentPage'] === 'Collection') {
                            echo 'class="active"';
                        }
                    }
                    ?>>
                            <?php
                            if (isset($_SESSION['login'])) {

                                    if ($_SESSION['currentPage'] === 'Collection') {
                                        echo '<li class="active">';
                                    } else {
                                        echo '<li>';
                                    }echo '<a href="collection.php">Collection</a></li>';

                            }
                            ?> 

                        <!--<a href="collection.php">Collection</a></li>-->

                    <?php
                    if (isset($_SESSION['access'])) {
                        if ($_SESSION['access'] == 2) {

                            if ($_SESSION['currentPage'] === 'Users') {
                                echo '<li class="active">';
                            } else {
                                echo '<li>';
                            }echo '<a href="users.php">Users</a></li>';

                            if ($_SESSION['currentPage'] === 'Books') {
                                echo '<li class="active">';
                            } else {
                                echo '<li>';
                            }
                            echo '<a href="add_book.php">Books</a></li>';
                            
                            if ($_SESSION['currentPage'] === 'Trending') {
                                echo '<li class="active">';
                            } else {
                                echo '<li>';
                            }
                            echo '<a href="rent.php">Trending</a></li>';
                        }
                    }
                    ?>
                </ul>   
                <ul class="nav navbar-nav navbar-right">
                    <?php
                    if (isset($_SESSION['login'])) {
                        echo '<li><a href="account.php" class="active"><span class="glyphicon glyphicon-user"></span> Account </a></li>';
                    } else
                        echo '<li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>';
                    ?>

                    <?php
                    if (isset($_SESSION['login'])) {
                        echo '<li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Log out </a></li>';
                    } else
                        echo '<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
                    ?>

                </ul>
            </div>
        </nav> 