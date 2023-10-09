<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lysa's Car Rental</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/homestyle.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
   

    <style>
        i {
            padding-right: 1rem;
        }
    </style>
</head>

<body>

    <div class="header">
        <!-- NAVVVVVVVV BARRRRRRRRRRRRR -->

        <!-- navbar-light to set the theme and bg-light for the background theme -->
        <!-- Render menu items in the navbar, navbar-expand-sm (small) -->
        <nav class="effect-nav navbar navbar-expand-sm navbar-dark bg-dark">
            <!-- navbar-brand is for the margin top left corner of the page -->
            <a class="navbar-brand" href="index.php" class="logo"><i class="fas fa-car-side"></i>Car Rental</a>


            <!-- div receive an ID which has to fetch the target defined above -->
            <div class="collapse navbar-collapse">
                <!-- navbar-nav hold the actual menu items || navbar-nav mr-auto (margin right auto) -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item" data-target="#myCaro" data-slide-to="0"><a class="nav-link">Home</a></li>
                    <li class="nav-item" data-target="#myCaro" data-slide-to="1"><a class="nav-link">About</a> </li>
                    <li class="nav-item" data-target="#myCaro" data-slide-to="2"><a class="nav-link">Contact</a> </li>
                </ul>

            </div>

            <ul class="nav-reg navbar-nav ml-auto">
                <li class="nav-item"><a href="registration.php" class="nav-link">Register</a></li>
                <li class="nav-item"><a href="login.php" class="nav-link">Login</a> </li>
            </ul>


        </nav>



        <!-- CAROUSEL FUNCTIONALITY -->
        <!-- data interval false for canceling the sliding effect -->
        <div id="myCaro" class="effect-caro carousel slide" data-interval="false">
            <ol class="carousel-indicators">
                <li data-target="#myCaro" data-slide-to="0" class="active"></li>
                <li data-target="#myCaro" data-slide-to="1"></li>
                <li data-target="#myCaro" data-slide-to="2"></li>
            </ol>


            <div class="carousel-inner">
                <div class="carousel-item active" style="background-image:url(./img/bg1.jpg)">
                <div class="d-flex h-100 align-items-center justify-content-center">
                <h3></h3>
            </div>

                </div>

                <div class="carousel-item" style="background-image:url(./img/bg2.jpg)">
                    <!-- <div class="container">
                        <h1>header two</h1>
                        <p>text goes here for header two</p>
                    </div> -->

                    <div class="d-flex h-100 align-items-center justify-content-center">
                    <h3>Text 2</h3>
            </div>

                </div>

                <div class="carousel-item" style="background-image:url(./img/bg3.jpg)">
                <div class="d-flex h-100 align-items-center justify-content-center">
                    <h3>Text 3</h3>
                    </div>

                </div>
            </div>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>