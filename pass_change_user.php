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
    require_once('userpanel.php');
    ?>

      <?php
            if(isset($_SESSION['customer_id']))
            {
                $id=$_SESSION['customer_id'];
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
                    <td>Current Password:</td>
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
    if(isset($_POST['submit'])){

    $current_password = $_POST['current_password'];
                $new_password =$_POST['new_password'];
                $confirm_password = $_POST['confirm_password'];


                $sql = "SELECT * FROM customer WHERE customer_id=$id AND password='".md5($current_password)."'";

                $res = mysqli_query($connect, $sql);
      if($res==true)
                {
                    $count=mysqli_num_rows($res);

                    if($count==1)
                    {

                        if($new_password==$confirm_password)
                        {

                            $sql2 = "UPDATE customer SET
                                password='".md5($new_password)."'
                                WHERE customer_id=$id
                            ";


                            $res2 = mysqli_query($connect, $sql2);

                            if($res2==true)
                            {
                                $_SESSION['change-pwd'] = "Password Changed Successfully";

                            }
                            else
                            {

                                $_SESSION['change-pwd'] = "Failed to Change Password";


                            }
                        }
                        else
                        {
                            $_SESSION['pwd-not-match'] = "Password Did not match.";


                        }
                    }
                    else
                    {

                        $_SESSION['user-not-found'] = "Failed to Change Password";


                    }
                }
            }


    ?>

    <?php

   if(isset($_SESSION['change-pwd'])){
                    echo "<p style='text-align:center;color:green; margin-left:20px;'>";
                    echo $_SESSION['change-pwd'];
                    unset($_SESSION['change-pwd']);
                echo "</p>" ;
                }

                else{
                    "";
                }

      if(isset($_SESSION['pwd-not-match'])){
                    echo "<p style='text-align:center;color:green; margin-left:20px;'>";
                    echo $_SESSION['pwd-not-match'];
                    unset($_SESSION['pwd-not-match']);
                echo "</p>" ;
                }

                else{
                    "";
                }

      if(isset($_SESSION['user-not-found'])){
                    echo "<p style='text-align:center;color:green; margin-left:20px;'>";
                    echo $_SESSION['user-not-found'];
                    unset($_SESSION['user-not-found']);
                echo "</p>" ;
                }

                else{
                    "";
                }
    ?>
</body>
</html>





<?php

require_once('footers.php');
?>





