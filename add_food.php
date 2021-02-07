
<?php ob_start(); ?>

<?php
require_once('database.php');
require_once('adminpanel.php');
?>

<?php

if(isset($_SESSION['admin_id'])){

?>
<div class="main-content">
    <div class="wrapper">
        <h1 class="titledashboard">Add Food</h1>

        <br><br>

        <?php
            if(isset($_SESSION['upload']))
            {
                echo "<p style='text-align:center;color:green; margin-left:20px;'>";
                echo $_SESSION['upload'];
                echo "</p>";
                unset($_SESSION['upload']);
            }

         if(isset($_SESSION['add']))
                    {
                    echo "<p style='text-align:center;color:green; margin-left:20px;'>";
                        echo $_SESSION['add'];
                    echo "</p>";
                        unset($_SESSION['add']);
                    }

        ?>

        <form action="" method="POST" enctype="multipart/form-data">

            <table class="tbl-32">

                <tr>
                    <td>Food Name </td>
                    <td>
                        <input type="text" name="title" placeholder="Title of the Food">
                    </td>
                </tr>

                <tr>
                    <td>Description </td>
                    <td>
                        <textarea name="description" cols="30" rows="5" placeholder="Description of the Food."></textarea>
                    </td>
                </tr>

                <tr>
                    <td>Price </td>
                    <td>
                        <input type="number" name="price">
                    </td>
                </tr>

                <tr>
                    <td>Select Image </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>Catagory </td>
                    <td>
                        <select name="catagory">

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

                                        ?>

                                        <option value="<?php echo $id; ?>"><?php echo $title; ?></option>

                                        <?php
                                    }
                                }
                                else
                                {

                                    ?>
                                    <option value="0">No Category Found</option>
                                    <?php
                                }



                            ?>

                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Featured: </td>
                    <td>
                        <input type="radio" name="featured" value="Yes"> Yes
                        <input type="radio" name="featured" value="No"> No
                    </td>
                </tr>

                <tr>
                    <td>Active: </td>
                    <td>
                        <input type="radio" name="active" value="Yes"> Yes
                        <input type="radio" name="active" value="No"> No
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Food" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>
<?php
}
else {
    echo "";
}
?>

        <?php


            if(isset($_POST['submit']))
            {
                if(empty($_POST['title'])){
                     $_SESSION['add'] = "Please Insert Food Name";
                    header('location:add_food.php');
                    die();
                }
               else{
                    $food_name = $_POST['title'];
               }

                $description = $_POST['description'];
                $price = $_POST['price'];
                $catagory = $_POST['catagory'];

                if(isset($_POST['featured']))
                {
                    $featured = $_POST['featured'];
                }
                else
                {
                    $featured = "No";
                }

                if(isset($_POST['active']))
                {
                    $active = $_POST['active'];
                }
                else
                {
                    $active = "No";
                }
                if(isset($_FILES['image']['name']))
                {

                    $image_name = $_FILES['image']['name'];


                    if($image_name!="")
                    {

                        $ext = end(explode('.', $image_name));


                        $image_name = "Food_Name_".rand(0000,9999).".".$ext;
                        $src = $_FILES['image']['tmp_name'];

                        $destination = "image/food/".$image_name;

                        $upload = move_uploaded_file($src, $destination);

                        if($upload==false)
                        {
                            $_SESSION['upload'] = "Failed to Upload Image";
                            header('location:add_food.php');


                        }

                    }

                }
                else
                {
                    $image_name = "";
                }

                $sql2 = "INSERT INTO food(food_name,description,price,image_name,catagory_id,featured,active)
                values('$food_name','$description','$price','$image_name','$catagory','$featured','$active')";

                $res2 = mysqli_query($connect, $sql2);

                if($res2 == true)
                {

                    $_SESSION['add'] = "Food Added Successfully";
                    header('location:manage_food.php');
                }
                else
                {

                    $_SESSION['add'] = "Failed to Add Food";
                    header('location:manage_food.php');
                }


            }



        ?>


    </div>
</div>
<?php

require_once('footers.php');
?>


<?php ob_flush(); ?>
