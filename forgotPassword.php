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
        <div class="forgotform">
            <h1>Reset your password</h1>
            <p>An E-mail will be sent to you with instructions</p>
            <form action="reset-request.inc.php" method="POST">
                <input type="text" name="emailField" placeholder="Enter your E-mail here">
                <button type="submit" name="reset-request-submit">Recover Password</button>   
            </form>
            <?php 
            if(isset($_GET['reset'])){
                if($_GET['reset'] == "succsess"){
                    echo "<p class='signupsuccsess'>Check your e-mail</p>";
                }
            }
            ?>
        </div>
    </div>
<body>
</body>
</html>