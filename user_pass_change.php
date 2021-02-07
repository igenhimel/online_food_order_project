<?php ob_start(); ?>
<?php
require_once('database.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
      <title>FoodEngine - Food Delivery App</title>
     <link rel="shortcut icon" type="image/x-icon" href="image/background/Fast-Food-icon.ico">
    <link rel="stylesheet" href="Food.css">
     <link rel="stylesheet" href="admin.css">
     <link rel="stylesheet" href="style.css">
</head>
<body>
   <?php
    require_once('header.php');
    ?>

      <?php
            if(isset($_GET['customer_id']))
            {
                $id=$_GET['customer_id'];
                $sql="select * from customer where customer_id= $id";

                $res = mysqli_query($connect, $sql);
                if($res==true)
                {
                    $count=mysqli_num_rows($res);

                    if($rows=mysqli_fetch_assoc($res))
                    {

                        $name=$rows['customer_name'];
                    }
                }
            }
        ?>




   <div class="main-content">
    <div class="wrapper">
        <h1 class="titledashboard">Hello <?php echo $name ?>! Now You can Change Password</h1>
        <br><br>



        <form action="" method="POST">

            <table class="tbl-31">

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
if(isset($_POST['submit'])){

                $new_password =$_POST['new_password'];
                $confirm_password = $_POST['confirm_password'];

                         if(empty($new_password)==true){
                             echo "<p style='text-align:center;color:green; margin-left:20px;'>";
                                echo "Failed to Change Password";
                                echo "</p>";
                              require_once('footers.php');
                                die();

                         }




                        if($new_password==$confirm_password)
                        {

                            $sql2 = "UPDATE customer SET
                                password='".md5($new_password)."'
                                WHERE customer_id=$id
                            ";


                            $res2 = mysqli_query($connect, $sql2);

                            if($res2==true)
                            {
                                 echo "<p style='text-align:center;color:green; margin-left:20px;'>";
                                echo "Password Changed Succesfully! Go to Home and Log in Again";
                                echo "</p>";

                            }
                            else
                            {
                                 echo "<p style='text-align:center;color:green; margin-left:20px;'>";
                                echo "Failed to Change Password";
                                echo "</p>";


                            }
                        }
                        else
                        {
                            echo "<p style='text-align:center;color:green; margin-left:20px;'>";
                          echo "Password Did not match.";
                            echo "</p>";


                        }
                    }


?>




</body>
</html>





<?php

require_once('footers.php');
?>


<?php ob_flush(); ?>


