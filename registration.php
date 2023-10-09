<?php

@include 'connect.php';

# submitting form to the database
if (isset($_POST['submitted'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['number'];
    $address = $_POST['Address'];
    $pass = md5($_POST['password']);
    $cpass = md5($_POST['confirm_password']);
    $gender = $_POST['Gender'];
    $user_type = $_POST['user_type'];

    $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";
    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0) {
        $error[] = 'user already exits';
    } else {
        if ($pass != $cpass) {
            $error[] = 'password does not match';
        } else {
            $insert = "INSERT INTO user_form(name,email,phone_no,address,password,gender,user_type) VALUES ('$name','$email','$contact',
                '$address','$pass', '$gender','$user_type') ";

            mysqli_query($conn, $insert);
            header('location:login.php');
        }
    }
};

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Registration</title>

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

            <h1> Register Now</h1>
            <?php
            if (isset($error)) {
                foreach ($error as $error) {
                    echo '<span class="error-msg">' . $error . '</span>';
                };
            };
            ?>
            <label for="flname">Enter your Name</label>
            <input type="text" name="name" required placeholder="Enter your name">
            <label for="email">Enter your Email</label>
            <input type="email" name="email" required placeholder="Enter your email">
            <label for="">Enter Contact Number </label>
            <input type="text" name="number" required placeholder="Enter your Contact Number">
            <label for="">Enter your Address</label>
            <input type="text" name="Address" required placeholder="Enter your Address">
            <label for="">Enter your password</label>
            <input type="password" name="password" required placeholder="Enter your password">
            <label for="">Confirm Password</label>
            <input type="password" name="confirm_password" required placeholder="Confirm your password">

            <label for="">Select Gender</label>
            <input type="radio" name="Gender" value="Male">Male
            <input type="radio" name="Gender" value="Female">Female
            <input type="radio" name="Gender" value="Unspecified" checked="">Unspecified

            <label for="">Select Role</label>
            <select name="user_type">
                <option value="user">user</option>
                <option value="admin">admin</option>
            </select>

            <input type="submit" class="registerbtn" name="submitted" value="register now">
            <p>Already have an Account? <a href="login.php">Login now</a></p>

        </form>

    </div>

</body>

</html>