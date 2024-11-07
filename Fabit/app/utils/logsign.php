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
    $usernamePattern = "/^([A-Za-z]+ ){3,}[A-Za-z]+$/";
    $pattern = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
    $passwordPattern = "/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";
    if(!preg_match($pattern,$email)){
        return[false,"Email not valid"];
    }
    
    if(!preg_match($pattern,$username)){
        return[false,"Username need to be more than 3 letters and not included number and special character"];
    }

    if(!preg_match($pattern,$password)){
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
            exit;
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $userName = $_POST['loginUsername'];
    $password = $_POST['loginPassword'];
    $captchaInput = trim($_POST['captchaInput']);
    $checkUser = checkUser($userName);

   
    if (isset($_SESSION['captchaText']) && $captchaInput !== $_SESSION['captchaText']) {
        $loginError = "Incorrect Captcha. Please try again.";
    } else {
        if (is_array($checkUser)) {
            if ($checkUser['isLocked'] == 1 && $checkUser['lock_time'] > date("Y-m-d H:i:s")) {
                $loginError = "Your account is locked!";
            } else {
                if ($checkUser['isLocked'] == 1 && $checkUser['lock_time'] <= date("Y-m-d H:i:s")) {
                    unlockUser($checkUser['email']);
                }
                if (password_verify($password, $checkUser['password'])) {
                    clearCountWrongPass($userName);
                    $_SESSION['username'] = $checkUser;
                    if($checkUser['role_'] == 'ROLE_ADMIN'){
                        header("Location:../../Administrator/adminpage.php");
                        exit();
                    }
                    header("Location:../../home.php");
                    exit;
                } else {
                    increaseCountWrongPass($userName);
                    $count = 2 - $checkUser['countWrongPass'];
                    if ($checkUser['countWrongPass'] >= 2) {
                        lockUser($userName);
                        $loginError = "Your account has been locked due to too many failed login attempts! Please try again 1hour";
                    } else {
                        $loginError = "Invalid Password! You have $count more try" . ($count > 1 ? "s" : "") . " left.";
                    }
                }
            }
        } else {
            $loginError = "Invalid Username!";
        }
    }
}

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
            <button class="login-form-buttons" id="loginBtn">Log In</button>
            <button class="login-form-buttons" id="signupBtn">Sign Up</button>
            <a href="unlockUser.php"><button class="login-form-buttons" id="signupBtn">UnLock</button></a>
        </div>

        <div class="error-message">
            <?php echo $loginError; ?>
        </div>
        <div class="error-message">
            <?php echo $signupError; ?>
        </div>
        <!-- Login Form -->
        <form id="loginForm" class="form" method="POST">
            <h2>Log In</h2>
            <div class="input-wrapper">
                <input class="input-field" type="text" id="loginUsername" name="loginUsername" placeholder=" " required>
                <label class="input-label">Username</label>
            </div>
            <div class="input-wrapper">
                <input class="input-field" type="password" id="loginPassword" name="loginPassword" placeholder=" "
                       required>
                <label class="input-label">Password</label>
            </div>
            <div class="captcha-container">
                <canvas id="captchaCanvas"></canvas>
                <button type="button" onclick="generateCaptcha()">
                    <img src="../../assets/images/captcha.svg" alt="Refresh Captcha" class="captcha-icon" width="20px"
                         height="20px"/>
                </button>
            </div>
            <div class="input-wrapper">
                <input class="input-field" type="text" id="captchaInput" name="captchaInput" placeholder=" " required>
                <label class="input-label">Enter Captcha</label>
            </div>
            <button type="submit" name="login">Log In</button>
        </form>

        <!-- Signup Form -->
        <form id="signupForm" action="" class="form hidden" method="POST">
            <h2>Sign Up</h2>
            <div class="input-wrapper">
                <input class="input-field" type="text" id="signupUsername" name="signupUsername" required>
                <label class="input-label">Username</label>
            </div>
            <div class="input-wrapper">
                <input class="input-field" type="email" id="signupEmail" name="signupEmail" required>
                <label class="input-label">Email</label>
            </div>
            <div class="input-wrapper">
                <input class="input-field" type="password" id="signupPassword" name="signupPassword" required>
                <label class="input-label">Password</label>
            </div>
            <div class="input-wrapper">
                <input class="input-field" type="password" id="signupPassword" name="signupCPassword" required>
                <label class="input-label">Confirm Your Password</label>
            </div>

            <button type="submit" name="signup">Sign Up</button>
        </form>
    </div>
</div>

<script src="../../assets/js/captcha.js"></script>
<script src="../../assets/js/logsigeffects.js"></script>
</body>

</html>