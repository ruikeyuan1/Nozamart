<!--Ruike Yuan Feb 2022-->
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nozamart – Electronics eCommerce</title>
    <meta name="description" content="Nozamart – Electronics eCommerce">
    <!-- css -->
    <link rel="stylesheet" href="css/header.css">
</head>
<body class="headerBody">
    <div class="main-wrapper">
        <header>
            <!-- Header top area start -->
            <div class="header-top">
                <div class="container">
                    <div class="row justify-content-between align-items-center">
                        <div class="flex">
                            <div class="welcome-text">
                                <p>World Wide Completely Free Returns and Shipping</p>
                            </div>
                        </div>
                        <div class="flex displayBlock">
                            <div class="top-nav">
                                <ul>
                                    <li><a href="tel:0123456789"><img src="img/icons/contact-2.png"></img> +012 345 6789</a></li>
                                    <li><a href="ruike.yuan@student.nhlstenden.com"><img src="img/icons/contact-3.png"></i> nozamart@nhlstenden.com</a></li>
                                    <li><a href="#"><img src="img/icons/contact-1.png"></i>Account</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Header top area end -->
            <!-- Header action area start -->
            <div class="header-bottom  displayNone displayBlock">
                <div class="container">
                    <div class="row">
                        <div class="columnLgThree">
                            <div class="header-logo">
                                <a href="home.php"><img src="img/embed pictures of nozamart/Nozamart.png" alt="Site Logo" /></a>
                            </div>
                        </div>
                        <div class="columnLgSix">
                            <div class="search-element">
                                <form action="products.php" >
                                    <input type="hidden" name="productsSort" value="NameAsc">
                                    <input type="hidden" name="type" value="0">
                                    <input type="hidden" name="submit" value="submit">
                                    <input type="text" name="text" placeholder=" Search for products" />
                                    <!--<button><img src="img/icons/search.png" alt="search"></button>-->
                                    <input class="searchImg" type="image" src="img/icons/search.png" name="imgsub" alt="icon" >
                                   <!--SELECT * FROM product WHERE `productName` LIKE '%Phone%' OR `description` LIKE '%Phone%'-->
                                </form>
                            </div>
                        </div>
                        <div class="columnLgThree">
                            <div class="header-actions">
                                <a href="cart.php" class="header-action-btn">
                                   <!-- cart img  --> 
                                   <img src="img/icons/whiteCart.png" alt="shoppingCart">
                                   <!-- cart img end -->
                                </a>                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Header action area end -->
            <!-- header navigation area start -->
            <div class="header-nav-area displayNone displayblock ">
                <div class="container">
                    <div class="header-nav">
                        <div class="main-menu position-relative">
                            <ul>
                                <li><a href="home.php">Home</a></li>
                                <li><a href="about.html">About</a></li>
                                <li class="dropdown position-static"><a href="#">Products<img class="downArrow" src="img/icons/fa-angle-down.png"></a>
                                    <ul class="mega-menu displayBlock">
                                        <li class="displayFlex">
                                            <ul class="displayBlock">
                                                <li class="title"><a href="products.php?productsSort=NameAsc&type=0&text=0&submit=submit">All Products</a></li>
                                                <li><a href="products.php?productsSort=NameAsc&type=watch&text=()&submit=submit">Smart Watches</a></li>
                                                <li><a href="products.php?productsSort=NameAsc&type=component&text=()&submit=submit">Components</a></li>                                     
                                            </ul>
                                            <ul class="displayBlock">
                                                <li class="title"><a href="products.php?productsSort=NameAsc&type=computer&text=()&submit=submit">Computers</a></li>
                                                <li><a href="products.php?productsSort=NameAsc&type=phone&text=()&submit=submit">Phones</a></li>
                                                <li><a href="#">Intelligent Apparatus</a></li>
                                            </ul>
                                            <ul class="displayBlock">
                                                <li class="title"><a href="#">My Account</a></li>
                                                <li><a href="cart.php">Shooping Cart</a></li>
                                                <li><a href="LoginPage.php">Login</a></li>
                                                <li><a href="orderchecklogin.php"></i>PickerLogin</a></li>
                                                <li><a href="#"></i>AdminLogin</a></li>
                                            </ul>
                                            <ul class="displayFlex align-items-center flex-column justify-content-center">
                                                <li>
                                                    <a class="paddingZero" href="#"><img class="width100" src="img/product-image/OtherProducts/menu-banner.png" alt="menuBanner"></a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>                               
                                <li><a href="contact.html">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- header navigation area end -->
        </header>  
    </div>
</body>
</html>
