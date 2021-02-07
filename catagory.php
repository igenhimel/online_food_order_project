<?php
require_once('adminpanel.php');
require_once('database.php');
?>

<?php
if(isset($_SESSION['admin_id'])){
?>
<div class="main-content">
    <div class="wrapper">
        <h1 class="titledashboard">Manage Catagory</h1>

        <br />


        <br><br><br>


        <a href="add_catagory.php" class="btn-primary">Add Catagory</a>
        <?php
                if(isset($_SESSION['add'])){
                    echo "<p style='text-align:center;color:green; margin-left:20px;'>";
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                echo "</p>" ;
                }

                else{
                    "";
                }
    if(isset($_SESSION['delete'])){
         echo "<p style='text-align:center;color:green; margin-left:20px;'>";
        echo $_SESSION['delete'];
                    unset($_SESSION['delete']);
        echo "</p>";
    }
    else{
        "";
    }
    if(isset($_SESSION['update'])){
         echo "<p style='text-align:center;color:green; margin-left:20px;'>";
        echo $_SESSION['update'];
                    unset($_SESSION['update']);
        echo "</p>";
    }
    else{
        "";
    }
        if(isset($_SESSION['change-pwd'])){
         echo "<p style='text-align:center;color:green; margin-left:20px;'>";
        echo $_SESSION['change-pwd'];
                    unset($_SESSION['change-pwd']);
        echo "</p>";
    }
    else{
        "";
    }
        if(isset($_SESSION['pwd-not-match'])){
         echo "<p style='text-align:center;color:green; margin-left:20px;'>";
        echo $_SESSION['pwd-not-match'];
                    unset($_SESSION['pwd-not-match']);
        echo "</p>";
    }
    else{
        "";
    }
        if(isset($_SESSION['user-not-found'])){
         echo "<p style='text-align:center;color:green; margin-left:20px;'>";
        echo $_SESSION['user-not-found'];
                    unset($_SESSION['user-not-found']);
        echo "</p>";
    }
    else{
        "";
    }
     if(isset($_SESSION['failed-remove'])){
         echo "<p style='text-align:center;color:green; margin-left:20px;'>";
        echo $_SESSION['failed-remove'];
                    unset($_SESSION['failed-remove']);
        echo "</p>";
    }
    else{
        "";
    }
       if(isset($_SESSION['no-category-found'])){
         echo "<p style='text-align:center;color:green; margin-left:20px;'>";
        echo $_SESSION['no-category-found'];
                    unset($_SESSION['no-category-found']);
        echo "</p>";
    }
    else{
        "";
    }

    if(isset($_SESSION['remove'])){
         echo "<p style='text-align:center;color:green; margin-left:20px;'>";
        echo $_SESSION['remove'];
                    unset($_SESSION['remove']);
        echo "</p>";
    }
    else{
        "";
    }








                ?>

        <br /><br /><br />

        <table class="tbl-full">
            <tr>
                <th>Catagory Id</th>
                <th>Title</th>
                <th>Image</th>
                <th>Featured</th>
                <th>Active</th>
                <th>Actions</th>
            </tr>
            <?php

                        $sql = "SELECT catagory_id,title,image_name,featured,active FROM catagory";

                        $record = mysqli_query($connect, $sql);

                        if($record==TRUE)
                        {

                            $count = mysqli_num_rows($record);

                            $sn=1;
                            if($count>0)
                            {
                                while($rows=mysqli_fetch_assoc($record))
                                {

                                    $id=$rows['catagory_id'];
                                    $title=$rows['title'];
                                    $image=$rows['image_name'];
                                    $featured=$rows['featured'];
                                    $active=$rows['active'];


                                   ?>
            <tr>
                <td>
                    <?php echo $id; ?>. </td>
                <td><?php echo $title; ?></td>
                <td><?php
                    if($image!=""){
                        ?>

                       <img src="<?php echo "image/catagory/" ?><?php echo $image; ?>" width="100px" >
                      <?php
                    }

                    else{

                        echo "Image Not Found";
                    }

                                    ?>




                    </td>
                <td><?php echo $featured; ?></td>
                <td><?php  echo $active; ?></td>
                <td>
                    <a href="update_catagory.php?catagory_id=<?php echo $id?> &image_name <?php echo $image;?>" class="btn-secondary">Update catagory</a>
                    <a href="delete_catagory.php?catagory_id=<?php echo $id?>&image_name <?php echo $image; ?>" class="btn-danger">Delete catagory</a>
                </td>
            </tr>

            <?php

                                }
                            }
                            else
                            {



                            echo "<tr> <td colspan='8' style='text-align:center; color:red' class='error'> Catagory not Added Yet. </td> </tr>";


                            }
                        }

                    ?>




        </table>

    </div>
</div>

<?php
}
else{
   echo "No admin Logged In here";
}

?>
<?php

require_once('footers.php');
?>


