<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/profile.css" >
    <title>Profile</title>
</head>
<body>
    <?php 
    include "header.php";
    include "./LoginPage/Database.php";
    ?>
    <div class="centerButtons">
        <form action="profile.php" method="POST">
            <button type="submit" name="orderhistory" value="submit" class="historybutton">Order History</button>
            <button type="submit" name="logout" value="submit" class="logoutbutton">Sign out</button>
            
        </form>
    </div>
    <div class="profilecenter">
        <div class="profilebox">
            <form action="profile.php" method="POST">
                    <h2 class="profileheader">Change Password</h2>
                    <p><fieldset class="changePass" id="currentPassword">
                        <legend>Old Password</legend>
                        <input type="password" name="currentPassword"/>
                    </fieldset></p>

                    <p><fieldset class="changePass" id="newPassword">
                        <legend>New Password</legend>
                        <input type="password" name="newPassword"/>
                    </fieldset></p>

                    <p><fieldset class="changePass" id="confirmPassword">
                        <legend>New Password</legend>
                        <input type="password" name="confirmPassword"/>
                    </fieldset></p>
                    <div class="buttonCenter">
                        <button type="submit" name="changePass" value="submit" class="passwordButton">Change Password</button>
                    </div>
            </form>
        </div>
        <div class="usernameform">
            <form action="profile.php" method="POST">
                <h2 class="profileheader">Change Username</h2>
                <p><fieldset class="changeUser" id="currentUsername"><legend>Old Username</legend>
                <input type="username" name="currentUsername">
                </fieldset></p>

                <p><fieldset class="changeUser" id="newUsername"><legend>New Username</legend>
                <input type="username" name="newUsername">
                </fieldset></p>

                <p><fieldset class="changeUser" id="confirmUsername"><legend>New Username</legend>
                <input type="username" name="confirmUsername">
                </fieldset></p>
                <div class="buttonCenter">
                    <button type="submit" name="changeUser" value="submit" class="usernameButton">Change Username</button>
                </div>
            </form>
        </div>
    </div>
    <?php 
    //include "footer.php";

    //Logout button function start
    if(isset($_POST['logout'])){
        $_SESSION ['cusId'] = 0;
        $_SESSION ['loggedIn'] = 0;
        echo $_SESSION ['loggedIn'], $_SESSION ['cusId'] ;
        echo "You are now logged out";
    }else{
        echo "You are logged in";
    }
    //Logout button function end
    //--------------------------------------------------------------------------
    //Order history button function start
    
    //Order history button function end
    //--------------------------------------------------------------------------
    //Change passwork form start
    $error = NULL;
    if(isset($_POST['changePass'])){
        if (!empty($_POST['currentPassword']) && !empty($_POST['newPassword']) &&
        !empty($_POST['confirmPassword'])){

            $sql = "SELECT passWord FROM customer WHERE id= ?";
            if($stmt = mysqli_prepare($con, $sql)){
                $id = $_SESSION ['cusId'];
                mysqli_stmt_bind_param($stmt, "s", $id);
                if(mysqli_stmt_execute($stmt)){
                    mysqli_stmt_bind_result($stmt, $oldPassword); 
                    mysqli_stmt_store_result($stmt);
                    if(mysqli_stmt_num_rows($stmt) != 0){
                        while(mysqli_stmt_fetch($stmt)){
                            if(!password_verify($oldPassword, password_hash($_POST['newPassword'], PASSWORD_DEFAULT))){
                                if($_POST['newPassword'] == $_POST['confirmPassword']){
                                    if (strlen(trim($_POST['newPassword'])) > 6){
                                        
                                        $sql = "UPDATE customer set passWord = ? WHERE id = ?";
                                        if($stmt = mysqli_prepare($con, $sql)){
                                            $password = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);
                                            mysqli_stmt_bind_param($stmt, "ss", $password, $id);
                                            if(!mysqli_stmt_execute($stmt)){ //execute the statement
                                                $error = "Error executing query" . mysqli_error($con);
                                                die();
                                            }else{
                                                echo "Password changed successfully";
                                            }
                                        }else{
                                            $error = "Error preparing";
                                            die(mysqli_error($con));
                                        }
                                    }else{
                                        $error = "Password must be longer then 6 characters";
                                    }
                                }
                            }else {
                                $error = 'Password can not be the same';
                            }
                            
                        }

                    }else{
                        $error = "Password not found";
                    }

                }else{
                    $error = "Error executing";
                    die(mysqli_error($con));
                }
            }else{
                $error = "Error preparing";
                die(mysqli_error($con));
            }
        }else{
            $error = "Please make sure all fields are filled in";
        }

    }
    //Change passwork form end
    //--------------------------------------------------------------------------
    //Change username form start
    $error = NULL;
    if(isset($_POST['changeUser'])){
        if (!empty($_POST['currentUsername']) && !empty($_POST['newUsername']) &&
            !empty($_POST['confirmUsername'])){

                $sql = "SELECT userName FROM customer WHERE id= ?";
                if($stmt = mysqli_prepare($con, $sql)){
                     $id = $_SESSION ['cusId'];
                     mysqli_stmt_bind_param($stmt, "s", $id);
                     if(mysqli_stmt_execute($stmt)){
                        mysqli_stmt_bind_result($stmt, $oldUsername); 
                        mysqli_stmt_store_result($stmt);
                        if(mysqli_stmt_num_rows($stmt) != 0){
                            while(mysqli_stmt_fetch($stmt)){
                                if($_POST['newUsername'] == $_POST['confirmUsername']){
                                    if (strlen(trim($_POST['newUsername'])) > 6){

                                        $sql = "UPDATE customer set userName = ? WHERE id = ?";
                                        if($stmt = mysqli_prepare($con, $sql)){
                                            $username = $_POST['newUsername'];
                                            mysqli_stmt_bind_param($stmt, "ss", $username, $id);
                                            if(!mysqli_stmt_execute($stmt)){
                                                $error = "Error executing query" . mysqli_error($con);
                                                
                                            }else{
                                                echo "Username changed successfully";
                                            }
                                        }else{
                                            $error = "Error preparing";
                                        }

                                    }else{
                                        $error = "New username must be longer then 6 characters";
                                    }
                                }
                            }
                        }else{
                            $error = "Error fetching username";
                        }
                     }else{
                        $error = "Error: " . mysqli_error($con);
                        die(mysqli_error($con));
                     }
                }else{
                    $error = "Error: " . mysqli_error($con);
                    die(mysqli_error($con));
                }

        }else{
            $error = "Please make sure all fields are filled";
        }
        if($error != NULL){
            echo $error;
        }

    }
    //Change username form end
    ?>

</body>
</html>