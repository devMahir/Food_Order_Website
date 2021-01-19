<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Admin</h1><br>

        <?php 
            //Get the id to select admin
            $id = $_GET['id'];

            //create sql query to get the details
            $sql = "SELECT * FROM tbl_admin WHERE id=$id";

            //Execute the query
            $res = mysqli_query($conn,$sql);
            
            //check the query is executed or not
            if ($res==TRUE) {
                //check whether the data is available or not
                $count = mysqli_num_rows($res);
                //check whether we have admin data or not
                if ($count==1) {
                    //get the details
                    //echo "Admin Available";
                    $row = mysqli_fetch_assoc($res);
                    
                    $id = $row['id'];
                    $full_name = $row['full_name'];
                    $username = $row['username'];
                    
                }else {
                    //redirect to manage admin page
                    header('location:'.SITEURL.'admin/manage-admin.php');
                }
            }
        ?><br><br>

        <form action="" method="POST">
        <table class="tbl-30">
                <tr>
                    <td>Full Name</td>
                    <td><input type="text" name ="full_name" placeholder="Your Name" value="<?php echo $full_name?>"></td>
                </tr>

                <tr>
                    <td>Username</td>
                    <td><input type="text" name ="username" placeholder="Your Username" value="<?php echo $username?>"></td>
                    <td><input type="hidden" name ="id" placeholder="Your Username" value="<?php echo $id?>"></td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Update Admin" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php 

    //check whether the submit button is clicked or not
    if (isset($_POST['submit'])) {
        //echo "button clicked";
        //Get all the values from form to update
        $id = $_POST['id'];
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];

        //Create a SQL Query to update admin
        $sql = "UPDATE tbl_admin SET
        full_name = '$full_name',
        username = '$username'
        WHERE id = '$id'";

        //Excute the query
        $res = mysqli_query($conn,$sql);

        //Check whether the query execute successfullly or not
        if ($res) {
            //Query executed and admin updated
            $_SESSION['update'] = "<div class='success'>Admin Updated successfully.</div>";
            header('location:'.SITEURL.'admin/manage-admin.php');
        }else {
            //Faild to update
            $_SESSION['update'] = "<div class='error'>Failed to Update Admin.</div>";
            header('location:'.SITEURL.'admin/manage-admin.php');
        }


    }

?>

<?php include('partials/footer.php'); ?>