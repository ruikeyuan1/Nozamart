<!--Ruike Yuan Feb 2022-->
<?php
 ob_start();
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
    <link rel="stylesheet" href="css/home.css">
</head>
<body>
<?php
    include("header.php");
    $_SESSION['cusId'] = 0;
?>
<main>
    <div class="upperDisplay">
        <div class="upperDisplayItemDis">
             <b>Welcome to Nozamart</b>
            <p>Your Home Smart Device & Best Solution</p> 
            <a href="products.php?productsSort=NameAsc&type=0&text=0&submit=submit" class="btnStyle">Shop All Devices</a>          
        </div>
        <div class="upperDisplayItemImg">
            <img src="img/homepage/inner-img/homeUpperDisplayProductOne.png">
        </div>
    </div>
    <?php
    function echoProduct($randId){
        include("dataConnect.php");
        $con = mysqli_connect($host, $user, $pass, $database);
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
        }
        $sql = "SELECT `Id`, `productName` as `zero`, `unitPrice` as `one`, `imgInfo` as `two` FROM `product` WHERE Id = '$randId'";
        if ($productHomeDisplay = mysqli_prepare($con, $sql)) {
            //Step #5: Execute statement and check success
            if (mysqli_stmt_execute($productHomeDisplay)) {
                // echo " <hr>";
            } else {
                echo "Error1 executing query";
                die(mysqli_error($con));
            }
            mysqli_stmt_bind_result($productHomeDisplay,$HId,$Hname,$Hprice,$HImg);
            mysqli_stmt_store_result($productHomeDisplay);
            if (mysqli_stmt_num_rows($productHomeDisplay) > 0) {
                while (mysqli_stmt_fetch($productHomeDisplay)) {		
                    $productsH = <<<DELIMETER
                        <div class="downDisplayItem">
                            <img class="ProductImg" src="$HImg" alt="Nothing Found">
                            <b class="ProductTitle">$Hname</b>
                            <p class="ProductPrice">From$Hprice</p>
                            <a class="ArrowImg" href="singleProduct.php?Id=$HId&Cs=0"><img  src="img/homepage/homepageOtherImg/EllipseArrow.png"></a>         
                        </div> 					
                    DELIMETER;
                    echo $productsH;
                }				
            } else {
                header("Location:home.php");
                //ob_end_flush();
                //exit();
            }
            // Step #10: Close the statement and free memory
            mysqli_stmt_close($productHomeDisplay);
        } else {
            die(mysqli_error($con));
        }
    }
       
    ?>
    <div class="downDisplay">   
        <?php 
            $HdisplayArray=array(1,2,3,4);
            for($x=0;$x<4;$x++){
                $randId=$HdisplayArray[$x];
                echo echoProduct($randId);
            }     
        ?>  
    </div>
    <banner>
        <div class="mainBanner">
            <h2 class="bannerTitle"> <span>Smart Fashion</span><br> With Smart Devices </h2>
            <a href="products.php?productsSort=NameAsc&type=0&text=0&submit=submit" class="btnStyle">Shop All Devices</a>
        </div>
    </banner>
</main>
<?php
    include("footer.php");
?>
</body>
</html>
