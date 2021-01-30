<?php include('partials/menu.php');?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Category</h1>
        <br><br>

        <?php
            //get the data from database
            if(isset($_GET['id'])){
                $id = $_GET['id']; //The id who will be update
                $sql = "SELECT * FROM tbl_category WHERE id = $id";
                $res = mysqli_query($conn,$sql);
                
                $count = mysqli_num_rows($res);
                if ($count==1) {
                    
                    $row = mysqli_fetch_assoc($res);
                    if($row==TRUE){
                        $title = $row['title'];
                        $current_image = $row['image_name'];
                        $feature = $row['featured'];
                        $active = $row['active'];
                    }
                }else{
                    $_SESSION['no-category-found'] = "<div class='error'>Category Not Found</div>";
                    header('location:'.SITEURL.'admin/manage-category.php');
                    die();
                }
            }
        ?>

        <!-- Add Category Form Starts  -->
                
        <form action="" method="POST" enctype="multipart/form-data">

            <table class="tbl-30">
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" placeholder="Category TItle" value="<?php echo $title?>">
                    </td>
                </tr>

                <tr>
                    <td>Current Image:</td>
                    <td>
                        <?php 
                            if ($current_image !="") {
                                //disply the image
                                ?>
                                <img src="<?php echo SITEURL;?>images/category/<?php echo $current_image;?>" width="150px">
                                <?php
                            }else{
                                //dispay message
                                echo "<div class='error'>Image Not added. </div>";
                            }
                        ?>
                    </td>
                </tr>

                <tr>
                    <td>New Image:</td>
                    <td>
                        <input type="file" name ="image">
                    </td>
                </tr>

                <tr>
                    <td>Featured: </td>
                    <td>
                        <input <?php if ($feature == "Yes") { echo "checked"; }?>  type="radio" name="featured" value="Yes"> Yes
                        <input <?php if ($feature ==  "No") { echo "checked"; }?> type="radio" name="featured" value="No"> No
                    </td>
                </tr>
                <tr>
                    <td>Active: </td>
                    <td>
                        <input <?php if ($active == "Yes") { echo "checked"; }?> type="radio" name="active" value="Yes"> Yes
                        <input <?php if ($active ==  "No") { echo "checked"; }?> type="radio" name="active" value="No"> No
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="current_image" value="<?php echo $current_image?>">
                        <input type="hidden" name="id" value="<?php echo $id?>">
                        <input type="submit" name="submit" value="Update Category" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>

        <?php
            if (isset($_POST['submit'])) {
                //get all the values from our form
                $id            = $_POST['id'];
                $title         = $_POST['title'];
                $current_image = $_POST['current_image'];
                $feature       = $_POST['featured'];
                $active        = $_POST['active'];

                
                //updating new image if selected
                //check the image is selected or not
                $image_name = $_FILES['image']['name'];
              
                    
                if ($image_name != "") {
                    //image available
                    //upload the new image
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
                    //remove the current image if available
                    if ($current_image!="") { //if current image exixt;
                        $remove_path ="../images/category/".$current_image;
                        $remove = unlink($remove_path);
                        //check whether the image is removed or not
                        //if failed to remove then display message and stop the process
                        if ($remove==false) {
                            //failed to remove image
                            $_SESSION['failed-remove'] = "<div class='error'>Failed to remove current image.</div>";
                                header('location:'.SITEURL.'admin/manage-category.php');
                                die();//
                            }
                        }
                    }else{
                        $image_name = $current_image;
                    }
                

                //update the database
                $sql2 = "UPDATE tbl_category SET
                    title = '$title',
                    image_name = '$image_name',
                    featured = '$feature',
                    active = '$active'
                    WHERE id = $id    
                ";

                //Excute the query
                $res2 = mysqli_query($conn,$sql2);

                //redirect to manage category with message
                //check whether executed or not
                if ($res2==TRUE) {
                    //category updated
                    $_SESSION['update']="<div class='success'>Category Updated Successfully.</div>";
                    header('location:'.SITEURL.'admin/manage-category.php');
                }else{
                    //catefory not updated
                    $_SESSION['update']="<div class='error'>Category Not Updated.</div>";
                    header('location:'.SITEURL.'admin/manage-category.php');
                }

            }
        ?>

    </div>
</div>
<?php include('partials/footer.php');?> 