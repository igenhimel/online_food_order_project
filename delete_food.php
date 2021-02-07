<?php

 require_once('database.php');

$id=$_GET['food_id'];

$sql="select * from food where food_id =$id";
$record=mysqli_query($connect,$sql);

                        if($record==TRUE)
                        {

                            $count = mysqli_num_rows($record);
                            if($count>0)
                            {
                                while($rows=mysqli_fetch_assoc($record))
                                {

                                    $id=$rows['food_id'];
                                    $image=$rows['image_name'];

                                }
                            }
                        }

 if(isset($id) AND isset($image))
    {

        $sql = "DELETE FROM food WHERE food_id=$id";
        $res = mysqli_query($connect, $sql);
        if($res==true)
        {

            $path = "image/food/".$image;
            $remove = unlink($path);

            $_SESSION['delete'] = "food Deleted Successfully";
            header('location:manage_food.php');
        }
        else
        {
            $_SESSION['delete'] = "Failed to Delete food";
            header('location:manage_food.php');
        }



    }
    else
    {
        header('location:manage_food.php');
    }


?>
