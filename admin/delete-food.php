<?php

    //include constant.php file here
    include('../config/constants.php');
    //get the id of category to be deleted
    echo $id = $_GET['id'];

    //get the image_name of category to be deleted
    $image_name = $_GET['image_name'];
    
    if($image_name !=""){
        unlink('../images/food/'.$image_name); //delete the fiended image from folder;
        $_SESSION['remove_image'] = "<div class='error'>Food image is successfully deleted.</div>";
        header('location:'.SITEURL.'admin/manage-food.php');
    }else{
        $_SESSION['remove_image'] = "<div class='error'>Failed to Delete Food Image. Because There is no iamge.</div>";
        header('location:'.SITEURL.'admin/manage-food.php');
    }

    //create sql query to delete admin
    $sql = "DELETE FROM tbl_food WHERE id=$id";

    //Execute the Query
    $res = mysqli_query($conn, $sql);

    //check whether the query executed successfully or not
    if ($res==TRUE) {
        //Query Executed successfully 
        //echo "Admin Deleted";
        //delete image from folder
        //create session variable for delete message
        $_SESSION['delete'] = "<div class='success'>Food Deleted Successfully.</div>";
        //Redirect to manage admin page
        header('location:'.SITEURL.'admin/manage-food.php');
    }else {
        //Failed to deleted
        //echo "not Deleted";
        $_SESSION['delete'] = "<div class='errortr'>Failed to Delete Food. Try again latter.</div>";
        //Redirect to manage admin page
        header('location:'.SITEURL.'admin/manage-food.php');
    }
    //redirect the manage admin page with massage(success/error)

?>