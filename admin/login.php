<?php include('../config/constants.php'); ?>

<html>
    <head>
        <title>Login - Food Order System</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>

    <body>
        <br><br>
        <div class="login">
            <h1 class="text-center">Login</h1><br>

            <!-- Login Message -->
            <?php
                if(isset($_SESSION['login'])){
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }
                if(isset($_SESSION['no-login-message'])){
                    echo $_SESSION['no-login-message'];
                    unset($_SESSION['no-login-message']);
                }
            ?><br>

            <!-- Login form starts here -->

            <form action="" method="POST" class="">
                <table class="tbl-center">
                
                    <tr>
                        <td>Username: </td>
                        <td>
                            <input type="text" name="username" placeholder="Enter Username">
                        </td>
                    </tr>

                    <tr>
                        <td>Password: </td>
                        <td>
                            <input type="password" name="password" placeholder="Enter Password">
                        </td>
                    </tr>
                    <tr><td><br></td></tr>
                    <tr>
                        <td colspan="2" class="text-center">
                            <input type="submit" value="Login" name="submit" class="btn-primary">
                        </td>
                    </tr>
                
                </table>
            </form>

            <!-- Login form Ends here -->
            <br>

            <p class="text-center">Created by <a href="#">Mahir Shahriar</a></p>
        </div>
    </body>
</html>

<?php
    //Check wheather the submit button is clicked or not
    if (isset($_POST['submit'])) {
        //process for login
        //get the data from login form
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        //sql to check wether the userwith username and password exist or not

        $sql = "SELECT * FROM `tbl_admin` WHERE `username` = '$username' AND `password` = '$password'";

        //Executed the query
        $res = mysqli_query($conn,$sql);

        //count rows to check whether the user exist or not
        $count = mysqli_num_rows($res);

        if ($count==1) {
            //userser available
            $_SESSION['login'] = "<div class='success text-center'>Login Successful.</div>";
            $_SESSION['user'] = $username; //to check whether the user is logged in or not and logout will unset it.
            //redirect to homepage/dashboard
            header('location:'.SITEURL.'admin/');
        }
        else {
            //user not abailable and login fail
            $_SESSION['login'] = "<div class='error text-center'>Username or Password did not match.</div>";
            //redirect to homepage/dashboard
            header('location:'.SITEURL.'admin/login.php');
        }
    }
?>