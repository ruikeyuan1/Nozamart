<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/forgotPassword.css">
    <title>Forgot Password</title>
</head>
    <?php 
    include "header.php";
    include "./LoginPage/Database.php";
    ?>
    <div class="cent">
        <div class="forgotform" >

            <?php 

                $selector = $_GET['selector'];
                $validator = $_GET['validator'];

                if(empty($selector) || empty($validator)){
                    echo "Could not validate your request";
                } else{
                    if(ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false){
                        ?>

                        <form action="reset-password.inc.php" method="POST">
                            <input type="hidden" name="selector" value="<?php echo $selector ?>">
                            <input type="hidden" name="validator" value="<?php echo $validator ?>">
                            <input type="password" name="pwd" placeholder="Enter new password">
                            <input type="password" name="pwd-repeat" placeholder="Repeat new password">
                            <button type="submit" name="reset-password-submit">Reset password</button>
                        </form>

                        <?php
                    }
                  }

            ?>

        </div>
    </div>
<body>
</body>
</html>