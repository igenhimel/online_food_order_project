<?php

 require_once('database.php');

$id=$_GET['catagory_id'];

$sql="select * from catagory where catagory_id =$id";
$record=mysqli_query($connect,$sql);

                        if($record==TRUE)
                        {

                            $count = mysqli_num_rows($record);
                            if($count>0)
                            {
                                while($rows=mysqli_fetch_assoc($record))
                                {

                                    $id=$rows['catagory_id'];
                                    $title=$rows['title'];
                                    $image=$rows['image_name'];
                                    $featured=$rows['featured'];
                                    $active=$rows['active'];
                                }
                            }
                        }

 if(isset($id) AND isset($image))
    {

        $sql = "DELETE FROM catagory WHERE catagory_id=$id";
        $res = mysqli_query($connect, $sql);
        if($res==true)
        {

            $path = "image/catagory/".$image;
            $remove = unlink($path);

            $_SESSION['delete'] = "Catagory Deleted Successfully";
            header('location:catagory.php');
        }
        else
        {
            $_SESSION['delete'] = "Failed to Delete Category";
            header('location:catagory.php');
        }



    }
    else
    {
        header('location:catagory.php');
    }


?>
