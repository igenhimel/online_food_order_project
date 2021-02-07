<?php ob_start(); ?>


<?php require_once('adminpanel.php') ;

require_once('database.php');

?>

<div class="main-content">
    <div class="wrapper">
        <h1 class="titledashboard">Update Order</h1>
        <br><br>


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
                    $customer_address= $row['address'];
                    $status = $row['status'];
                }
                else
                {

                    header('location:manage_order.php');
                }
            }
            else
            {

                header('location:manage_order.php');
            }

        ?>

         <form action="" method="POST">
            <table class="tbl-32">
                <tr>
                    <td>Order ID</td>
                    <td><b> <?php echo "#".$id; ?> </b></td>
                </tr>

                <tr>
                    <td>Status</td>
                    <td>
                        <select name="status">
                            <option <?php if($status=="Ordered"){echo "selected";} ?> value="Ordered">Ordered</option>
                            <option <?php if($status=="On Delivery"){echo "selected";} ?> value="On Delivery">On Delivery</option>
                            <option <?php if($status=="Delivered"){echo "selected";} ?> value="Delivered">Delivered</option>
                            <option <?php if($status=="Cancelled"){echo "selected";} ?> value="Cancelled">Cancelled</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Customer Address: </td>
                    <td>
                        <textarea name="customer_address" cols="30" rows="5"><?php echo $customer_address; ?></textarea>
                    </td>
                </tr>

                <tr>
                    <td clospan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="hidden" name="price" value="<?php echo $price; ?>">

                        <input type="submit" name="submit" value="Update Order" class="btn-secondary">
                    </td>
                </tr>
            </table>

        </form>


        <?php

            if(isset($_POST['submit']))
            {

                $id = $_POST['id'];
                $status = $_POST['status'];
                $customer_address = $_POST['customer_address'];
                $sql2 = "UPDATE orders SET
                    status = '$status',
                    address = '$customer_address'
                    WHERE order_id=$id
                ";

                $res2 = mysqli_query($connect, $sql2);
                if($res2==true)
                {
                   $_SESSION['update'] = "Order Updated Successfully";
                    header('location:manage_order.php');
                }
                else
                {
                   $_SESSION['update'] = "Failed to Update Order";
                    header('location:manage_order.php');

                }
            }
        ?>


    </div>
</div>

<?php require_once('footers.php') ?>
<?php ob_flush(); ?>
