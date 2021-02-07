
<?php
require_once('database.php');
require_once('userpanel.php');

?>





    <section class="food-search text-center">
        <div class="container">
                    <?php

                $search = $_POST['search'];

            ?>


            <h2>Foods on Your Search <a href="#" class="text-white"> <?php echo $search ?></a></h2>

        </div>
    </section>



    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php
                $sql = "SELECT * FROM food WHERE food_name LIKE '%$search%' OR description LIKE '%$search%'";
                $res = mysqli_query($connect, $sql);
                $count = mysqli_num_rows($res);

                if($count>0)
                {

                    while($row=mysqli_fetch_assoc($res))
                    {
                        $id = $row['food_id'];
                        $title = $row['food_name'];
                        $price = $row['price'];
                        $description = $row['description'];
                        $image_name = $row['image_name'];
                        ?>

                        <div class="food-menu-box">
                            <div class="food-menu-img">
                                <?php

                                    if($image_name=="")
                                    {

                                        echo "<div class='error'>Image not Available.</div>";
                                    }
                                    else
                                    {

                                        ?>
                                        <img src="<?php echo "";?>image/food/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                                        <?php

                                    }
                                ?>

                            </div>

                            <div class="food-menu-desc">
                                <h4><?php echo $title; ?></h4>
                                <p class="food-price">$<?php echo $price; ?></p>
                                <p class="food-detail">
                                    <?php echo $description; ?>
                                </p>
                                <br>

                                <a href="<?php echo ""; ?>order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                            </div>
                        </div>

                        <?php
                    }
                }
                else
                {
                     echo "<p style='text-align:center;color:red; font-size:30px'>";
                    echo "Food not found";
                    echo "</p>";
                }

            ?>



            <div class="clearfix"></div>



        </div>

    </section>

   <?php
require_once('footers.php');
?>
