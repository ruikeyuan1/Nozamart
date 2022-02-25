<?php
   session_start();
  
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nozamart – Electronics eCommerce</title>
    <meta name="description" content="Nozamart – Electronics eCommerce">
    <!-- css -->
    <link rel="stylesheet" href="css/singleProduct.css">
</head>
<body>
<?php
    include("header.php");
    //include("singleProduct/first.php");
?>
<div class="singleProductPageBanner">
    <p>Single Product</p>
    <p><span class="fontBlack">home/<span class="fontBlue">Product</span></p>
</div>

<main class="productArea">
    <?php
        $_SESSION['COUNTPLUS']=$_GET['Cs'];
        include("singleProduct/first.php");
        if($_SESSION['COUNTPLUS']<1) {
            $_SESSION['COUNTPLUS']=1;
           // echo  $_SESSION['COUNTPLUS'];
        }
      
        if(isset($_POST["increment"])) {
            $_SESSION['COUNTPLUS']++ ;
            //echo  $_SESSION['COUNTPLUS'];
        }
        if(isset($_POST["decrement"])) {
            $_SESSION['COUNTPLUS']-- ;
            //echo  $_SESSION['COUNTPLUS'];
        }
       
       
    ?>
       <form action="singleProduct.php?Id=<?php echo$_GET['Id'];?>&Cs=<?php echo $_SESSION['COUNTPLUS'];?>" method="post">
            <div class="plusMinus">
                <div class="plusButton">
                    <input type="submit" name="increment" value="+">
                </div>
                <div class="countArea">
                    <span><?php echo $_SESSION['COUNTPLUS'];?></span>
                </div>
                <div class="minusButton">
                    <input type="submit" name="decrement" value="-">
                </div>
            </div>
        </form>
        <form action="cart.php" method="post">
            <input type="hidden" name="submitone" value="<?php echo $Id;?>">
            <input type="hidden" name="submitage" value="<?php echo $Age;?>">
            <input type="hidden" name="submittwo" value="<?php echo $_SESSION['COUNTPLUS'];?>">
            <input type="hidden" name="submitprice" value="<?php echo $unitPrice;?>">
            <input type="submit" class="submitButton" name="send" value="send">
           
        </form>
    </div>
</main>
<?php
    include("footer.php");
?>
</body>
</html>
