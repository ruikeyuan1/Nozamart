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
    <link rel="stylesheet" href="css/products.css">
</head>
<body>
<?php
include("dataConnect.php");

/*
function geti(){
    include("otherFiles/redirect.php");
    if(isset($GET_['plus'])){
        $SESSION['product_'.$_GET['plus']] += 1;
        
        locationReturn("cart.php");
    }
    if(isset($GET_['minus'])){
        $SESSION['product_'.$_GET['minus']] --;
        locationReturn("cart.php");
    }
    if(isset($GET_['delete'])){
        $SESSION['product_'.$_GET['delete']] = '0';
        locationReturn("cart.php");
    }
}
echo geti();
/*
function cart(){
                //if(substr($name, 1, 8) == "product_"){
                    //echo $countcc;
                    //echo $SESSION['product_1'];
                include("dataConnect.php");
                $con = mysqli_connect($host, $user, $pass, $database);
                if (mysqli_connect_errno()) {
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    exit();
                }
                $sql = "SELECT Cart.customerId , Cart.productId as Id, Cart.pQuantity as pqt,Cart.unitPrice as Price,product.imgInfo
                FROM Cart
                INNER JOIN product
                ON productId= product.Id";	
                $result = mysqli_query($con, $sql);
                //while($datas[] = mysqli_fetch_assoc($result));
                $_SESSION['numRowsCart'] = mysqli_num_rows($result);
                //session_register('numRows');
                while($row = mysqli_fetch_array($result)){
                    $products = <<<DELIMETER
                    <tr>
                        <td>{$row['Id']}</td>
                        <td>{$row['Id']}</td>
                        <td>{$row['pqt']}</td>
                        /*<td>{$row['Price']}</td>
                        <td><a class='' href="#plus={$row['Id']}"><span class=''>asdsd</span></a></td>
                        <td><a class='' href="#minus={$row['Id']}"><span class=''>asdasd</span></a></td>
                        <td><a class='' href="#delete={$row['Id']}"><span class=''>asdsd</span></a></td>
                    </tr><br>
                    DELIMETER;
                    echo $products;
                }
}
echo cart();


*/
/*
$con = mysqli_connect($host, $user, $pass, $database);
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}
*/








if(isset($_POST['send'])) {
    $_SESSION['age'] = $_POST['submitage'];
    if ($_SESSION['age']==1) {
        $_SESSION['sone'] = $_POST['submitone'];
        $_SESSION['stwo'] = $_POST['submittwo'];
        $_SESSION['sprice'] = $_POST['submitprice'];
        $cPrice=$cpId=$cQ=$ccId="";
        $_SESSION['sccid']=1;
        $ccId = $_SESSION['sccid'];
        $cpId=$_SESSION['sone'];
        $cQ=$_SESSION['stwo'] ;
        $cPrice=$_SESSION['sprice'];
         // echo $SESSION['sone'] ;
        //echo $_POST['submitone'];
        if (!empty($_SESSION['stwo'])) {
            // Place positive results at the top for a quicker workflow
            // Checking the email input for data entry
            if (!empty($_SESSION['sone'])) {
                $con = mysqli_connect($host, $user, $pass, $database);
                $sql="SELECT `productId` FROM `Cart` WHERE `productId`= ".$_SESSION['sone'].""; 
                $result=mysqli_query($con,$sql); 
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC); 
                    if (!mysqli_num_rows($result)) 
                    { 
                        include("dataConnect.php");
                        $sql="SELECT `stock` FROM `product` WHERE `Id`= ".$_SESSION['sone'].""; 
                        $result=mysqli_query($con,$sql); 
                        $row = mysqli_fetch_array($result, MYSQLI_NUM); 
                        $stock = $row[0];
                        if($_SESSION['stwo']>$stock)
                        {
                            $_SESSION['stwo']=$stock;
                        }
                        if (!empty($_SESSION['stwo'])) {
                            if (!empty($_SESSION['sone'])) {
                                if (!empty($_SESSION['sprice'])) {
                                        // Step #1: Open a connection to MySQL...
                                        $con = mysqli_connect($host, $user,$pass);
                                        // And test the connection
                                        if (!$con) {
                                            die("There was an error connecting to the database. Error: " . mysqli_connect_errno());
                                        }
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
                                                mysqli_stmt_bind_param($statement, 'iiii', $_SESSION['sccid'],$_SESSION['sone'],$_SESSION['stwo'] ,$_SESSION['sprice']);
                                                //Step #5: Execute statement and check success
                                                if (mysqli_stmt_execute($statement)) {
                                                    echo "Query5 executed";
                                                    header("location:cart.php");
                                                } else {
                                                    echo "Error5 executing query";
                                                    die(mysqli_error($con));
                                                }
                                                mysqli_stmt_close($statement);
                                                //$url = "Mainpage.php";
                                                //echo "<script language='javascript' type='text/javascript'>";
                                            // echo "window.location.href='$url'";
                                                //echo "</script>";
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
                       
                    }else 
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
                                                    `productId` = ?";

                                        // Step #4: Prepare query as a statement
                                        if ($statement = mysqli_prepare($conn, $query)) {
                                            //Step #5: Execute statement and check success
                                            mysqli_stmt_bind_param($statement, 'iiiii', $ccId,$cQ,$cpId,$cPrice,$cpId);

                                            if (mysqli_stmt_execute($statement)) {
                                                echo "Updating4 Query executed";
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
                                    
                                                                      
                            //echo "record exists~~~~~!!!!!!"; 
                            echo retrive();
                            
                        
                        } 
            } else {
                //negative result at the bottom
                echo "Forgot PRoductId";
            
            }
        } else {
            //negative result at the bottom
            echo retrive();
        }
    }
    else {
        //negative result at the bottom
        //echo retrive();
        echo "this item is only available for customer above 18";
        header("location:singleProduct.php?Id={$_POST['submitone']}&Cs=0");
    }
}else {
    //negative result at the bottom
    echo retrive();
}


//UPDATE `Cart` SET `pQuantity`= $SESSION['product_'.$_POST['incre']] WHERE `productId`= $_POST['incre']
//DELETE FROM `Cart` WHERE `productId` = $_POST['delete']
function retrive(){
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
             $query = "SELECT Cart.customerId, Cart.productId, Cart.pQuantity,Cart.unitPrice,product.imgInfo
             FROM Cart
             INNER JOIN product
             ON productId= product.Id";
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
                 echo "<h2>List of Items</h2>";
                 
                 // Step #8: Check if there are results in the statement
                 if (mysqli_stmt_num_rows($statement) > 0) {
                     echo "Number of Items: " . mysqli_stmt_num_rows($statement);
                     $totalPrice=0;
                     // Make table
                     echo "<table border='2' border-color='#000000'>";
                     // Make table header
                     echo "<th style='text-align: left;'>customerId</th><th>ProductId</th><th>pQuantity</th><th>unitPrice</th><th>TotalPrice</th><th>Image</th>";
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
                             
                                         <form action="#" method="get">
                                             <input type="hidden" name="incre" value="$two">
                                             <input type="submit" name="decre" value="add">
                                         </form>
                                 
                                 
                                         <form action="#" method="get">
                                         <input type="hidden" name="decre" value="$two">
                                         <input type="submit" name="submit" value="reduce">
                                         </form>
                                     
                                 
                                         <form action="#" method="get">
                                             <input type="hidden" name="delete" value="$two">
                                             <input type="submit" name="submit" value="delete">
                                         </form>
                                 
                                 
                             
                         DELIMETER;
                        
                         //echo  "<td>".$SESSION['product_'.$_GET['plus']]. "</td>";
                         echo "<td>" . $display . "</td>";
                         // Close row
                         echo "</tr>";
                     }
                     // Close table
                     echo "</table>";
                     //Add a link to addbug.php
                     //$Countrows=mysqli_stmt_num_rows($statement)+1;
                     echo "<p>Grand Total: {$totalPrice}</p>";
                     //echo "<p><a href='#'>CheckOut</a></p>";
                     $checkout = <<<DELIMETER
                     <form action="checkout.php" method="post">
                         <input type="hidden" name="cuId" value="$one">
                         <input type="hidden" name="runFunctionOrNot" value="1">
                         <input type="hidden" name="grandTotal" value="$totalPrice">
                         <input type="submit" name="checkout" value="checkout">
                     </form>
                     DELIMETER;
                     echo $checkout;
             
             
         
    
                    
                 } else {
                     echo "No data found";
                 }
                 // Step #10: Close the statement and free memory
                 mysqli_stmt_close($statement);
             } else {
                 die(mysqli_error($conn));
             }
         } else {
             die(mysqli_error($conn));
         }
         // Step #11: Close the connection!
         mysqli_close($conn);
}


function update($sCount,$sId){
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
            $query = "DELETE FROM `Cart` WHERE `productId` = ".$sId."";

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
        $sql="SELECT `pQuantity` FROM `Cart` WHERE `productId`= ".$sId.""; 
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
                            `productId` = ?";
        
                    // Step #4: Prepare query as a statement
                    if ($statement = mysqli_prepare($conn, $query)) {
                        //Step #5: Execute statement and check success
                        mysqli_stmt_bind_param($statement, 'ii', $kk,$sId);
        
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
    $sId=$_GET['incre'];
    echo update($sCount,$sId);
    $url = "cart.php";
    echo "<script language='javascript' type='text/javascript'>";
        echo "window.location.href='$url'";
        echo "</script>";
    
}
if(isset($_GET['decre'])){
    //$SESSION['product_'.$_GET['decre']] --;
    
    $sCount = -1;
    $sId=$_GET['decre'];
   // echo $sId;
    //echo $_GET['decre'];
    echo update($sCount,$sId);
    $url = "cart.php";
    echo "<script language='javascript' type='text/javascript'>";
        echo "window.location.href='$url'";
        echo "</script>";
    
    //echo  $SESSION['product_'.$_GET['decre']];
    //echo "dasds";
    //echo  $SESSION['product_11'];
    /*
    $url = "cart.php";
    echo "<script language='javascript' type='text/javascript'>";
        echo "window.location.href='$url'";
        echo "</script>";
        header('location:cart.php');
        */
    
}
if(isset($_GET['delete'])){
    //$SESSION['product_'.$_GET['delete']] = 0;
    //locationReturn("cart.php");
    $sCount = 0;
    $sId=$_GET['delete'];
    //echo $sCount;
    //echo $sId;
    echo update($sCount,$sId);
    $url = "cart.php";
    echo "<script language='javascript' type='text/javascript'>";
        echo "window.location.href='$url'";
        echo "</script>";
    
}

echo "<p><a href='home.php'>home</a></p>";
?>
</body>
</html>