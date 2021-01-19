<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Change Password</h1><br><br>

        <?php 
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
            }
        ?>

        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Current Password: </td>
                    <td>
                        <input type="password" name="current_password" placeholder="Current Password">
                    </td>
                </tr>

                <tr>
                    <td>New Password: </td>
                    <td>
                        <input type="password" name="new_password" placeholder="New Password">
                    </td>
                </tr>

                <tr>
                    <td>Confirm Password: </td>
                    <td>
                        <input type="password" name="confirm_password" placeholder="Confirm Password">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id?>">
                        <input class="btn-secondary" type="submit" name="submit" value="Change Password">
                    </td>
                </tr>
            </table>
        </form>

    </div>
</div>

<?php
    //check whether the submit button is clicked or not
    if (isset($_POST['submit'])) {
        //echo "clicked";

        //Get the data from form
        $id = $_POST['id'];
        $current_password = md5($_POST['current_password']);
        $new_password = md5($_POST['new_password']);
        $confirm_password = md5($_POST['confirm_password']);

        //check whether the user with current id and current password Exists or not
        $sql = "SELECT * FROM tbl_admin WHERE id='$id' AND password='$current_password'";

        //Execute the query
        $res = mysqli_query($conn, $sql);

        if ($res==TRUE) {
            //check the data is available or not
            $count = mysqli_num_rows($res);
            if ($count==1) {
                //user Exist and password can be change
                //echo "User Found";
                //check whether the new password and confirm march or not
                if($new_password==$confirm_password){
                    //password updated
                    //echo "pass match";
                    $sql_for_update_password = "UPDATE tbl_admin SET
                        password = '$new_password'
                        WHERE id ='$id'
                    ";

                    //execute the querry
                    $res2 = mysqli_query($conn,$sql_for_update_password);

                    //check whether the query executed or not
                    if ($res2==TRUE) {
                        //display success message
                        $_SESSION['change-pass'] = "<div class='success'>Password Changed Successfully.</div>";
                        //redirect
                        header('location:'.SITEURL.'admin/manage-admin.php');
                    }else {
                        //display error message
                        $_SESSION['change-pass'] = "<div class='success'>Failed to change Password.</div>";
                        //redirect
                        header('location:'.SITEURL.'admin/manage-admin.php');
                    }

                }else {
                    //User doesnot exist and set message and redirect
                    $_SESSION['pass-not-match'] = "<div class='error'>Password Not Matched.</div>";
                    //redirect
                    header('location:'.SITEURL.'admin/manage-admin.php');
                }
            }else {
                //User doesnot exist and set message and redirect
                $_SESSION['user-not-found'] = "<div class='error'>User not Found.</div>";
                //redirect
                header('location:'.SITEURL.'admin/manage-admin.php');
            }
        }

        //check whether the new password and confirm password matched or not.

        //change password if all above is true

    }
?>

<?php include('partials/footer.php'); ?>