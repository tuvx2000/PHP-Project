<?php

     include('../config/constants.php');
     // echo "Delete food page"

     if(isset($_GET['id']) && isset($_GET['image_name']))
     {
         $id = $_GET['id'];
          $image_name = $_GET['image_name'];

          if($image_name != ""){
               $path = "../images/food/".$image_name;
               
               $remove = unlink($path);

               if($remove==false){
                    $_SESSION['upload']= "<div class='error'>Failed to remove image file.</div>";
                    header('location:'.SITEURL.'admin/manage-food.php');

                    die();
               }
          }
          $sql = "DELETE FROM tbl_product WHERE id =$id";

          $res = mysqli_query($conn, $sql);

          if($res == true){
               $_SESSION['delete'] = "<div class ='success'>food delete success</div>";
               header('location:'.SITEURL.'admin/manage-product.php');
          }
          else{
               $_SESSION['delete'] = "<div class ='error'></div>";
               header('location:'.SITEURL.'admin/manage-product.php');  
          }
     }
     else
     {
          $_SESSION['unauthorize']= "<div class='error'>Unauthorized Access.</div>";
          header('location'.SITEURL.'admin/manage-product.php');
     }
?>