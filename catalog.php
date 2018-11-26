<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>A & K Photography</title>
    <link rel="stylesheet" type="text/css" href="bootstrapSuperhero.css"/>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <!--   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> -->
    <!-- Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
<header>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1">
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
                    <li class ="dropdown active">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="catalog.php">Catalog
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li class="active "><a href="catalog.php">Catalog</a></li>
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
                    <li><a href="products.php">Products</a></li>
                    <li><a href="cameras.php">Cameras</a></li>
                    <li><a href="cart.php">Cart</a></li>
                </ul>

            </div>
        </div>
    </nav>
</header>

<main>
    <div class="container-fluid" style="padding-left: 5%">
        <div class="row">

            <div class="col-lg-3 col-lg-offset-1 col-md-3 col-md-offset-1 col-sm-3 col-sm-offset-1 col-xs-12 ">
                <div class="thumbnail">
                    <a href="food.php"> <img src="images/food2.jpg" alt="food2" ></a>
                </div>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 ">
                <div class="thumbnail">
                    <a href="pets.php"> <img src="images/sophie19.jpg" alt="sophie19"></a>
                </div>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 ">
                <div class="thumbnail">
                    <a href="nature.php"> <img src="images/sunset.jpg" alt="sunset"></a>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-3 col-lg-offset-1 col-md-3 col-md-offset-1 col-sm-3 col-sm-offset-1 col-xs-12 ">
                <div class="thumbnail">
                    <a href="concerts.php"> <img src="images/Fasterhorses.jpg" alt="Fasterhorses" ></a>
                </div>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 ">
                <div class="thumbnail">
                    <a href="pineapples.php"> <img src="images/colorfulpineapple.jpg"  alt="colorfulpineapple"></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 ">
                <div class="thumbnail">
                    <a href="romantic.php"> <img src="images/romantic1.jpg" alt="romantic1"></a>
                </div>
            </div>

        </div>
    </div>
</main>

</body>
</html>