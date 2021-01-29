<?php include('partials-front/menu.php'); //To insert menu on this page ?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <form action="<?php echo SITEURL?>food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php
                //adding food from database that are active and featured;
                $sql2 = "SELECT * FROM tbl_food WHERE active = 'Yes'";
                $res2 = mysqli_query($conn,$sql2);
                $count2 = mysqli_num_rows($res2);
                //Checking the food is available or not;
                if ($count2) {
                    //food available
                    while ($row2 = mysqli_fetch_assoc($res2)) {
                        $id = $row2['id'];
                        $title = $row2['title'];
                        $price = $row2['price'];
                        $discription = $row2['description'];
                        $image_name = $row2['image_name'];
                        ?>
                            <div class="food-menu-box">
                                <div class="food-menu-img">
                                    <?php
                                        if ($image_name=="") {
                                            //image Not available
                                            echo "<div class='error'>Image not Available</div>";
                                        }else {
                                            //image available
                                            ?>
                                            <img src="<?php echo SITEURL;?>images/food/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                                            <?php
                                        }
                                    ?>
                                </div>

                                <div class="food-menu-desc">
                                    <h4><?php echo $title;?></h4>
                                    <p class="food-price">BDT <?php echo $price; ?></p>
                                    <p class="food-detail"><?php echo $discription;?></p>
                                    <br>
                                    <a href="<?php echo SITEURL; ?>order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                                </div>
                            </div>
                        <?php
                    }
                }else {
                    echo "<div class='error'>Food Not available.</div>";
                }
            ?>


            <div class="clearfix"></div>

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

<?php include('partials-front/footer.php'); //To add footer in this page ?>