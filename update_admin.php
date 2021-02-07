<?php ob_start(); ?>
<?php
require_once('adminpanel.php');
require_once('database.php');
?>
 <?php

            $id=$_GET['admin_id'];
            $sql="SELECT * FROM admin WHERE admin_id= '$id'";
            $res=mysqli_query($connect, $sql);
            if($res==true)
            {

                $count = mysqli_num_rows($res);
                if($count>0)
                {
                    $row=mysqli_fetch_assoc($res);
                    $full_name = $row['name'];
                    $username = $row['username'];
                    $email= $row['email'];
                }
                else
                {
                    header('location:manage_admin.php');
                }
            }

        ?>


<?php

if(isset($_SESSION['admin_id'])){

?>
<div class="main-content">
    <div class="wrapper">
        <h1 class="titledashboard">Update Admin</h1>

        <br><br>

        <form action="" method="POST">

            <table class="tbl-31">
                <tr>
                    <td>Full Name </td>
                    <td>
                        <input type="text" name="full_name" value="<?php echo $full_name ?>">
                    </td>
                </tr>

                <tr>
                    <td>Username </td>
                    <td>
                        <input type="text" name="username" value="<?php echo $username ?>">
                    </td>
                </tr>
                <tr>
                    <td>Email </td>
                    <td>
                        <input type="text" name="email" value="<?php echo $email?>">
                    </td>
                </tr>


                <tr>
                    <td colspan="2">
                        <input type="submit" name="updateadmin" value="Update Admin" class="btn-secondary">
                    </td>

                </tr>



            </table>
        </form>

    </div>
</div>
<?php
}
else {
    echo "";
}
?>

<?php

    if(isset($_POST['updateadmin']))
    {

        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $email = $_POST['email'];

        $sql= "UPDATE admin SET
        name = '$full_name',
        username = '$username',
        email = '$email'
        WHERE admin_id='$id'
        ";

        $res = mysqli_query($connect, $sql);


        if($res==true)
        {
            $_SESSION['update'] = "Admin Updated Successfully.";

            header('location:manage_admin.php');
        }
        else
        {
            $_SESSION['update'] = "Failed to Update Admin";
           header('location:manage_admin.php');

        }
    }

?>

<?php

require_once('footers.php');
?>


<?php ob_flush(); ?>
