<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/adminLogin.css">
    <title>Admin LoginPage</title>
</head>
<body>
    <?php 
    include "./LoginPage/Database.php";
    include "header.php";
    ?>
    <div class="adminCenter">
        <div class="adminBox">
            <form action="adminLogin.php" method="POST">
                <h1>Log in as Admin</h1>
                <fieldset>
                    <legend>Username</legend>
                        <input type="username" name="adminUsername">
                </fieldset>

                <fieldset>
                 <legend>Password</legend>                             
                        <input type="password" name="adminPassword">
                </fieldset>

                <fieldset>
                    <legend>confirm Password</legend>
                        <input type="password" name="adminConfirmPassword">
                </fieldset>
                <button class="signin">Log In</button>
            </form>
        </div>
    </div>
    
</body>
</html>