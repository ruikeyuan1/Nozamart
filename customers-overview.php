<?php
require "Database.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer overview</title>
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
<?php
        require("header.php");
?>
<?php
            
            
            $sql = "SELECT * FROM customer";
            $stmt = mysqli_prepare($conn, $sql) OR DIE ("Preparation Error" . mysqli_error($conn));
            mysqli_stmt_execute($stmt) OR DIE ("Error getting data");
            //retrieving info
            $result = $stmt->get_result();
        ?>
        <h1 class="customers-overview-heading">Edit customer</h1>
        <div class="table-main">
        <table id="table">
            <tr>
                <th>Id</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Password</th>
                <th>Age</th>
            </tr>
            <?php
                while ($row = mysqli_fetch_array($result)) 
                {
                    echo "<tr>";
                    echo "<td>".$row['Id']."</td>";
                    echo "<td>".$row['FirstName']."</td>";
                    echo "<td>".$row['LastName']."</td>";
                    echo "<td>".$row['userName']."</td>";
                    echo "<td>".$row['email']."</td>";
                    echo "<td>".$row['passWord']."</td>";
                    echo "<td>".$row['age']."</td>";
                    echo "<td>" . '<a href="edit_customer.php?Id=' . $row['Id'] . '&FirstName=' . $row['FirstName'] . '&LastName=' . $row['LastName'] . '&userName=' . $row['userName'] . '&email=' . $row['email'] . '&passWord=' . $row['passWord'] . '&age=' . $row['age'] . '">Edit</a>' . "</td>";
                    echo "</tr>";
                }
            ?>
        </table>
        </div>
        <?php
            mysqli_stmt_close($stmt);
            mysqli_close($conn);
        ?>
         <?php
        require("footer.php");
        ?>
    
</body>
</html>