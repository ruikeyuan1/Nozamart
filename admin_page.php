<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/style_Register_Admin.css" rel="stylesheet">
    <title>Admin page</title>
</head>
<body>
<?php 
    require("header.php");
    ?>
    <div class="main">
               <div class="main-content-admin">
                    <h1 class="main-admin-heading">Admin control panel</h1>
                    <image class="image-admin" src="img/admin-page-p.jpg">
                    
                    <div class="links-pages">
                        <div class="add-products-link">
                            <a href="add-products.php">Add new products</a>
                        </div>
                        <div class="see-members">
                            <a href="customers-overview.php">See all registered users</a>
                        </div>
                        <div class="see-products">
                            <a href="products-overview.php">Details about products</a>
                        </div>
                    </div>
                
                </form>
               </div>
            </div>
    <?php
     require("footer.php");
    ?> 
        
</body>
</html>