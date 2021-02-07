<?php
require_once('database.php');
require_once('userpanel.php');
?>



<section class="food-search text-center">
    <div class="container">

        <form action="food_search.php" method="POST">
            <input type="search" name="search" placeholder="Search for Food.." required>
            <input type="submit" name="submit" value="Search" class="btn btn-primary">
        </form>

    </div>
</section>

<section class="categories">
    <div class="container">
        <h2 class="text-center">Explore Foods</h2>
        <?php

                $sql = "SELECT * FROM catagory WHERE active='Yes' AND featured='Yes' LIMIT 3";

                $res = mysqli_query($connect, $sql);

                $count = mysqli_num_rows($res);

                if($count>0)
                {

                    while($row=mysqli_fetch_assoc($res))
                    {

                        $id = $row['catagory_id'];
                        $title = $row['title'];
                        $image_name = $row['image_name'];
                        ?>

        <a href="<?php echo "";?>catagories_food.php?catagory_id=<?php echo $id; ?>">
            <div class="box-3 float-container">
                <?php

                                    if($image_name=="")
                                    {

                                        echo "Image not Available";
                                    }
                                    else
                                    {

                                        ?>
                <img src="<?php echo ""?>image/catagory/<?php echo $image_name; ?>" alt="Pizza" class="img-responsive img-curve">
                <?php
                                    }
                                ?>


                <h3 class="float-text text-white"><?php echo $title; ?></h3>
            </div>
        </a>

        <?php
                    }
                }
                else
                {
                    echo "<div class='error'>Catagory not Added.</div>";
                }
            ?>

        <div class="clearfix"></div>
    </div>
</section>



<!-- fOOD MEnu Section Starts Here -->
<section class="food-menu">
    <div class="container">
        <h2 class="text-center">Food Menu</h2>

    <?php
                $sql = "SELECT * FROM food WHERE active='Yes' and featured='Yes' LIMIT 4";
                $res=mysqli_query($connect, $sql);
                $count = mysqli_num_rows($res);
                if($count>0)
                {

                    while($row=mysqli_fetch_assoc($res))
                    {

                        $id = $row['food_id'];
                        $title = $row['food_name'];
                        $description = $row['description'];
                        $price = $row['price'];
                        $image_name = $row['image_name'];
                        ?>

                        <div class="food-menu-box">
                            <div class="food-menu-img">
                                <?php

                                    if($image_name=="")
                                    {

                                        echo "Image not Available";
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

                    echo "Food not found";
                }
            ?>

        <div class="clearfix"></div>



    </div>

    <p class="text-center">
        <a href="foods.php">See All Foods</a>
    </p>
</section>

<?php
require_once('footers.php');
?>
