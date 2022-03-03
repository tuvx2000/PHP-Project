<?php
    ////////////////////////////////
    include('../config/constants.php');
    //1
    $id = $_GET['id'];
    //2
     $sql = "DELETE FROM tbl_admin WHERE 
            id=$id
        ";
    // //3
     $res=mysqli_query($conn, $sql);
    // ////////////////////////////////
     if($res==true)
     {
        //echo 'Admin Deleted';
        $_SESSION['delete'] = "<div class='success'>Admin Deleted Successfully.</div>";
        header('location:'.SITEURL.'admin/manage-admin.php');
    }
    else
    {
        //echo 'Faild to Delete Admin';
        $_SESSION['delete']="<div class='error'>Faild to Delete Admin.Try Again Later.</div>";
        header('location:'.SITEURL.'admin/manage-admin.php');
    }
  ?>
