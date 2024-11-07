<?php
//include_once("pdo.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/../../vendor/autoload.php';
include __DIR__ . '/../models/pdo.php';

function register($userName, $email, $password)
{
    $sql = "INSERT INTO users_tony( userName, email, password) VALUES ('$userName', '$email', '$password')";
    return mysql_execute($sql);
}

function getAllUser()
{
    $sql = "SELECT * FROM users_tony";
    return mysqliQuery($sql);
}
function removeMySelf($id,$username){
    $sql = "DELETE FROM users_tony WHERE id=$id AND userName = '$username'";
    return mysql_execute($sql);
}
// function disableAccount($id, $username) {
//     $sql = "UPDATE users_tony SET status='disabled' WHERE id=$id AND userName = '$username'";
//     return mysql_execute($sql);
// }
function checkUserExist($username, $email)
{
    $sql = "SELECT * FROM users_tony WHERE userName='$username' OR email='$email'";
    $rs = mysqliQuery($sql);
    return $rs;
}

function checkUser($userName)
{
    $sql = "SELECT * FROM users_tony WHERE userName='$userName'";
    return pdo_query_one($sql);
}

function checkEmailUser($email)
{
    $sql = "SELECT * FROM users_tony WHERE email='$email'";
    return pdo_query($sql);
}

function increaseCountWrongPass($userName)
{
    $sql = "UPDATE users_tony SET countWrongPass=countWrongPass+1 WHERE userName='$userName'";
    return pdo_execute($sql);
}

function lockUser($userName)
{
    $lockout_time = date("Y-m-d H:i:s", strtotime("+1 hour"));
    $sql = "UPDATE users_tony SET isLocked=1, lock_time='$lockout_time', countWrongPass=0  WHERE userName='$userName'";
    return pdo_execute($sql);
}
function unlockUser($gmail)
{
    $sql = "UPDATE users_tony SET countWrongPass= 0, isLocked= 0, lock_time=null WHERE email='$gmail'";
    return pdo_execute($sql);
}
function clearCountWrongPass($userName)
{
    $sql = "UPDATE users_tony SET countWrongPass=0 WHERE userName='$userName'";
    return pdo_execute($sql);
}

function updateUser($email, $password, $avatar, $id)
{
    $sql = "UPDATE users_tony SET email=:email,password=:password,avatar=:avatar WHERE id=:id";
    $conn = pdo_get_connection();
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':avatar', $avatar);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    return $stmt->execute();
}
function logout(){
    unset($_SESSION['username']);
    header("Location: landingpage.php");
}
function hasAvatar($userId)
{
    $sql = "SELECT avatar FROM users_tony WHERE id=:id";
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
        //$mail->Username   = 'khanh.phampnhk0511@hcmut.edu.vn';
        //$mail->Password   = 'pnhk0511';
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
    <img src="https://i.ibb.co/tLTWs4z/Frame-1000003039.png" alt="Fabit Logo" class="logo">
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