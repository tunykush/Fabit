<?php
session_start();
include_once("../controllers/authModel.php");
if (isset($_SESSION['username'])) {
    header("Location:../../home.php");
    exit;
}

$loginError = "";
$signupError = "";
function validSignup($username,$password,$confirmPassword,$email){
    $usernamePattern = "/^[A-Za-z]{3,}$/";
    $pattern = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
    $passwdPattern = "/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";
    if(!preg_match($usernamePattern,$username)){
        return[false,"Username need to be more than 3 letters and not included number and special character"];
    }
    if(!preg_match($pattern,$email)){
        return[false,"Email is not valid"];
    }
    
    if(!preg_match($passwdPattern,$password)){
        return[false,"Password contains 8 letters (1 upper and 1 lower) with at least 1 special character"];
    }
    if($password != $confirmPassword){
        return[false,"Confirm password not matched"];
    }
    
    return [true, ''];
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['signup'])) {
    $userName = $_POST['signupUsername'];
    $email = $_POST['signupEmail'];

    $password = $_POST['signupPassword'];
    $cPassword = $_POST['signupCPassword'];

    $checker = validSignup($userName,$password,$cPassword,$email);
    if(!$checker[0]){
        $signupError = $checker[1];
    }else{
        $password = password_hash($password, PASSWORD_BCRYPT);

        $result = checkUserExist($userName, $email);
       
    
        if ($result->num_rows > 0) {
            $loginError = "Username or email already exists.";
        }
    
    
        if ($loginError === "") {
            register($userName, $email, $password);
            header("Location: " . $_SERVER['PHP_SELF']);
            $signupError = "Register Success";
            exit;
        }
    }
}

/// delete from users_tony where userName;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Signup</title>
    <link rel="stylesheet" href="../../assets/css/logsign.css"/>
    <link rel="stylesheet" href="../../assets/css/logsigeffects.css"/>
    <link rel="shortcut icon" href="../../assets/images/ffavicon.svg" type="image/svg+xml" />
    <style>
    .error-message{
        color:red;
        font-size:12px;
    }
    .active{
        background-color:black!important;
        color:white!important;
    }
    </style>
</head>

<body>

<div class="falling-images-container">
    <img src="../../assets/images/star1.svg" alt="Random Image" class="falling-image">
    <img src="../../assets/images/star2.svg" alt="Random Image" class="falling-image">
    <img src="../../assets/images/star3.svg" alt="Random Image" class="falling-image">
    <img src="../../assets/images/star4.svg" alt="Random Image" class="falling-image">
    <img src="../../assets/images/star5.svg" alt="Random Image" class="falling-image">
    <img src="../../assets/images/star6.svg" alt="Random Image" class="falling-image">
    <img src="../../assets/images/star7.svg" alt="Random Image" class="falling-image">
    <img src="../../assets/images/star8.svg" alt="Random Image" class="falling-image">
    <img src="../../assets/images/star9.svg" alt="Random Image" class="falling-image">
    <img src="../../assets/images/star10.svg" alt="Random Image" class="falling-image">
    <img src="../../assets/images/star11.svg" alt="Random Image" class="falling-image">
    <img src="../../assets/images/star12.svg" alt="Random Image" class="falling-image">
    <img src="../../assets/images/star13.svg" alt="Random Image" class="falling-image">
    <img src="../../assets/images/star14.svg" alt="Random Image" class="falling-image">
    <img src="../../assets/images/star15.svg" alt="Random Image" class="falling-image">
    <img src="../../assets/images/star16.svg" alt="Random Image" class="falling-image">
    <img src="../../assets/images/star17.svg" alt="Random Image" class="falling-image">
    <img src="../../assets/images/star18.svg" alt="Random Image" class="falling-image">
    <img src="../../assets/images/star19.svg" alt="Random Image" class="falling-image">
    <img src="../../assets/images/star20.svg" alt="Random Image" class="falling-image">
    <img src="../../assets/images/star21.svg" alt="Random Image" class="falling-image">
    <img src="../../assets/images/star22.svg" alt="Random Image" class="falling-image">
    <img src="../../assets/images/star23.svg" alt="Random Image" class="falling-image">
    <img src="../../assets/images/star24.svg" alt="Random Image" class="falling-image">
    <img src="../../assets/images/star25.svg" alt="Random Image" class="falling-image">
</div>

<div class="back-button">
    <a href="../../landingpage.php">Back</a>
</div>

<div class="container">
    <div class="form-container">
        <div class="form-toggle">
            <a href="logsign.php"><button class="login-form-buttons">Log In</button></a>
            <button class="login-form-buttons active">Sign Up</button>
            <a href="unlockUser.php"><button class="login-form-buttons" id="signupBtn">UnLock</button></a>
        </div>
       
        <div class="error-message">
            <?php echo $signupError; ?>
        </div>
       
        <!-- Signup Form -->
        <form id="signupForm" action="" class="form" method="POST">
        <input type="hidden" name="signup" value="1">
            <h2>Sign Up</h2>
            <div class="input-wrapper">
                <input class="input-field" type="text" id="signupUsername" name="signupUsername">
                <label class="input-label">Username</label>
                <span class="error-message" id="username-message"></span>
            </div>
            <div class="input-wrapper">
                <input class="input-field" type="email" id="signupEmail" name="signupEmail">
                <label class="input-label">Email</label>
                <span class="error-message" id="email-message"></span>

            </div>
            <div class="input-wrapper">
                <input class="input-field" type="password" id="signupPassword" name="signupPassword">
                <label class="input-label">Password</label>
                <span class="error-message" id="password-message"></span>

            </div>
            <div class="input-wrapper">
                <input class="input-field" type="password" id="signupCPassword" name="signupCPassword">
                <label class="input-label">Confirm Your Password</label>
                <span class="error-message" id="confirmpassword-message"></span>

            </div>

            <button type="submit" name="signup">Sign Up</button>
        </form>
    </div>
</div>

<script src="../../assets/js/captcha.js"></script>
<script src="../../assets/js/logsigeffects.js"></script>
<script src="../../assets/js/valid_reg.js"></script>
</body>

</html>