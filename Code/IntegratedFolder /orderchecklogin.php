<!--Ruike Yuan Feb 2022-->
<?php  //ob_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/pickerLogin.css">
    <title>Login</title>
</head>
<body>
<?php 
//C:\Users\olive\Documents\GitHub\ThreeMusketeer\Code\LoginPage\LoginPage.php
require("header.php");
if(isset($_POST['PickerLogin'])) {
      if(!empty($_POST['pPassword']) or !empty($_POST['pUser'])){
          //$pickerLog=$_POST['PickerLogin'];
          $pickLogPass = filter_input(INPUT_POST, 'pPassword', FILTER_SANITIZE_SPECIAL_CHARS);
          $pickUser = filter_input(INPUT_POST, 'pUser', FILTER_SANITIZE_SPECIAL_CHARS);
          include("dataConnect.php");
          $con = mysqli_connect($host, $user, $pass, $database);
          $sql="SELECT `pPass`,`pUser`FROM `orderPicker` WHERE `pUser`= '$pickUser'"; 
          $result=mysqli_query($con,$sql); 
          $row = mysqli_fetch_array($result, MYSQLI_NUM); 
          if($row[0]==$pickLogPass && $row[1]==$pickUser){
              echo"login successfully";
              $url = "orderEditPage.php?cuId=1";
              echo "<script language='javascript' type='text/javascript'>";
              echo "window.location.href='$url'";
              //echo "Deleting order......"; 
              echo "</script>";
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