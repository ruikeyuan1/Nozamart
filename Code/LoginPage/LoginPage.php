<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="Login.css">
    <title>Login</title>
</head>
<body>
    <?php 
    // include '.../header/Header.php';
    //C:\Users\olive\Documents\GitHub\ThreeMusketeer\Code\LoginPage\LoginPage.php
    //include 'footer.html';
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
                  <input type="text" name="email">
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
      </div>
        </main>
</body>
</html>