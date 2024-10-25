<?php
session_start();
include_once("../config/php/authModel.php");
// if($_SESSION['username'] == null){
//     header("Location: ../../landingpage.php");
//     exit;
// }

ini_set('upload_max_filesize', '50M');
ini_set('post_max_size', '50M');

$userList = getAllUser();
$currentUser = null;

foreach ($userList as $user) {
    if ($user['userName'] == $_SESSION['username']['userName']) {
        $currentUser = $user;
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
    if($email==$_SESSION['username']['email']){
        $checkEmailUser=[];
    }else{
        $checkEmailUser=checkEmailUser($email);
    }
    if (isset($email) && count($checkEmailUser)==0 && password_verify($oldPassword, $_SESSION['username']['password']) && $newPassword==$confirmPassword) {
        $newpass = password_hash($newPassword, PASSWORD_BCRYPT);
        if (isset($_FILES['avatar-upload'])) {
            $avatar = $_FILES['avatar-upload'];
            $avatarName = $avatar['name'];
            $avatarTmpName = $avatar['tmp_name'];
            $avatarSize = $avatar['size'];
            $avatarError = $avatar['error'];
    
            if ($avatarError == 0) {
                $avatarExt = explode('.', $avatarName);
                $avatarActualExt = strtolower(end($avatarExt));
    
                $allowed = array('jpg', 'jpeg', 'png');
    
                if (in_array($avatarActualExt, $allowed)) {
                    if ($avatarSize < 5000000) {
                        $avatarNameNew = uniqid('', true) . "." . $avatarActualExt;
                        $avatarDestination = "../images/avatar/" . $avatarNameNew;
                        move_uploaded_file($avatarTmpName, $avatarDestination);
                        // $currentUser['avatar'] = $avatarNameNew;
                        updateUser( $email, $newpass,$avatarNameNew,$_SESSION['username']['id']);
                    }
                }else{
                    $avatarNameNew='default.png';
                    updateUser( $email, $newpass,$avatarNameNew,$_SESSION['username']['id']);
                }
            }
            
        }
        unset($_SESSION['username']);
        $_SESSION['username']=checkEmailUser($email);
        $currentUser=$_SESSION['username'][0];
    }else{
        header("Location: ../../landingpage.php");
    }

    

    // $_SESSION['users'] = $userList;
    // if (isset($newPassword) && !empty($newPassword)) {
    //     unset($_SESSION['username']);
    //     header("Location: ../../landingpage.php");
    // } else {
    //     header("Location: " . $_SERVER['PHP_SELF']);
    // }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crypto Web Profile Settings</title>
    <link rel="stylesheet" href="../css/profile.css">
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

                    <!-- Avatar Upload -->
                    <div class="avatar-section">
                        <label for="avatar-upload" class="avatar-label">
                            <img src='<?php echo "../images/avatar/" . $currentUser["avatar"]; ?>' alt="Profile Picture" class="profile-img" id="avatar-preview" />
                        </label>
                        <input type="file" id="avatar-upload" name="avatar-upload" style="display: none;" accept="image/*">
                        <p class="upload-instructions">Click the image to upload a new avatar</p>
                    </div>

                    <!-- Username -->
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" value="<?php echo $currentUser['email'] ?>">

                    <!-- Old pass -->
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