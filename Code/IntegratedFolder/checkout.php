<!--Ruike Yuan Feb 2022-->
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/checkout.css">
    <title>Checkout</title>
</head>
<body>
<?php 
require("header.php");
$length = 6;
$min=0;
$max=0;
$status="OrderReceived";
$trace=0;
if(isset($_POST["grandTotal"])) {
    $tp=$_POST["grandTotal"];
}
if(isset($_POST["cuId"])) {
    $_SESSION['cuId']=$_POST["cuId"];
    //echo $cuId;
}
if(isset($_POST["runFunctionOrNot"])) {
    $runFunctionOrNot=$_POST["runFunctionOrNot"];
    if($runFunctionOrNot==1){
    $cuId=$_SESSION['cuId'];
    echo get_random($length,$max,$min,$_SESSION['cuId'],$status,$trace,$tp);
    $runFunctionOrNot=0;
    }else{
    echo "page refreshed";
    }
}
if(isset($_POST["checkout"])) {
    include("dataConnect.php");
    //////////retrive data
    $conn = mysqli_connect($host, $user, $pass);
    if (!$conn) {
        die("There was an error connecting to the database. Error: " . mysqli_connect_errno());
    }
    // Step #2: Selecting the database (assuming it has already been created)
    if (mysqli_select_db($conn, $database)) {
        // Step #3: Create the query
        $query = "DELETE FROM `Cart` WHERE `customerId` = ".$_SESSION['cuId']."";
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
function get_random($length,$max,$min,$cuId,$status,$trace,$tp) {
    $min = pow(10,($length - 1));    
    $max = pow(10, $length) - 1;
    $_SESSION['orderNum']=mt_rand($min, $max);
    //$_SESSION['return']=mt_rand($min, $max);
    include("dataConnect.php");
    $con = mysqli_connect($host, $user, $pass, $database);
    $sql="SELECT `Id` FROM `order` WHERE `Id`= ".$_SESSION['orderNum'].""; 
    $result=mysqli_query($con,$sql); 
    if (!mysqli_num_rows($result)) 
    { 
        // Step #1: Open a connection to MySQL...
        include("dataConnect.php");
        $con = mysqli_connect($host, $user,$pass);
        // And test the connection
        if (!$con) {
            die("There was an error connecting to the database. Error: " . mysqli_connect_errno());
        }
        // Step #2: Selecting the database (assuming it has already been created)
        if (mysqli_select_db($con, $database)) {
            // Step #3: Create the query
            $query = "INSERT INTO `order`(
                            `Id`,
                            `customerId`,    
                            `status`,
                            `traceCode`,
                            `totalPrice`
                        )
                        VALUES(
                            ?,
                            ?,
                            ?,
                            ?,
                            ?                                     
                        )";
                        
            // Step #4: Prepare query as a statement
            if ($statement = mysqli_prepare($con, $query)) {
                mysqli_stmt_bind_param($statement, 'iisii', $_SESSION['orderNum'],$cuId,$status,$trace,$tp);
                //Step #5: Execute statement and check success
                if (mysqli_stmt_execute($statement)) {
                    echo "Query5 executed";
                } else {
                    echo "Error5 executing query";
                    die(mysqli_error($con));
                }
                mysqli_stmt_close($statement);
                $url = "checkout.php";
                echo "<script language='javascript' type='text/javascript'>";
                echo "window.location.href='$url'";
                echo "</script>";
            }
            mysqli_close($con);
            return $_SESSION['orderNum'];
        }
        else{
        //echo "redo";
        echo get_random($length,$max,$min,$cuId,$status,$trace,$tp);
        }
    }
}   
?>
<main>
<div class="checkoutBox">
    <h1 class="orderProcessed">Your order has been proceeded!</h1>
    <h1 class="orderProcessed">Order Number: <?php echo $_SESSION['orderNum'];?></h1>
    <form class="orderSubmit" action="orderHistoryCheck.php" method="get">
        <input type="hidden" name="cuId" value="<?php echo $_SESSION['cuId'];?>">
        <input type="submit" name="submit" value="Check Order History">
    </form>
</div>
</main>
<?php 
require("footer.php");
?>
</body>
</html>