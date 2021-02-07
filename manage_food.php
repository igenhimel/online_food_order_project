<?php

require_once('database.php');
require_once('adminpanel.php');
?>

<?php

if(isset($_SESSION['admin_id'])){

?>
<div class="main-content">
    <div class="wrapper">
        <h1 class="titledashboard">Manage Food</h1>

        <br /><br />


                <a href="add_food.php" class="btn-primary">Add Food</a>

                <br /><br /><br />

                <?php
                    if(isset($_SESSION['add']))
                    {
                    echo "<p style='text-align:center;color:green; margin-left:20px;'>";
                        echo $_SESSION['add'];
                    echo "</p>";
                        unset($_SESSION['add']);
                    }

                    if(isset($_SESSION['delete']))
                    {
                        echo "<p style='text-align:center;color:green; margin-left:20px;'>";
                        echo $_SESSION['delete'];
                        echo "</p>";
                        unset($_SESSION['delete']);
                    }

                    if(isset($_SESSION['upload']))
                    {
                        echo "<p style='text-align:center;color:green; margin-left:20px;'>";
                        echo $_SESSION['upload'];
                        echo "</p>";
                        unset($_SESSION['upload']);
                    }

                    if(isset($_SESSION['unauthorize']))
                    {
                        echo "<p style='text-align:center;color:green; margin-left:20px;'>";
                        echo $_SESSION['unauthorize'];
                        echo "</p>";
                        unset($_SESSION['unauthorize']);
                    }

                    if(isset($_SESSION['update']))
                    {
                        echo "<p style='text-align:center;color:green; margin-left:20px;'>";
                        echo $_SESSION['update'];
                        echo "</p>";
                        unset($_SESSION['update']);
                    }
         if(isset($_SESSION['remove-failed']))
                    {
                    echo "<p style='text-align:center;color:green; margin-left:20px;'>";
                        echo $_SESSION['remove-failed'];
                    echo "</p>";
                        unset($_SESSION['remove-failed']);
                    }


                ?>

                <table class="tbl-full">
                    <tr>
                        <th>Food Id</th>
                        <th>Food Name</th>
                        <th>Price</th>
                        <th>image</th>
                         <th>Description</th>
                        <th>Featured</th>
                        <th>Active</th>
                        <th>Actions</th>
                    </tr>

                    <?php
                        $sql = "SELECT * FROM food";
                        $res = mysqli_query($connect, $sql);
                        $count = mysqli_num_rows($res);
                        $sn=1;

                        if($count>0)
                        {
                            while($row=mysqli_fetch_assoc($res))
                            {
                                $id = $row['food_id'];
                                $food_name = $row['food_name'];
                                $price = $row['price'];
                                $image_name = $row['image_name'];
                                $description= $row['description'];
                                $featured = $row['featured'];
                                $active = $row['active'];
                                ?>

                                <tr>
                                    <td><?php echo $id ?>. </td>
                                    <td><?php echo $food_name; ?></td>
                                    <td>$<?php echo $price; ?></td>
                                    <td>
                                        <?php

                                            if($image_name=="")
                                            {

                                                echo "Image not Added";
                                            }
                                            else
                                            {

                                                ?>
                                                <img src="<?php echo "image/food/" ?><?php echo $image_name; ?>" width="100px" >
                                                <?php
                                            }
                                        ?>
                                    </td>
                                    <td><?php echo $description?></td>
                                    <td><?php echo $featured; ?></td>
                                    <td><?php echo $active; ?></td>
                                    <td>
                    <a href="update_food.php?food_id=<?php echo $id?> &image_name <?php echo $image_name;?>" class="btn-secondary">Update Food</a>
                    <br><br>
                    <a href="delete_food.php?food_id=<?php echo $id?>&image_name <?php echo $image_name; ?>" class="btn-danger">Delete Food</a>
                                    </td>
                                </tr>

                                <?php
                            }
                        }
                        else
                        {

                            echo "<tr> <td colspan='8' style='text-align:center; color:red' class='error'> Food not Added Yet. </td> </tr>";
                        }

                    ?>


                </table>
    </div>

</div>
<?php
}
else{
    echo "";
}
?>


<?php

require_once('footers.php');
?>


