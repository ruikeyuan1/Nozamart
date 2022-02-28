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
    //include "/Database.php";
    ?>
    <div class="senter">
        <div class="wrap">
            <div>
                <h1>AdminPage/EditProduct</h1>
            </div>
            <div class="editForm">
                <form method="POST" class="coverForm">
                    <div class="row1">
                        <h2>Title:</h2>
                        <input type="text" name="title">
                    </div>
                    <div class="row2">
                        <h2>Description:</h2>
                        <input type="text" name="description">
                    </div>
                    <div class="row3">
                        <h2>Category:</h2>
                        <input type="text" name="catagory">
                    </div>
                    <div class="row4">
                        <h2>Price:</h2>
                        <input type="text" name="price">
                    </div>
                    <div class="row5">
                        <h2>DiscountStartDate</h2>
                        <input type="text" name="discountstart">
                    </div>                    
                    <div class="row6">
                        <h2>DiscountEndDate</h2>
                        <input type="text" name="discountend">
                    </div>
                    <div class="row7">
                        <h2>Images</h2>
                        <input type="file" name="filename" class="uploadbutton">
                        <div class="save">
                            <input type="submit" value="Save" class="savebutton">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?php 
                if($_SERVER['REQUEST_METHOD'] == 'POST'){ //Checking that fields are filled in
                    if(empty($_POST['title'])){
                        echo "<p>title is required</p>";
                        echo "<br>";
                    }
                    if(empty($_POST['description'])){
                        echo "a description is required";
                        echo "<br>";
                    }
                    
                    if(empty($_POST['catagory'])){
                        echo "a catagory is required";
                        echo "<br>";
                    }

                    if(empty($_POST['price'])){
                        echo "a price is required";
                        echo "<br>";
                    }

                    if(empty($_POST['discountstart'])){
                        echo "Discount needs a start time";
                        echo "<br>";
                    }

                    if(empty($_POST['discountend'])){
                        echo "Discount needs a end time";
                        echo "<br>";
                    } // End of field check

                    //Check the picture upload
                 //   $uploadedFileType = finfo_file(finfo_open(FILEINFO_MIME_TYPE), $_FILES["uploadedFile"]["tmp_name"]);
                 //   $acceptedFileTypes = ["image/jpg", "image/jpeg", "image/png"]; //The user can only upload jpeg, .jpg, or .png files

                 //   if(in_array($uploadedFileType, $acceptedFileTypes)){
                
                //    }else{
                //        echo "File type not allowed. Must be JPG, JPEG or PNG";
                //    }
                }
        ?>
    </div>


</body>
</html>