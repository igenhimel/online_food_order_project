<?php

require_once('database.php');

?>


<?php

         if(isset($_GET['order_id']))
            {

                $id=$_GET['order_id'];
                $sql = "SELECT * FROM orders WHERE order_id=$id";
                $res = mysqli_query($connect, $sql);
                $count = mysqli_num_rows($res);

                if($count==1)
                {

                    $row=mysqli_fetch_assoc($res);
                    $status = $row['status'];
                }
            }

else{
    echo "";
}

?>


<?php
     if($status=="Ordered"){
    $id = $_GET['order_id'];
    $sql = "UPDATE orders
    set status = 'Cancelled'
    where status= 'Ordered' and order_id=$id";
    $record=mysqli_query($connect,$sql);
    $_SESSION['update']="Order Cancelled Succesfully";
    header('location:manage_order_user.php');

     }

     else{

     $_SESSION['update']="Your Order cannot cancelled right now!";
     header('location:manage_order_user.php');

        }



?>
