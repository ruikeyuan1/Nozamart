<!--Ruike Yuan Feb 2022-->
<?php
    include("dataConnect.php");
	function get_time($rowOne){
		#判断当前时间是否在时间段内，如果是，则执行
		$Day = date('Y-m-d');
		//$Day = '2022-09-07';
		$timeBegin = $rowOne['disone'];
		$timeEnd = $rowOne['distwo'];
		if($Day  >= $timeBegin && $Day  <= $timeEnd){
		   return true; 
		}
		return false;
	 }
	$con = mysqli_connect($host, $user, $pass, $database);
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		exit();
	}
	$cAge="";
	$Id = $_GET['Id'];
	$Age="";
	$sql = "SELECT `realPrice`,`Id`, `description`,`category`,`AllowAge`,`discountStartDate` as `disone`,`discountEndDate` as `distwo`,`productName` as `zero`, `unitPrice` as `one`, `imgInfo` as `two` ,`discount` as `dis` FROM `product` WHERE `Id` = '$Id'";
	$result = mysqli_query($con, $sql);
	//while($datas[] = mysqli_fetch_assoc($result));
	//$_SESSION['numRows'] = mysqli_num_rows($result);
	//session_register('numRows');
	while($rowOne = mysqli_fetch_array($result)){	
		$_SESSION['allowAge'] = $rowOne['AllowAge'];	
		 if($rowOne['disone']=='0101-01-01'){
			$DisStartDate='No discount';
			$DisEndDate='No discount';
		 }else{
			$DisStartDate=$rowOne['disone'];
			$DisEndDate=$rowOne['distwo'];
		 }
		 if(get_time($rowOne)==false){
			//echo $timeBegin,$timeEnd,$Day;
			$realPrice=$rowOne['realPrice'];
		 }else{
			//echo  strtotime("2008-9-27 16:30:30"); 
			$realPrice=$rowOne['realPrice']-$rowOne['realPrice']*$rowOne['dis']/100;		
		 }
		 include("dataConnect.php");
		 $sql="UPDATE `product` SET `unitPrice`= '$realPrice' WHERE `Id`= ?"; 
		 if ($priceSave = mysqli_prepare($con, $sql)) {                
			 mysqli_stmt_bind_param($priceSave, "i", $rowOne['Id']);
			 if (mysqli_stmt_execute($priceSave)) {
				 mysqli_stmt_store_result($priceSave);
			 }
			 mysqli_stmt_close($priceSave);
		 }		
        $products = <<<DELIMETER
								<div class="productPicture">
								<img src="{$rowOne['two']}" alt="">
							</div>
							
							<div class="ProductDis">
								<h1>{$rowOne['zero']}</h1>
								<b>{$realPrice}</b>
								<hr>
								<p>{$rowOne['description']}
								</p>
								<p><span class="productCategoryTitle">Category:</span><span class="productCategoryContent">{$rowOne['category']}</span></p>
								<p><span class="productDiscountPeriodTitle">Discount Period:</span><span class="productDiscountPeriodContent">{$DisStartDate}/{$DisEndDate}</span></p>								
		DELIMETER;
		$age= <<<DELIMETER
					<p><span class="warning">Only available for customers above {$_SESSION['allowAge']}</span></p>
				DELIMETER;			
		$unitPrice = $rowOne['one'];
        echo $products;
		include("dataConnect.php");
		$sql="SELECT `age` FROM `customer` WHERE `Id`= ?"; 
		if ($ageCheck = mysqli_prepare($con, $sql)) {                
			mysqli_stmt_bind_param($ageCheck, "i", $_SESSION['cusId']);
			if (mysqli_stmt_execute($ageCheck)) {
				mysqli_stmt_store_result($ageCheck);
				if (mysqli_stmt_num_rows($ageCheck) == 1) {
					mysqli_stmt_bind_result($ageCheck,$cAge);
					mysqli_stmt_fetch($ageCheck);
				}
			}
			mysqli_stmt_close($ageCheck);
		}		
		if($rowOne['AllowAge']>$cAge)
		{
			echo $age;
			$Age = 0;
		}else{
			echo "<p><span class='gwarning'>You are above {$_SESSION['allowAge']}, you can buy this product.</span></p>";
			$Age = 1;
		}
	}
	//print_r($result);
	mysqli_free_result($result);
	mysqli_close($con);			
?>
