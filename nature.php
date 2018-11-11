<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>A & K Photography</title>
    <link rel="stylesheet" type="text/css" href="bootstrapSuperhero.css"/>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
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

                    <li ><a href="index.php">Home <span class="sr-only">(current)</span></a></li>
                    <li class ="dropdown active">
                        <a class="dropdown-toggle " data-toggle="dropdown"  href="catalog.php">Catalog
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="catalog.php">Catalog</a></li>
                            <li><a href="food.php">Food</a></li>
                            <li><a href="pets.php">Pets</a></li>
                            <li class="active"><a href="nature.php">Nature</a></li>
                            <li><a href="concerts.php">Concerts</a></li>
                            <li><a href="pineapples.php">Pineapple</a></li>
                            <li><a href="romantic.php">Romantic</a></li>
                        </ul>
                    </li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="contact.php">Contact</a></li>
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
                    <a href="images/water.jpg"> <img src="images/water.jpg" alt="water" ></a>
                </div>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 ">
                <div class="thumbnail">
                    <a href="images/yellowflowers.jpg"> <img src="images/yellowflowers.jpg" alt="yellowflowers"></a>
                </div>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 ">
                <div class="thumbnail">
                    <a href="images/sunset.jpg"> <img src="images/sunset.jpg" alt="sunset"></a>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-3 col-lg-offset-1 col-md-3 col-md-offset-1 col-sm-3 col-sm-offset-1 col-xs-12 ">
                <div class="thumbnail">
                    <a href="images/butterfly.jpg"> <img src="images/butterfly.jpg" alt="butterfly" ></a>
                </div>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 ">
                <div class="thumbnail">
                    <a href="images/ring.jpg"> <img src="images/ring.jpg"  alt="ring"></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 ">
                <div class="thumbnail">
                    <a href="images/pink.jpg"> <img src="images/pink.jpg" alt="pink"></a>
                </div>
            </div>

        </div>

    </div>
</main>
</body>
</html>