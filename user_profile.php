<?php
require_once('userpanel.php');
require_once('database.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="user.css">
</head>
<body class="profilebody">


   <?php
     if(isset($_SESSION['update'])){
                    echo "<p class='update'>";
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                echo "</p>" ;
                }

                else{
                    "";
                }

    ?>


  <form action="" method="post">
    <div class="profile">


     <input type="submit" value="Update Profile" name="update">
     <input type="submit" value="Change Password" name="pass">
     <input type="submit" value="Manage Order" name="manage">
       </div>
  </form>

</body>
</html>


<?php
if(isset($_POST['update'])){
   $id= $_SESSION['customer_id'];

    if(isset($_SESSION['customer_id'])){
        header('location:update_profile.php?customer_id='.$id);

    }
}

if(isset($_POST['pass'])){
   $id= $_SESSION['customer_id'];

    if(isset($_SESSION['customer_id'])){
        header('location:pass_change_user.php?customer_id='.$id);

    }
}
if(isset($_POST['manage'])){
   $id= $_SESSION['customer_id'];

    if(isset($_SESSION['customer_id'])){
        header('location:manage_order_user.php?customer_id='.$id);

    }
}

?>







<?php

require_once('footers.php');

?>



