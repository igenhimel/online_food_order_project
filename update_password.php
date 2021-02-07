<?php ob_start(); ?>
<?php
require_once('adminpanel.php');
require_once('database.php');
?>


<?php

if(isset($_SESSION['admin_id'])){

?>
<div class="main-content">
    <div class="wrapper">
        <h1 class="titledashboard">Change Password</h1>
        <br><br>

        <?php
            if(isset($_GET['admin_id']))
            {
                $id=$_GET['admin_id'];
            }
        ?>

        <form action="" method="POST">

            <table class="tbl-31">
                <tr>
                    <td>Current Password: </td>
                    <td>
                        <input type="password" name="current_password" placeholder="Current Password">
                    </td>
                </tr>

                <tr>
                    <td>New Password:</td>
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
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Change Password" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>

    </div>
</div>

<?php
}
    else{
      echo "";
    }
?>




<?php
if(isset($_POST['submit'])){
                $current_password = $_POST['current_password'];
                $new_password =$_POST['new_password'];
                $confirm_password = $_POST['confirm_password'];


                $sql = "SELECT * FROM admin WHERE admin_id=$id AND password='$current_password'";

                $res = mysqli_query($connect, $sql);
      if($res==true)
                {
                    $count=mysqli_num_rows($res);

                    if($count==1)
                    {

                        if($new_password==$confirm_password)
                        {

                            $sql2 = "UPDATE admin SET
                                password='$new_password'
                                WHERE admin_id=$id
                            ";


                            $res2 = mysqli_query($connect, $sql2);

                            if($res2==true)
                            {
                                $_SESSION['change-pwd'] = "Password Changed Successfully";
                     header('location:manage_admin.php');
                            }
                            else
                            {

                                $_SESSION['change-pwd'] = "Failed to Change Password";

                                header('location:manage_admin.php');
                            }
                        }
                        else
                        {
                            $_SESSION['pwd-not-match'] = "Password Did not match.";
                            header('location:manage_admin.php');

                        }
                    }
                    else
                    {

                        $_SESSION['user-not-found'] = "Wrong Password";
                     header('location:manage_admin.php');
                    }
                }
            }

?>



<?php

require_once('footers.php');
?>
<?php ob_flush(); ?>




