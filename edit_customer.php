<?php
require "Database.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/style_Register_Admin.css" rel="stylesheet">
    <title>Edit Product</title>
</head>
<body>
    <?php
        require("header.php");
    ?>

<?php
            $ID = $_GET['Id'];
            $get_first_name = $_GET['FirstName'];
            $get_last_name = $_GET['LastName'];
            $get_username = $_GET['userName'];
            $get_email = $_GET['email'];

            //Filtering the input
            if ($_SERVER['REQUEST_METHOD'] == 'POST') 
            {
            $post_first_name = filter_input(INPUT_POST, 'first_name');
            $post_last_name = filter_input(INPUT_POST, 'last_name');
            $post_username = filter_input(INPUT_POST,'username');
            $post_email = filter_input(INPUT_POST,'email');


            //preparating and updating the database
            //pprep
            $sql = "UPDATE customer SET `FirstName`=?, `LastName`=?, `userName`=?, `email`=? WHERE `Id`=?";
            $stmt = mysqli_prepare($conn, $sql) OR DIE ("Preparation Error1" .mysqli_error($conn));
            mysqli_stmt_bind_param($stmt, 'ssssi', $post_first_name, $post_last_name, $post_username, $post_email, $ID);
            mysqli_stmt_execute($stmt) OR DIE ("Submission Error");
            echo "<div style='width: 100%; text-align:center; color: #266bf9; font-size: 30px; padding-top: 25px'>Customer updated!</div>";
            $result = $stmt->get_result();
            mysqli_stmt_close($stmt);
            echo "<p><a href='customers-overview.php'>&lt;&lt; See customers</a></p>";
            }
       
        ?>



    
        <br>
        <div class="main-content">
            <h1>Edit customer</h1>
            <form method="POST">

                <!--First Name-->
                <label for="firstname"><b>First name</b></label>
                <input type="text" name="first_name" id="firstname" value="<?php echo $get_first_name; ?>">

                <!--Last Name-->
                <label for="lastname"><b>Last name</b></label>
                <input type="text" name="last_name" id="lastname" value="<?php echo $get_last_name; ?>">

                <!--Username-->
                <label for="username"><b>Username</b></label>
                <input type="text" name="username" id="username" value="<?php echo $get_username; ?>">

                <!--Email-->
                <label for="email"><b>Email</b></label>
                <input type="text" name="email" value="<?php echo $get_email; ?>">
                
                
                <!--Submit-->
                <input type="submit" class="registerbtn" name="placed" value="Place">
            </form>
        </div>
       





    <?php
        require("footer.php");
    ?>
</body>
</html>