<?php

include 'connect.php';
$conn = Connect();

function GetImageExtension($imagetype) {
    if(empty($imagetype)) return false;
    
    switch($imagetype) {
        case 'assets/img/cars/bmp': return '.bmp';
        case 'assets/img/cars/gif': return '.gif';
        case 'assets/img/cars/jpeg': return '.jpg';
        case 'assets/img/cars/png': return '.png';
        default: return false;
    }
}


# submitting form to the database
      
if(isset($_POST['submit'])){

    $car_name = $conn->real_escape_string($_POST['car_name']);
    $car_nameplate = $conn->real_escape_string($_POST['car_nameplate']);
    $ac_price = $conn->real_escape_string($_POST['ac_price']);
    $non_ac_price = $conn->real_escape_string($_POST['non_ac_price']);
    $ac_price_per_day = $conn->real_escape_string($_POST['ac_price_per_day']);
    $non_ac_price_per_day = $conn->real_escape_string($_POST['non_ac_price_per_day']);
    $car_availability = "yes";


    if (!empty($_FILES["uploadedimage"]["name"])) {
        $file_name=$_FILES["uploadedimage"]["name"];
        $temp_name=$_FILES["uploadedimage"]["tmp_name"];
        $imgtype=$_FILES["uploadedimage"]["type"];
        $ext= GetImageExtension($imgtype);
        $imagename=$_FILES["uploadedimage"]["name"];
        $target_path = "assets/img/cars/".$imagename;

        if(move_uploaded_file($temp_name, $target_path)) {
            
            $query = "INSERT into cars(car_name,car_nameplate,car_img,ac_price,non_ac_price,ac_price_per_day,non_ac_price_per_day,car_availability) 
            VALUES('" . $car_name . "','" . $car_nameplate . "','".$target_path."','" . $ac_price . "','" . $non_ac_price . "','" . $ac_price_per_day . "','" . $non_ac_price_per_day . "','" . $car_availability ."')";
            $success = $conn->query($query);
            
        } 
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">


    <title>Admin Page</title>

    <style>
        .form-area {
            background-color: red;
            padding: 30px;

            border: 1px white;
        }

        input[type=text] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            box-sizing: border-box;
            border: 1px solid #555;
            outline: none;
        }

        input[type=text]:focus {
            background-color: lightblue;
        }

    </style>

</head>

<body>

    <input type="checkbox" id="nav-toggle">
    <!-- SIDE BAR STARTS HERE -->
    <div class="sidebar">
        <!-- For brand name -->
        <div class="sidebar-brand">
            <h2><span class="lab la-accusoft"></span>
                <span>Car Rental</span>
            </h2>
        </div>

        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="admin.php">
                        <span class="las la-igloo"></span>
                        <span> Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="a-manage-brand.php">
                        <span class="las la-igloo"></span>
                        <span> Manage Vehicles</span>
                    </a>
                </li>

                <li>
                    <a href="a-vehicle.php">
                        <span class="las la-igloo"></span>
                        <span> Add Vehicles</span>
                    </a>
                </li>

                <li>
                    <a href="a-bookings.php">
                        <span class="las la-igloo"></span>
                        <span> Bookings</span>
                    </a>
                </li>

                <li>
                    <a href="index.php">
                        <span class="las la-igloo"></span>
                        <span> Logout</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script type="text/javascript">
        const currentLocation = location.href;
        const menuItem = document.querySelectorAll('a');
        const menuLength = menuItem.length
        for (let i = 0; i < menuLength; i++) {
            if (menuItem[i].href === currentLocation) {
                menuItem[i].className = "active";

            }
        }
    </script>


    <!-- HEADER MAIN FOR THE SIDEBAR -->
    <div class="main-content">
        <!-- HEADING TITLE & SEARCH & ADMIN SECTION  -->
        <header>
            <h2>
                <label for="nav-toggle">
                    <span class="las la-bars"></span>
                </label>

                Vehicles
            </h2>

            <!-- Search BOX -->
            <div class="search-wrapper">
                <span class="las la-search"></span>
                <input type="search" placeholder="search here" />
            </div>

            <!-- ADMIN HERE -->
            <div class="user-wrapper">
                <img src="#" width="30px" height="30px" alt="">
                <div>
                    <h4>Lysa</h4>
                    <small>Admin</small>
                </div>
            </div>
        </header>
        <!-- END OF HEAD TITLE SECTION -->


        <!-- Upload VEHICLES SECTION -->
        <main>

                <div class="col-md-7" style="float: none;">
                    <div class="form-area">
                        <form role="form" action="a-vehicle.php" enctype="multipart/form-data" method="POST">
                            <br style="clear: both">
                            <h3 style="margin-bottom: 25px; text-align: center; font-size: 30px;"> Please Provide the Car Details. </h3>

                            <div class="form-group">
                                <input type="text" class="form-control" id="car_name" name="car_name" placeholder="Car Name " required autofocus="">
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" id="car_nameplate" name="car_nameplate" placeholder="Vehicle Number Plate" required>
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" id="ac_price" name="ac_price" placeholder="AC Fare per KM (Rs)" required>
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" id="non_ac_price" name="non_ac_price" placeholder="Non-AC Fare per KM (Rs)" required>
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" id="ac_price_per_day" name="ac_price_per_day" placeholder="AC Fare per day (Rs)" required>
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" id="non_ac_price_per_day" name="non_ac_price_per_day" placeholder="Non-AC Fare per day (Rs)" required>
                            </div>

                            <div class="form-group">
                                <input name="uploadedimage" type="file">
                            </div>
                            <button type="submit" id="submit" name="submit" class="btn btn-success pull-right"> Submit for Rental</button>
                        </form>
                    </div>
                </div>



                <footer class="site-footer">
                    <div class="container">
                        <hr>
                        <div class="row">
                            <div class="col-sm-6">
                                <h5>© <?php echo date("Y"); ?> Car Rentals</h5>
                            </div>
                        </div>
                    </div>
                </footer>


        </main>

    </div>
    <!-- END OF HEAD SECTION -->


    <script type="text/javascript" src="assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>


</body>

</html>