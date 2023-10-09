<?php

@include 'connect.php';
session_start();

if (isset($_POST['submit'])) {

    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$password' ";
    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);

        if ($row['user_type'] == 'admin') {
            $_SESSION['admin_name'] = $row['name'];
            header('location:admin.php');
        } elseif ($row['user_type'] == 'user') {
            $_SESSION['user_name'] = $row['name'];
            header('location:user.php');
        }
    } else {
        $error[] = 'Incorrect Email or Password';
    }
};

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        input {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            box-sizing: border-box;
        }


        /* Set a style for the submit button */
        .registerbtn {
            background-color: #04AA6D;
            color: white;
            padding: 16px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
            opacity: 0.9;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <form action="" method="post">
            <h1>Login Now</h1>
            <?php
            if (isset($error)) {
                foreach ($error as $error) {
                    echo '<span class="error-msg">' . $error . '</span>';
                };
            };
            ?>

            <div>
                <input type="email" class="form-control" name="email" placeholder="Enter your email">
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" name="password" placeholder="Enter your password">
            </div>
            <div class="form-floating">
                <input type="submit" class="registerbtn" name="submit" value="Login">
            </div>
            <p>Don't have an account? <a href="registration.php">Register Now</a></p>

        </form>
    </div>


</body>

</html>