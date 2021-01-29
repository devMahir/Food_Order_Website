<?php include('partials-front/menu.php'); //To insert menu on this page ?>

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>

            <?php
                //Create sql query to display catagiries from database
                $sql = "SELECT * FROM tbl_category WHERE active ='Yes' ";
                $res = mysqli_query($conn,$sql);
                $count = mysqli_num_rows($res);
                if ($count>0) {
                    //Categoried available
                    while ($row = mysqli_fetch_assoc($res)) {
                        //Get the values like id, title and image_name;
                        $id = $row['id']; //to get the id from database;
                        $title = $row['title']; //to get the Title from database;
                        $image_name = $row['image_name']; //to get the image_name from database;
                        
                        ?>

                        <a href="<?php echo SITEURL;?>category-foods.php?id=<?php echo $id;?>&title=<?php echo $title?>">
                        <div class="box-3 float-container">
                            <?php
                                if ($image_name=="") {
                                    echo "<div class='error'>Category Image Not Available</div>"; //image not avaible message
                                }else {
                                    //image name is available
                                    ?>
                                    <img src="<?php echo SITEURL;?>images/category/<?php echo $image_name;?>" alt="Pizza" class="img-responsive img-curve">
                                    <?php
                                }
                            ?>
                            <h3 class="float-text text-white"><?php echo $title; //shoing category name ?></h3>
                        </div>
                        </a>
                        <?php
                    }
                }else {
                    //Catefories not available;
                    echo "<div class='error'>Categoried not Added.</div>";
                }
            ?>
            

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

<?php include('partials-front/footer.php'); //To add footer in this page ?>