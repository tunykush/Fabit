<?php
//include_once("pdo.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include_once '/xampp/htdocs/Fabit/vendor/autoload.php'; 
include 'pdo.php';

function register($userName, $email, $password)
{
    $sql = "INSERT INTO users( userName, email, password) VALUES ('$userName', '$email', '$password')";
    return mysql_execute($sql);
}

function getAllUser()
{
    $sql = "SELECT * FROM users";
    return mysqliQuery($sql);
}

function checkUserExist($username, $email)
{
    $sql = "SELECT * FROM users WHERE userName='$username' OR email='$email'";
    $rs = mysqliQuery($sql);
    return $rs;
}

function checkUser($userName)
{
    $sql = "SELECT * FROM users WHERE userName='$userName'";
    return pdo_query_one($sql);
}

function checkEmailUser($email)
{
    $sql = "SELECT * FROM users WHERE email='$email'";
    return pdo_query($sql);
}

function increaseCountWrongPass($userName)
{
    $sql = "UPDATE users SET countWrongPass=countWrongPass+1 WHERE userName='$userName'";
    return pdo_execute($sql);
}

function lockUser($userName)
{
    $sql = "UPDATE users SET isLocked=1 WHERE userName='$userName'";
    return pdo_execute($sql);
}
function unlockUser($gmail)
{
    $sql = "UPDATE users SET countWrongPass= 0, isLocked= 0 WHERE email='$gmail'";
    return pdo_execute($sql);
}
function clearCountWrongPass($userName)
{
    $sql = "UPDATE users SET countWrongPass=0 WHERE userName='$userName'";
    return pdo_execute($sql);
}

function updateUser($email, $password, $avatar, $id)
{
    $sql = "UPDATE users SET email=:email,password=:password,avatar=:avatar WHERE id=:id";
    $conn = pdo_get_connection();
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':avatar', $avatar);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    return $stmt->execute();
}
function hasAvatar($userId)
{
    $sql = "SELECT avatar FROM users WHERE id=:id";
    $conn = pdo_get_connection();
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $userId, PDO::PARAM_INT);
    $stmt->execute();
    
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return !empty($result['avatar']); 
}
function sendOtpToEmail($email, $otp) {
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com'; // Set the SMTP server to send through
        $mail->SMTPAuth   = true;
        $mail->Username   = 'anh0180666@huce.edu.vn'; // SMTP username
        $mail->Password   = 'Anh282828@'; // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // Recipients
        $mail->setFrom('fabit_support@gmail.com', 'Fabit © ');
        $mail->addAddress($email);

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Your OTP to unlock account';
        $mail->Body    = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Fabit Registration Email</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .container {
            width: 600px;
            background-color: #fff;
            border: 1px solid #e0e0e0;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            position: relative;
        }
        .top-stroke {
            width: 100%;
            height: 8px;
            background-color: #000;
            position: absolute;
            top: 0;
            left: 0;
        }
        .logo {
            width: 50px;
            margin: 20px auto;
        }
        h1 {
            font-size: 24px;
            color: #333;
            font-weight: bold;
        }
        .code {
            font-size: 36px;
            color: #333;
            font-weight: bold;
            margin: 20px 0;
        }
        .info-text {
            font-size: 14px;
            color: #555;
            line-height: 1.6;
            font-weight: bold;
        }
        .footer {
            font-size: 12px;
            color: #888;
            margin-top: 20px;
            text-align: left;
        }
        .social-icons {
            margin: 20px 0;
        }
        .social-icons img {
            width: 24px;
            margin: 0 5px;
            opacity: 0.6;
        }
        .social-icons img:hover {
            opacity: 1;
        }
        .link {
            color: #000000;
            text-decoration: none;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="top-stroke"></div>
    <img src="/xampp/htdocs/Fabit/assets/images/avatar/Fabitlogoo.svg" alt="Fabit Logo" class="logo">
    <h1>Email Verification Code</h1>
    <p class="info-text">Thank you for creating an account with Fabit ©.</p>
    <p class="info-text">This is the verification code to complete your registration:</p>
    <p class="code">'. $otp .'</p>
    <p class="info-text">This code is valid for 10 minutes. Please do not share it with anyone.</p>
    <p class="info-text">Sincerely,<br>The Fabit Team</p>
    
    <div class="social-icons">
        <img src="icon1.png" alt="Icon 1">
    </div>

    <div class="footer">
        <p>Thank you for choosing Fabit. If you need assistance, please <a href="#" class="link">contact our customer support team</a>.</p>
        <p>This email is for informational purposes only and is not an offer or solicitation to buy. Digital assets, including stablecoins and NFTs, are high-risk and can become worthless. Please consult with legal, tax, or investment advisors before trading or holding digital assets. Not all products are available in all regions. For restricted regions and more details, please review the <a href="#" class="link">Terms of Use</a> and <a href="#" class="link">Risk Disclosure & Compliance</a>.</p>
    </div>
</div>

</body>
</html>
';

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}
