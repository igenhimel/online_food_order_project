<?php
require_once('database.php');
require_once('userpanel.php');

?>

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>

                     <?php
                $sql = "SELECT * FROM catagory WHERE active='Yes'";
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

                                        echo "Image not found.";
                                    }
                                    else
                                    {

                                        ?>
                                        <img src="<?php echo ""; ?>image/catagory/<?php echo $image_name; ?>" alt="Pizza" class="img-responsive img-curve">
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
                    echo "Category not found.";
                }

            ?>


            <div class="clearfix"></div>
        </div>

   <?php
require_once('footers.php');
?>
