
    <?php
    if(isset($_POST['reset-password-submit'])){

        $select = $_POST['selector'];
        $validator = $_POST['validator'];
        $password = $_POST['pwd'];
        $passwordRepeat = $_POST['pwd-repeat'];

        if(empty($password) || empty($passwordRepeat)){
            header("Location: create-new-password.php?newpwd=empty");
            exit();
        }elseif($password != $passwordRepeat){
            header("Location: create-new-password.php?newpwd=pwdnotsame");
            exit();
        }

        $currentDate = date('U');

        require './LoginPage/Database.php';

        $sql = "SELECT * FROM pwdReset WHERE pwsResetSelector=? AND pwdResetExpires >= ?";
        $stmt = mysqli_stmt_init($con);
        if(mysqli_stmt_prepare($stmt, $sql)){
            echo "There was an error";
            exit();
        }else{
            mysqli_stmt_bind_param($stmt, "s", $selector);
            mysqli_stmt_execute($stmt);

            $results = mysqli_stmt_get_result($stmt);
            if(!$row = mysqli_fetch_assoc($results)){
                echo "You need to re-submit reset request";
                exit();
            }else{

                $tokenBin = hex2bin($validator);
                $tokenCheck = password_verify($tokenBin, $row['pwdRestToken']);

                if($tokenCheck === false) {
                    echo "You need to re-submit your reset request";
                    exit();
                }elseif($tokenCheck === true){

                    $tokenEmail = $row['pwdResetEmail'];

                    $sql = "SELECT * FROM customer WHERE email=?;";
                    
                    $stmt = mysqli_stmt_init($con);
                    if(mysqli_stmt_prepare($stmt, $sql)){
                        echo "There was an error";
                        exit();
                    }else{
                        mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                        mysqli_stmt_execute($stmt);

                        $results = mysqli_stmt_get_result($stmt);
                        if(!$row = mysqli_fetch_assoc($results)){
                            echo "there was an error";
                            exit();
                        }else{

                            $sql = "UPDATE customer SET passWord=? WHERE email=?";
                            $stmt = mysqli_stmt_init($con);
                            if(mysqli_stmt_prepare($stmt, $sql)){
                                echo "There was an error";
                                exit();
                            }else{
                                $newPasswordHash = password_hash($password, PASSWORD_DEFAULT);
                                mysqli_stmt_bind_param($stmt, "ss", $newPasswordHash, $tokenEmail);
                                mysqli_stmt_execute($stmt);


                                $sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?";
                                $stmt = mysqli_stmt_init($con);
                                if(mysqli_stmt_prepare($stmt, $sql)){
                                    echo "There was an error";
                                    exit();
                                }else{
                                    mysqli_stmt_bind_param($stmt, "s", $selector);
                                    mysqli_stmt_execute($stmt);
                                    header("Location: LoginPage.php?newpwd=passwordupdated");
                                }   
                            }
                        } 
                    }
                }
            }

    }