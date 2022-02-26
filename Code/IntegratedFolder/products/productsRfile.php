<!--Ruike Yuan Feb 2022-->
<?php
	//session_start();
	
    include("dataConnect.php");
	$con = mysqli_connect($host, $user, $pass, $database);
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		exit();
	}
	$type = $_GET['type'];	
	if(isset($_GET['submit'])) {
		if (!empty($_GET['productsSort'])) {
			if(!$type==0){
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
			}elseif(!$_GET['text']==0) {
					$sql="SELECT `Id`, `description`,`category`,`AllowAge`,`discountStartDate` as `disone`,`discountEndDate` as `distwo`,`productName` as `zero`, `unitPrice` as `one`, `imgInfo` as `two` FROM product WHERE `productName` LIKE '%{$_GET['text']}%' OR `description` LIKE '%{$_GET['text']}%'"; 
					if($_GET['productsSort'] == "NameAsc"){
						$sql="SELECT `Id`, `description`,`category`,`AllowAge`,`discountStartDate` as `disone`,`discountEndDate` as `distwo`,`productName` as `zero`, `unitPrice` as `one`, `imgInfo` as `two` FROM product WHERE `productName` LIKE '%{$_GET['text']}%' OR `description` LIKE '%{$_GET['text']}%' ORDER BY `productName`";
					}
					elseif($_GET['productsSort'] == "NameDesc")
					{
						$sql="SELECT `Id`, `description`,`category`,`AllowAge`,`discountStartDate` as `disone`,`discountEndDate` as `distwo`,`productName` as `zero`, `unitPrice` as `one`, `imgInfo` as `two` FROM product WHERE `productName` LIKE '%{$_GET['text']}%' OR `description` LIKE '%{$_GET['text']}%' ORDER BY `productName` DESC";	
					}
					elseif($_GET['productsSort'] == "PriceAsc")
					{
						$sql="SELECT `Id`, `description`,`category`,`AllowAge`,`discountStartDate` as `disone`,`discountEndDate` as `distwo`,`productName` as `zero`, `unitPrice` as `one`, `imgInfo` as `two` FROM product WHERE `productName` LIKE '%{$_GET['text']}%' OR `description` LIKE '%{$_GET['text']}%' ORDER BY `unitPrice`";
					}
					elseif($_GET['productsSort'] == "PriceDesc")
					{
						$sql="SELECT `Id`, `description`,`category`,`AllowAge`,`discountStartDate` as `disone`,`discountEndDate` as `distwo`,`productName` as `zero`, `unitPrice` as `one`, `imgInfo` as `two` FROM product WHERE `productName` LIKE '%{$_GET['text']}%' OR `description` LIKE '%{$_GET['text']}%' ORDER BY `unitPrice` DESC";	
					}	
			}
			else
			{
				$sql = "SELECT `Id`, `productName` as `zero`, `unitPrice` as `one`, `imgInfo` as `two` FROM `product`";
				if($_GET['productsSort'] == "NameAsc"){
					$sql = "SELECT `Id`, `productName` as `zero`, `unitPrice` as `one`, `imgInfo` as `two` FROM `product` ORDER BY `productName`";
				}
				elseif($_GET['productsSort'] == "NameDesc")
				{
					$sql = "SELECT `Id`, `productName` as `zero`, `unitPrice` as `one`, `imgInfo` as `two` FROM `product`  ORDER BY `productName` DESC";	
				}
				elseif($_GET['productsSort'] == "PriceAsc")
				{
					$sql = "SELECT `Id`, `productName` as `zero`, `unitPrice` as `one`, `imgInfo` as `two` FROM `product`  ORDER BY `unitPrice`";
				}
				elseif($_GET['productsSort'] == "PriceDesc")
				{
					$sql = "SELECT `Id`, `productName` as `zero`, `unitPrice` as `one`, `imgInfo` as `two` FROM `product`  ORDER BY `unitPrice` DESC";	
				}	
			}
		}				
	}
	else{
		echo "did not get productsSort";
	} 
	$result = mysqli_query($con, $sql);
	//while($datas[] = mysqli_fetch_assoc($result));
	//$_SESSION['numRows'] = mysqli_num_rows($result);
	//session_register('numRows');
	//$_SESSION['productsRow']=mysqli_num_rows($result);
	while($row = mysqli_fetch_array($result)){
        $products = <<<DELIMETER
		<div onclick="window.open('singleProduct.php?Id={$row['Id']}&Cs=0')" class="ProductsPagedowndownDisplayItem">
			<img class="ProductsItemImg" src=" {$row['two']}" alt="sds">
			<b class="ProductsItemTitle">{$row['zero']}</b>
			<p class="ProductsItemPrice">{$row['one']}</p>
		</div> 
		DELIMETER;
        echo $products;
    }
	//productsSort=NameAsc&type=computer&text=()&submit=submit
    //print_r($result);
	mysqli_free_result($result);
	mysqli_close($con);	
	
?>