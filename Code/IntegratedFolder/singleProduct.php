<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nozamart – Electronics eCommerce</title>
    <meta name="description" content="Nozamart – Electronics eCommerce">
    <!-- css -->
    <link rel="stylesheet" href="css/singleProduct.css">
</head>
<body>
<?php
    include("header.php");
?>
<div class="singleProductPageBanner">
    <p>Single Product</p>
    <p><span class="fontBlack">home/<span class="fontBlue">Product</span></p>
</div>

<main class="productArea">
    <div class="productPicture">
        <img src="img/product-image/1.png" alt="">
    </div>
    <div class="ProductDis">
        <h1>ProductTitle</h1>
        <b>$200.00</b>
        <hr>
        <p>Lorem ipsum dolor sit amet, consecte adipisicing
        elit, sed do eiusmll tempor incididunt ut labore 
        et dolore magna aliqua. Ut enim ad mill veniam, 
        quis nostrud exercitation ullamco laboris nisi ut
        aliquip exet commodo consequat. Duis aute 
        irure dolor.
        </p>
        <p><span class="productCategoryTitle">Category:</span><span class="productCategoryContent">Phone</span></p>
        <p><span class="productDiscountPeriodTitle">Discount Period:</span><span class="productDiscountPeriodContent">20220204 - 20220306</span></p>
        <p><span class="warning">Only available for customers above 18</span></p>
        <div class="plusMinus">
            <div class="plusButton">
                <span>+</span>
            </div>
            <div class="countArea">
                <span>1</span>
            </div>
            <div class="minusButton">
                <span>-</span>
            </div>
        </div>
        <form>
            <input type="submit" class="submitButton" name="submit" value="Add to cart">
        </form>
    </div>
   
</main>
</body>
</html>
