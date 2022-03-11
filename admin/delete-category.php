<?php
    //echo "Delete Page"
    include('../config/constants.php');

    if (isset($_GET['id']) AND isset($_GET['image_name']))
    {
        //Get the Value and Delete
        //echo "Get Value and Delete";
        $id= $_GET['id'];
        $image_name = $_GET['image_name'];

        //Remove the physical image file iss available
        if($image_name!="")
        {
            //image is available. So remove it
            $path="../image/category/".$image_name;
            //Remove the Image
            $remove = unlink($path);

            if($remove==false)
            {
                $_SESSION['remove'] = "<div class='error'>Failed to remove category image. </div>";


                header('location: '.SITEURL.'admin/manage-category.php');

                //Stop
                die();
            }
        }

        //Delete Data form Database
        $sql = "DELETE FROM tbl_category WHERE id=$id";
       

        //Execute the Query
        $res = mysqli_query($comn,$sql);

        //Check date delete from data
        if($res==true)
        {
            $_SESSION['detele'] = "<div class='success'>Category Delete Successfully. </div>";
            
            header('location: '.SITEURL.'admin/manage-category.php');

        }
        else
        {
            $_SESSION['detele'] = "<div class='error'>Failed to Detele Category. </div>";
            
            header('location: '.SITEURL.'admin/manage-category.php');

        }


    }
    else
    {
        //redirect to Manage Category Page
        header('location: '.SITEURL.'admin/manage-category.php');

    }
?>