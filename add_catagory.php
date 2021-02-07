
<?php ob_start(); ?>

<?php

require_once('adminpanel.php');
require_once('database.php');
?>
<?php

if(isset($_SESSION['admin_id'])){

?>
<div class="main-content">
    <div class="wrapper">
        <h1 class="titledashboard">Add Category</h1>

        <br><br>
<?php




            if(isset($_SESSION['add']))
            {
                echo "<p style='text-align:center;color:green; margin-left:20px;'>";
                echo $_SESSION['add'];
                unset($_SESSION['add']);
                echo "</p>";
            }

            if(isset($_SESSION['upload']))
            {
                echo "<p style='text-align:center;color:green; margin-left:20px;'>";
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
                  echo "</p>";
            }

        ?>

        <br><br>


        <form action="" method="POST" enctype="multipart/form-data">

            <table class="tbl-32">
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" placeholder="Category Title">
                    </td>
                </tr>

                <tr>

                    <td>Select Image: </td>
                    <td>
                        <input type="file" name="image">
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
                        <input type="submit" name="submit" value="Add Category" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>
        <?php
}
else{
    echo "";
}

     ?>
        <?php
            if(isset($_POST['submit']))
            {

               if(empty($_POST['title'])){
                    $_SESSION['add'] = "Please Insert Title";
                    header('location:add_catagory.php');
                    die();

               }
                else{
                    $title=$_POST['title'];
                }


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

                    if($image_name != "")
                    {
                        $ext = end(explode('.', $image_name));

                        $image_name = "Food_Category_".rand(000, 999).'.'.$ext;

                        $source_path = $_FILES['image']['tmp_name'];

                        $destination_path = "image/catagory/".$image_name;

                        $upload = move_uploaded_file($source_path, $destination_path);

                        if($upload==false)
                        {
                            $_SESSION['upload'] = "Failed to Upload Image.";
                           header('location:add_catagory.php');
                            die();
                        }

                    }
                }


                else
                {
                    $image_name="";
                }

                $sql = "INSERT INTO catagory(title,image_name,featured,active)
                values('$title','$image_name','$featured','$active')";


                $res = mysqli_query($connect, $sql);

                if($res==true)
                {

                    $_SESSION['add'] = "Catagory Added Successfully.";

                    header('location:catagory.php');
                }

                else
                {

                    $_SESSION['add'] = "Failed to Add Catagory.";
                    header('location:add_catagory.php');
                }
            }

        ?>

    </div>
</div>

<?php

require_once('footers.php');
?>


<?php ob_flush(); ?>
