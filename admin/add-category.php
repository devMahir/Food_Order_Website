<?php include('partials/menu.php');?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Category</h1>
        <br><br>

        <?php
            if (isset($_SESSION['add-category'])) {
                echo $_SESSION['add-category'];
                unset($_SESSION['add-category']);
            }
            if (isset($_SESSION['upload'])) {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
        ?><br>

        <!-- Add Category Form Starts  -->
        
        <form action="" method="POST" enctype="multipart/form-data">

            <table class="tbl-30">
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" placeholder="Category TItle">
                    </td>
                </tr>

                <tr>
                    <td>Select Image:</td>
                    <td>
                        <input type="file" name ="image">
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
                        <input type="submit" name="submit" value="Add Category" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
        <!-- Add Category Form Starts  -->

        <?php 
            //check whether the submit button is clicked or not
            if(isset($_POST['submit'])){
                //Get the value from category form
                $title = $_POST['title'];

                //for radio input, we need to check whether the button is selected or not
                if (isset($_POST['featured'])) {
                    //get the value form form
                    $featured = $_POST['featured'];
                }
                else {
                    //Set the default value
                    $featured = "No";
                }
                if (isset($_POST['active'])) {
                    //get the value form form
                    $active = $_POST['active'];
                }
                else {
                    //Set the default value
                    $active = "No";
                }

                //check whether the image is selected or not and set tahe value for image name accourdingly
                
                if (isset($_FILES['image']['name'])) {
                    //upload the image
                    //To upload image we need image name, source path and destionation  path
                    $image_name = $_FILES['image']['name'];

                    //Upload the image only if image is selected
                    if ($image_name != "") {
                        
                        //auto renaiming the image
                        //get the extention of our image.
                        $ext = end(explode('.',$image_name));

                        //rename the imagge now
                        $image_name = "Food_Category_".rand(000,999).'.'.$ext; //e.g. "Food_Category_834.jpg"

                        $source_path = $_FILES['image']['tmp_name'];

                        $destination_path = "../images/category/".$image_name;

                        //finaly upload the image
                        $upload = move_uploaded_file($source_path,$destination_path);
                        
                        //check whether the image ins upladed or not
                        //if the image is not uplades we will stop the process and redict with error message
                        if ($upload==FALSE) {
                            //set message
                            $_SESSION['upload'] = "<div class='error'>Failed to Upload Image. </div>";
                            //redirect to add category page
                            header('location:'.SITEURL.'admin/add-category.php');
                            //stop the process
                            die();
                        }
                    }else{
                        //upload and set image name value as blank
                        $_SESSION['image_not_upload'] = "<div class='error'>No Image Selected Thats why Image not Added. </div>";
                    }

                }
                
                
                //Create SQL Query to insert catefory into database
                $sql = "INSERT INTO tbl_category SET
                    title = '$title',
                    image_name = '$image_name',
                    featured = '$featured',
                    active = '$active'
                ";

                //Execute the query and save in database
                $res = mysqli_query($conn,$sql);

                if ($res) {
                    //query excuted and category
                    $_SESSION['add-category'] = "<div class='success'>Category Added Successfully</div>";
                    header('location:'.SITEURL.'admin/manage-category.php');
                }else {
                    //failed to add category
                    $_SESSION['add-category'] = "<div class='error'>Failed to Add Category</div>";
                    header('location:'.SITEURL.'admin/add-category.php');
                }
            }
        ?>


    </div>
</div>

<?php include('partials/footer.php');?> 