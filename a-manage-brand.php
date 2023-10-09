<?php
include 'connect.php';
$conn = Connect();

if (isset($_REQUEST['del'])) {
    $delid = intval($_GET['del']);
    $sql = "delete from cars SET id=:status WHERE  id=:delid";
    $query = $dbh->prepare($sql);
    $query->bindParam(':delid', $delid, PDO::PARAM_STR);
    $query->execute();
    $msg = "Vehicle  record deleted successfully";
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
                        <span> Vehicles</span>
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

                Manage
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


        <!-- MODIFY VEHICLES SECTION -->
        <main>


            <div class="ts-main-content">
                <div class="content-wrapper">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-md-12">

                                <!-- Zero Configuration Table -->
                                <div class="panel panel-default">
                                    <div class="panel-heading">Vehicle Details</div>
                                    <div class="panel-body">
                                        <table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Vehicle Name</th>
                                                    <th>Vehicle Number Plate </th>
                                                    <th>Vehicle Image</th>
                                                    <th>AC Price Per KM</th>
                                                    <th>Non AC Price Per KM</th>
                                                    <th>AC Price Per Day</th>
                                                    <th>Non AC Price Per Day</th>
                                                    <th>Car Availability</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php $sql = "SELECT 
                                                                
                                                                    car_name,
                                                                    car_nameplate,
                                                                    car_img,
                                                                    ac_price,
                                                                    non_ac_price,
                                                                    ac_price_per_day,
                                                                    non_ac_price_per_day,
                                                                    car_availability FROM cars";
                                               
                                               
                                                $result = mysqli_query($conn, $sql);
                                                $cnt = 1;
                                                if (mysqli_num_rows($result) > 0) {
                                                    foreach ($results as $result) {                ?>
                                                        <tr>
                                                            <td><?php echo htmlentities($cnt); ?></td>
                                                            <td><?php echo htmlentities($result->car_name); ?></td>
                                                            <td><?php echo htmlentities($result->car_nameplate); ?></td>
                                                            <td><?php echo htmlentities($result->car_img); ?></td>
                                                            <td><?php echo htmlentities($result->ac_price); ?></td>
                                                            <td><?php echo htmlentities($result->non_ac_price); ?></td>
                                                            <td><?php echo htmlentities($result->ac_price_per_day); ?></td>
                                                            <td><?php echo htmlentities($result->non_ac_price_per_day); ?></td>
                                                            <td><?php echo htmlentities($result->car_availability); ?></td>
                                                            <td>
                                                            <a href="edit-vehicle.php?id=<?php echo $result->id; ?>">
                                                            <i class="fa fa-edit"></i></a>&nbsp;&nbsp;
                                                            <a href="manage-vehicles.php?del=<?php echo $result->id; ?>" onclick="return confirm('Do you want to delete');">
                                                            <i class="fa fa-close"></i></a>
                                                            </td>
                                                        </tr>
                                                <?php $cnt = $cnt + 1;
                                                    }
                                                } ?>

                                            </tbody>
                                        </table>



                                    </div>
                                </div>



                            </div>
                        </div>

                    </div>
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




</body>

</html>