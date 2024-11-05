<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once("../controllers/authModel.php");

$otpError = "";
$otpSuccess = "";
$otpSent = false;

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['requestOtp'])) {
    $email = filter_var($_POST['otpEmail'], FILTER_SANITIZE_EMAIL);

    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $otpError = "Invalid email format.";
    } elseif (!checkEmailUser($email)) {
      
        $otpError = "Email does not exist in our records.";
    } else {
        // Generate OTP
        $otp = rand(100000, 999999);

        // Save OTP and email to session with expiration time
        $_SESSION['otp'] = $otp;
        $_SESSION['otpEmail'] = $email;
        $_SESSION['otpExpires'] = time() + 300; // OTP expires in 5 minutes

        // Send OTP to email
        if (sendOtpToEmail($email, $otp)) {
            $otpSuccess = "OTP has been sent to your email!";
            $otpSent = true;
        } else {
            $otpError = "Failed to send OTP. Please try again.";
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['verifyOtp'])) {
    $enteredOtp = $_POST['otpInput'];
    
    // Check if OTP and email are set in session and OTP hasn't expired
    if (isset($_SESSION['otp'], $_SESSION['otpEmail'], $_SESSION['otpExpires']) && time() <= $_SESSION['otpExpires']) {
        if ($enteredOtp == $_SESSION['otp']) {
            $email = $_SESSION['otpEmail'];
            
            
            if (unlockUser($email)) {
                $otpSuccess = "OTP verified and account unlocked successfully!";
                
                unset($_SESSION['otp'], $_SESSION['otpEmail'], $_SESSION['otpExpires']);
                echo $email;
            } else {
                $otpError = "Failed to unlock account. Please try again.";
                $otpSent = true;
            }
        } else {
            $otpError = "Incorrect OTP. Please try again.";
            $otpSent = true;
        }
    } else {
        $otpError = "OTP has expired. Please request a new one.";
        unset($_SESSION['otp'], $_SESSION['otpEmail'], $_SESSION['otpExpires']);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification</title>
    <link rel="stylesheet" href="../../assets/css/logsign.css"/>
    <link rel="stylesheet" href="../../assets/css/logsigeffects.css"/>
</head>
<body>

<div class="container">
    <div class="form-container">
        <h2>OTP Verification</h2>
        
     
        <?php if ($otpSuccess): ?>
            <div class="success-message"><?php echo htmlspecialchars($otpSuccess); ?></div>
        <?php endif; ?>
        <?php if ($otpError): ?>
            <div class="error-message"><?php echo htmlspecialchars($otpError); ?></div>
        <?php endif; ?>

       
        <?php if (!$otpSent): ?>
            <!-- Request OTP Form -->
            <form id="requestOtpForm" method="POST" action="">
                <div class="input-wrapper">
                    <input class="input-field" type="email" id="otpEmail" name="otpEmail" placeholder=" " required>
                    <label class="input-label">Email</label>
                </div>
                <button type="submit" name="requestOtp">Request OTP</button>
            </form>
        <?php else: ?>
           
            <form id="verifyOtpForm" method="POST" action="">
                <div class="input-wrapper">
                    <input class="input-field" type="text" id="otpInput" name="otpInput" placeholder=" " required>
                    <label class="input-label">Enter OTP</label>
                </div>
                <button type="submit" name="verifyOtp">Verify OTP</button>
            </form>
        <?php endif; ?>
    </div>
</div>

</body>
</html>
