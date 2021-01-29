<?php

    //include constant.php file here
    include('../config/constants.php');
    //get the id of category to be deleted
    $id = $_GET['id'];

    //get the image_name of category to be deleted
    $image_name = $_GET['image_name'];
    
    if($image_name !=""){
        unlink('../images/category/'.$image_name); //delete the fiended image from folder;
        $_SESSION['remove_image'] = "<div class='error'>Category image is successfully deleted.</div>";
        header('location:'.SITEURL.'admin/manage-category.php');
    }else{
        $_SESSION['remove_image'] = "<div class='error'>Failed to Delete Category Image. Because There is no iamge.</div>";
        header('location:'.SITEURL.'admin/manage-category.php');
    }

    //to Find the image name from the database slow process which we will not use because we already initialize it on manage-category.php page
    //$sql_for_image = "SELECT * FROM tbl_category WHERE id=$id";
    //$excude = mysqli_query($conn,$sql_for_image);
    //$row = mysqli_fetch_assoc($excude);
    //$image_name = $row['image_name'];

    //create sql query to delete admin
    $sql = "DELETE FROM tbl_category WHERE id=$id";

    //Execute the Query
    $res = mysqli_query($conn, $sql);

    //check whether the query executed successfully or not
    if ($res==TRUE) {
        //Query Executed successfully 
        //echo "Admin Deleted";
        //delete image from folder
        //create session variable for delete message
        $_SESSION['delete'] = "<div class='success'>Category Deleted Successfully.</div>";
        //Redirect to manage admin page
        header('location:'.SITEURL.'admin/manage-category.php');
    }else {
        //Failed to deleted
        //echo "not Deleted";
        $_SESSION['delete'] = "<div class='errortr'>Failed to Delete Category. Try again latter.</div>";
        //Redirect to manage admin page
        header('location:'.SITEURL.'admin/manage-category.php');
    }
    //redirect the manage admin page with massage(success/error)

?>