<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include_once("../config/php/authModel.php");

ini_set('upload_max_filesize', '50M');
ini_set('post_max_size', '50M');

$userList = getAllUser();
$currentUser = null;

// Tìm người dùng hiện tại
foreach ($userList as $user) {
    if ($user['userName'] == $_SESSION['username']['userName']) {
        $currentUser = $user;
        break; // Dừng vòng lặp nếu tìm thấy người dùng
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

    // Kiểm tra điều kiện
    if (isset($email) && count($checkEmailUser) == 0 && password_verify($oldPassword, $_SESSION['username']['password']) && $newPassword == $confirmPassword) {
        $newpass = password_hash($newPassword, PASSWORD_BCRYPT);
        $avatarNameNew = null;

        // Xử lý tải lên hình ảnh
        if (isset($_FILES['avatar-upload']) && $_FILES['avatar-upload']['error'] == 0) {
            $avatar = $_FILES['avatar-upload'];
            $avatarTmpName = $avatar['tmp_name'];
            $avatarData = file_get_contents($avatarTmpName);
            $avatarBase64 = base64_encode($avatarData);
            $avatarNameNew = 'data:' . $avatar['type'] . ';base64,' . $avatarBase64;
        } else {
            $avatarNameNew = 'data:image/png;base64,' . base64_encode(file_get_contents('../images/avatar/default.png'));
        }

        // Cập nhật người dùng
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
