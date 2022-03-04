<?php
if (isset($_POST['reset-request-submit'])){

    $selector = bin2hex(random_bytes(8));
    $token = random_bytes(32);

    $url = "http://localhost/resitnoza/forgotPassword.php/create-new-password.php?selector=" . $selector . "&validator=" . bin2hex($token);

    $expires = date("U") + 1800;

    include"./LoginPage/Database.php";

    $userEmail = $_POST["emailField"];

    $sql = "DELETE FROM pwdreset WHERE pwdResetEmail=?";
    $stmt = mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo "There was an error1";
        exit();
    }else{
        mysqli_stmt_bind_param($stmt, "s", $userEmail);
        mysqli_stmt_execute($stmt);
    }

    $sql = "INSERT INTO `pwdreset`(`pwdResetEmail`, `pwdResetSelector`, `pwdResetToken`, `pwdResetExpires`) VALUES (?,?,?,?);";

    $stmt = mysqli_stmt_init($con);
    if($stmt = mysqli_prepare($con, $sql)){
        //echo "There was an error2";
        $hashedToken = password_hash($token, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selector, $hashedToken, $expires);
        if(mysqli_stmt_execute($stmt)){
            echo "Check your email!";
        }
        

    }

    mysqli_stmt_close($stmt);
    mysqli_close($con);

    $to = $userEmail;
    $from = "oliveraarland62@gmail.com";
    $subject = 'Reset your password';

    $message = '<p>We recieved a password reset request. The link to reset your password
    make this request, you can ignore this email</p>';
    $message .= '<p>Here is your password link:</br>';
    $message .= '<a href="'. $url . '">' . $url . '</a></p>';

    $headers = "From: Nozamart <oliveraarland62@gmail.com>\r\n";
    $headers = "Reply-To: oliveraarland62@gmail.com use\r\n";
    $headers = "Content-type: text/html\r\n";

    mail($to, $subject, $from, $message, $headers);

    header("Location: http://localhost/resitnoza/create-new-password.php=? ");

}else{
    header("location: http://localhost/resitnoza/forgotPassword.php?reset=succsess");
}

?>