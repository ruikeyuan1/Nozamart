<?php
require "Database.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products overview</title>
    <style>
            #table, th, td {border: solid #266bf9 2px;}
            .table-main{
                display:flex;
                align-items:center;
                justify-content:center;
                height: 70%;
            }
    </style>
</head>
<body>
<div>
    <?php
            require("header.php");
    ?>
    <?php
                
                
                $sql = "SELECT * FROM product";
                $stmt = mysqli_prepare($conn, $sql) OR DIE ("Preparation Error" . mysqli_error($conn));
                mysqli_stmt_execute($stmt) OR DIE ("Error getting data");
                //retrieving info
                $result = $stmt->get_result();
            ?>
            <div class="table-main">
                    <table id="table">
                        <tr>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Description</th>
                            <th>Category</th>
                            <th>Discount start</th>
                            <th>Discount end</th>
                            <th>Image</th>
                            <th>P quantity</th>
                            <th>Allowed age</th>
                            <th>Stock</th>
                            <th>Discount</th>
                            <th>Real Price</th>
                        </tr>
                        <?php
                            while ($row = mysqli_fetch_array($result)) 
                            {
                                echo "<tr>";
                                echo "<td>".$row['productName']."</td>";
                                echo "<td>".$row['unitPrice']."</td>";
                                echo "<td>".$row['description']."</td>";
                                echo "<td>".$row['category']."</td>";
                                echo "<td>".$row['discountStartDate']."</td>";
                                echo "<td>".$row['discountEndDate']."</td>";
                                echo "<td>".$row['imgInfo']."</td>";
                                echo "<td>".$row['AllowAge']."</td>";
                                echo "<td>".$row['stock']."</td>";
                                echo "<td>".$row['discount']."</td>";
                                echo "<td>".$row['realPrice']."</td>";
                                echo "<td>Edit</td>";

                                echo "<td>" . '<a href="edit_product.php?Id=' . $row['Id'] . '">Edit</a>' . "</td>";
                                echo "</tr>";
                            }
                        ?>
                    </table>
            </div>
            <?php
                mysqli_stmt_close($stmt);
                mysqli_close($conn);
            ?>

</div>
<?php
        require("footer.php");
?>
</body>

</html>