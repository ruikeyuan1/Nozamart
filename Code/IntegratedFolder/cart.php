
<?php

session_start();
$SESSION['product_1'] = 2;
$SESSION['product_2'] = 2;
$SESSION['product_3'] = 2;
$SESSION['product_4'] = 2;
include("otherFiles/redirect.php");
if(isset($GET_['plus'])){
    $SESSION['product_1'] += 1;
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
function cart(){
    foreach($_SESSION as $countcc => $value){
        if($value>0){
                //if(substr($name, 1, 8) == "product_"){
                    echo $countcc;
                    //echo $SESSION['product_1'];
                include("dataConnect.php");
                $con = mysqli_connect($host, $user, $pass, $database);
                if (mysqli_connect_errno()) {
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    exit();
                }
                $sql = "SELECT `Id`, `productName` as `zero`, `unitPrice` as `one`, `imgInfo` as `two` ,`pQuantity`FROM `product`";	
                $result = mysqli_query($con, $sql);
                //while($datas[] = mysqli_fetch_assoc($result));
                $_SESSION['numRowsCart'] = mysqli_num_rows($result);
                //session_register('numRows');
                while($row = mysqli_fetch_array($result)){
                    $products = <<<DELIMETER
                    <tr>
                        <td>{$row['Id']}</td>
                        <td>{$row['zero']}</td>
                        <td>{$row['one']}</td>
                        <td>{$value}</td>
                        /*<td>{$row['pQuantity']}</td>*/
                        <td><a class='' href="cart.php?plus={$row['Id']}"><span class=''>asdsd</span></a></td>
                        <td><a class='' href="cart.php?minus={$row['Id']}"><span class=''>asdasd</span></a></td>
                        <td><a class='' href="cart.php?delete={$row['Id']}"><span class=''>asdsd</span></a></td>
                    </tr><br>
                    DELIMETER;
                    echo $products;
                }
            
        }
    }
}
echo cart();
?>
