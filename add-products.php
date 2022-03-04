<?php
require "Database.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/style_Register_Admin.css" rel="stylesheet">
    <title>Add Product</title>
</head>
<body>
    <?php
        require("header.php");
    ?>
    
        <br>
        <div class="main-content">
            <h1 class="add-product-heading">Add Product</h1>
            <form action="<?= htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data" >

                <!--Product-->
                <label for="firstname"><b>Product name</b></label>
                <input type="text" placeholder="Product name" name="product_name" id="firstname" required>

                <!--Price-->
                <label for="price"><b>Price:</b></label>
                <br>
                <input type="number" name="price_unit" min="1" placeholder="Price" class="agestylebox">                

                <!--Description-->
                <label for="username"><b>Description</b></label>
                <input type="text" placeholder="Description" name="description" id="username">

                <!--Category-->
                <label for="email"><b>Category</b></label>
                <input type="text" placeholder="Category" name="category" required>
                
                <!--Start Discount-->
                <label for="Discount start date"><b>Discount start date</b></label>
                <input type="date" placeholder="Start date" name="d_start_date" min="2017-04-01" class="agestylebox">
                <!--End Discount -->
                <label for="Discount end date"><b>Discount end date</b></label>
                <input type="date" placeholder="End date" name="d_end_date" class="agestylebox">

                <!--Product Image-->
                <div class="product-image">
                    <label for="image" class="product-image-text"><b>Image</b></label>
                    <input type="file" name="product_image">
                </div>
                <br>
                
                <!--Quantity-->
                <label for="Quantity"><b>Quantity:</b></label>
                <br>
                <input type="number" name="quantity" min="1" placeholder="Quantity" class="agestylebox">                

                <!--Allowed Age-->
               <div class="age-div">
                    <label for="age"><b>Allowed age</b></label>
                    <br>
                    <input type="number" name="allowed_age" min="1" placeholder="Age" class="agestylebox">
               </div>

               <!--Discount-->
               <div class="discount-div">
                    <label for="discount"><b>Discount</b></label>
                    <br>
                    <input type="number" name="discount" min="1" placeholder="Discount" class="agestylebox">
               </div>
               <!--Price-->
               <div class="price-div">
                    <label for="price"><b>Real Price</b></label>
                    <br>
                    <input type="number" name="price" min="1" placeholder="Price" class="agestylebox">
               </div>

                
                <!--Submit-->
                <input type="submit" class="registerbtn" name="placed" value="Place">
            </form>
        </div>
        <?php

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if(!empty($_POST['product_name']) && !empty($_POST['price']) && !empty($_POST['description']) && !empty($_POST['category']) && !empty($_POST['d_start_date']) && !empty($_POST['d_end_date']) && !empty($_FILES['product_image']['tmp_name']) && !empty($_POST['quantity']) && !empty($_POST['allowed_age'])){
            $product_name = $_POST['product_name'];
            $price_unit = $_POST['price_unit'];
            $description = $_POST['description'];
            $category = $_POST['category'];
            $date_st_1 = $_POST['d_start_date'];
            $date_st_2 = $_POST['d_end_date'];
            $d_start_date = date("Y-m-d",strtotime($date_st_1));
            $d_end_date = date("Y-m-d",strtotime($date_st_2));
            $quantity = $_POST['quantity'];
            $allowed_age = $_POST['allowed_age'];
            $dicount = $_POST['discount'];
            $price = $_POST['price'];

            //Image
            $target_dir = "./uploads/";
            $target_file_main = $target_dir . basename($_FILES["product_image"]["name"]);
            // Get file extension
            $imageExtension = finfo_open(FILEINFO_MIME_TYPE);
            // Allowed file types
            $allowd_file_ext = ["image/jpg", "image/jpeg", "image/png", "image/gif"];
            $MainPhotoType = finfo_file($imageExtension, $_FILES["product_image"]["tmp_name"]);
            if (in_array($MainPhotoType, $allowd_file_ext)) {
                if ($_FILES["product_image"]["size"] < 2097152) {
                    if (move_uploaded_file($_FILES["product_image"]["tmp_name"], $target_file_main)) {
                        //prepared
                        $product_image = $_FILES["product_image"]["tmp_name"];
                        $sql = "INSERT INTO product (ProductName, unitPrice, `description`, category, discountStartDate, discountEndDate, imgInfo, stock, AllowAge, discount, realprice) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
                        $stmt = mysqli_prepare($conn, $sql) OR DIE ("Error putting your product" . mysqli_error($conn));
                        //echo mysqli_error($conn);
                        mysqli_stmt_bind_param($stmt, 'sisssssiiii', $product_name, $price_unit, $description, $category, $d_start_date, $d_end_date, $product_image, $quantity, $allowed_age, $dicount, $price);
                        mysqli_stmt_execute($stmt) OR DIE ("Errro while putting the product");
                        echo "<div style='width: 100%; text-align:center; color: #266bf9; font-size: 22px; padding-top: 10px'>Succes!</div>";
                        mysqli_stmt_close($stmt);
                        mysqli_close($conn);
                        echo "<p><a href='products-overview.php'>&lt;&lt; See products</a></p>";
                        //die();
                    }else {
                        echo '<span style="color:red;text-align:center;font-size:18px;">Error uploading picture</span>';
                    }
                }else {
                    echo '<span style="color:red;text-align:center;font-size:18px;">File is too large. File size should be less than 2 megabytes.</span>';
                }
            }else {
                echo "Invalid file type!";
            }
       } else {
            echo "Please enter all the values!";
       }
    } 

    
?>





    <?php
        require("footer.php");
    ?>
</body>
</html>