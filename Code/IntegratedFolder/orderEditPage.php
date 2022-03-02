<!--Ruike Yuan Feb 2022-->
<?php
require("header.php");
/*
if(isset($_GET['cuId'])) {
    $cId=$_GET['cuId'];
}
*/  
//echo $cId;
$a=array("zero");
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
    /*$query = "SELECT * FROM `order`
    WHERE customerId = '$cId'";*/
    $query = "SELECT * FROM `order` ORDER BY `customerId`";
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
        echo "<h2>List of Orders</h2>";
        // Step #8: Check if there are results in the statement
        if (mysqli_stmt_num_rows($statement) > 0) {
            echo "Number of Orders: " . mysqli_stmt_num_rows($statement);
            $totalPrice=0;
            // Make table
            echo "<table border='2' border-color='#000000'>";
            // Make table header
            echo "<th style='text-align: left;'>orderId</th><th>customerId</th><th>status</th><th>traceCode</th>";
            // Step #9: Fetch all rows of data from the result statement
            echo "<form action='#' method='get'>";
            while (mysqli_stmt_fetch($statement)) {
                array_push($a,"$one");
                //$productPrice=$four*$three;
                //$totalPrice=$totalPrice+$productPrice;
                // Create row
                echo "<tr>";
                // Create cells
                echo "<td>" . $one . "</td>";
                echo "<td>" . $two . "</td>";
                $selectDisplay = <<<DELIMETER
                                            
                    <select name="{$one}" id="Status-select">
                        <option  value="{$three}" selected>{$three}</option>
                        <option  value="OrderReceived">OrderReceived</option>
                        <option value="BeingPacked">BeingPacked</option>
                        <option  value="BeingShipped">BeingShipped</option>
                    </select>
                    <input type="hidden" name="TraceCode{$one}" value="{$four}">
                    
                    
                DELIMETER;
                echo "<td>" . $selectDisplay . "</td>";
                if($three=="BeingShipped"){
                $tranceCodeDisplay = <<<DELIMETER
                                           
                    <input type="text" name="TraceCode{$one}" value="{$four}">     

                DELIMETER;
                echo "<td>" . $tranceCodeDisplay . "</td>"; 
                }else{                       
                echo "<td>Haven't generated</td>";
                }
                //echo "<td>" . $five . "</td>";
                echo "</tr>";              
            }
            // Close table
            echo "<input type='hidden' name='cuId' value='1'>";
            echo "<p><input type='submit' name='Save' value='Save'></p>";
            echo "</form>";
            echo "</table>";   
        } else {
            echo "No data found";
        }
        // Step #10: Close the statement and free memory
        mysqli_stmt_close($statement);
    } else {
        die(mysqli_error($conn));
    }
}else{
    die(mysqli_error($conn));
}
// Step #11: Close the connection!
mysqli_close($conn);



$arrlength = count($a);
if(isset($_GET['Save'])){
    for($x = 1; $x < $arrlength; $x++) {
        $oCount = 0;
        $oId=$a[$x];
        $eId=$_GET[$a[$x]];
        $tc=$_GET['TraceCode'.$a[$x]];
        echo update($oCount,$eId,$oId,$tc);
        //header('location:orderHistoryCheck.php?cuId={$cId}&odelete={$oId}&submit=delete');
        $url = "orderEditPage.php?cuId=1";
        echo "<script language='javascript' type='text/javascript'>";
        echo "window.location.href='$url'";
        //echo "Deleting order......"; 
        echo "</script>"; 
    }
    echo count($a);
    print_r($a);
}




function update($oCount,$eId,$oId,$tc){
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
            $query = "UPDATE `order` SET `status`='$eId',`traceCode`='$tc' WHERE `Id`='$oId'";
            // Step #4: Prepare query as a statement
            if ($statement = mysqli_prepare($conn, $query)) {
               //Step #5: Execute statement and check success
                if (mysqli_stmt_execute($statement)) {
                    echo "processing......";        
                } 
                else{
                    echo "Error2 executing query";
                    die(mysqli_error($conn));
                }
                // Step #9: Close the statement and free memory
                mysqli_stmt_close($statement);
            }
        }else{
            die(mysqli_error($conn));
        }
    }  
}
//require("footer.php");
?>