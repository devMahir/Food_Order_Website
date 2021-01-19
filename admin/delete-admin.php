<?php

    //include constant.php file here
    include('../config/constants.php');
    //get the id of admin to be deleted
    $id = $_GET['id'];

    //create sql query to delete admin
    $sql = "DELETE FROM tbl_admin WHERE id=$id";

    //Execute the Query
    $res = mysqli_query($conn, $sql);

    //check whether the query executed successfully or not
    if ($res==TRUE) {
        //Query Executed successfully 
        //echo "Admin Deleted";
        //create session variable for delete message
        $_SESSION['delete'] = "<div class='success'>Admin Deleted Successfully.</div>";
        //Redirect to manage admin page
        header('location:'.SITEURL.'admin/manage-admin.php');
    }else {
        //Failed to deleted
        //echo "not Deleted";
        $_SESSION['delete'] = "<div class='errortr'>Failed to Delete Admin. Try again latter.</div>";
        //Redirect to manage admin page
        header('location:'.SITEURL.'admin/manage-admin.php');
    }
    //redirect the manage admin page with massage(success/error)

?>