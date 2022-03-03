<?php include('partials/menu.php'); ?>


<!--menu main content  start-->
<div class="Main-Content">
    <div class="wrapper">
        <h1> Manage Admin <h1>
            <br />

            <?php
                if(isset($_SESSION['add'])){
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }   
                
                if(isset($_SESSION['delete'])){
                    echo $_SESSION['delete'];
                    unset($_SESSION['delete']);
                }

                if(isset($_SESSION['update'])){
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                }

                if(isset($_SESSION['user-not-found']))
                {
                    echo $_SESSION['user-not-found'];
                    unset($_SESSION['user-not-found']);
                }
                if(isset($_SESSION['pwd-not-match'])){
                    echo $_SESSION['pwd-not-match'];
                    unset($_SESSION['pwd-not-match']);
                }
                if(isset($_SESSION['change-pwd'])){
                    echo $_SESSION['change-pwd'];
                    unset($_SESSION['change-pwd']);
                }
            ?>
            

            <a href="add-admin.php" class="btn-primary">Add Admin</a>

            <br /><br /><br />
            <table class="tbl-full">
                <tr>
                    <th>S.N.</th>
                    <th>Full Name</th>
                    <th>UserName</th>
                    <th>Actions</th>
                </tr>

                <?php
                    $sql = "SELECT * FROM tbl_admin";
                    $res = mysqli_query($conn, $sql);

                    if($res == true)
                    {
                        $count = mysqli_num_rows($res);

                        if($count > 0){
                            while($rows = mysqli_fetch_assoc($res)){
                                $id = $rows['id'];
                                $full_name=$rows['full_name'];
                                $user_name = $rows['user_name'];

                                ?>
                                    <tr>
                                        <td><?php echo $id; ?> .</td>
                                        <td><?php echo $full_name; ?></td>
                                        <td><?php echo $user_name; ?></td>
                                        <td>
                                            <a href ="<?php echo SITEURL; ?>admin/update-password.php?id=<?php
                                            echo $id; ?>" 
                                            class="btn-primary">Change Password</a>

                                            <a href ="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php
                                            echo $id; ?>" 
                                            class="btn-secondary">Update Admin</a>

                                            <a href ="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php
                                            echo $id; ?>" 
                                            class="btn-danger">Delete Admin</a>
                                        </td>
                                    </tr> 
                                <?php
                            }
                        }
                    }
                ?>
            </table>
        <div class="clearfix"></div>
    </div>
 </div>

<!--menu main content  end-->


<?php include('partials/footer.php'); ?>

