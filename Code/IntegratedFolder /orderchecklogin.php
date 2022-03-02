<!--Ruike Yuan Feb 2022-->
<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/pickerLogin.css">
    <title>Login</title>
</head>
<body>
<?php 
$_SESSION['pickerLog']=0;
//C:\Users\olive\Documents\GitHub\ThreeMusketeer\Code\LoginPage\LoginPage.php
require("header.php");
if(isset($_POST['PickerLogin'])) {
      if(!empty($_POST['pPassword']) or !empty($_POST['pUser'])){
        //$pickerLog=$_POST['PickerLogin'];
        $pickLogPass = filter_input(INPUT_POST, 'pPassword', FILTER_SANITIZE_SPECIAL_CHARS);
        $pickUser = filter_input(INPUT_POST, 'pUser', FILTER_SANITIZE_SPECIAL_CHARS);
        include("dataConnect.php");
        $con = mysqli_connect($host, $user, $pass, $database);
        $sql="SELECT `pPass`,`pUser`FROM `orderPicker` WHERE `pUser`= ?"; 
        if ($picLog = mysqli_prepare($con, $sql)) {                
          mysqli_stmt_bind_param($picLog, "i", $pickUser);
          if (mysqli_stmt_execute($picLog)) {
            mysqli_stmt_store_result($picLog);
            if (mysqli_stmt_num_rows($picLog) == 1) {
              mysqli_stmt_bind_result($picLog,$picSavePass,$picSaveUser);
              mysqli_stmt_fetch($picLog);
            }
          }
          mysqli_stmt_close($picLog);
        }		
        if($picSavePass==$pickLogPass && $picSaveUser==$pickUser){
            echo"login successfully";
            $url = "orderEditPage.php?cuId=1";
            $_SESSION['pickerLog']=1;
            echo "<script language='javascript' type='text/javascript'>";
            echo "window.location.href='$url'";
            echo "</script>";
        }else{
          echo "<p class='wrongLogin'>wrong password or username</p>";
          $_SESSION['pickerLog']=0;
        }
    }
}
?>
<main>
  <div class="Center">
    <div class="topBox">
      <div class="contentText">
        <h2>OrderPicker</h2>
      </div>
    <div class="formBox">
      <div class="form">
          <form action="#" method="post">
            <div>
              <fieldset>
              <legend>Username</legend>
              <input type="text" name="pUser">
              </fieldset>
            </div>
            <div>
              <fieldset>
                <legend>Password</legend>
                <input type="password" name="pPassword">
              </fieldset>
            </div>
            <div class="login">
              <input type="hidden" name="PickerLogin" value="login">
              <input type="submit" name="orderPickerLogin" value="Login as an OrderPicker">
            </div>
          </form>
      </div>
    </div>        
  </div>
    </main>
    <?php 
//C:\Users\olive\Documents\GitHub\ThreeMusketeer\Code\LoginPage\LoginPage.php
require("footer.php");
?>
</body>
</html>