
<?php ob_start(); ?>

<?php
require_once('adminpanel.php');
require_once('database.php');

$nameerr="";
$usrerr="";
$err="";
$err2="";
$sucsess="";
$emailErr="";
$error="";
?>

<?php

if(isset($_POST["admin"])){

    $fullname= $_POST['full_name'];
    $username= $_POST['username'];
     $email= $_POST['email'];
    $password= $_POST['password'];


    if(empty($fullname and $username and $password and $email)){
        $error="All Form Must be Filled Up";
    }
    else if(!preg_match ("/^[A-Z a-z]+$/", $fullname)) {
           $nameerr= " !Name Not Valid";
    }

    else if(!preg_match('/^[a-zA-Z0-9_]{5,}$/', $username)) {
        $usrerr= " !Length Should be more than 5";

}

 else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = " !Invalid email format";

}

else{

    $sqladmin="select username from admin where username = '$username'";
    $recordadmin=mysqli_query($connect,$sqladmin);

    $sqlcustomer="select username from customer where username = '$username'";
    $recordcustomer=mysqli_query($connect,$sqlcustomer);


    if(mysqli_num_rows($recordadmin)>0){
        $err= " !Username Already Exists";
    }

    else if(mysqli_num_rows($recordcustomer)>0)
    {
      $err2= " !Username Already Exists";
    }
    else{
       $sqladd= "INSERT INTO admin(name,username,email,password) values('$fullname','$username','$email','$password')";

        $records=mysqli_query($connect,$sqladd);

        if($records==true){
            $_SESSION['add']="Admin Added Succesfully";
            header('location:manage_admin.php');
        }
        else{
            $_SESSION['add']="Failed to add Admin! Try Again";
            header('location:add_admin.php');
            echo $_SESSION['add'];
        }

    }
}
}



?>
<?php

if(isset($_SESSION['admin_id'])){

?>

<div class="main-content">
    <div class="wrapper">
        <h1 class="titledashboard">Add Admin</h1>

        <br><br>

        <form action="" method="POST">

            <table class="tbl-31">
                <tr>
                    <td>Full Name </td>
                    <td>
                        <input type="text" name="full_name" placeholder="Enter Your Name"> <?php
                        echo "<span class='warning1'>".$nameerr."</span>";
                        ?>
                    </td>
                </tr>

                <tr>
                    <td>Username </td>
                    <td>
                        <input type="text" name="username" placeholder="Your Username">
                        <?php echo "<span class='warning1'>";
                        echo $usrerr;
                        echo $err;
                        echo $err2;

                        echo "</span>"
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Email </td>
                    <td>
                        <input type="text" name="email" placeholder="Your Email"> <?php
                            echo "<span class='warning1'>";
                        echo $emailErr;
                        echo "</span>"
                        ?>
                    </td>
                </tr>

                <tr>
                    <td>Password </td>
                    <td>
                        <input type="password" name="password" placeholder="Your Password">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="admin" value="Add Admin" class="btn-secondary">
                    </td>

                </tr>



            </table>
 <?php
            echo "<p class='warning'>";
                        echo "$error";
                        echo $sucsess;
                echo "</p>";
                        ?>


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

require_once('footers.php');
?>


<?php ob_flush(); ?>


