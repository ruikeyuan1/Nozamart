<!--Ruike Yuan Feb 2022-->
<?php
 //include("otherFiles/redirect.php"); 
 //locationReturn($_SERVER['PHP_SELF']);
 ob_start();
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
    
    include("header.php");  
   
    if (isset($_GET['productsSort'])){
        $_SESSION['productsSort']= $_GET['productsSort'];
    }
    $sortArray=array("NameAsc"=>"Name ascending","NameDesc"=>"Name descending","PriceAsc"=>"Price ascending","PriceDesc"=>"Price descending");
    ?>
    <div class="productsPageBanner">
        <p>Product Page</p>
        <p><span class="fontBlack">Home/<span class="fontBlue">Shop</span></p>
    </div>
    <div class="productsMenu">
        <ul>
            <li><a href="#"><span>Products</span></a></li>
            <li><a href="products.php?productsSort=<?php echo $_GET['productsSort'];?>&type=computer&text=()&submit=submit&page=1">Computers</a></li>
            <li><a href="products.php?productsSort=<?php echo $_GET['productsSort'];?>&type=phone&text=()&submit=submit&page=1">Phones</a></li>
            <li><a href="products.php?productsSort=<?php echo $_GET['productsSort'];?>&type=watch&text=()&submit=submit&page=1">Watches</a></li>
            <li><a href="products.php?productsSort=<?php echo $_GET['productsSort'];?>&type=component&text=()&submit=submit&page=1">Components</a></li>
            <li><a href="products.php?productsSort=NameAsc&type=0&text=0&submit=submit&page=1">All Apparatus</a></li>
        </ul>
    </div>
    <main class="productsMain">
        <div class="upperSorting">
            <div class="upperSortingFirstItem">
                    <p><span>Available</span> Products</p>
            </div>
            <div class="upperSortingSecondItem">
                <label for="Sort-select">Sort by</label>
                <form action="<?= htmlentities($_SERVER["PHP_SELF"]); ?>" method="get">
                    <select name="productsSort" id="Sort-select">                   
                        <?php
                            foreach($sortArray as $x=>$x_value) {
                                if ($_SESSION['productsSort'] == $x) {
                                    echo "<option value='" . $x . "'selected>" . $x_value . "</option>";
                                } else {
                                    echo "<option value='" . $x . "'>" . $x_value . "</option>";
                                }
                            }
                        ?>
                    </select>
                    <input type="hidden" name="text" value="<?php echo $_GET['text'];?>">
                    <input type="hidden" name="type" value="<?php echo $_GET['type'];?>">
                    <input type="hidden" name="page" value="<?php echo $_GET['page'];?>">
                    <input type="submit" name="submit" value="submit">
                </form>
            </div>
        </div>
        <div class="ProductsPagedownDisplay">
            <?php                 
                   include("products/productsRfile.php");                 
            ?>      
        </div>       
        <div class="switchPage">
        <div class="leftButton">
            <a href="products.php?productsSort=<?php echo $_GET['productsSort'];?>&type=<?php echo $_GET['type'];?>&text=0&submit=submit&page=<?php echo $pageValCheckMinus;?>"><img src="img/productPage/RectangleLeft.png" alt=""></a>
        </div>
        <div class="middleButton">
            <p><b><?php echo $pageVal;?></b>/<b><?php echo $pageNum;?></b></p>
        </div>
        <div class="rightButton">
            <a href="products.php?productsSort=<?php echo $_GET['productsSort'];?>&type=<?php echo $_GET['type'];?>&text=0&submit=submit&page=<?php echo $pageValCheckPlus;?>"><img src="img/productPage/RectangleRight.png" alt=""></a>
        </div>
    </div>
        
    </main>
    
    <?php
    include("footer.php");
?>
</body>

</html>