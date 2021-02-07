
<?php
if(!isset($_SERVER['HTTP_REFERER'])){
    header('location:prevention.php');
    exit;
}
?>
<?php
require_once('database.php');

?>

<?php


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Food Engine - Food Order App</title>
        <link rel="shortcut icon" type="image/x-icon" href="image/background/Fast-Food-icon.ico">
       <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Lora&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="responsive.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
   <header class="adminheader">
        <ul class="menu">

           <li class="title">Food Engine</li>
            <li><a href="dashboard.php">Home</a></li>
            <li><a href="manage_admin.php">Admin</a></li>
            <li><a href="catagory.php">Catagory</a></li>
            <li><a href="manage_food.php">Food</a></li>
            <li><a href="manage_order.php">Order</a></li>
            <li>

        <?php

                if(isset($_SESSION['admin_id'])){
                ?>
            <form action="<?php echo ($_SERVER['PHP_SELF']) ?>" method="post">
               <input class="logoutadmin" type="submit" value="Logout" name="logoutadmin">
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

if(isset($_POST["logoutadmin"])){
     echo "ddd";
    header('location:Home.php');
    session_destroy();

}

?>
