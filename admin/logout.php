<?php
    //inclde constant.php for SITEURL
    include('../config/constants.php');

    //distroy the session 
    session_destroy(); //unsets $_SESSION['user'];
    //redirect to login page
    header('location:'.SITEURL.'admin/login.php');
?>