<?php

require 'connect.php';
$conn = Connect();

?>
<!-- test -->

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
                        <span>Add Vehicles</span>
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
        for(let i = 0; i<menuLength; i++)
        {
            if(menuItem[i].href === currentLocation)
            {
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

                Bookings
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

        <!-- TABLE FOR BOOKED CARS -->
        <main>
            
        <h3 style="text-align:center;" id="product">Booked Cars</h3>
  <br>
  
    <?php
    $sql1 = "SELECT * FROM rentedcars";
    $result1 = mysqli_query($conn, $sql1);

    if (mysqli_num_rows($result1) > 0) {

        echo "
        <table>
        <tr>
            <th>Name </th>
            <th>Car Name </th>
            <th>Booking Date </th>       
            <th>Rent Start Date </th>
            <th>Rent End Date </th>
            <th>Car Return Date </th>
            <th>Fare </th>
            <th>Charge Type </th>
            <th>Distance </th>
            <th>Number of Days </th>
            <th>Total Amount </th>
            <th>Return Status </th>

        </tr>";

      while ($row1 = mysqli_fetch_assoc($result1)) {
       
        
        // output data of each row
        $customer_username = $row1["customer_username"];
        $car_id = $row1["car_id"];
        $booking_date = $row1["booking_date"];
        $rent_start_date = $row1["rent_start_date"];
        $rent_end_date = $row1["rent_end_date"];
        $car_return_date = $row1["car_return_date"];
        $fare = $row1["fare"];
        $charge_type = $row1["charge_type"];
        $distance = $row1["distance"];
        $no_of_days = $row1["no_of_days"];
        $total_amount = $row1["total_amount"];
        $return_status = $row1["return_status"];

        echo 
        "<tr>
            <td>".$row["name"]."</td>
            <td>".$row["email"]."</td>
            <td>".$row["address"]."</td>
            <td>".$row["dob"]."</td>
         </tr>";

         

    ?>
       
      <?php }
      

      echo "</table>";
      
    } else {
      ?>
        <table>
        <tr>
            <th>Name </th>
            <th>Car Name </th>
            <th>Booking Date </th>       
            <th>Rent Start Date </th>
            <th>Rent End Date </th>
            <th>Car Return Date </th>
            <th>Fare </th>
            <th>Charge Type </th>
            <th>Distance </th>
            <th>Number of Days </th>
            <th>Total Amount </th>
            <th>Return Status </th>
            
        </tr>
        </table>
        

    <?php
    }
    ?>


    </main>
    </div>  
    <!-- END OF HEAD SECTION -->




</body>
</html>