<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Food</h1>

        <?php
            if (isset($_SESSION['add-food'])) {
                echo $_SESSION['add-food'];
                unset($_SESSION['add-food']);
            }
        ?>

        <br><br>

        <form action="" method="POST" enctype="multipart/form-data">

            <table class="tbl-30">
                <tr>
                    <td>Title:</td>
                    <td>
                        <input type="text" name="title" placeholder="Title of the Food">
                    </td>
                </tr>

                <tr>
                    <td>Description:</td>
                    <td>
                        <textarea name="description" cols="30" rows="5" placeholder="Description of the Food."></textarea>
                    </td>
                </tr>

                <tr>
                    <td>Price:</td>
                    <td>
                        <input name="price" pattern="^\d*(\.\d{0,2})?$" >
                    </td>
                </tr>

                <tr>
                    <td>Select Image:</td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>Category:</td>
                    <td>
                        <select name="category">

                            <?php
                                //Create PHP to display categoried from database
                                //1. Crate sql query to get all active categoried from database
                                $sql = "SELECT * FROM tbl_category WHERE active ='Yes'";

                                //Executing query
                                $res = mysqli_query($conn,$sql);

                                //count Rows to check whether we have categoruies or not
                                $count = mysqli_num_rows($res);

                                //If count is geeter then 0 then we have categoried
                                if ($count>0) {
                                    //we have catogories;
                                    while ($row=mysqli_fetch_assoc($res)) {
                                        //get the details of categories
                                        $id = $row['id'];
                                        $title = $row['title'];
                                        ?>
                                        <option value="<?php echo $id?>"><?php echo $title?></option>

                                        <?php

                                    }
                                }else{
                                    //we do not have categories
                                    ?>
                                    <option value="0">No Catrgories Found</option>
                                    <?php
                                }
                                //Display on Dropdown 
                            ?>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Featured: </td>
                    <td>
                        <input type="radio" name="featured" value="Yes"> Yes
                        <input type="radio" name="featured" value="No"> No
                    </td>
                </tr>

                <tr>
                    <td>Active: </td>
                    <td>
                        <input type="radio" name="active" value="Yes"> Yes
                        <input type="radio" name="active" value="No"> No
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input class="btn-secondary" type="submit" name="submit" value="Add Food">
                    </td>
                </tr>

            </table>
        </form>


        <?php 
            if (isset($_POST['submit'])) {
                //add the fooos in database
                $title = $_POST['title'];
                $description = $_POST['description'];
                $price = $_POST['price'];
                $category = $_POST['category'];
                
                //check whether radio button for featured and active are checked or not
                if (isset($_POST['featured'])) {
                    $featured = $_POST['featured'];
                }else{
                    $featured = "No";
                }
                if (isset($_POST['active'])) {
                    $active = $_POST['active'];
                }else{
                    $active = "No";
                }

                //select image is clicked or not adn upload the image onlu if the image is selected
                if (isset($_FILES['image']['name'])) {
                    //upload the image

                    $image_name = $_FILES['image']['name']; //store the image name
                    if ($image_name != "") {
                        $ext = end(explode('.',$image_name)); //taking the extention from the image name
                        $image_name = "Food_Name_".rand(000,999).'.'.$ext; //image name selection
                        $source_path = $_FILES['image']['tmp_name']; //temporary folder name when the image is selected to upload in databse
                        $destination_path = "../images/food/".$image_name; //select the folder where the image is stored in server
                        $upload = move_uploaded_file($source_path,$destination_path); //moving the image file to sourse folder to stored folder;
                        if ($upload==FALSE) {
                            $_SESSION['upload']= "<div class='error'>Failed to Upload Image. </div>";
                            //redirect to add category page
                            header('location:'.SITEURL.'admin/add-food.php');
                            //stop the process
                            die();
                        }
                    }else{
                        //upload and set image name value as blank
                        $_SESSION['image_not_upload'] = "<div class='error'>No Image Selected Thats why Image not Added. </div>";
                    }

                }

                $sql1 = "INSERT INTO `tbl_food` SET
                    title = '$title',
                    description = '$description',
                    price = '$price',
                    image_name = '$image_name',
                    category_id = '$id',
                    featured = '$featured',
                    active = '$active'
                    ";

                $res = mysqli_query($conn,$sql1);
                if ($res) {
                    $_SESSION['add-food'] = "<div class='success'>Food Added Successfully</div>";
                    header('location:'.SITEURL.'admin/manage-food.php');
                }else{
                    $_SESSION['add-food'] = "<div class='error'>Failed to Add Food</div>";
                    header('location:'.SITEURL.'admin/add-food.php');

                }
            }
        ?>



    </div>
</div>

<?php include('partials/footer.php'); ?>