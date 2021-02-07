<?php
require_once('database.php');

$errmsglog="";
$errmsglog2="";
$errmsglog3="";
?>

<?php

if(isset($_POST['login'])){

    $username=$_POST['username'];
    $password=$_POST['password'];


    if(empty($username and $password)){
        $errmsglog= "username and password must not be empty";
    }

    else{
         $sql="select * from admin where username ='$username' and password='$password'";

         $sql2="select * from customer where username='$username' and password='".md5($password)."'";


      $records=mysqli_query($connect,$sql);
      $records2=mysqli_query($connect,$sql2);
      $count=mysqli_num_rows($records);

        if($count>0){
        $m=mysqli_fetch_assoc($records);
        $_SESSION['admin_id']=$m['admin_id'];
        $_SESSION['username']=$m['username'];

      header('location:dashboard.php');
                    }


   elseif($count2=mysqli_num_rows($records2)){

       if($count2>0){
        $m1=mysqli_fetch_assoc($records2);
        $_SESSION['customer_id']=$m1['customer_id'];
        $_SESSION['username']=$m1['username'];
        header('location:mainmenu.php');

                   }
                }


            else {
            $errmsglog3= "Incorrect username or password";

                }


    }

         }
else{
    echo "";
    }

?>
