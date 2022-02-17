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
    include("header.php");
    include("products/productsOne.php");

    function MaincountFunction($count, $productId, $productImg, $productName, $productPrise, $datas)
	{
        echo '<img class="ProductsItemImg" src="' .$datas[$count][$productId][$productImg] . '">';
        echo"<b class='ProductsItemTitle'>".$datas[$count][$productId][$productName]."</b>";
		echo "<b><p class='ProductsItemPrice'>From$" . $datas[$count][$productId][$productPrise] . "</p></b>"; 
	}
  
?>
<div class="productsPageBanner">
    <p>Product Page</p>
    <p><span class="fontBlack">home/<span class="fontBlue">Shop</span></p>
</div>
<div class="productsMenu">
    <ul>
        <li><a href="#"><span>Products</span></a></li>
        <li><a href="#">Computers</a></li>
        <li><a href="#">Phones</a></li>
        <li><a href="#">Watches</a></li>
        <li><a href="#">Components</a></li>
        <li><a href="#">All Apparatus</a></li>
    </ul>
</div>
<main class="productsMain">
    <div class="upperSorting">
        <div class="upperSortingFirstItem">
            <p><span>12</span> Products Found out of <span>30</span></p>          
        </div>
        <div class="upperSortingSecondItem">
            <label for="Sort-select">Sort by</label>
            <select name="productsSort" id="Sort-select">
                <option value ="NameAsc">Name ascending</option>
                <option value ="NameDesc">Name descending</option>
                <option value="PriceAsc">Price ascending</option>
                <option value="PriceDesc">Price descending</option>
            </select>
        </div>
    </div>
    <div class="ProductsPagedownDisplay">
        <div onclick="window.open('singleProduct.php')" class="ProductsPagedowndownDisplayItem">   
            <?php

                    MaincountFunction(1, 0, 2, 0, 1,$datas)
            ?>
        </div>  
        <div onclick="window.open('singleProduct.php')" class="ProductsPagedowndownDisplayItem">
        <?php
                    MaincountFunction(3, 2, 2, 0, 1, $datas)
            ?>
        </div> 
        <div onclick="window.open('singleProduct.php')" class="ProductsPagedowndownDisplayItem">
        <?php
                    MaincountFunction(2, 1, 2, 0, 1, $datas)
            ?>
        </div> 
        <div onclick="window.open('singleProduct.php')" class="ProductsPagedowndownDisplayItem">
        <?php
                    MaincountFunction(3, 2, 2, 0, 1, $datas)
            ?>
        </div>  
        <div onclick="window.open('singleProduct.php')" class="ProductsPagedowndownDisplayItem">
        <?php
                    MaincountFunction(3, 2, 2, 0, 1, $datas)
            ?>
        </div> 
        <div onclick="window.open('singleProduct.php')" class="ProductsPagedowndownDisplayItem">
            <?php
                    MaincountFunction(3, 2, 2, 0, 1, $datas)
            ?>
        </div> 
    </div>
    <div class="switchPage">
        <div class="leftButton">
            <img src="img/productPage/RectangleLeft.png" alt="">
        </div>
        <div class="middleButton">
            <p><b>1</b>/<b>3</b></p>
        </div>
        <div class="rightButton">
            <img src="img/productPage/RectangleRight.png" alt="">
        </div>
    </div>
</main>
<?php
    include("footer.php");
?>
</body>
</html>
