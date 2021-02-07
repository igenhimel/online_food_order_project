<?php
/*if(!isset($_SERVER['HTTP_REFERER'])){
    header('location:prevention.php');
    exit;
}
*/
?>


<?php
require_once('adminpanel.php');
require_once('database.php');
?>

<?php
if(isset($_SESSION['admin_id'])){

?>
        <div class="main-content">
            <div class="wrapper">
                <h1 class="titledashboard">Dashboard</h1>
                <br><br>

                <br><br>

                <div class="col-4 text-center">

                    <?php

                        $sql = "SELECT * FROM catagory";
                        $res = mysqli_query($connect, $sql);
                        $count = mysqli_num_rows($res);
                    ?>

                    <h1><?php echo $count; ?></h1>
                    <br />
                    Catagories
                </div>

                <div class="col-4 text-center">

                    <?php

                        $sql2 = "SELECT * FROM food";
                        $res2 = mysqli_query($connect, $sql2);
                        $count2 = mysqli_num_rows($res2);
                    ?>

                    <h1><?php echo $count2; ?></h1>
                    <br />
                    Foods
                </div>

                <div class="col-4 text-center">

                    <?php
                        $sql3 = "SELECT * FROM orders";
                        $res3 = mysqli_query($connect, $sql3);
                        $count3 = mysqli_num_rows($res3);
                    ?>

                    <h1><?php echo $count3; ?></h1>
                    <br />
                    Total Orders
                </div>

                <div class="col-4 text-center">

                    <?php

                        $sql4 = "SELECT sum(total_price) as total FROM orders WHERE status='Delivered'";
                        $res4 = mysqli_query($connect, $sql4);
                        $row4 = mysqli_fetch_assoc($res4);
                        $total_revenue = $row4['total'];

                    ?>

                    <h1>$<?php echo $total_revenue; ?></h1>
                    <br />
                    Revenue Generated
                </div>

                <div class="clearfix"></div>

            </div>
        </div>

   <?php

}
else "No Admin Logged In Right Now!";

?>

  <?php

  require_once('footers.php');
?>
