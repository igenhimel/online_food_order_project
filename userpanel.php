
<?php
if(!isset($_SERVER['HTTP_REFERER'])){
    header('location:prevention.php');
    exit;
}
?>

<?php
require_once('database.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Food Engine - Food Order App</title>
    <link rel="shortcut icon" type="image/x-icon" href="image/background/Fast-Food-icon.ico">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Lora&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="user.css">
    <link rel="stylesheet" href="responsive.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>

  <?php
    if(isset($_SESSION['customer_id'])){

        $id=$_SESSION['customer_id'];

        $sql="select * from customer where customer_id=$id";
        $records=mysqli_query($connect,$sql);
        $count=mysqli_num_rows($records);
        if($count==1){
            $row=mysqli_fetch_assoc($records);
            $nameid=$row['customer_name'];
        }

    ?>
   <header class="userheader">
        <ul>

           <li class="title">Food Engine</li>
            <li><a href="mainmenu.php">Home</a></li>
            <li><a href="catagories.php">Catagory</a></li>
            <li><a href="foods.php">Foods</a></li>
            <li><a href="<?php echo "";?>user_profile.php?customer_id=<?php echo $id; ?>"><?php echo $nameid ?></a></li>
            <li>

        <?php

                if(isset($_SESSION['customer_id'])){
                ?>
            <form action="<?php echo ($_SERVER['PHP_SELF']) ?>" method="post">
               <input class="logoutuser" type="submit" value="Logout" name="logoutuser">
            </form>
            </li>


<?php
                }
                else{
                    "";
                }



?>
        </ul>
   </header>
</body>
</html>

<?php
    }
    else{
      echo "<p style='text-align:center; color:red'>No user Logged in. Please Try Again</p>";
    }
    ?>

<?php

if(isset($_POST["logoutuser"])){
    header('location:Home.php');
    session_destroy();

}

?>

