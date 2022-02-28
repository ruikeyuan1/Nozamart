<?php
require "Database.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style_Register.css" rel="stylesheet">
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
                                                    <a class="paddingZero" href="#"><img class="width100" src="IntegratedFolder/img/product-image/OtherProducts/menu-banner.png" alt="menuBanner"></a>
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
           
        </header>  
    </div>
        <div class="main">
           <div class="main-content">
                <h1 class="main-section-heading"><span class="main-heading-color">Login Register</span></h1>
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
                    <label for="age">Age:</label>
                    <br>
                    <input type="number" id="age" name="age" min="1">
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
       
    
        require_once __DIR__ . '/lib/phpmailer/src/Exception.php';
        require_once __DIR__ . '/lib/phpmailer/src/PHPMailer.php';
        require_once __DIR__ . '/lib/phpmailer/src/SMTP.php';
        
        // passing true in constructor enables exceptions in PHPMailer
        $mail = new PHPMailer(true);
        try {
            // Server settings
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER; // for detailed debug output
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;
        
            $mail->Username = 'nozamartshop@gmail.com'; // YOUR gmail email
            $mail->Password = 'nozamartShop12654'; // YOUR gmail  password
        
            // Sender and recipient settings
            $mail->setFrom('nozamartshop@gmail.com', 'Nozamart');
            $mail->addAddress($emailTo);
            $mail->addReplyTo('nozamartshop@gmail.com', 'Nozamart'); // to set the reply to
        
            // Setting the email content
            $_SESSION['rand'] = mt_rand(1000, 9999);
            $mail->IsHTML(true);
            $mail->Subject = "Verify your email";
            $mail->Body = '<h3>Welcome to Toctic <br> Your code for verification:<b> ' . $_SESSION['rand'] . '</b></h3>';
            $mail->send();
            echo "Sent";
            } 
            catch (Exception $e) {
                //echo "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
                echo "<h3>Email got blocked</h3>";
                echo "<h3>Use recovery code: <b>7J5S9</b></h3>";
            }
        


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



    <footer>
        <div class="topFooter">
            <div class="leftFooter">
                <img class="footerLogo" src="img/imgFooter/Nozamart.png">
                <div class="footerFlexTwo">                    
                    <span><p><img class="leftQuate" src="img/imgFooter/leftQuote.png">We provide latest high</p> tech devices around the world</span>
                    <img class="rightQuate" src="img/imgFooter/rightQuote.png">
                </div>
                <img class="footerPayment" src="img/imgFooter/payment.png">
            </div>
            <div class="middleFooter">
                <ul>
                    <li><b><a href="profile.php">My account</a></b></li>
                    <li><a href="cart.php">Shopping Cart</a></li>
                    <li><a href="products.php?productsSort=NameAsc&type=0&text=0&submit=submit">Products</a></li>
                    <li><a href="login.php">Login</a></li>
                </ul>
            </div>
            <div class="rightFooter">
                <ul>
                    <li><b>Contact Info</b></li>
                    <li>Address: Monetpassage 23</li>
                    <li>Phone/Fax: 0123456789</li>
                    <li>nozamart@nhlstenden.com</li>
                </ul>                
            </div>
        </div>
        <div class="bottomFooter">
            <p>Copyright © 2021.Nozamart All rights reserved.</p>
        </div>
   
    </footer>
        
    </div>
   
</body>
</html>