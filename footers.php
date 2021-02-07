<?php

require_once('database.php');
?>

   <footer class="footers">
    <p>&copy;<?php echo date("Y"); ?> FoodEngine
<?php
        if(isset($_SESSION['customer_id'])){

           ?>
           <a href="contact_us.php">Contact Us</a>
    <a href="help.php">Help</a>
       <?php
        }
           ?>
    <a href="Home.php">Home</a></p>
</footer>

