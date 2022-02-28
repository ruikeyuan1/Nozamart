<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin page</title>
</head>
<body>
<?php 
    require("header.php");
    ?>
    <div class="main">
               <div class="main-content">
                    <h1 class="main-section-heading">Please enter your verification code</h1>
                    <form method="POST">
    
                    <!--Firstname-->
                    <input type="text" placeholder="Enter code" name="verification_code" id="verification_code" required>
    
                   
                    
                    <!--Submit-->
                    <input type="submit" class="registerbtn" name="register" value="Submit">
    
                    <div class="container signin">
                        <p>Already have an account? <a href="#">Sign in</a>.</p>
                    </div>
                </form>
               </div>
            </div>
</body>
</html>