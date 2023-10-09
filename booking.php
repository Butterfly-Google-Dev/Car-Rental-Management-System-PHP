<?php

require 'connect.php';
$conn = Connect();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Car Rental </title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/w3css/w3.css">


    <style>
        .menu-content {
            display: grid;
            grid-gap: 20px;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            justify-items: center;
        }


        .form-area {
            background-color: #FAFAFA;
            padding: 10px 40px 60px;
            margin: 10px 0px 60px;
            border: 1px solid GREY;
            opacity: 0.9;
        }

        html {
            font-size: 62.5%;
            overflow-x: hidden;
        }



        .heading {
            text-align: center;
            color: var(--black);
            text-transform: uppercase;
            padding: 1rem;
            font-size: 3.5rem;
            padding-bottom: 2rem;
        }

        .heading span {
            color: var(--green);
            text-transform: uppercase;
        }

        .header-1 {
            background: #eee;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 2rem 9%;
        }

        .logo {
            color: var(--black);
            font-weight: bolder;
            font-size: 3rem;
        }

        .logo i {
            padding-right: 1.4rem;
            color: var(--green);
        }
    </style>

</head>

<body ng-app="">

    <!-- header section starts  -->

    <header>

        <div class="header-1">

            <a href="#" class="logo"><i class="fas fa-car-side"></i>Car Rental</a>


            <h3>Welcome User</h3>

        </div>

    </header>

    <!-- header section ends -->

    <!-- CAR SELECTION section starts  -->
    <section class="menu-content">


        <div class="container" style="margin-top: 65px;">
            <div class="col-md-7" style="float: none; margin: 0 auto;">
                <div class="form-area">
                    <form role="form" action="confirmation.php" method="POST">
                        <br style="clear: both">


                        <?php
                        $car_id = $_GET["id"];
                        $sql1 = "SELECT * FROM cars WHERE car_id = '$car_id'";
                        $result1 = mysqli_query($conn, $sql1);

                        if (mysqli_num_rows($result1)) {
                            while ($row1 = mysqli_fetch_assoc($result1)) {
                                $car_name = $row1["car_name"];
                                $car_nameplate = $row1["car_nameplate"];
                                $ac_price = $row1["ac_price"];
                                $non_ac_price = $row1["non_ac_price"];
                                $ac_price_per_day = $row1["ac_price_per_day"];
                                $non_ac_price_per_day = $row1["non_ac_price_per_day"];
                            }
                        }

                        ?>

                        <!-- <div class="form-group"> -->
                        <h5> Selected Car:&nbsp; <b><?php echo ($car_name); ?></b></h5>
                        <!-- </div> -->

                        <!-- <div class="form-group"> -->
                        <h5> Number Plate:&nbsp;<b> <?php echo ($car_nameplate); ?></b></h5>
                        <!-- </div>      -->
                        <!-- <div class="form-group"> -->
                        <?php $today = date("Y-m-d") ?>
                        <label>
                            <h5>Start Date:</h5>
                        </label>
                        <input type="date" name="rent_start_date" min="<?php echo ($today); ?>" required="">
                        &nbsp;
                        <label>
                            <h5>End Date:</h5>
                        </label>
                        <input type="date" name="rent_end_date" min="<?php echo ($today); ?>" required="">
                        <!-- </div>      -->

                        <h5> Choose your car type: &nbsp;
                            <input  type="radio" name="radio" value="ac" ng-model="myVar"> <b>With AC </b>&nbsp;
                            <input  type="radio" name="radio" value="non_ac" ng-model="myVar"><b>With-Out AC </b>


                            <div ng-switch="myVar">
                                <div ng-switch-default>
                                    <!-- <div class="form-group"> -->
                                    <h5>Fare: <h5>
                                            <!-- </div>    -->
                                </div>
                                <div ng-switch-when="ac">
                                    <!-- <div class="form-group"> -->
                                    <h5>Fare: <b><?php echo ("Rs. " . $ac_price . "/km and Rs. " . $ac_price_per_day . "/day"); ?></b>
                                        <h5>
                                            <!-- </div>    -->
                                </div>
                                <div ng-switch-when="non_ac">
                                    <!-- <div class="form-group"> -->
                                    <h5>Fare: <b><?php echo ("Rs. " . $non_ac_price . "/km and Rs. " . $non_ac_price_per_day . "/day"); ?></b>
                                        <h5>
                                            <!-- </div>   -->
                                </div>
                            </div>

                            <h5> Charge type: &nbsp;
                                <input  type="radio" name="radio1" value="km"><b> per KM</b> &nbsp;
                                <input  type="radio" name="radio1" value="days"><b> per day</b>

                                <br><br>


                                <input type="hidden" name="hidden_carid" value="<?php echo $car_id; ?>">


                                <input type="submit" name="submit" value="Rent Now" class="btn btn-warning pull-right">
                    </form>

                </div>
                <div class="col-md-12" style="float: none; margin: 0 auto; text-align: center;">
                    <h6><strong>Note:</strong> ONLINE PAYMENT IS NOT YET AVAILABLE.</h6>
                </div>
            </div>
    </section>


    <!-- car selection section ends -->

    <!-- footer section starts  -->

    <section class="footer">

        <div class="box-container">

            <div class="box">
                <a href="#" class="logo"><i class="fas fa-car-side"></i>car rental</a>
        
            </div>

    </section>

    <!-- footer section ends -->

    <!-- Javascript   -->
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>

</body>

</html>