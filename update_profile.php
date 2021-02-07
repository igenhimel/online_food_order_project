<?php ob_start(); ?>
<?php
require_once('userpanel.php');
require_once('database.php');
?>


 <?php

            $id=$_SESSION['customer_id'];
            $sql="SELECT * FROM customer WHERE customer_id= '$id'";
            $res=mysqli_query($connect, $sql);
            if($res==true)
            {

                $count = mysqli_num_rows($res);
                if($count>0)
                {
                    $row=mysqli_fetch_assoc($res);
                    $full_name = $row['customer_name'];
                    $username = $row['username'];
                    $email= $row['email'];
                }
                else
                {
                    header('location:user_profile.php');
                }
            }

        ?>



<div class="main-content">
    <div class="wrapper">
        <h1 class="titledashboard">Update Profile</h1>

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
                        <input type="submit" name="updateuser" value="Update" class="btn-secondary">
                    </td>

                </tr>



            </table>
        </form>

    </div>
</div>


<?php

    if(isset($_POST['updateuser']))
    {

        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $email = $_POST['email'];

        $sql= "UPDATE customer SET
        customer_name = '$full_name',
        username = '$username',
        email = '$email'
        WHERE customer_id='$id'
        ";

        $res = mysqli_query($connect, $sql);


        if($res==true)
        {
            $_SESSION['update'] = "Profile Updated Successfully.";

            header('location:user_profile.php');
        }
        else
        {
            $_SESSION['update'] = "Failed to Update Profile";
           header('location:user_profile.php');

        }
    }

?>

<?php

require_once('footers.php');
?>



<?php ob_flush(); ?>




