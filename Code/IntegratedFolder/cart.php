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
    <link rel="stylesheet" href="css/cart&orderHis.css">
</head>
<body>
   
<?php 
    require("header.php");
    /*
    function jump($url){
        echo "<script language='javascript' type='text/javascript'>";
        echo "window.location.href='$url'";
        echo "</script>";
    }
    */
?>
<div class="productsPageBanner">
    <p>Cart</p>
    <p><span class="fontBlack">Home/<span class="fontBlue">Cart</span></p>
</div>
<div class="cartMain">
<?php
include("dataConnect.php");
if(isset($_POST['send'])) {
    $_SESSION['age'] = $_POST['submitage'];
    if ($_SESSION['age']==1) {
        $_SESSION['sone'] = $_POST['submitone'];
        $_SESSION['stwo'] = $_POST['submittwo'];
        $_SESSION['sprice'] = $_POST['submitprice'];
        $cPrice=$cpId=$cQ="";      
        if(isset($_SESSION['cusId']) and ($_SESSION['cusId']>0)){
            $ccId = $_SESSION['cusId'];
        }else{
            $ccId = 0;
        }
        $cpId=$_SESSION['sone'];
        $cQ=$_SESSION['stwo'] ;
        $cPrice=$_SESSION['sprice'];
         // echo $SESSION['sone'] ;
        //echo $_POST['submitone'];
        if(!$ccId==0){
            if (!empty($_SESSION['stwo'])) {
                // Place positive results at the top for a quicker workflow
                // Checking the email input for data entry
                if (!empty($_SESSION['sone'])) {
                    if ($con = mysqli_connect($host, $user, $pass, $database)) {
						// Checking if there is not any other user with the same email as the one the user entered
						$sql="SELECT `productId` FROM `Cart` WHERE `productId`= ".$cpId." AND `customerId`= ".$ccId.""; 						
						if ($CheckIfIdEmpty = mysqli_prepare($con, $sql)) {
							//mysqli_stmt_bind_param($CheckIfIdEmpty, "s", $xx);
							if (mysqli_stmt_execute($CheckIfIdEmpty)) {
								mysqli_stmt_store_result($CheckIfIdEmpty);
								// If there are no emails like the one the user did enter in the database, the account will be added
								if (mysqli_stmt_num_rows($CheckIfIdEmpty) == 0) {
                                    include("dataConnect.php");
                                    $sql="SELECT `stock` FROM `product` WHERE `Id`= ?"; 
                                    if ($stockCheck = mysqli_prepare($con, $sql)) {                
                                        mysqli_stmt_bind_param($stockCheck, "i", $cpId);
                                        if (mysqli_stmt_execute($stockCheck)) {
                                            mysqli_stmt_store_result($stockCheck);
                                            if (mysqli_stmt_num_rows($stockCheck) == 1) {
                                                mysqli_stmt_bind_result($stockCheck,$stock);
                                                mysqli_stmt_fetch($stockCheck);
                                                /*
                                                $sql="SELECT `stock` FROM `product` WHERE `Id`= ".$_SESSION['sone'].""; 
                                                $result=mysqli_query($con,$sql); 
                                                $row = mysqli_fetch_array($result, MYSQLI_NUM); 
                                                $stock = $row[0];
                                                */
                                                if($_SESSION['stwo']>$stock)
                                                {
                                                    $_SESSION['stwo']=$stock;
                                                }
                                                if (!empty($_SESSION['stwo'])) {
                                                    if (!empty($_SESSION['sone'])) {
                                                        if (!empty($_SESSION['sprice'])) {
                                                                // Step #2: Selecting the database (assuming it has already been created)
                                                                if (mysqli_select_db($con, $database)) {
                                                                    // Step #3: Create the query
                                                                    $query = "INSERT INTO `Cart`(
                                                                                    `customerId`,
                                                                                    `productId`,
                                                                                    `pQuantity`,
                                                                                    `unitPrice`
                                                                                )
                                                                                VALUES(
                                                                                    ?,
                                                                                    ?,
                                                                                    ?,
                                                                                    ?                                           
                                                                                )";
                                                                                
                                                                    // Step #4: Prepare query as a statement
                                                                    if ($statement = mysqli_prepare($con, $query)) {
                                                                        mysqli_stmt_bind_param($statement, 'iiii', $ccId,$cpId,$cQ,$cPrice);
                                                                        //Step #5: Execute statement and check success
                                                                        if (mysqli_stmt_execute($statement)) {
                                                                        // echo "Query5 executed";
                                                                            //header("location:cart.php");
                                                                            header("location:cart.php");
                                                                        } else {
                                                                            echo "Error5 executing query";
                                                                            die(mysqli_error($con));
                                                                        }
                                                                        mysqli_stmt_close($statement);
                                                                    }
                                                                    mysqli_close($con);
                                                                }
                                                        } else {
                                                            echo "Missed unitPrice";
                                                        }        
                                                    } else {
                                                        echo "Not allowed for under 18";
                                                    }
                                                } else {
                                                    //negative result at the bottom
                                                    echo "lost auantity";
                                                } 
                                            }
                                        }
                                    }
                                } else 
                                { 
                                    //////////upload data
                                    $con = mysqli_connect($host, $user, $pass, $database);
                                    $sql="SELECT `pQuantity` FROM `Cart` WHERE `productId`= ".$_SESSION['sone'].""; 
                                    $result=mysqli_query($con,$sql); 
                                    $row = mysqli_fetch_array($result); 
                                    $cQ=$row[0] + $_SESSION['stwo'];
                                    //echo $row[0];
                                    //echo $cQ;
                                    include("dataConnect.php");
                                    $sql="SELECT `stock` FROM `product` WHERE `Id`= ".$_SESSION['sone'].""; 
                                    $result=mysqli_query($con,$sql); 
                                    $row = mysqli_fetch_array($result, MYSQLI_NUM); 
                                    $stock = $row[0];
                                    if($cQ>$stock){
                                        $cQ=$stock;
                                    }
                                    //////////retrive data
                                    $conn = mysqli_connect($host, $user, $pass);
                                    if (!$conn) {
                                        die("There was an error connecting to the database. Error: " . mysqli_connect_errno());
                                    }
                                    // Step #2: Selecting the database (assuming it has already been created)
                                    if (mysqli_select_db($conn, $database)) {
                                    
                                        // Step #3: Create the query
                                        $query = "UPDATE
                                                    `Cart`
                                                SET
                                                    `customerId` = ?,
                                                    `pQuantity` = ?,
                                                    `productId` = ?,
                                                    `unitPrice` = ?
                                                WHERE
                                                    `productId` = ? AND `customerId` = ?";
                
                                        // Step #4: Prepare query as a statement
                                        if ($statement = mysqli_prepare($conn, $query)) {
                                            //Step #5: Execute statement and check success
                                            mysqli_stmt_bind_param($statement, 'iiiiii', $ccId,$cQ,$cpId,$cPrice,$cpId,$ccId);
                                            if (mysqli_stmt_execute($statement)) {
                                                //echo "Updating4 Query executed";
                                            } else {
                                                echo "Error4 executing query";
                                                die(mysqli_error($conn));
                                            }
                                            //echo "<br><br>--------------<br><br>";
                                            // Step #9: Close the statement and free memory
                                            mysqli_stmt_close($statement);
                                            //$url = "Mainpage.php";
                                            //echo "<script language='javascript' type='text/javascript'>";
                                            //echo "window.location.href='$url'";
                                            // echo "</script>";
                                            // header('location:index.php?insert_msg=Your data has been edited successfully!');
                                        }else{
                                            die(mysqli_error($conn));
                                        }
                                    }else{
                                        die(mysqli_error($conn));
                                    }                                                                 
                                    echo retrive();                       
                                } 
                            }  
                        }                            
                    }
                   
                }else
                {
                    echo "Forgot PRoductId";            
                }
            }else
            {
                echo retrive();
            }
        }else
        {
            echo "<script> alert('You have to log in first!'); </script>";
            header("refresh:0;url='singleProduct.php?Id={$_POST['submitone']}&Cs=0'"); 
            //echo "Please login first!";
            //header("location:singleProduct.php?Id={$_POST['submitone']}&Cs=0");
        }
    }
    else {
        echo "<script> alert('This product is only available for customers above 18'); </script>";
            header("refresh:0;url='singleProduct.php?Id={$_POST['submitone']}&Cs=0'"); 
    }
}else {
    echo retrive();
}
//UPDATE `Cart` SET `pQuantity`= $SESSION['product_'.$_POST['incre']] WHERE `productId`= $_POST['incre']
//DELETE FROM `Cart` WHERE `productId` = $_POST['delete']
function retrive(){
    include("dataConnect.php");
    // Step #1: Open a connection to MySQL...
    if($_SESSION['cusId']>0){
        $ccId = $_SESSION['cusId'];
        $conn = mysqli_connect($host, $user, $pass);
        // And test the connection
        if (!$conn) {
            die("There was an error connecting to the database. Error: " . mysqli_connect_errno());
        }
        // Step #2: Selecting the database (assuming it has already been created)
        if (mysqli_select_db($conn,  $database)) {
            // Step #3: Create the query
            $query = "SELECT Cart.customerId, Cart.productId, Cart.pQuantity,Cart.unitPrice,product.imgInfo
            FROM Cart
            INNER JOIN product
            ON productId = product.Id WHERE Cart.customerId='$ccId'";
            // Step #4: Prepare query as a statement
            if ($statement = mysqli_prepare($conn, $query)) {
                //Step #5: Execute statement and check success
                if (mysqli_stmt_execute($statement)) {
                    // echo " <hr>";
                } else {
                    echo "Error1 executing query";
                    die(mysqli_error($conn));
                }
                echo "<br>";
                // Step #6: Bind result to variables when fetching...
                mysqli_stmt_bind_result($statement, $one, $two, $three, $four,$five);
                // Step #7: And buffer the result if and only if you want to check the number of rows
                mysqli_stmt_store_result($statement);
                //Create heading
                echo "<h2 class='cartTitle'>List of Items</h2>";
                // Step #8: Check if there are results in the statement
                if (mysqli_stmt_num_rows($statement) > 0) {
                    echo "<p class='cartItems'>Number of Items: " . mysqli_stmt_num_rows($statement)."</p>";
                    $totalPrice=0;
                    // Make table
                    echo "<table class='cartTable'>";
                    // Make table header
                    echo "<th>YourId</th><th>ProductId</th><th>Quantity</th><th>unitPrice</th><th>TotalPrice</th><th>Image</th><th>Action</th>";
                    // Step #9: Fetch all rows of data from the result statement
                    while (mysqli_stmt_fetch($statement)) {
                        $productPrice=$four*$three;
                        $totalPrice=$totalPrice+$productPrice;
                        // Create row
                        echo "<tr>";
                        // Create cells
                        echo "<td>" . $one . "</td>";
                        echo "<td>" . $two . "</td>";
                        echo "<td>" . $three . "</td>";
                        echo "<td>" . $four . "</td>";
                        echo "<td>" . $productPrice . "</td>";
                        echo "<td>" . "<img src='$five' alt='img' width='100px' height='100px'>" . "</td>";
                        // echo "<td>" . "<a href='cart.php?id=$two'>Delete</a>" . "</td>";
                        $SESSION['product_'.$two] = 0;
                        $display = <<<DELIMETER
                            
                                        <form class='cartForm' action="#" method="get">
                                            <input type="hidden" name="cid" value="$one">
                                            <input type="hidden" name="incre" value="$two">
                                            <input type="submit" name="decre" value="add">
                                        </form>
                                
                                
                                        <form class='cartForm' action="#" method="get">
                                            <input type="hidden" name="cid" value="$one">
                                            <input type="hidden" name="decre" value="$two">
                                            <input type="submit" name="submit" value="reduce">
                                        </form>
                                    
                                
                                        <form class='cartForm' action="#" method="get">
                                            <input type="hidden" name="cid" value="$one">
                                            <input type="hidden" name="delete" value="$two">
                                            <input type="submit" name="submit" value="delete">
                                        </form>
                                    
                        DELIMETER;
                        //echo  "<td>".$SESSION['product_'.$_GET['plus']]. "</td>";
                        echo "<td>" . $display . "</td>";
                        // Close row
                        echo "</tr>";
                    }
                    // Close table  <input type="hidden" name="cuId" value="$one">
                    echo "</table>";
                    //Add a link to addbug.php
                    //$Countrows=mysqli_stmt_num_rows($statement)+1;
                    echo "<p class='cartGrand'>Grand Total: {$totalPrice}</p>";
                    //echo "<p><a href='#'>CheckOut</a></p>";
                    $checkout = <<<DELIMETER
                    <form class='cartLF' action="checkout.php" method="post">
                        <input type="hidden" name="runFunctionOrNot" value="1">
                        <input type="hidden" name="grandTotal" value="$totalPrice">
                        <input type="submit" name="checkout" value="checkout">
                    </form>
                    DELIMETER;
                    echo $checkout;           
                } else {
                    echo "<script> alert('Your cannot access an empty shopping cart!'); </script>";
                    header("refresh:0;url='home.php' "); 
                }
                // Step #10: Close the statement and free memory
                mysqli_stmt_close($statement);
            } else {
                die(mysqli_error($conn));
            }
        }else
        {
            die(mysqli_error($conn));
        }
        // Step #11: Close the connection!
        mysqli_close($conn);
    }else{
        echo "<script> alert('Please log in first!'); </script>";
        header("refresh:0;url='home.php' "); 
    }
    
}


function update($sCount,$sId,$cId){
     //////////upload data
    if($sCount == 0){
        include("dataConnect.php");
        //////////retrive data
        $conn = mysqli_connect($host, $user, $pass);
        if (!$conn) {
            die("There was an error connecting to the database. Error: " . mysqli_connect_errno());
        }
        // Step #2: Selecting the database (assuming it has already been created)
        if (mysqli_select_db($conn, $database)) {
            // Step #3: Create the query
            $query = "DELETE FROM `Cart` WHERE `productId` = ".$sId." AND `customerId` = ".$cId." ";
            // Step #4: Prepare query as a statement
            if ($statement = mysqli_prepare($conn, $query)) {
                //Step #5: Execute statement and check success
                if (mysqli_stmt_execute($statement)) {
                    //echo "Updating2 Query executed";     
                } else {
                    echo "Error2 executing query";
                    die(mysqli_error($conn));
                }
                //echo "<br><br>--------------<br><br>";
                // Step #9: Close the statement and free memory
                mysqli_stmt_close($statement);
                //$url = "Mainpage.php";
                //echo "<script language='javascript' type='text/javascript'>";
                //echo "window.location.href='$url'";
            // echo "</script>";
            // header('location:index.php?insert_msg=Your data has been edited successfully!');
            }else{
                die(mysqli_error($conn));
            }
        }  
    }
    if($sCount > 0 || $sCount < 0){
        include("dataConnect.php");
        $con = mysqli_connect($host, $user, $pass, $database);
        $sql="SELECT `pQuantity` FROM `Cart` WHERE `productId`= ".$sId." AND `customerId` = ".$cId.""; 
        $result=mysqli_query($con,$sql); 
        $row = mysqli_fetch_array($result, MYSQLI_NUM); 
        $kk = $row[0] + $sCount;
        if($kk<1){
            $kk=1;
        }
        // echo $sCount;
        echo $kk;
        $sql="SELECT `stock` FROM `product` WHERE `Id`= ".$sId.""; 
        $result=mysqli_query($con,$sql); 
        $row = mysqli_fetch_array($result, MYSQLI_NUM); 
        $stock = $row[0];
        if($kk<=$stock)
        {
            if (!mysqli_num_rows($result)) { 
                echo"error";
            }else{  
                include("dataConnect.php");
                //////////retrive data
                $conn = mysqli_connect($host, $user, $pass);
                if (!$conn) {
                    die("There was an error connecting to the database. Error: " . mysqli_connect_errno());
                }
                // Step #2: Selecting the database (assuming it has already been created)
                if (mysqli_select_db($conn, $database)) {
        
                    // Step #3: Create the query
                    $query = "UPDATE
                                `Cart`
                            SET
                                `pQuantity` = ?
                            WHERE
                            `productId` = ? AND `customerId` = ?";
        
                    // Step #4: Prepare query as a statement
                    if ($statement = mysqli_prepare($conn, $query)) {
                        //Step #5: Execute statement and check success
                        mysqli_stmt_bind_param($statement, 'iii', $kk,$sId,$cId);
                        if (mysqli_stmt_execute($statement)) {
                            //echo "Updating Query executed";
                            
                        } else {
                            echo "Error3 executing query";
                            die(mysqli_error($conn));
                        }
                        //echo "<br><br>--------------<br><br>";
                        // Step #9: Close the statement and free memory
                        mysqli_stmt_close($statement);     
                        //$url = "Mainpage.php";
                        //echo "<script language='javascript' type='text/javascript'>";
                        //echo "window.location.href='$url'";
                        // echo "</script>";
                        // header('location:index.php?insert_msg=Your data has been edited successfully!');
                    }else{
                        die(mysqli_error($conn));
                    }
                }else{
                    die(mysqli_error($conn));
                }
            }
        }else{
            echo "stock is not enough";
        }
    }
}
if(isset($_GET['incre'])){   
    //$SESSION['product_'.$_GET['incre']] ++;
    $sCount = 1;
    //echo $sCount;
    $cId=$_GET['cid'];
    $sId=$_GET['incre'];
    echo update($sCount,$sId,$cId);
    header('location:cart.php');
}
if(isset($_GET['decre'])){
    //$SESSION['product_'.$_GET['decre']] --;
    $sCount = -1;
    $sId=$_GET['decre'];
    $cId=$_GET['cid'];
   // echo $sId;
    //echo $_GET['decre'];
    echo update($sCount,$sId,$cId);
    header('location:cart.php');
}
if(isset($_GET['delete'])){
    //$SESSION['product_'.$_GET['delete']] = 0;
    
    $sCount = 0;
    $sId=$_GET['delete'];
    $cId=$_GET['cid'];
    //echo $sCount;
    //echo $sId;
    echo update($sCount,$sId,$cId);
    header('location:cart.php');
    /*
    $url = "cart.php";
    echo "<script language='javascript' type='text/javascript'>";
    echo "window.location.href='$url'";
    echo "</script>";  
    */
}
//echo "<p><a href='home.php'>home</a></p>";
?>
</div>
<?php 
    require("footer.php");
?>
</body>
</html>