<?php ob_start(); ?>
<?php
require_once('adminpanel.php');
require_once('database.php');

?>

<?php


$id=$_GET['food_id'];

$sql="select * from food where food_id =$id";
$record=mysqli_query($connect,$sql);

                        if($record==TRUE)
                        {

                            $count = mysqli_num_rows($record);
                            if($count>0)
                            {
                                while($row2=mysqli_fetch_assoc($record))
                                {
                                   $title = $row2['food_name'];
        $description = $row2['description'];
        $price = $row2['price'];
        $current_image = $row2['image_name'];
        $current_category = $row2['catagory_id'];
        $featured = $row2['featured'];
        $active = $row2['active'];

                                }
                            }
                        }

    else
    {

        header('location:manage_food.php');
    }
?>

<?php

if(isset($_SESSION['admin_id'])){

?>
<div class="main-content">
    <div class="wrapper">
        <h1 class="titledashboard">Update Food</h1>
        <br><br>

        <form action="" method="POST" enctype="multipart/form-data">

            <table class="tbl-32">

                <tr>
                    <td>Title </td>
                    <td>
                        <input type="text" name="title" value="<?php echo $title; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Description </td>
                    <td>
                        <textarea name="description" cols="30" rows="5"><?php echo $description; ?></textarea>
                    </td>
                </tr>

                <tr>
                    <td>Price </td>
                    <td>
                        <input type="number" name="price" value="<?php echo $price; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Current Image </td>
                    <td>
                        <?php
                        if($current_image == "")
                        {

                            echo "Image not Available";
                        }
                        else
                        {

                            ?>
                        <img src="<?php echo "" ?>image/food/<?php echo $current_image; ?>" width="150px">
                        <?php
                        }
                    ?>
                    </td>
                </tr>

                <tr>
                    <td>Select New Image </td>
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
                                    $catagory_title = $row['title'];
                                    $catagory_id = $row['catagory_id'];



                                    ?>
                            <option <?php if($current_category==$catagory_id){

                                        echo "selected";

                                    } ?> value="<?php echo $catagory_id; ?>"><?php echo $catagory_title; ?></option>


                            <?php
                                }



                            }
                            else
                            {

                                echo "<option value='0'>Catagory Not Available.</option>";
                            }






                        ?>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Featured: </td>
                    <td>
                        <input <?php if($featured=="Yes") {
    echo "checked";
} ?> type="radio" name="featured" value="Yes"> Yes
                        <input <?php if($featured=="No") {
    echo "checked";
} ?> type="radio" name="featured" value="No"> No
                    </td>
                </tr>

                <tr>
                    <td>Active: </td>
                    <td>
                        <input <?php if($active=="Yes") {echo "checked";} ?> type="radio" name="active" value="Yes"> Yes
                        <input <?php if($active=="No") {echo "checked";} ?> type="radio" name="active" value="No"> No
                    </td>
                </tr>

                <tr>
                    <td>
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                        <input type="submit" name="submit" value="Update Food" class="btn-secondary">
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

                $id = $_POST['id'];
                $title = $_POST['title'];
                $description = $_POST['description'];
                $price = $_POST['price'];
                $current_image = $_POST['current_image'];
                $catagory = $_POST['catagory'];
                $featured = $_POST['featured'];
                $active = $_POST['active'];


                if(isset($_FILES['image']['name']))
                {

                    $image_name = $_FILES['image']['name'];
                    if($image_name!="")
                    {

                        $ext = end(explode('.', $image_name));

                        $image_name = "Food-Name-".rand(0000, 9999).'.'.$ext;


                        $src_path = $_FILES['image']['tmp_name'];
                        $dest_path = "image/food/".$image_name;
                        $upload = move_uploaded_file($src_path, $dest_path);


                        if($upload==false)
                        {

                            $_SESSION['upload'] = "Failed to Upload new Image";

                            header('location:manage_food.php');

                            die();
                        }

                        if($current_image!="")
                        {
                            $remove_path = "image/food/".$current_image;

                            $remove = unlink($remove_path);
                            if($remove==false)
                            {

                                $_SESSION['remove-failed'] = "Faile to remove current image";

                                header('location:manage_food.php');
                                die();
                            }
                        }
                    }
                    else
                    {
                        $image_name = $current_image;
                    }
                }
                else
                {
                    $image_name = $current_image;
                }




                $sql3 = "UPDATE food SET
                    food_name = '$title',
                    description = '$description',
                    price = '$price',
                    image_name = '$image_name',
                    catagory_id=$catagory,
                    featured = '$featured',
                    active = '$active'
                    WHERE food_id=$id";


                $res3 = mysqli_query($connect, $sql3);


                if($res3==true)
                {

                    $_SESSION['update'] = "Food Updated Successfully";
                    header('location:manage_food.php');
                }
                else
                {

                    $_SESSION['up'] = "Failed to Update Food";

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
