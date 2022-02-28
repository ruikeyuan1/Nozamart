<?php
require "Database.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/style_Register.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital@1&family=Roboto:wght@300&display=swap" rel="stylesheet">
    <title>Register</title>
</head>
<body>
    <div class="container">
    <body class="headerBody">
    <div class="main-wrapper">
    <?php
     require("header.php");
    ?> 
    </div>
        <div class="main">
           <div class="main-content">
                <h1 class="main-section-heading"><span class="main-heading-color"><span class="reg-heading-color">//</span>Register</span></h1>
                <form method="POST">

                <!--Firstname-->
                <label for="firstname"><b>First Name</b></label>
                <input type="text" placeholder="First name" name="firstname" id="firstname" required>

                <!--Lastname-->
                <label for="lastname"><b>Last Name</b></label>
                <input type="text" placeholder="Last name" name="lastname" id="lastname" required>                

                <!--Username-->
                <label for="username"><b>Username</b></label>
                <input type="text" placeholder="Username" name="username" id="username">

                <!--Email-->
                <label for="email"><b>Email</b></label>
                <input type="text" placeholder="Email" name="email" id="email" required>
                
                <!--Password-->
                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" id="psw" required>
                
                <label for="psw-repeat"><b>Repeat Password</b></label>
                <input type="password" placeholder="Repeat Password" name="psw-repeat" id="psw-repeat" required>
                
                <!--Age-->
               <div class="age-div">
                    <label for="age"><b>Age:</b></label>
                    <br>
                    <input type="number" name="age" min="1" class="agestylebox">
               </div>
                
                <!--Submit-->
                <input type="submit" class="registerbtn" name="register" value="Register">

                <div class="container signin">
                    <p>Already have an account? <a href="#">Sign in</a>.</p>
                </div>
            </form>
           </div>
        </div>

        <?php
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
        


        //////
        
        //Sending Code to email
       
    
       

        //If all the steps are filled, will send an email with code
        $steps_filled = 0;
        //checking if the register button is pressed
        if(isset($_POST['register'])){
            $username = $_POST['username'];
            $first_name = $_POST['firstname'];
            $last_name = $_POST['lastname'];
            $email = $_POST['email'];
            $password = $_POST['psw'];
            if(!empty($_POST['firstname'])){
                if(!empty($_POST['lastname'])){
                    if(!empty($_POST['username'])){
                        if(!empty($_POST['email'])){
                            if(!empty($_POST['psw'])){
                                if($_POST['psw'] == $_POST['psw-repeat']){
                                    if(!empty($_POST['age'])){
                                        $first_name = $_POST['firstname'];
                                        $last_name = $_POST['lastname'];
                                        $username = $_POST['username'];
                                        $email = $_POST['email'];
                                        $password = $_POST['psw'];
                                        $age = $_POST['age'];
                                        //Checking if the username is free
                                        $sql_username = "SELECT * FROM customer WHERE `Username` = ?";
                                        $result_username = Query($conn, $sql_username, "s", $_POST['username']);
                                        if (sizeof($result_username) == 0){
                                            $insert_info = "INSERT INTO `customer` (`FirstName`, `LastName`, `Username`, `Email`, `Password`, `Age`) VALUES (?,?,?,?,?,?)";
                                            $insertQ = Query($conn, $insert_info, "sssssi", $first_name, $last_name, $username, $email, $password, $age);
                                            $steps_filled += 1;
                                        
                                        }
                                        else{
                                            echo "Username is taken!";
                                        }
                                        
    
                                    }
                                    else{
                                        echo "Please enter your age";
                                    }

                                }
                                else{
                                    echo "The passwords don't match";
                                }
                                
                                
                            }
                            else{
                                echo "Please enter your desired password";
                            }
                        }
                        else{
                            echo "Please enter email";
                        }
                    }
                    else{
                        echo "Please enter username";
                    }
                    

                }
                else{
                    echo "Please enter last name";
                }

            }
            else{
                echo "Please enter name";
            }
            

        }


    




    ?>



    <?php
     require("footer.php");
    ?> 
        
    </div>
   
</body>
</html>