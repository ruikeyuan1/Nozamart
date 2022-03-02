<!--Ruike Yuan Feb 2022-->
<?php
	//session_start();
    include("dataConnect.php");
	$con = mysqli_connect($host, $user, $pass, $database);
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		exit();
	}
	
	if (isset($_GET['page']) && $_GET['page'] >=1) {
		$pageVal = $_GET['page'];
	}elseif(isset($_GET['page']) && $_GET['page']==0){
		$pageVal = 1;
	}
/*
	if($pageVal>$pageNum){
		$pageVal=$pageVal--;
	}
*/
	$pageSize=6;
	$page = ($pageVal-1)*$pageSize;
	$type = $_GET['type'];	
	if(isset($_GET['submit'])) {
		if (!empty($_GET['productsSort'])) {
			$_SESSION['productsSort'] = $_GET['productsSort'];
			if(!$type==0){
				if($_GET['productsSort'] == "NameAsc"){
					$sql = "SELECT `Id`, `productName` as `zero`, `unitPrice` as `one`, `imgInfo` as `two` FROM `product` WHERE `category` = '$type'  ORDER BY `productName` LIMIT $page,$pageSize";
					$sqlAll="SELECT `Id`, `productName` as `zero`, `unitPrice` as `one`, `imgInfo` as `two` FROM `product` WHERE `category` = '$type'  ORDER BY `productName`"; 
				}
				elseif($_GET['productsSort'] == "NameDesc")
				{
					$sql = "SELECT `Id`, `productName` as `zero`, `unitPrice` as `one`, `imgInfo` as `two` FROM `product` WHERE `category` = '$type'  ORDER BY `productName` DESC LIMIT $page,$pageSize ";	
					$sqlAll="SELECT `Id`, `productName` as `zero`, `unitPrice` as `one`, `imgInfo` as `two` FROM `product` WHERE `category` = '$type'  ORDER BY `productName` DESC"; 
				}
				elseif($_GET['productsSort'] == "PriceAsc")
				{
					$sql = "SELECT `Id`, `productName` as `zero`, `unitPrice` as `one`, `imgInfo` as `two` FROM `product` WHERE `category` = '$type' ORDER BY `unitPrice` LIMIT $page,$pageSize ";
					$sqlAll="SELECT `Id`, `productName` as `zero`, `unitPrice` as `one`, `imgInfo` as `two` FROM `product` WHERE `category` = '$type'  ORDER BY `unitPrice`"; 
				}
				elseif($_GET['productsSort'] == "PriceDesc")
				{
					$sql = "SELECT `Id`, `productName` as `zero`, `unitPrice` as `one`, `imgInfo` as `two` FROM `product` WHERE `category` = '$type' ORDER BY `unitPrice` DESC LIMIT $page,$pageSize";	
					$sqlAll="SELECT `Id`, `productName` as `zero`, `unitPrice` as `one`, `imgInfo` as `two` FROM `product` WHERE `category` = '$type'  ORDER BY `unitPrice` DESC"; 
				}	
				//select * from `product` limit 1,4
			}elseif(!$_GET['text']==0) {
					$sql="SELECT `Id`, `description`,`category`,`AllowAge`,`discountStartDate` as `disone`,`discountEndDate` as `distwo`,`productName` as `zero`, `unitPrice` as `one`, `imgInfo` as `two` FROM product WHERE `productName` LIKE '%{$_GET['text']}%' OR `description` LIKE '%{$_GET['text']}%' LIMIT $page,$pageSize"; 
					if($_GET['productsSort'] == "NameAsc"){
						$sql="SELECT `Id`, `productName` as `zero`, `unitPrice` as `one`, `imgInfo` as `two` FROM product WHERE `productName` LIKE '%{$_GET['text']}%' OR `description` LIKE '%{$_GET['text']}%' ORDER BY `productName` LIMIT $page,$pageSize";
						$sqlAll	="SELECT `Id`, `productName` as `zero`, `unitPrice` as `one`, `imgInfo` as `two` FROM product WHERE `productName` LIKE '%{$_GET['text']}%' OR `description` LIKE '%{$_GET['text']}%' ORDER BY `productName`";
					}
					elseif($_GET['productsSort'] == "NameDesc")
					{
						$sql="SELECT `Id`, `productName` as `zero`, `unitPrice` as `one`, `imgInfo` as `two` FROM product WHERE `productName` LIKE '%{$_GET['text']}%' OR `description` LIKE '%{$_GET['text']}%' ORDER BY `productName` DESC LIMIT $page,$pageSize";
						$sqlAll	="SELECT `Id`, `productName` as `zero`, `unitPrice` as `one`, `imgInfo` as `two` FROM product WHERE `productName` LIKE '%{$_GET['text']}%' OR `description` LIKE '%{$_GET['text']}%' ORDER BY `productName` DESC";	
					}
					elseif($_GET['productsSort'] == "PriceAsc")
					{
						$sql="SELECT `Id`, `productName` as `zero`, `unitPrice` as `one`, `imgInfo` as `two` FROM product WHERE `productName` LIKE '%{$_GET['text']}%' OR `description` LIKE '%{$_GET['text']}%' ORDER BY `unitPrice` LIMIT $page,$pageSize";
						$sqlAll	="SELECT `Id`, `productName` as `zero`, `unitPrice` as `one`, `imgInfo` as `two` FROM product WHERE `productName` LIKE '%{$_GET['text']}%' OR `description` LIKE '%{$_GET['text']}%' ORDER BY `unitPrice`";
					}
					elseif($_GET['productsSort'] == "PriceDesc")
					{
						$sql="SELECT `Id`, `productName` as `zero`, `unitPrice` as `one`, `imgInfo` as `two` FROM product WHERE `productName` LIKE '%{$_GET['text']}%' OR `description` LIKE '%{$_GET['text']}%' ORDER BY `unitPrice` DESC LIMIT $page,$pageSize";
						$sqlAll	="SELECT `Id`, `productName` as `zero`, `unitPrice` as `one`, `imgInfo` as `two` FROM product WHERE `productName` LIKE '%{$_GET['text']}%' OR `description` LIKE '%{$_GET['text']}%' ORDER BY `unitPrice` DESC";
					}	
			}
			else
			{
				/*
				$sql = "SELECT `Id`, `productName` as `zero`, `unitPrice` as `one`, `imgInfo` as `two` FROM `product`";
				if($_GET['productsSort'] == "NameAsc"){
					$sql = "SELECT `Id`, `productName` as `zero`, `unitPrice` as `one`, `imgInfo` as `two` FROM `product`  ORDER BY `productName`";
				}
				elseif($_GET['productsSort'] == "NameDesc")
				{
					$sql = "SELECT `Id`, `productName` as `zero`, `unitPrice` as `one`, `imgInfo` as `two` FROM `product`  ORDER BY `productName`";	
				}
				elseif($_GET['productsSort'] == "PriceAsc")
				{
					$sql = "SELECT `Id`, `productName` as `zero`, `unitPrice` as `one`, `imgInfo` as `two` FROM `product`  ORDER BY `unitPrice` ";
				}
				elseif($_GET['productsSort'] == "PriceDesc")
				{
					$sql = "SELECT `Id`, `productName` as `zero`, `unitPrice` as `one`, `imgInfo` as `two` FROM `product`  ORDER BY `unitPrice` DESC";	
				}	
				*/
				$sql = "SELECT `Id`, `productName` as `zero`, `unitPrice` as `one`, `imgInfo` as `two` FROM `product` LIMIT $page,$pageSize";
				if($_GET['productsSort'] == "NameAsc"){
					$sql = "SELECT `Id`, `productName` as `zero`, `unitPrice` as `one`, `imgInfo` as `two` FROM `product`  ORDER BY `productName` LIMIT $page,$pageSize";
					$sqlAll="SELECT `Id`, `productName` as `zero`, `unitPrice` as `one`, `imgInfo` as `two` FROM `product`ORDER BY `productName`";
				}
				elseif($_GET['productsSort'] == "NameDesc")
				{
					$sql = "SELECT `Id`, `productName` as `zero`, `unitPrice` as `one`, `imgInfo` as `two` FROM `product`  ORDER BY `productName` DESC LIMIT $page,$pageSize";
					$sqlAll="SELECT `Id`, `productName` as `zero`, `unitPrice` as `one`, `imgInfo` as `two` FROM `product`ORDER BY `productName` DESC";
						
				}
				elseif($_GET['productsSort'] == "PriceAsc")
				{
					$sql = "SELECT `Id`, `productName` as `zero`, `unitPrice` as `one`, `imgInfo` as `two` FROM `product`  ORDER BY `unitPrice` LIMIT $page,$pageSize";
					$sqlAll="SELECT `Id`, `productName` as `zero`, `unitPrice` as `one`, `imgInfo` as `two` FROM `product`ORDER BY `unitPrice`";
					
				}
				elseif($_GET['productsSort'] == "PriceDesc")
				{
					$sql = "SELECT `Id`, `productName` as `zero`, `unitPrice` as `one`, `imgInfo` as `two` FROM `product`  ORDER BY `unitPrice` DESC LIMIT $page,$pageSize";
					$sqlAll="SELECT `Id`, `productName` as `zero`, `unitPrice` as `one`, `imgInfo` as `two` FROM `product`ORDER BY `unitPrice` DESC";	
				}
			}
		}				
	}
	else{
		echo "did not get productsSort";
	} 
	/*
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
	*/
$num=0;
include("./dataConnect.php");
if ($allProductsFetch = mysqli_prepare($con, $sqlAll)) {                
	if (mysqli_stmt_execute($allProductsFetch)) {
		mysqli_stmt_store_result($allProductsFetch);
		if (mysqli_stmt_num_rows($allProductsFetch) > 0) {
			$num=mysqli_stmt_num_rows($allProductsFetch);
			//echo "success";
		}else{
			echo "no data found";
		}
	}else{
		echo "error";
	}
	mysqli_stmt_close($allProductsFetch);
}else{
	echo "error1";
}
$pageNum = ceil($num/$pageSize);

if ($productDisplay = mysqli_prepare($con, $sql)) {
	//Step #5: Execute statement and check success
	if (mysqli_stmt_execute($productDisplay)) {
		// echo " <hr>";
	} else {
		echo "Error1 executing query";
		die(mysqli_error($con));
	}
	mysqli_stmt_bind_result($productDisplay,$Id,$name,$price,$Img);
	mysqli_stmt_store_result($productDisplay);
	if (mysqli_stmt_num_rows($productDisplay) > 0) {
		$pageValCheckPlus=$pageVal+1;
		$pageValCheckMinus=$pageVal-1;
		while (mysqli_stmt_fetch($productDisplay)) {	
			//echo $num;
			//$pageNum = $pageNum+$num;	
			$productsD = <<<DELIMETER
				<div onclick="window.open('singleProduct.php?Id={$Id}&Cs=0')" class="ProductsPagedowndownDisplayItem">
					<img class="ProductsItemImg" src=" {$Img}" alt="sds">
					<b class="ProductsItemTitle">{$name}</b>
					<p class="ProductsItemPrice">{$price}</p>
				</div> 					
			DELIMETER;
			echo $productsD;
		}		
		/*
		$productsPageLinks	= <<<DELIMETER
		    <a href="products.php?productsSort={$_GET['productsSort']}&type={$_GET['type']}&text=0&submit=submit&page=$pageValCheckPlus">++</a>
			<a href="products.php?productsSort={$_GET['productsSort']}&type={$_GET['type']}&text=0&submit=submit&page=$pageValCheckMinus">--</a>
			总共{$pageNum}页,当前在{$pageVal}页	
		DELIMETER;	
		echo $productsPageLinks;
		*/
	} else {
		$pageUrl = $pageVal-1;
		header("Location:products.php?productsSort={$_GET['productsSort']}&type={$_GET['type']}&text=0&submit=submit&page=$pageUrl");
	}
	// Step #10: Close the statement and free memory
	mysqli_stmt_close($productDisplay);
} else {
	die(mysqli_error($con));
}
			
?>