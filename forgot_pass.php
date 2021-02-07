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

    <h2 class="titledashboard">Forgot Password</h2>
  <form action="" method="POST">

            <table class="tbl-31">
                <tr>
                    <td>Username</td>
                    <td>
                        <input type="text" name="username" placeholder="Username">
                    </td>
                </tr>

                <tr>
                    <td>Email</td>
                    <td>
                        <input type="text" name="email" placeholder="Email">
                    </td>
                </tr>

                <tr>
                    <td><input type="submit" value="verify" name="submit" class="btn-secondary" style="padding-right:80px; padding:8px"></td>
                </tr>
      </table>
    </form>


    <?php

    if(isset($_POST['submit'])){

        $username=$_POST['username'];
        $email=$_POST['email'];

        $sql= "select * from customer where username='$username' and email='$email'";
        $res=mysqli_query($connect,$sql);
        $count=mysqli_num_rows($res);

         if($count>0){
        $m1=mysqli_fetch_assoc($res);
        $id=$m1['customer_id'];
        header('location:user_pass_change.php?customer_id='."$id");

                   }



        else{
             echo "<p style='text-align:center;color:green; margin-left:20px;'>";
            echo "No Account Found";
            echo "</p>";
        }

    }

    ?>


</body>
</html>




<?php
require_once('footers.php');

?>
