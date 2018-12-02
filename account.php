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
    <link rel="stylesheet" type="text/css" href="accountStyle.css"/>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        #Product:hover #menu{
            display: block;
            position: absolute;
        }
        #Catalog:hover #menu1{
            display: block;
            position: absolute;
        }
    </style>
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
                    <li><a href="index.php">Home <span class="sr-only">(current)</span></a></li>
                    <li id="Catalog">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="catalog.php">Catalog
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu" id="menu1">
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
                    <?php
                    if (isset($_SESSION["logged_in"])) {
                        echo "<li><a href='logout.php'>Logout</a></li>";
                    } else {
                        echo "<li><a href=\"login.php\">Login</a></li>";
                        echo "<li><a href=\"register.php\">Register</a></li>";
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
</header>
<main>

    <!-- Page Container -->
    <div class="w3-content w3-margin-top" style="max-width:1400px;">

        <!-- The Grid -->
        <div class="w3-row-padding">

            <!-- Left Column -->
            <div class="w3-third">

                <div class="w3-white w3-text-grey w3-card-4">
                    <div class="w3-display-container">
                        <img src="images/blank-profile-picture.png" style="width:100%" alt="Avatar">
                        <div class="w3-display-bottomleft w3-container w3-text-black">
                            <h2><?php echo $_SESSION["first_name"] . " " . $_SESSION["last_name"]; ?></h2>
                        </div>
                    </div>
                    <div class="w3-container">
                        <p><i class="fa fa-user fa-fw w3-margin-right w3-large w3-text-teal"></i>
                            <?php echo $_SESSION["first_name"] . " " . $_SESSION["last_name"]; ?></p>
                        <p><i class="fa fa-home fa-fw w3-margin-right w3-large w3-text-teal"></i>London, UK</p>
                        <p><i class="fa fa-envelope fa-fw w3-margin-right w3-large w3-text-teal"></i>
                            <?php echo $_SESSION["email"]; ?></p>
                        <p><i class="fa fa-phone fa-fw w3-margin-right w3-large w3-text-teal"></i>1224435534</p>
                        <p><i class="fa fa-gift fa-fw w3-margin-right w3-large w3-text-teal"></i>
                            <?php echo $_SESSION["giftcard_balance"]; ?></p>
                        <hr>
                    </div>
                </div><br>

                <!-- End Left Column -->
            </div>

            <!-- Right Column -->
            <div class="w3-twothird">
                <div class="w3-container w3-card w3-white w3-margin-bottom">
                    <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-credit-card fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Orders</h2>

                    <?php

                    $query = "SELECT DISTINCT orderID FROM orders WHERE userID=" . $_SESSION["userID"];
                    $stmt = $conn->prepare($query);
                    $stmt->execute();
                    $num = $stmt->rowCount();
                    for ($i = 0; $i < $num; $i++) {
                        $result = $stmt->fetchAll();
                        foreach ($result as $order) {
                            echo "<div class=\"w3-container\">";
                            echo "<h5 class=\"w3-opacity\"><b>Order Number: " . $order[0] . "</b></h5>";
                            echo "<h6 class=\"w3-text-teal\"><i class=\"fa fa-calendar fa-fw w3-margin-right\">";

                            $query2 = "SELECT * FROM orders WHERE orderID=" . $order[$i];
                            $stmt2 = $conn->prepare($query2);
                            $stmt2->execute();
                            $orders = $stmt2->fetchAll();
                            $products = [];
                            $quantity = [];
                            $price = [];
                            $date = $orders[0]["date"];
                            $total_cost = 0;
                            //print_r($orders);
                            echo "<br/>";
                            echo "</i>". $date . "<span class=\"w3-tag w3-teal w3-round\"></span></h6>";

                            foreach ($orders as $item) {
                                $total_order = array($item["productID"], $item["quantity"], $item["price"]);

                                array_push($products, $item["productID"]);
                                array_push($quantity, $item["quantity"]);
                                array_push($price, $item["price"]);


                                for ($j = 0; $j < count($products); $j++) {
                                    $query3 = "SELECT * FROM products WHERE productID=" . $total_order[0];
                                    $stmt3 = $conn->prepare($query3);
                                    $stmt3->execute();
                                    $product_info = $stmt3->fetch();
                                    echo "<div class='row'>";
                                    echo "<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 w3-opacity account-item' >Item: " . $product_info["name"] . "</div></div>";

                                }
                                echo "<div class='row'>";
                                echo "<div class='col-lg-offset-1 col-lg-4 col-md-4 col-sm-4 col-xs-12 w3-opacity'>Quantity: " . $item["quantity"] .  "</div>";
                                echo "<div class='col-lg-4 col-md-4 col-sm-4 col-xs-12 w3-opacity'>Price: " . $item["price"] .  "</div>";
                                echo "</div>";
                                echo "<br/>";
                                $total_cost += $item["price"];

                                $products = [];
                            }
                            echo "<p class='account-total w3-opacity'>Total Price: " . $total_cost . "</p>";
                            echo "<hr>";
                            echo "</div>";
                        }
                    }

                    ?>

<!--                    <div class="w3-container">-->
<!--                        <h5 class="w3-opacity"><b>Web Developer / something.com</b></h5>-->
<!--                        <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>Mar 2012 - Dec 2014</h6>-->
<!--                        <p>Consectetur adipisicing elit. Praesentium magnam consectetur vel in deserunt aspernatur est reprehenderit sunt hic. Nulla tempora soluta ea et odio, unde doloremque repellendus iure, iste.</p>-->
<!--                        <hr>-->
<!--                    </div>-->
<!--                    <div class="w3-container">-->
<!--                        <h5 class="w3-opacity"><b>Graphic Designer / designsomething.com</b></h5>-->
<!--                        <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>Jun 2010 - Mar 2012</h6>-->
<!--                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p><br>-->
<!--                    </div>-->
                </div>


<!--                <div class="w3-container w3-card w3-white w3-margin-bottom">-->
<!--                    <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-credit-card fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Orders</h2>-->
<!--                    <div class="w3-container">-->
<!--                        <h5 class="w3-opacity"><b>Front End Developer / w3schools.com</b></h5>-->
<!--                        <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>Jan 2015 - <span class="w3-tag w3-teal w3-round">Current</span></h6>-->
<!--                        <p>Lorem ipsum dolor sit amet. Praesentium magnam consectetur vel in deserunt aspernatur est reprehenderit sunt hic. Nulla tempora soluta ea et odio, unde doloremque repellendus iure, iste.</p>-->
<!--                        <hr>-->
<!--                    </div>-->
<!--                    <div class="w3-container">-->
<!--                        <h5 class="w3-opacity"><b>Web Developer / something.com</b></h5>-->
<!--                        <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>Mar 2012 - Dec 2014</h6>-->
<!--                        <p>Consectetur adipisicing elit. Praesentium magnam consectetur vel in deserunt aspernatur est reprehenderit sunt hic. Nulla tempora soluta ea et odio, unde doloremque repellendus iure, iste.</p>-->
<!--                        <hr>-->
<!--                    </div>-->
<!--                    <div class="w3-container">-->
<!--                        <h5 class="w3-opacity"><b>Graphic Designer / designsomething.com</b></h5>-->
<!--                        <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>Jun 2010 - Mar 2012</h6>-->
<!--                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p><br>-->
<!--                    </div>-->
<!--                </div>-->

<!--                <div class="w3-container w3-card w3-white">-->
<!--                    <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-certificate fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Saved Items for Later</h2>-->
<!--                    <div class="w3-container">-->
<!--                        <h5 class="w3-opacity"><b>W3Schools.com</b></h5>-->
<!--                        <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>Forever</h6>-->
<!--                        <p>Web Development! All I need to know in one place</p>-->
<!--                        <hr>-->
<!--                    </div>-->
<!--                    <div class="w3-container">-->
<!--                        <h5 class="w3-opacity"><b>London Business School</b></h5>-->
<!--                        <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>2013 - 2015</h6>-->
<!--                        <p>Master Degree</p>-->
<!--                        <hr>-->
<!--                    </div>-->
<!--                    <div class="w3-container">-->
<!--                        <h5 class="w3-opacity"><b>School of Coding</b></h5>-->
<!--                        <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>2010 - 2013</h6>-->
<!--                        <p>Bachelor Degree</p><br>-->
<!--                    </div>-->
<!--                </div>-->

                <!-- End Right Column -->
            </div>

            <!-- End Grid -->
        </div>

        <!-- End Page Container -->
    </div>


</main>
<script>

    $(document).ready(function(){

        // create variable to hold the current modal window
        var activeWindow;

        $('a.modalLink').click(function(e){

            // cancel the default link behaviour
            e.preventDefault();

            // find the href of the link that was clicked to use as an id
            var id = $(this).attr('href');

            // assign the window with matching id to the activeWindow variable, move it to the center of the screen and fade in
            activeWindow = $('.window#' + id)
                .css('opacity', '0') // set to an initial 0 opacity
                .css('top', '50%') // position vertically at 50%
                .css('left', '50%') // position horizontally at 50%
                .fadeTo(500, 1); // fade to an opacity of 1 (100%) over 500 milliseconds

            // create blind and fade in
            $('#modal')
                .append('<div id="blind" />') // create a <div> with an id of 'blind'
                .find('#blind') // select the div we've just created
                .css('opacity', '0') // set the initial opacity to 0
                .fadeTo(500, 0.8) // fade in to an opacity of 0.8 (80%) over 500 milliseconds
                .click(function(e){
                    closeModal(); // close modal if someone clicks anywhere on the blind (outside of the window)
                });

        });

        $('a.close').click(function(e){
            // cancel default behaviour
            e.preventDefault();

            // call the closeModal function passing this close button's window
            closeModal();
        });

        function closeModal()
        {

            // fade out window and then move back to off screen when fade completes
            activeWindow.fadeOut(250, function(){ $(this).css('top', '-1000px').css('left', '-1000px'); });

            // fade out blind and then remove it
            $('#blind').fadeOut(250,    function(){ $(this).remove(); });

        }

    });

    // When the user clicks anywhere outside of the modal, close it
    var modal = document.getElementById('ticketModal');
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>


</body>
</html>