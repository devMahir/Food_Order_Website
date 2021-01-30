<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Category</h1>
        <br><br>

            <?php
                if (isset($_SESSION['add-category'])) {
                    echo $_SESSION['add-category'];
                    unset($_SESSION['add-category']);
                }
                if(isset($_SESSION['remove_image'])){
                    echo $_SESSION['remove_image'];
                    unset($_SESSION['remove_image']);
                }
                if(isset($_SESSION['delete'])){
                    echo $_SESSION['delete'];
                    unset($_SESSION['delete']);
                }
                if(isset($_SESSION['no-category-found'])){
                    echo $_SESSION['no-category-found'];
                    unset($_SESSION['no-category-found']);
                }
                if(isset($_SESSION['image_not_upload'])){
                    echo $_SESSION['image_not_upload'];
                    unset($_SESSION['image_not_upload']);
                }
                if(isset($_SESSION['update'])){
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                }
                if(isset($_SESSION['failed-remove'])){
                    echo $_SESSION['failed-remove'];
                    unset($_SESSION['failed-remove']);
                }
            ?><br><br>

            <!-- Button to add Category --> 

            <a href="<?php echo SITEURL; ?>admin/add-category.php" class="btn-primary">Add Category</a>

            <br><br><br>

            <table class="tbl-full">
                <tr>
                    <th>S.N.</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Featured</th>
                    <th>Active</th>
                    <th>Actions</th>
                </tr>
                
                <?php
                    $sql = "SELECT * FROM tbl_category"; //SElect all the databse
                    $res = mysqli_query($conn,$sql); //connect to database and sql commant
                    $sn = 1;
                    if ($res) {
                        $count = mysqli_num_rows($res); //To check how many rows are in database 
                        if ($count>0) {
                            while ($rows = mysqli_fetch_assoc($res)) {
                                $id = $rows['id'];
                                $title = $rows['title'];
                                $image_name = $rows['image_name'];
                                $featured = $rows['featured'];
                                $active = $rows['active'];
                                ?>
                                <tr>
                                    <td><?php echo $sn++; ?>.</td>
                                    <td><?php echo ucwords($title); ?></td>

                                    <td>
                                        <?php 
                                            //check whether image name is available or not
                                            if($image_name!=""){
                                                //diaplaying the image
                                                ?>
                                                <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name;?>" width="100px">
                                                <?php
                                            }else{
                                                //display the error message
                                                echo "<div class='error'>Image Not Added</div>";
                                            }
                                        ?>
                                    </td>
                                    
                                    <td><?php echo $featured; ?></td>
                                    <td><?php echo $active; ?></td>
                                    <td>
                                        <a href="<?php echo SITEURL;?>admin/update-category.php?id=<?php echo $id?>" class="btn-secondary">Update Category</a>
                                        <a href="<?php echo SITEURL;?>admin/delete-category.php?id=<?php echo $id?>&image_name=<?php echo $image_name?>" class="btn-danger">Delete Category</a>
                                    </td>
                                </tr>
                            <?php
                            }
                        }else{
                            //we do not have any data in database
                            //ew will display message inside table
                            ?>
                            <tr>
                                <td class="text-center" colspan="6"><div class="error">No Category Added</div></td>
                            </tr>
                        <?php
                        }
                    }
                ?>

            </table>
    </div>
</div>

<?php include('partials/footer.php'); ?>