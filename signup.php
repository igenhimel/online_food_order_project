<?php
require_once('database.php');

$error="";
?>
          <?php

         if(isset($_POST['submit'])){


    $fullname= $_POST['fullname'];
    $username= $_POST['username'];
     $email= $_POST['email'];
    $password= $_POST['password'];


    if(empty($fullname and $username and $password and $email)){
        $error="All Form Must be Filled Up";
    }
    else if(!preg_match ("/^[A-Z a-z]+$/", $fullname)) {
           $error= " !Name Not Valid";
    }

    else if(!preg_match('/^[a-zA-Z0-9_]{5,}$/', $username)) {
         $error= " !Length Should be more than 5";

}

 else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
         $error= " !Invalid email format";

}

else{

    $sqladmin="select username from admin where username = '$username'";
    $recordadmin=mysqli_query($connect,$sqladmin);

    $sqlcustomer="select username from customer where username = '$username'";
    $recordcustomer=mysqli_query($connect,$sqlcustomer);


    if(mysqli_num_rows($recordadmin)>0){
         $error= " !Username Already Exists";
    }

    else if(mysqli_num_rows($recordcustomer)>0)
    {
       $error= " !Username Already Exists";
    }
    else{
       $sqladd= "INSERT INTO customer(customer_name,username,email,password) values('$fullname','$username','$email','".md5($password)."')";

        $records=mysqli_query($connect,$sqladd);

        if($records==true){
             $error="Thankyou For Registration Food Engine Account";
        }
        else{
             $error="Failed to Registraion! Try Again";
        }

    }
}
}



?>





        <div class="right">
         <div>
             <form action="#" method="post" enctype="multipart/form-data">

                  <table>

                      <p class="t">Create Food Engine Account</p>

                      <tr>
                          <td><label>Full Name</label></td>
                          <td><input type="text" placeholder="Full Name" name="fullname"></td>
                      </tr>
                      <tr>
                          <td><label>Username</label></td>
                          <td><input type="text" placeholder="Username" name="username"></td>
                      </tr>
                      <tr>
                         <td><label>Email</label></td>
                          <td><input type="email" placeholder="email" name="email"></td>
                      </tr>
                       <tr>
                         <td><label>Password</label></td>
                         <td><input type="password" placeholder="password" name="password"></td>
                      </tr>
                       <tr>

                          <td><input type="submit" value="Register" name="submit"></td>

                      </tr>
                  </table>
              </form>
             <?php
             echo "<p style='text-align:center;color:black; text-shadow: 0 0 5px #FFF, 0 0 10px #FFF, 0 0 15px #FFF, 0 0 20px #49ff18,
    0 0 30px #49FF18, 0 0 40px #49FF18, 0 0 55px #49FF18, 0 0 75px #49ff18; margin-right:80px'>";
                echo $error;
             echo "</p>"


             ?>
         </div>

      </div>






