<?php
require_once("Database.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>A & K Photography</title>
    <link rel="stylesheet" type="text/css" href="bootstrapSuperhero.css"/>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>


<header>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand">A & K Photography</a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">

                    <li><a href="index.php">Home <span class="sr-only"></span></a></li>
                    <li class ="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="catalog.php">Catalog
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="catalog.php">Catalog</a></li>
                            <li><a href="food.php">Food</a></li>
                            <li><a href="pets.php">Pets</a></li>
                            <li><a href="nature.php">Nature</a></li>
                            <li><a href="concerts.php">Concerts</a></li>
                            <li><a href="pineapples.php">Pineapple</a></li>
                            <li><a href="romantic.php">Romantic</a></li>
                        </ul>
                    </li>
                      <li><a href="about.php">About</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="gallery.php">Gallery</a></li>
                    <li id="Product">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="cameras.php">Products
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu" id="menu">
                            <li><a href="cameras.php">Cameras & Accessories</a></li>
                            <li><a href="lens.php">Lens</a></li>
                            <li><a href="filters.php">Filters</a></li>
                            <li><a href="tripod.php">Tripods</a></li>
                            <li><a href="memorycard.php">Memory Cards</a></li>
                        </ul>
                    </li>
                    <li><a href="cart.php">Cart</a></li>
                    <li><a href="login.php">Login</a></li>
                    <li class="active"><a href="register.php">Register</a></li>
                </ul>

            </div>
        </div>
    </nav>
</header>
<main>
    <div class="modal-dialog">
        <div class="loginmodal-container">
            <h1>Register</h1><br/>
            <form action="register.php?action=register" method="POST">
                <input type="text" name="first_name" placeholder="First Name"/>
                <input type="text" name="last_name" placeholder="Last Name"/>
                <input type="text" name="email" placeholder="Email"/>
                <input type="password" name="password" placeholder="Password"/>
                <input type="password" name="password2" placeholder="Confirm Password"/>
                <?php
                echo "\xf0\x9f\x8d\x8d";
                ?>
                <button type="submit" name="submit" class="center-block btn btn-primary btn-lg">Register</button>
            </form>
        </div>
    </div>

    <?php
    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $error = array();
    if (isset($_POST["submit"])) {
        $first_name = "";
        $last_name = "";
        $email = "";
        $password = "";
        $password2 = "";

        if (!isset($_POST["first_name"])) {
            echo "Blah";
            array_push($error, "Please enter first name.");
        } else {
            $first_name = $_POST["first_name"];
            $first_name = test_input($first_name);
            echo $first_name;
        }

        if (!isset($_POST["last_name"])) {
            array_push($error, "Please enter last name.");
            echo "blah";
        } else {
            $last_name = $_POST["last_name"];
            $last_name = test_input($last_name);
        }

        if (!isset($_POST["email"])) {
            array_push($error, "Please enter an email.");
        } else {
            $email = $_POST["email"];
            $email = test_input($email);
        }

        if (!isset($_POST["password"])) {
            array_push($error, "Please enter a password.");
        } else {
            $password = $_POST["password"];
            $password = test_input($password);
        }

        if (!isset($_POST["password2"])) {
            array_push($error, "Please confirm the password.");
        } else {
            $password2 = $_POST["password2"];
            $password2 = test_input($password2);
        }

        if ($password && $password2) {

            if ($password2 != $password) {
                array_push($error, "Passwords do not match.");
            }
        }


    }

    ?>

</main>

</body>
</html>