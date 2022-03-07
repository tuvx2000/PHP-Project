<?php include('partials/menu.php'); ?>
<div class="main-content">
    <h1 class="wrapper">
    <h1>Update Admin</h1>

    <br/><br>

    <?php
        //1
        $id=$_GET['id'];
        //2
        $sql = "SELECT * FROM tbl_admin WHERE id=$id";
        //3
        $res=mysqli_query($conn, $sql);
        if ($res == true)
        {
            $count = mysqli_num_rows($res);
            if ($count ==1)
            {
<<<<<<< HEAD
                //echo "con cho";
=======
>>>>>>> 2cb0234852fd7c5370a5416be54e2c25cb84a082
                $row=mysqli_fetch_assoc($res);

                $full_name=$row['full_name'];
                $user_name=$row['user_name'];
            }
<<<<<<< HEAD
            else
            {
                header('location:'.SITEURL.'admin/manage-admin.php');   
            }
=======
>>>>>>> 2cb0234852fd7c5370a5416be54e2c25cb84a082
        }
    ?>

    <form action="" method="POST">
        <table class="tbl-30">
            <tr>
                <td>Full Name: </td>
                <td>
<<<<<<< HEAD
                    <input type="text" name="full_name" value="<?php echo$full_name;?>">
=======
                    <input type="text" name="full_name" value="<?php echo$full_name?>">
>>>>>>> 2cb0234852fd7c5370a5416be54e2c25cb84a082
                </td>
            </tr>

            <tr>
                <td>username: </td>
                <td>
<<<<<<< HEAD
                    <input type="text" name="user_name" value="<?php echo$user_name;?>">
=======
                    <input type="text" name="user_name" value="<?php echo$user_name?>">
>>>>>>> 2cb0234852fd7c5370a5416be54e2c25cb84a082
                </td>
            </tr>

            <tr>
                <td colspan="2">
<<<<<<< HEAD
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="submit" name="submit" value="Update Admin" class="btn-secondary">
=======
                    <input type="hiden" name="id" value="<?php echo $id; ?>">
                    <input type="submit" value="submit" value="Update Admin" class="btn-secondary">
>>>>>>> 2cb0234852fd7c5370a5416be54e2c25cb84a082
                </td>
            </tr>
        </table>

    </form>
    </div>
</div>

<?php 
    if(isset($_POST['submit']))
    {
        //echo "Button Clicked"
        $id=$_POST['id'];
        $full_name = $_POST['full_name'];
<<<<<<< HEAD
        $user_name=  $_POST['user_name'];
        ////////////

        $sql = "UPDATE tbl_admin SET
        full_name= '$full_name',
        user_name= '$user_name'
=======
        $user_name= $_POST['user_name'];
        ////////////

        $sql = "UPDATE FROM tbl_admin SET
        full_name= '$full_name',
        user_name= '$user_name',
>>>>>>> 2cb0234852fd7c5370a5416be54e2c25cb84a082
        WHERE id='$id'
        ";
        //////////
        $res = mysqli_query($conn, $sql);
        /////////
        if($res==true)
        
            { 
                $_SESSION['update']="<div class='success'>Admin Updated successfully.</div>";
                header('location:'.SITEURL.'admin/manage-admin.php');
            }
            else
            {
                $_SESSION['update']="<div class='error'>Faild to Delete Admin.</div>";
                header('location:'.SITEURL.'admin/manage-admin.php');
            }
        
    }
?>

<?php include('partials/footer.php');?>