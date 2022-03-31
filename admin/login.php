<?php include('../config/constants.php'); ?>

<html>
    <dead>
        <title>Login - Food Order System</title>
        <link rel = "stylesheet" href = "../css/admin.css">
    </dead>

    <body>
        <div class="Login">
            <h1 class="text-center">Login</h1>
            <br><br>
            <?php
                if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }

                if(isset( $_SESSION['no-login-message']))
                {
                    echo  $_SESSION['no-login-message'];
                    unset( $_SESSION['no-login-message']);
                }
             ?>
             <br><br>
            <form class="form_login" action="" method="POST" class="text-center">
                Username:<br>
                <input type = "text" name="username" placeholder="Enter Username"><br><br>
                Password:<br>
                <input type = "password" name="password" placeholder="Enter Password"><br><br>

                <input type = "submit" name="submit" value = "Login" class="btn=primary">
                <br><br>
            </form>
            <p class="text-center">
                Created By - <a href = "www.vijaythapa.com">Vijay Thapa</a>
            </p>
        </div>
    </body>
</html>


<?php 
    if(isset($_POST['submit']))
    {
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        $sql = "SELECT * FROM tbl_admin WHERE user_name ='$username' AND password ='$password'";

        $res = mysqli_query($conn, $sql);

        $count = mysqli_num_rows($res);

        if($count==1)
        {
            $_SESSION['login'] = "<div class = 'success'>Login Successfull. </div>";

            $_SESSION['user'] = $username;

            header('location:'.SITEURL.'admin/');
        }
        else
        {
            $_SESSION['login'] = "<div class = 'error text-conter'>Username or Password did not match. </div>";

            header('location:'.SITEURL.'admin/login.php');
        }
    }   


?>
