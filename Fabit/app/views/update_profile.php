<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include_once("../config/php/authModel.php");

ini_set('upload_max_filesize', '50M');
ini_set('post_max_size', '50M');

$userList = getAllUser();
$currentUser = null;

// Find users
foreach ($userList as $user) {
    if ($user['userName'] == $_SESSION['username']['userName']) {
        $currentUser = $user;
        break; //Break the loop if can find users
    }
}

if ($currentUser == null) {
    header("Location: ../../landingpage.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $oldPassword = $_POST['oldPassword'];
    $newPassword = $_POST['new-password'];
    $confirmPassword = $_POST['confirm-password'];

    // Kiểm tra email mới
    if ($email == $_SESSION['username']['email']) {
        $checkEmailUser = [];
    } else {
        $checkEmailUser = checkEmailUser($email);
    }

    // Condition double check
    if (isset($email) && count($checkEmailUser) == 0 && password_verify($oldPassword, $_SESSION['username']['password']) && $newPassword == $confirmPassword) {
        $newpass = password_hash($newPassword, PASSWORD_BCRYPT);
        $avatarNameNew = null;

        // Proccesing upload pics
        if (isset($_FILES['avatar-upload']) && $_FILES['avatar-upload']['error'] == 0) {
            $avatar = $_FILES['avatar-upload'];
            $avatarTmpName = $avatar['tmp_name'];
            $avatarData = file_get_contents($avatarTmpName);
            $avatarBase64 = base64_encode($avatarData);
            $avatarNameNew = 'data:' . $avatar['type'] . ';base64,' . $avatarBase64;
        } else {
            $avatarNameNew = 'data:image/png;base64,' . base64_encode(file_get_contents('../images/avatar/default.png'));
        }

        // Update users
        if (!updateUser($email, $newpass, $avatarNameNew, $_SESSION['username']['id'])) {
            die('Error updating user.');
        }

        // Cập nhật phiên làm việc
        unset($_SESSION['username']);
        $_SESSION['username'] = checkEmailUser($email);
        $currentUser = $_SESSION['username'][0];

        // Chuyển hướng sau khi cập nhật thành công
        header("Location: ../../home.php");
        exit;
    } else {
        // Chuyển hướng nếu không thành công
        header("Location: ../../landingpage.php");
        exit;
    }
}
?>
