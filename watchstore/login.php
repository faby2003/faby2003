<?php
session_start(); 

$con = mysqli_connect("localhost", "root", "", "watch_store");
if (!$con) {
    die("DB not Connected: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM `login` WHERE email='$email' AND password='$password'";
    $login_data = mysqli_query($con, $sql);

    if ($login_data) {
        if (mysqli_num_rows($login_data) > 0) {
            $user_sql = "SELECT UserID FROM `users` WHERE Email='$email'";
            $user_data = mysqli_query($con, $user_sql);

        
                $user_value = mysqli_fetch_assoc($user_data);
                $_SESSION['userid'] = $user_value['UserID']; 

                $login_value = mysqli_fetch_assoc($login_data);

                if ($login_value['usertype'] == 1) {
                    header('Location: userhome.html');
                    exit();
                } else {
                    header('Location: adminhome.html');
                    exit();
                }

        } else {
            echo "<script>alert('Invalid login credentials')</script>";
        }
    } else {
        echo "<script>alert('Query error')</script>";
    }
}

mysqli_close($con);
?>
