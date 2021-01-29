<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Food</h1>


        <?php 
            if (isset($_SESSION['upload'])) {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
            if (isset($_SESSION['image_not_upload'])) {
                echo $_SESSION['image_not_upload'];
                unset($_SESSION['image_not_upload']);
            }
            if (isset($_SESSION['add-food'])) {
                echo $_SESSION['add-food'];
                unset($_SESSION['add-food']);
            }
            if (isset($_SESSION['remove_image'])) {
                echo $_SESSION['remove_image'];
                unset($_SESSION['remove_image']);
            }
            if (isset($_SESSION['delete'])) {
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
            }
            if (isset($_SESSION['remove-failed'])) {
                echo $_SESSION['remove-failed'];
                unset($_SESSION['remove-failed']);
            }
            
            
        ?>
        <br><br>
            <!-- Button to add Food --> 
            
            <a href="<?php echo SITEURL;?>admin/add-food.php" class="btn-primary">Add Food</a>

            <br><br><br>

            <table class="tbl-full">
                <tr>
                    <th>S.N.</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Featured</th>
                    <th>Active</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>

                <?php
                    $serial_number = 1;
                    $sql = "SELECT * FROM tbl_food";
                    $res = mysqli_query($conn,$sql);
                    if ($res) {
                        $count = mysqli_num_rows($res);
                        if($count>0){
                            while ($rows = mysqli_fetch_assoc($res)) {
                                $id = $rows['id'];
                                $title = $rows['title'];
                                $price = $rows['price'];
                                $image_name = $rows['image_name'];
                                $featured = $rows['featured'];
                                $active = $rows['active'];
                                ?>

                                <tr>
                                    <td><?php echo $serial_number++; ?> </td>
                                    <td><?php echo $title; ?></td>
                                    
                                    <td>
                                        <?php 
                                            if ($image_name !="") {
                                                ?>
                                                <img src="<?php echo SITEURL;?>images/food/<?php echo $image_name;?>" width="100px" >
                                                <?php
                                            }else{
                                                echo "<div class='error'>Image Not Added</div>";
                                            }
                                        ?>
                                    </td>

                                    <td><?php echo $featured; ?></td>
                                    <td><?php echo $active; ?></td>
                                    <td><?php echo "BDT ".$price; ?></td>
                                    <td>
                                        <a href="<?php echo SITEURL;?>admin/update-food.php?id=<?php echo $id;?>" class="btn-secondary">Update Food</a>
                                        <a href="<?php echo SITEURL;?>admin/delete-food.php?id=<?php echo $id;?>&image_name=<?php echo $image_name; ?>" class="btn-danger">Delete Food</a>
                                    </td>
                                </tr>

                                <?php
                            }
                        }else{
                            ?>
                            <tr>
                                <td class="text-center error" colspan="6"> No Food Added Yet </td>
                            </tr>
                            <?php
                        }
                    }
                ?>

            </table>
    </div>
</div>

<?php include('partials/footer.php'); ?>