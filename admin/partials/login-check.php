<?php
    //Authorization - Access Control
    //check whether the user is logged in or not
    if(!isset($_SESSION['user'])) //IF user session is not set
    {
        //useris not loged in
        //redirect to login page with message
        $_SESSION['no-login-message'] = "<div class='error text-center'>Please login to access admin panel.</div>";
        echo $_SESSION['no-login-message'];
        //redirect to login page
        header('location:'.SITEURL.'admin/login.php');
    }
?>