<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="AdminEditProduct.css" type="text/css">
    <title>Admin Page</title>
</head>
<body>
    <?php 
    //include "header.css";
    ?>
    <div class="senter">
        <div class="wrap">
            <div>
                <h1>AdminPage/EditProduct</h1>
            </div>
            <div class="editForm">
                <form method="POST">
                    <div class="row1">
                        <h2>Title:</h2>
                        <input type="text">
                    </div>
                    <div class="row2">
                        <h2>Description:</h2>
                        <input type="text">
                    </div>
                    <div class="row3">
                        <h2>Category:</h2>
                        <input type="text">
                    </div>
                    <div>
                        <h2>Price:</h2>
                        <input type="text">
                    </div class="row4">
                    <div>
                        <h2>DiscountStartDate:</h2>
                        <input type="text">
                    </div>                    
                    <div class="row5">
                        <h2>DiscountEndDate:</h2>
                        <input type="text">
                    </div>
                </form>
            </div>
        </div>
    </div>


</body>
</html>