<?php include('partials/menu.php'); ?>
    
    <!-- Main Content Section Start -->
    <div class="main-content">
    <div class="wrapper">
            <h1>DASHBOARD</h1>
            
            <?php
                //show login confirmation on admin panel.
                if(isset($_SESSION['login'])){
                    echo $_SESSION['login']; //to show login success.
                    unset($_SESSION['login']); //to remove confirmation after reloading the page.
                }
            ?>


            <div class="col-4 text-center">
                <h1>5</h1>
                <br>
                Categories
            </div>

            <div class="col-4 text-center">
                <h1>5</h1>
                <br>
                Categories
            </div>

            <div class="col-4 text-center">
                <h1>5</h1>
                <br>
                Categories
            </div>

            <div class="col-4 text-center">
                <h1>5</h1>
                <br>
                Categories
            </div>

            <div class="clearfix"></div>
        </div>
    </div>
    <!-- Main Content Section End -->

<?php include('partials/footer.php'); ?>