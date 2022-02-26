<!--Ruike Yuan Feb 2022-->
<?php
    session_start();
    include("header.php");
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
<div class="orderMain">
<?php
if(isset($_GET['cuId'])) {
    $cId=$_GET['cuId'];
    //echo $cId;
}else{
    $cId=0;
}
include("dataConnect.php");
// Step #1: Open a connection to MySQL...
$conn = mysqli_connect($host, $user, $pass);
// And test the connection
if (!$conn) {
        die("There was an error connecting to the database. Error: " . mysqli_connect_errno());
}
// Step #2: Selecting the database (assuming it has already been created)
if (mysqli_select_db($conn,  $database)) {
    // Step #3: Create the query
    $query = "SELECT * FROM `order`
    WHERE customerId = '$cId'";
    // Step #4: Prepare query as a statement
    if ($statement = mysqli_prepare($conn, $query)) {
    //Step #5: Execute statement and check success
        if (mysqli_stmt_execute($statement)) {
                // echo " <hr>";
        }else {
            echo "Error1 executing query";
            die(mysqli_error($conn));
        }
        echo "<br>";                
        // Step #6: Bind result to variables when fetching...
        mysqli_stmt_bind_result($statement, $one, $two, $three, $four,$five);
        // Step #7: And buffer the result if and only if you want to check the number of rows
        mysqli_stmt_store_result($statement);
        //Create heading
        echo "<h2 class='orderTitle'>Your Orders</h2>";                
        // Step #8: Check if there are results in the statement
        if (mysqli_stmt_num_rows($statement) > 0) {
            echo "<p class='orderItems'>Number of Orders: " . mysqli_stmt_num_rows($statement)."</p>";
            $totalPrice=0;
            // Make table
            echo "<table class='cartTable' border='2' border-color='#000000'>";
            // Make table header
            echo "<th style='text-align: left;'>orderId</th><th>customerId</th><th>status</th><th>traceCode</th><th>TotalPrice</th>";
            // Step #9: Fetch all rows of data from the result statement
            while (mysqli_stmt_fetch($statement)) {
                //$productPrice=$four*$three;
                //$totalPrice=$totalPrice+$productPrice;
                // Create row
                echo "<tr>";
                // Create cells
                echo "<td>" . $one . "</td>";
                echo "<td>" . $two . "</td>";
                echo "<td>" . $three . "</td>";                     
                if($four==0 or $four==12){
                echo "<td>No data</td>";
                }else{
                echo "<td>" . $four . "</td>";
                }                       
                echo "<td>" . $five . "</td>";
                // echo "<td>" . "<img src='$five' alt='img' width='100px' height='100px'>" . "</td>";
                // echo "<td>" . "<a href='cart.php?id=$two'>Delete</a>" . "</td>";
                //$SESSION['product_'.$one] = 0;                   
                if($three=="OrderReceived"){
                $display = <<<DELIMETER
                <form class="cartForm" action="orderHistoryCheck.php" method="get">
                    <input type="hidden" name="cuId" value="$cId">
                    <input type="hidden" name="odelete" value="$one">
                    <input type="submit" name="submit" value="delete">
                </form>                  
                DELIMETER;
                echo "<td>" . $display . "</td>";
                echo "</tr>";
                }
            }
            // Close table
            echo "</table>";
        }else{
            echo "No data found";
        }
        // Step #10: Close the statement and free memory
        mysqli_stmt_close($statement);
    }else {
        die(mysqli_error($conn));
    }
}else {
    die(mysqli_error($conn));
}
// Step #11: Close the connection!
mysqli_close($conn);
if(isset($_GET['odelete'])){
$oCount = 0;
$oId=$_GET['odelete'];
echo update($oCount,$oId);
$url = "orderHistoryCheck.php?cuId={$cId}&odelete={$oId}&submit=delete";
echo "<script language='javascript' type='text/javascript'>";
echo "window.location.href='$url'";
echo "</script>";
}
function update($oCount,$oId){
    //////////upload data
    if($oCount == 0){
        include("dataConnect.php");
        //////////retrive data
        $conn = mysqli_connect($host, $user, $pass);
        if (!$conn) {
           die("There was an error connecting to the database. Error: " . mysqli_connect_errno());
        }
        // Step #2: Selecting the database (assuming it has already been created)
        if (mysqli_select_db($conn, $database)) {
            // Step #3: Create the query
            $query = "DELETE FROM `order` WHERE `Id` = ".$oId."";
            // Step #4: Prepare query as a statement
            if ($statement = mysqli_prepare($conn, $query)) {
                //Step #5: Execute statement and check success
                if (mysqli_stmt_execute($statement)) {
                    //echo "Deleting order......";        
                    } 
                else {
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
            }
        }else{
            die(mysqli_error($conn));
        }
    }  
}

?>
</div>

<?php
    include("footer.php");
?>
</body>
</html>