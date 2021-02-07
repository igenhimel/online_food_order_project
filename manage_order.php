<?php require_once('adminpanel.php');
require_once('database.php');

?>

<div class="main-content">
    <div class="wrapper">
        <h1 class="titledashboard">Manage Order</h1>

                <br /><br /><br />

                <?php
                    if(isset($_SESSION['update']))
                    {
                         echo "<p style='text-align:center;color:green; margin-left:20px;'>";
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                        echo "</p>";
                    }
                ?>
                <br><br>

                <table class="tbl-full">
                    <tr>
                        <th>Order ID</th>
                        <th>Food</th>
                        <th>Qty.</th>
                        <th>Total</th>
                        <th>Order Date</th>
                        <th>Customer Name</th>
                        <th>Contact</th>
                        <th>Address</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>

                    <?php

                        $sql = "SELECT order_id,food.food_name,quantity,total_price,order_date,customer.customer_name,
                        customer.contact_number,address,status from orders,food,customer
                        where orders.customer_id=customer.customer_id and orders.food_id=food.food_id
                        ORDER BY order_id DESC";

                        $res = mysqli_query($connect, $sql);
                        $count = mysqli_num_rows($res);
                        if($count>0)
                        {

                            while($row=mysqli_fetch_assoc($res))
                            {

                                $id = $row['order_id'];
                                $food = $row['food_name'];
                                $qty = $row['quantity'];
                                $total = $row['total_price'];
                                $order_date = $row['order_date'];
                                $customer_name = $row['customer_name'];
                                $customer_contact = $row['contact_number'];
                                $customer_address = $row['address'];
                                $status = $row['status'];

                                ?>

                                    <tr>
                                        <td><?php echo $id; ?>. </td>
                                        <td><?php echo $food; ?></td>
                                        <td><?php echo $qty; ?></td>
                                        <td><?php echo $total; ?></td>
                                        <td><?php echo $order_date; ?></td>
                                        <td><?php echo $customer_name; ?></td>
                                        <td><?php echo $customer_contact; ?></td>
                                        <td><?php echo $customer_address; ?></td>
                                           <td>
                                            <?php

                                                if($status=="Ordered")
                                                {
                                                    echo "<label>$status</label>";
                                                }
                                                elseif($status=="On Delivery")
                                                {
                                                    echo "<label style='color: orange;'>$status</label>";
                                                }
                                                elseif($status=="Delivered")
                                                {
                                                    echo "<label style='color: green;'>$status</label>";
                                                }
                                                elseif($status=="Cancelled")
                                                {
                                                    echo "<label style='color: red;'>$status</label>";
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <a href="<?php echo ""; ?>update_order.php?order_id=<?php echo $id; ?>" class="btn-secondary">Update Order</a>
                                        </td>
                                    </tr>

                                <?php

                            }
                        }
                        else
                        {
                            echo "<tr><td colspan='12' class='error'>Orders not Available</td></tr>";
                        }
                    ?>


                </table>
    </div>

</div>

<?php require_once('footers.php');?>
