<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once("../controllers/authModel.php");

ini_set('upload_max_filesize', '50M');
ini_set('post_max_size', '50M');

$userList = getAllUser();
$currentUser = null;
$error = ""; // Variable to store error message

foreach ($userList as $user) {
    if ($user['userName'] == $_SESSION['username']['userName']) {
        $currentUser = $user;
    }
}

if ($currentUser == null) {
    header("Location: ../../landingpage.php");
    exit;
}

$hasAvatar = hasAvatar($currentUser['id']);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $oldPassword = $_POST['oldPassword'];
    $newPassword = $_POST['new-password'];
    $confirmPassword = $_POST['confirm-password'];

    if ($email == $_SESSION['username']['email']) {
        $checkEmailUser = [];
    } else {
        $checkEmailUser = checkEmailUser($email);
    }

    if (isset($email) && count($checkEmailUser) == 0 && password_verify($oldPassword, $_SESSION['username']['password']) && $newPassword == $confirmPassword) {
        $newpass = password_hash($newPassword, PASSWORD_BCRYPT);

        if (isset($_FILES['avatar-upload']) && $_FILES['avatar-upload']['error'] == 0) {
            $avatar = $_FILES['avatar-upload'];
            $avatarTmpName = $avatar['tmp_name'];
            $avatarData = file_get_contents($avatarTmpName);
            $avatarBase64 = base64_encode($avatarData);
            $avatarNameNew = 'data:' . $avatar['type'] . ';base64,' . $avatarBase64;
        } else {
            if (!$hasAvatar) {
                $avatarNameNew = 'data:image/png;base64,' . base64_encode(file_get_contents('../images/avatar/default.png'));
            } else {
                $avatarNameNew = $currentUser['avatar'];
            }
        }

        // Update user
        if (!updateUser($email, $newpass, $avatarNameNew, $_SESSION['username']['id'])) {
            die('Error updating user.');
        } else {
            $_SESSION['username']['password'] = $newpass;
            header("Location: ../../home.php");
            exit;
        }
    } else {
        // If there's an error, set the error message
        if (!password_verify($oldPassword, $_SESSION['username']['password'])) {
            $error = "Incorrect old password.";
        } elseif ($newPassword != $confirmPassword) {
            $error = "New password and confirm password do not match.";
        } elseif (count($checkEmailUser) > 0) {
            $error = "Email is already in use.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crypto Web Profile Settings</title>
    <link rel="stylesheet" href="../../assets/css/profile.css">
</head>
<body>
    <div class="profile-header">
        <a class="btn-back" href="../../home.php">Back</a>
        <h3>Profile Settings</h3>
    </div>
    <div class="profile-container">
        <div class="content">
            <div class="edit-profile">
                <form action="" method="POST" enctype="multipart/form-data">

                    <!-- Display Error Message -->
                    <?php if (!empty($error)): ?>
                        <center class="error-message" style="color: red;"><?php echo $error; ?></center>
                    <?php endif; ?>

                    <!-- Avatar Upload -->
                    <div class="avatar-section">
                        <label for="avatar-upload" class="avatar-label">
                            <img src='<?php echo $currentUser["avatar"]; ?>' alt="Profile Picture" class="profile-img" id="avatar-preview" />
                        </label>
                        <input type="file" id="avatar-upload" name="avatar-upload" style="display: none;" accept="image/*">
                        <p class="upload-instructions">Click the image to upload a new avatar</p>
                    </div>

                    <!-- Email -->
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" value="<?php echo $currentUser['email'] ?>">

                    <!-- Old Password -->
                    <label for="oldPassword">Old Password</label>
                    <input type="password" id="oldPassword" name="oldPassword">

                    <!-- Change Password -->
                    <label for="new-password">New Password</label>
                    <input type="password" id="new-password" name="new-password" placeholder="Enter new password">

                    <label for="confirm-password">Confirm Password</label>
                    <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm new password">

                    <button type="submit" class="save-btn">Save Changes</button>
                </form>
            </div>
        </div>
    </div>

</body>
</html>
