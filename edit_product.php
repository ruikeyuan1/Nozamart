<?php
require "Database.php";
//Query function
function Query($conn, $sql,  $datatype, ...$data){
    $stmt = $conn->prepare($sql);
    $stmt->bind_param($datatype, ...$data);
    if ($stmt->execute()) {
        if (str_contains($sql, "SELECT") !== FALSE) {
            $result = $stmt->get_result();
            return $result->fetch_all(MYSQLI_ASSOC);
        }else
            return 1;
    }else
        return -1;
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/style_Register_Admin.css" rel="stylesheet">
    <title>Edit Product</title>
</head>
<body>
    <?php
        require("header.php");
    ?>


    

<?php

    $ID = $_GET['Id'];
    $sql = "SELECT * FROM product WHERE Id = ?";
    $data = Query($conn, $sql, "i", $ID);
// 0 is index for associative array
    $product_name = $data[0]["productName"];
    $unit_price = $data[0]['unitPrice'];
    $description = $data[0]['description'];
    $category = $data[0]['category'];
    $discount_start = $data[0]['discountStartDate'];
    $discount_end = $data[0]['discountEndDate'];
    $allowed_age = $data[0]['AllowAge'];
    $stock = $data[0]['stock'];
    $discount = $data[0]['discount'];
    $real_price = $data[0]['realPrice'];
        
            

        //Filtering the input
        if ($_SERVER['REQUEST_METHOD'] == 'POST') 
        {
            $product = filter_input(INPUT_POST, 'product_name');
            $price_product = filter_input(INPUT_POST, 'price_unit');
            $description_product = filter_input(INPUT_POST,'description');
            $category_product = filter_input(INPUT_POST,'category');
            $discount_start_product = filter_input(INPUT_POST, 'd_start_date');
            $discount_end_product = filter_input(INPUT_POST, 'd_end_date');
            $d_start_date = date("Y-m-d",strtotime($discount_start_product));
            $d_end_date = date("Y-m-d",strtotime($discount_end_product));
            $quantity_product = filter_input(INPUT_POST, 'quantity');
            $allowed_age_product = filter_input(INPUT_POST, 'allowed_age');
            $discount_product = filter_input(INPUT_POST, 'discount');
            $real_price_product = filter_input(INPUT_POST, 'price');

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
                            //preparating and updating the database
                            //pprep
                        $sql = "UPDATE product SET `productName`=?, `unitPrice`=?, `description`=?, `category`=?, `discountStartDate`=?, `discountEndDate`=?, `imgInfo`=?, `stock`=?, `AllowAge`=?, `discount`=?, `realPrice`=? WHERE `Id`=?";
                        $stmt = mysqli_prepare($conn, $sql) OR DIE ("Preparation Error1" .mysqli_error($conn));
                        mysqli_stmt_bind_param($stmt, 'sisssssiiiii', $product, $price_product, $description_product, $category_product, $d_start_date, $d_end_date, $product_image, $quantity_product, $allowed_age_product, $discount_product, $real_price_product, $ID);
                        mysqli_stmt_execute($stmt) OR DIE ("Submission Error");
                        $sql = "SELECT * FROM product WHERE Id = ?";
                        $data = Query($conn, $sql, "i", $ID);
                    // 0 is index for associative array
                        $product_name = $data[0]["productName"];
                        $unit_price = $data[0]['unitPrice'];
                        $description = $data[0]['description'];
                        $category = $data[0]['category'];
                        $discount_start = $data[0]['discountStartDate'];
                        $discount_end = $data[0]['discountEndDate'];
                        $allowed_age = $data[0]['AllowAge'];
                        $stock = $data[0]['stock'];
                        $discount = $data[0]['discount'];
                        $real_price = $data[0]['realPrice'];
                        echo "<p><a href='products-overview.php'>&lt;&lt; See products</a></p>";

                        
                        echo "<div style='width: 100%; text-align:center; color: #266bf9; font-size: 30px; padding-top: 25px'>Product updated!</div>";
                        mysqli_stmt_close($stmt);
            
                    }else {
                        echo '<span style="color:red;text-align:center;font-size:18px;">Error uploading picture</span>';
                    }
                 }else {
                     echo '<span style="color:red;text-align:center;font-size:18px;">File is too large. File size should be less than 2 megabytes.</span>';
                 }
             }else {
                 echo "Invalid file type!";
             }
        }




            
        ?>
    <br>
    <div class="main-content">
        <h1>Edit Product</h1>
        <form action="?Id=<?php echo $ID ?>" method="POST" enctype="multipart/form-data">

            <!--Product-->
            <label for="firstname"><b>Product name</b></label>
            <input type="text" name="product_name" id="firstname" value="<?php echo $product_name; ?>">

            <!--Price-->
            <label for="price"><b>Price:</b></label>
            <br>
            <input type="number" name="price_unit" min="1" class="agestylebox" value="<?php echo $unit_price; ?>">                

            <!--Description-->
            <label for="username"><b>Description</b></label>
            <input type="text" name="description" id="username" value="<?php echo $description; ?>">

            <!--Category-->
            <label for="email"><b>Category</b></label>
            <input type="text" name="category" value="<?php echo $category; ?>">
                
            <!--Start Discount-->
            <label for="Discount start date"><b>Discount start date</b></label>
            <input type="date" name="d_start_date" class="agestylebox" value="<?php echo $discount_start; ?>">
            <!--End Discount -->
            <label for="Discount end date"><b>Discount end date</b></label>
            <input type="date" name="d_end_date" class="agestylebox" value="<?php echo $discount_end; ?>">

            <!--Product Image-->
            <div class="product-image">
                <label for="image" class="product-image-text"><b>Change image</b></label>
                <input type="file" name="product_image">
            </div>
            <br>
            <!--To finish it for adding placeholders-->
            <!--Quantity-->
            <label for="Quantity"><b>Quantity:</b></label>
            <br>
            <input type="number" name="quantity" min="1" class="agestylebox" value="<?php echo $stock; ?>">                

            <!--Allowed Age-->
            <div class="age-div">
                <label for="age"><b>Allowed age</b></label>
                <br>
                <input type="number" name="allowed_age" min="1" placeholder="Age" class="agestylebox" value="<?php echo $allowed_age; ?>">
            </div>
             <!-- Discount-->
             <div class="discount-div">
                <label for="discount"><b>Discount</b></label>
                <br>
                <input type="number" name="discount" min="1" placeholder="Discount" class="agestylebox" value="<?php echo $discount; ?>">
            </div>
             <!-- Price-->
             <div class="real-price-div">
                <label for="real-price"><b>Real Price</b></label>
                <br>
                <input type="number" name="price" min="1" placeholder="Age" class="agestylebox" value="<?php echo $real_price; ?>">
            </div>
            
                
            <!--Submit-->
            <input type="submit" class="registerbtn" name="placed" value="Place">
        </form>
        </div>

    

<?php
    require("footer.php");
?>
</body>
</html>