<?php include('partials/menu.php'); ?>

    <!-- Main Content Section Start -->
    <div class="main-content">
    <div class="wrapper">
            <h1>Manage Admin</h1>

            <br>
            <?php 
                if (isset($_SESSION['add'])) {
                    echo $_SESSION['add']; //Displaing Session Message
                    unset($_SESSION['add']); //Removing Session Message
                }
                if (isset($_SESSION['delete'])) {
                    echo $_SESSION['delete']; //Displaing Session Massage
                    unset($_SESSION['delete']); //Removing Session Massage
                }
                if (isset($_SESSION['update'])) {
                    echo $_SESSION['update']; //Displaing Session Massage
                    unset($_SESSION['update']); //Removing Session Massage  
                }
                if (isset($_SESSION['user-not-found'])) {
                    echo ($_SESSION['user-not-found']); //Displaing Session Massage
                    unset($_SESSION['user-not-found']); //Removing Session Massage 
                }
                if (isset($_SESSION['pass-not-match'])) {
                    echo ($_SESSION['pass-not-match']); //Displaing Session Massage
                    unset($_SESSION['pass-not-match']); //Removing Session Massage 
                }
                if (isset($_SESSION['change-pass'])) {
                    echo ($_SESSION['change-pass']); //Displaing Session Massage
                    unset($_SESSION['change-pass']); //Removing Session Massage 
                }
            ?>
            <br>
            <br>
            <br>
            <!-- Button to add Admin --> 
            
            <a href="add-admin.php" class="btn-primary">Add Admin</a>

            <br><br><br>

            <table class="tbl-full">
                <tr>
                    <th>S.N.</th>
                    <th>Full Name</th>
                    <th>Username</th>
                    <th>Actions</th>
                </tr>

                <?php
                    //Query to Get all Admin
                    $sql = "SELECT * FROM tbl_admin";
                    //Excute the Query
                    $res = mysqli_query($conn,$sql);

                    //Check wheather the query exectued or not
                    if ($res==TRUE) {
                        //count rows to check weather we have data in database or not
                        $count = mysqli_num_rows($res); //Function to get all the rows in database

                        $sn = 1; //Create a Variable and assign the value

                        //Check the num of rows
                        if ($count>0) {
                            //WE have data in database
                            while ($rows=mysqli_fetch_assoc($res)) {
                                //using while loop to get all the data from database
                                //And while loop will run as long as we have data in database

                                //Get individual Data
                                $id = $rows['id'];
                                $full_name = $rows['full_name'];
                                $username = $rows['username'];

                                //DIsplay the values in our table
                                ?>
                                    <tr>
                                        <td><?php echo $sn++; ?></td>
                                        <td><?php echo $full_name; ?></td>
                                        <td><?php echo $username; ?></td>
                                        <td>
                                            <a href="<?php echo SITEURL;?>admin/update-password.php?id=<?php echo $id?>" class="btn-primary">Change Password</a>
                                            <a href="<?php echo SITEURL;?>admin/update-admin.php?id=<?php echo $id?>" class="btn-secondary">Update Admin</a>
                                            <a href="<?php echo SITEURL;?>admin/delete-admin.php?id=<?php echo $id?>" class="btn-danger">Delete Admin</a>
                                        </td>
                                    </tr>
                                <?php
                            }
                        }else {
                            //we do not have data in database
                        }
                    }
                ?>
            </table>

            <div class="clearfix"></div>
        </div>
    </div>
    <!-- Main Content Section End -->

<?php include('partials/footer.php'); ?>