<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['captcha'])) {
    $_SESSION['captchaText'] = $_POST['captcha'];
}
?>