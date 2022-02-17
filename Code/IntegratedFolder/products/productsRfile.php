
<?php
    include("dataConnect.php");
	$con = mysqli_connect($host, $user, $pass, $database);
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		exit();
	}
	$type = $_GET['type'];
	
	if(isset($_GET['submit'])) {
		if (!empty($_GET['productsSort'])) {
		
				if($_GET['productsSort'] == "NameAsc"){
					$sql = "SELECT `Id`, `productName` as `zero`, `unitPrice` as `one`, `imgInfo` as `two` FROM `product` WHERE `category` = '$type' ORDER BY `productName`";
				}
				elseif($_GET['productsSort'] == "NameDesc")
				{
					$sql = "SELECT `Id`, `productName` as `zero`, `unitPrice` as `one`, `imgInfo` as `two` FROM `product` WHERE `category` = '$type' ORDER BY `productName` DESC";	
				}
				elseif($_GET['productsSort'] == "PriceAsc")
				{
					$sql = "SELECT `Id`, `productName` as `zero`, `unitPrice` as `one`, `imgInfo` as `two` FROM `product` WHERE `category` = '$type' ORDER BY `unitPrice`";
				}
				elseif($_GET['productsSort'] == "PriceDesc")
				{
					$sql = "SELECT `Id`, `productName` as `zero`, `unitPrice` as `one`, `imgInfo` as `two` FROM `product` WHERE `category` = '$type' ORDER BY `unitPrice` DESC";	
				}			
		}
		else{
			echo "did not get productsSort";
		} 
	}else
	{
		$sql = "SELECT `Id`, `productName` as `zero`, `unitPrice` as `one`, `imgInfo` as `two` FROM `product` ORDER BY `unitPrice`";	
	}
	$result = mysqli_query($con, $sql);
	//while($datas[] = mysqli_fetch_assoc($result));
	//$_SESSION['numRows'] = mysqli_num_rows($result);
	//session_register('numRows');
	while($row = mysqli_fetch_array($result)){
        $products = <<<DELIMETER
		<div onclick="window.open('singleProduct.php')" class="ProductsPagedowndownDisplayItem">
			<img class="ProductsItemImg" src=" {$row['two']}" alt="sds">
			<b class="ProductsItemTitle">{$row['zero']}</b>
			<p class="ProductsItemPrice">{$row['one']}</p>
		</div> 
		DELIMETER;
        echo $products;
    }
    //print_r($result);
	mysqli_free_result($result);
	mysqli_close($con);
	/*
	echo "<script language=JavaScript> location.replace(location.href);</script>";
	echo "<script language='javascript' type='text/javascript'>";
	echo "window.location.href='htmlentities($_SERVER['PHP_SELF'])'";
	echo "</script>";
	 exit;
    */
	
	?>