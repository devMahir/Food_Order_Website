<?php include('partials-front/menu.php'); //To insert menu on this page ?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            <?php
                if (isset($_GET['id'])) {
                    $category_id = $_GET['id'];
                    $title = $_GET['title'];
                }else {
                    header('location:'.SITEURL);
                }
                
            ?>
            <h2>Foods On <a href="<?php echo SITEURL;?>categories.php" class="text-white">"<?php echo $title;?>"</a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->


    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>



            <?php 

                $sql = "SELECT * FROM tbl_food WHERE category_id= $category_id";
                $res = mysqli_query($conn,$sql);
                $count = mysqli_num_rows($res);
                if ($count) {
                    while ($row = mysqli_fetch_assoc($res)) {
                        $id = $row['id'];
                        $title = $row['title'];
                        $price = $row['price'];
                        $description = $row['description'];
                        $image_name = $row['image_name'];

                        ?>
                        <div class="food-menu-box">
                            <div class="food-menu-img">
                                <?php
                                    if ($image_name) {
                                        ?>
                                        <img src="<?php echo SITEURL;?>images/food/<?php echo $image_name;?>" class="img-responsive img-curve">
                                        <?php
                                    }else {
                                        echo "<div class='error'>Image not Available</div>";
                                    }
                                ?>

                               
                            </div>

                            <div class="food-menu-desc">
                                <h4> <?php echo $title; ?></h4>
                                <p class="food-price">BDT <?php echo $price; ?></p>
                                <p class="food-detail"><?echo $description;?></p>
                                <br>

                                <a href="<?php echo SITEURL; ?>order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                            </div>
                        </div>

                        <?php
                    }
                }
            ?>


            

            


            <div class="clearfix"></div>


        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

<?php include('partials-front/footer.php'); //To add footer in this page ?>