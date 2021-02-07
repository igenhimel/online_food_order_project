<?php
    require_once('database.php');
    $id = $_GET['admin_id'];
    $sql = "DELETE FROM admin WHERE admin_id=$id";
    $res = mysqli_query($connect, $sql);
    if($res==true)
    {
        $_SESSION['delete'] = "Admin Deleted Successfully";
        header('location:manage_admin.php');
    }
    else
    {
        $_SESSION['delete'] = "Failed to Delete Admin. Try Again Later";
        header('location:manage_admin.php');
    }
?>
