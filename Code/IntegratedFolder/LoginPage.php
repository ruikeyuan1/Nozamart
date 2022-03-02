<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="./css/Login.css">
    <title>Login</title>
</head>
<body>
    <?php 
    include("header.php");
    include "./LoginPage/Database.php";
    ?>
    <main>
      <div class="Center">
        <div class="topBox">
          <div class="contentText">
            <h2>Login |</h2>
            <h2><a href="*">&nbsp;Register</a></h2>
          </div>
        <div class="formBox">
          <div class="form">
              <form method="post">
                <div>
                  <fieldset>
                  <legend>Username</legend>
                  <input type="text" name="username">
                  </fieldset>
                </div>
                <div>
                  <fieldset>
                    <legend>E-mail</legend>
                    <input type="text" name="email">
                  </fieldset>
                </div>
                <div>
                  <fieldset>
                    <legend>Password</legend>
                    <input type="password" name="password">
                  </fieldset>
                </div>
                <div class="right">
                  <div>
                    <input type="checkbox" name="rememberLogin" value="rememberLogin" id="remember">
                    Remember me
                  </div>
                  <div class="right">
                    <a href="#">Forgot your password?</a>
                  </div>
                </div>
                <div class="login">
                  <input type="submit" name="login" value="Log in">
                </div>
              </form>
          </div>
        </div>
        <?php
        $error = NULL;
        if(isset($_POST['login'])){
          if(!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password'])){ // Checks if fields are filled
            if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){ //Checks if email is an email
              $email = $_POST['email'];
              $sql = "SELECT id, userName, passWord, age FROM customer where email = ?"; //query to insert to db
              if($stmt = mysqli_prepare($con, $sql)){
                mysqli_stmt_bind_param($stmt, "s", $email);
                if(mysqli_stmt_execute($stmt)){
                  mysqli_stmt_bind_result($stmt, $id, $username, $password, $age);
                  mysqli_stmt_store_result($stmt);
                    if(mysqli_stmt_num_rows($stmt) != 0){
                      mysqli_stmt_fetch($stmt);
                      if($_POST['password'] == $password){
                        $_SESSION ['cusId'] = $id;
                        $_SESSION ['loggedIn'] = 1;
                        echo "You are now logged in";
                        echo $_SESSION ['loggedIn'], $_SESSION ['cusId'] ;

                      }else{
                      $error = "Wrong password!";
                      }
                    }else{
                      $error = "Wrong Email";
                    }
                    
                }else{
                  echo "Something went wrong executing statement";
                  die(mysqli_error($con));
                }  
              }else{
                die(mysqli_error($con));
              }
            }else{
              $error = "Email is not valid";
            }
          }else{
            $error = "Fill all the fields";
          }
          if($error != NULL){ //echo error if the variable has been set
            echo $error;
          }
        }
        ?>        
      </div>
        </main>
</body>
<?php
  include("footer.php");
?>
>>>>>>> 7f9691c0e5f9e891a1ef5f8ebc885c368e5abf8e
</html>