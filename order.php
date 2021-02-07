
<?php
require_once('database.php');
require_once('userpanel.php');
?>

    <?php
        if(isset($_GET['food_id']))
        {
            $food_id = $_GET['food_id'];
            $sql = "SELECT * FROM food WHERE food_id=$food_id";
            $res = mysqli_query($connect, $sql);
            $count = mysqli_num_rows($res);
            if($count==1)
            {
                $row = mysqli_fetch_assoc($res);
                $title = $row['food_name'];
                $price = $row['price'];
                $image_name = $row['image_name'];
            }
                 else {
         header('location:mainmenu.php');
     }
        }
     else {
         header('location:home.php');
     }
    ?>

   <?php
 if(isset($_SESSION['customer_id']))
        {
            $customer_id = $_SESSION['customer_id'];
            $sql2 = "SELECT * FROM customer WHERE customer_id=$customer_id";
            $res2 = mysqli_query($connect, $sql2);
            $count2 = mysqli_num_rows($res2);
            if($count2==1)
            {
                $row2 = mysqli_fetch_assoc($res2);
                $customer_name = $row2['customer_name'];
                $email = $row2['email'];
            }

     else {
         header('location:mainmenu.php');
     }
 }
     else {
         header('location:mainmenu.php');
     }
?>






    <!-- order menu -->
    <section class="food-search2">
        <div class="container">

            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

            <form action="" method="POST" class="order">
                <fieldset>
                    <legend>Selected Food</legend>

                    <div class="food-menu-img">
                        <?php

                            if($image_name=="")
                            {

                                echo "<div class='error'>Image not Available.</div>";
                            }
                            else
                            {
                                ?>
                                <img src="<?php echo "" ?>image/food/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                                <?php
                            }

                        ?>

                    </div>

                    <div class="food-menu-desc">
                        <h3><?php echo $title; ?></h3>
                        <input type="hidden" name="food" value="<?php echo $title; ?>">

                        <p class="food-price">$<?php echo $price; ?></p>
                        <input type="hidden" name="price" value="<?php echo $price; ?>">

                        <div class="order-label">Quantity</div>
                        <input type="number" name="quantity" class="input-responsive" value="1" required>

                    </div>

                </fieldset>

                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" value="<?php echo $customer_name ?>" class="input-responsive" required disabled>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="E.g. 01729955133" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" value="<?php echo $email ?>" class="input-responsive" required disabled>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>

            </form>

            <?php

                if(isset($_POST['submit']))
                {

                    $food_id=$food_id;
                    $qty = $_POST['quantity'];
                    $total = $price * $qty;
                    $order_date = date("Y-m-d");
                    $status = "Ordered";
                    $customer_id = $customer_id;
                    $customer_address = $_POST['address'];
                    $sql2 = "INSERT INTO orders(food_id,quantity,total_price,order_date,status,customer_id,address)
                    values('$food_id','$qty','$total','$order_date','$status','$customer_id','$customer_address')
                    ";

                    $res2 = mysqli_query($connect, $sql2);


                    $contact_number = $_POST['contact'];
                    $sql3 = "UPDATE customer set contact_number='$contact_number' where customer_id = '$customer_id'";

                    $res3 = mysqli_query($connect, $sql3);

                    if(($res2 and $res3)==true)
                    {

                        $_SESSION['order'] = "Food Ordered Successfully";
                        header('location:order_success.php');
                    }
                    else
                    {
                        $_SESSION['order'] = "Failed to Order Food";
                        header('location:order_success.php');
                    }





                }

            ?>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->


   <?php
require_once('footers.php');

?>
