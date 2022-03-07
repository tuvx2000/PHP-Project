<?php include('partials/menu.php'); ?>


<div class="main-content">
    <div class="wapper">
        <h1 class="admin-h1">Add Admin</h1>

        <br><br>

        <?php
            if(isset($_SESSION['add'])){
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
        ?>

        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Full Name: </td>
                    <td>
                        <input type="text" name="full_name" placeholder="Enter your full name">
                    </td>
                </tr>

                <tr>
                    <td>User Name: </td>
                    <td>
                        <input type="text" name="user_name" placeholder="Enter your user name">
                    </td>
                </tr>

                <tr>
                    <td>Password: </td>
                    <td>
                        <input type="password" name="password" placeholder="Enter your password">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php include('partials/footer.php'); ?>

<?php
    if(isset($_POST['submit']))
    {
       $full_name = $_POST['full_name'];
       $user_name = $_POST['user_name'];
       $password = md5($_POST['password']);

       $sql = "INSERT INTO tbl_admin SET
            full_name ='$full_name',
            user_name ='$user_name',
            pass_word = '$password'
        ";

         

    // $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error()); 
    // $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error());


        $res = mysqli_query($conn,$sql) or die(mysqli_error());
    // check process

        if($res == TRUE){
        // echo "Data Inserted";
        $_SESSION['add'] = "Admin Added successfully";
        header("location:".SITEURL.'admin/manage-admin.php');
        }
        else
        {
        // echo "Failed to Inserted";
        $_SESSION['add'] = "Failed to Added successfully";
        header("location:".SITEURL.'admin/add-admin.php');
        }
    }


?>