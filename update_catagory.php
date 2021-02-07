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
        <h1 class="titledashboard">Update Category</h1>

        <br><br>


        <?php

            if(isset($_GET['catagory_id']))
            {

                $id = $_GET['catagory_id'];
                $sql = "SELECT * FROM catagory WHERE catagory_id=$id";
                $res = mysqli_query($connect, $sql);
                $count = mysqli_num_rows($res);

                if($count==1)
                {

                    $row = mysqli_fetch_assoc($res);
                    $title = $row['title'];
                    $current_image = $row['image_name'];
                    $featured = $row['featured'];
                    $active = $row['active'];
                }
                else
                {

                    $_SESSION['no-category-found'] = "Catagory not Found";
                    header('location:catagory.php');
                }

            }
        ?>

        <form action="" method="POST" enctype="multipart/form-data">

            <table class="tbl-32">
                <tr>
                    <td>Title </td>
                    <td>
                        <input type="text" name="title" value="<?php echo $title; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Current Image </td>
                    <td>
                        <?php
                            if($current_image != "")
                            {

                                ?>
                        <img src="<?php echo "image/catagory/" ?><?php echo $current_image; ?>" width="100px">
                        <?php
                            }
                            else
                            {

                                echo "Image Not Added";
                            }
                        ?>
                    </td>
                </tr>

                <tr>
                    <td>New Image </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>Featured </td>
                    <td>
                        <input <?php if($featured=="Yes"){

                           echo "checked";
                          }
                               ?> type="radio" name="featured" value="Yes"> Yes

                        <input <?php
                               if($featured=="No")
                               {
                                   echo "checked";
                               } ?> type="radio" name="featured" value="No"> No
                    </td>
                </tr>

                <tr>
                    <td>Active: </td>
                    <td>
                        <input <?php if($active=="Yes"){
                       echo "checked";
                        }
                               ?> type="radio" name="active" value="Yes"> Yes

                        <input <?php
                               if($active=="No")
                               {echo "checked";
                               } ?> type="radio" name="active" value="No"> No
                    </td>
                </tr>

                <tr>
                    <td>
                        <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Update Category" class="btn-secondary">
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
                $current_image = $_POST['current_image'];
                $featured = $_POST['featured'];
                $active = $_POST['active'];


                if(isset($_FILES['image']['name']))
                {

                    $image_name = $_FILES['image']['name'];


                    if($image_name != "")
                    {

                        $ext = end(explode('.', $image_name));
                        $image_name = "Food_Catagory".rand(000, 999).'.'.$ext;
                        $source_path = $_FILES['image']['tmp_name'];
                        $destination_path = "image/catagory/".$image_name;
                        $upload = move_uploaded_file($source_path, $destination_path);


                        if($upload==false)
                        {
                            $_SESSION['upload'] = "Failed to Upload Image";

                            header('location:catagory.php');
                            die();
                        }


                        if($current_image!="")
                        {
                            $remove_path = "image/catagory/".$current_image;

                            $remove = unlink($remove_path);


                            if($remove==false)
                            {

                                $_SESSION['failed-remove'] = "Failed to remove current Image";
                                header('location:catagory.php');
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


                $sql2 = "UPDATE catagory SET
                    title = '$title',
                    image_name = '$image_name',
                    featured = '$featured',
                    active = '$active'
                    WHERE catagory_id=$id
                ";


                $res2 = mysqli_query($connect, $sql2);

                if($res2==true)
                {

                    $_SESSION['update'] = "Catagory Updated Successfully";
                    header('location:catagory.php');
                }
                else
                {
                    $_SESSION['update'] = "Failed to Update Catagory";
                    header('location:catagory.php');
                }

            }

        ?>

    </div>
</div>


<?php

require_once('footers.php');
?>

<?php ob_flush(); ?>
