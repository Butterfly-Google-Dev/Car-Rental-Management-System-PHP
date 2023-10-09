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

                Dashboard
            </h2>
            
            <!-- Search BOX -->
            <div class="search-wrapper">
                <span class="las la-search"></span>
                <input type="search" placeholder="search here" />
            </div>

            <!-- ADMIN HERE -->
            <div class="user-wrapper">
                <!-- <img src="#" width="30px" height="30px" alt=""> -->
                    <div>
                        <h4>Pixel</h4>
                        <small>Admin</small>
                    </div>
            </div>
        </header>
        <!-- END OF HEAD TITLE SECTION -->

        <!-- FOR CARDS Contents -->
        <main>
            <div class="cards">
                <div class="card-single">
                    <div>
                        <h1>54</h1>
                        <span>Manage Vehicles</span>
                    </div>
                    <div>
                        <span class="las la-users"></span>
                    </div>
                </div>

                <div class="card-single">
                    <div>
                        <h1>79</h1>
                        <span>Add Vehicles</span>
                    </div>
                    <div>
                        <span class="las la-users"></span>
                    </div>
                </div>

                <div class="card-single">
                    <div>
                        <h1>124</h1>
                        <span>Manage Bookings</span>
                    </div>
                    <div>
                        <span class="las la-users"></span>
                    </div>
                </div>

            </div>
        </main>
    </div>  
    <!-- END OF HEAD SECTION -->

</body>
</html>