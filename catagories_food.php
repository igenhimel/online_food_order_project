<?php
require_once('database.php');
require_once('userpanel.php');

?>

    <?php

        if(isset($_GET['catagory_id']))
        {
            $catagory_id = $_GET['catagory_id'];
            $sql = "SELECT title FROM catagory WHERE catagory_id=$catagory_id";
            $res = mysqli_query($connect, $sql);
            $row = mysqli_fetch_assoc($res);
            $catagory_title = $row['title'];
        }
        else
        {

            header('location:catagories');
        }
    ?>

    <section class="food-search text-center">
        <div class="container">

            <h2>Foods on <a href="#" class="text-white">"<?php echo $catagory_title; ?>"</a></h2>

        </div>
    </section>



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php

                $sql2 = "SELECT * FROM food WHERE catagory_id=$catagory_id";
                $res2 = mysqli_query($connect, $sql2);
                $count2 = mysqli_num_rows($res2);
                if($count2>0)
                {
                    while($row2=mysqli_fetch_assoc($res2))
                    {
                        $id = $row2['food_id'];
                        $title = $row2['food_name'];
                        $price = $row2['price'];
                        $description = $row2['description'];
                        $image_name = $row2['image_name'];
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
                                        <img src="<?php echo ""; ?>image/food/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
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

                    echo "<div class='error'>Food not Available.</div>";
                }

            ?>



            <div class="clearfix"></div>



        </div>

    </section>

    <?php
require_once('footers.php');
?>
