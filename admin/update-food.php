<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Food</h1>
        <br><br>

        <?php
            if(isset($_GET['id']))
            {
                //echo "Getting the Data";
                $id=$_GET['id'];

                $sql1="SELECT * From tbl_food WHERE id=$id";

                $res1 = mysqli_query($conn,$sql1);

                $count1 = mysqli_num_rows($res1);

                if($count1==1)
                {
                    $row2 = mysqli_fetch_assoc($res1);
                    $title = $row2['title'];
                    $description= $row2['description'];
                    $price = $row2['price'];
                    $current_image = $row2['image_name'];
                    $current_category= $row2['category_id'];
                    $featured = $row2['featured'];
                    $active = $row2['active'];
                }
                else
                {
                    $_SESSION['no-category-found']="<div class='error'>Category Not Found. </div>";
                    header('location: '.SITEURL.'admin/manage-food.php');
                }
            }
            else
            {
                header('location: '.SITEURL.'admin/manage-food.php');
            }
        ?>

        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" value="<?php echo $title; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Description: </td>
                    <td>
                        <textarea name="description" cols="30" rows="5"><?php echo $description; ?></textarea>
                    </td>
                </tr>

                <tr>
                    <td>Price: </td>
                    <td>
                        <input type="number" name="price" value="<?php echo $price; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Current Image: </td>
                    <td>
                    <?php
                            if($current_image !="")
                            {
                                ?>
                                <img src="<?php echo SITEURL; ?>image/food/<?php echo $current_image; ?>" width="150px" >
                                <?php
                            }
                            else
                            {
                                echo "<div class='error'>Image Not Added. </div>";
                            }
                        ?>
                    </td>
                </tr>


               <tr>
                    <td>Category: </td>
                    <td>
                        <select name="category">
                            <option value="0">
                                <?php

                                    $sql="SELECT * From tbl_category WHERE active='Yes'";

                                    $res = mysqli_query($conn,$sql);

                                    $count = mysqli_num_rows($res);
                                    if($count>0)
                                    {
                                        while(mysqli_fetch_assoc($res)){
                                            $category_title=$row['title'];
                                            $category_id=$row['id'];

                                            ?>
                                                <option <?if($current_category=$category_id){echo"Seclected";}?> value="<?php echo $category_id;?>"><?php echo $category_title;?></option>
                                            <?php
                                        }

                                        
                                    }
                                    else
                                    {
                                        $_SESSION['no-category-found']="<div class='error'>Category Not Found. </div>";
                                        header('location: '.SITEURL.'admin/manage-category.php');
                                    }

                                ?> 
                            </option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Featured: </td>
                    <td>
                        <input <?php if($featured=="Yes"){echo "checked";} ?> type="radio" name="featured" value="Yes"> Yes
                        <input <?php if($featured=="No"){echo "checked";} ?> type="radio" name="featured" value="No"> No
                    </td>
                </tr>

                <tr>
                    <td>Active: </td>
                    <td>
                        <input <?php if($active=="Yes"){echo "checked";} ?> type="radio" name="active" value="Yes"> Yes
<input <?php if($active=="No"){echo "checked";} ?> type="radio" name="active" value="No"> No
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
            if(isset($_GET['submit']))
            {
                //echo "Clicked";
                //Get all value from to form
                $id = $_POST['id'];
                $title = $_POST['title'];
                $description= $_POST['description'];
                $price= $_POST['price'];
                $current_image = $_POST['current_image'];
                $category=$_POST['category'];


                $featured = $_POST['featured'];
                $active = $_POST['active'];

                //Update iamge
                if(isset($_FILES['image']['name']))
                {
                    $image_name = $_FILES['image']['name'];

                    if($image_name != "")
                    {
                        $ext = end(explode('.', $image_name));

                        $image_name = "Food_Name_".rand(000,999).'.'.$ext;

                        $source_path = $_FILES['image']['tmp_name'];

                        $destination_path = "../images/".$image_name;

                        $upload = move_uploaded_file($source_path, $destination_path);

                        if($upload == false)
                        {
                            $_SESSION['upload'] = "<div class='error'>Failed to Upload Image.</div>";
                            header('location:'.SITEURL. 'admin/manage-category.php');
                            die();
                        }

                        if($current_image!="")
                        {
                            $remove_path ="../images/category/".$current_image;
                            $remove = unlink($remove_path);
                            if($remove==false)
                            {
                                $_SESSION['failed-remove'] = "<div class='error'>Failed to remove current Image.</div>";
                                header('location:'.SITEURL. 'admin/manage-category.php');
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


                //Update  database
                $sql3= "UPDATE tbl_food SET
                    title = '$title',
                    description= '$description',
                    price= '$price'
                    image_name = '$image_name',
                    category_id= '$category'
                    featured = '$featured',
                    active = '$active'
                    WHERE id=$id
                ";

                //Execute the Query
                $res3= mysqli_query($comn,$sql3);

                if($res3==true)
                {
                    $_SESSION['update']= "<div class='success'>Food Update Successfully. </div>";
                    header('location: '.SITEURL.'admin/manage-food.php');

                }
                else
                {
                    $_SESSION['update']= "<div class='error'>Failed to Update Category. </div>";
                    header('location: '.SITEURL.'admin/manage-food.php');
                }
            }
        ?>

<?php include('partials/footer.php'); ?>