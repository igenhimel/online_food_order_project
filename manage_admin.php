<?php
require_once('adminpanel.php');
require_once('database.php');
?>

<?php
if(isset($_SESSION['admin_id'])){
?>
<div class="main-content">
    <div class="wrapper">
        <h1 class="titledashboard">Manage Admin</h1>

        <br />


        <br><br><br>


        <a href="add_admin.php" class="btn-primary">Add Admin</a>
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


                ?>

        <br /><br /><br />

        <table class="tbl-full">
            <tr>
                <th>Admin Id</th>
                <th>Full Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
            <?php

                        $sql = "SELECT admin_id,name,username,email FROM admin";

                        $record = mysqli_query($connect, $sql);

                        if($record==TRUE)
                        {

                            $count = mysqli_num_rows($record);

                            $sn=1;
                            if($count>0)
                            {
                                while($rows=mysqli_fetch_assoc($record))
                                {

                                    $id=$rows['admin_id'];
                                    $full_name=$rows['name'];
                                    $username=$rows['username'];
                                    $email=$rows['email'];

                                   ?>
                                    <tr>
                                        <td>
            <?php echo $id; ?>. </td>
            <td><?php echo $full_name; ?></td>
            <td><?php echo $username; ?></td>
            <td><?php echo $email; ?></td>
            <td>
                <a href="update_password.php?admin_id=<?php echo $id?>" class="btn-changepass">Change Password</a>
                    <a href="update_admin.php?admin_id=<?php echo $id?>" class="btn-secondary">Update Admin</a>
                    <a href="delete_admin.php?admin_id=<?php echo $id?>" class="btn-danger">Delete Admin</a>
            </td>
            </tr>

            <?php

                                }
                            }
                            else
                            {
                                //We Do not Have Data in Database
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


