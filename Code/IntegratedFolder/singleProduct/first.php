
<?php
    include("dataConnect.php");
	$con = mysqli_connect($host, $user, $pass, $database);
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		exit();
	}
	$Id = $_GET['Id'];
	$Age="";
	$sql = "SELECT `Id`, `description`,`category`,`AllowAge`,`discountStartDate` as `disone`,`discountEndDate` as `distwo`,`productName` as `zero`, `unitPrice` as `one`, `imgInfo` as `two` FROM `product` WHERE `Id` = '$Id'";
	$result = mysqli_query($con, $sql);
	//while($datas[] = mysqli_fetch_assoc($result));
	//$_SESSION['numRows'] = mysqli_num_rows($result);
	//session_register('numRows');
	while($rowOne = mysqli_fetch_array($result)){
        $products = <<<DELIMETER
								<div class="productPicture">
								<img src="{$rowOne['two']}" alt="">
							</div>
							
							<div class="ProductDis">
								<h1>{$rowOne['zero']}</h1>
								<b>{$rowOne['one']}</b>
								<hr>
								<p>{$rowOne['description']}
								</p>
								<p><span class="productCategoryTitle">Category:</span><span class="productCategoryContent">{$rowOne['category']}</span></p>
								<p><span class="productDiscountPeriodTitle">Discount Period:</span><span class="productDiscountPeriodContent">{$rowOne['disone']}--{$rowOne['distwo']}</span></p>
								
		DELIMETER;
		$age= <<<DELIMETER
					<p><span class="warning">Only available for customers above 18</span></p>
				DELIMETER;			
		$unitPrice = $rowOne['one'];
        echo $products;
		if($rowOne['AllowAge']==1)
		{
			echo $age;
			$Age = 0;
		}else{
			echo "This is currently available";
			$Age = 1;
		}
	}
	//print_r($result);
	mysqli_free_result($result);
	mysqli_close($con);	

		
?>
