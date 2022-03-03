<?php include('partials/menu.php'); ?>



<!--menu main content  start-->
<div class="Main-Content">
    <div class="wrapper">
        <h1><strong> DASHBOARD </strong><h1>
            <br><br>
            <?php
                if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }
             ?>
             <br><br>
        <div class="col-4 text-center">
            <h1> 5 </h1>
            Categories
        </div>

        <div class="col-4 text-center">
            <h1> 5 </h1>
            Categories
        </div>

        <div class="col-4 text-center">
            <h1> 5 </h1>
            Categories
        </div>

        <div class="col-4 text-center">
            <h1> 5 </h1>
            Categories
        </div>



        <div class="clearfix"></div>
    </div>
 </div>

 <br>
 <form action="" method="POST">
    Name: <input type="text" name="name"><br>
    Description: <input type="text" name="description"><br>

    <input type="submit" name="submit">
</form>

<!--menu main content  end-->
<?php include('partials/footer.php'); ?>


<?php 

if(isset($_POST['submit']) && !empty($_POST['submit'])) {
    
    $name = $_POST['name'];
    $description = $_POST['description'];


    // Query to Save the data indo DB
    $sql = "INSERT INTO table_dump SET
        name= '$name',
        description ='$description'
        ";

    // Execute Query and save data in the DB


    // define('LOCALHOST','localhost');
    // define('DB_USERNAME','root');
    // define('DB_PASSWORD','');
    // define('DB_NAME','php-project-db');



    // $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error()); // DB connection
    // $db_select = mysqli_select_db($conn,DB_NAME) or die(mysqli_error()); // Selecting DB





    $res = mysqli_query($conn,$sql) or die(mysqli_error());
    // check process

    if($res == TRUE){
        echo "Data Inserted";
    }
    else
    {
        echo "Failed to Inserted";
    }


  }

?>

