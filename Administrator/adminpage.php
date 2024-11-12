<?php
session_start();
include_once("../Administrator/app/config/dbconnect.php");
include ("../Administrator/app/models/usersModel.php");

if(!isset($_SESSION['username']) || $_SESSION['username']['role_'] != 'ROLE_ADMIN'){
    header("Location: ../Fabit/app/views/logsign.php"); 
    exit();
}

if (isset($_GET['action']) && isset($_GET['user'])) {
    $action = $_GET['action'];
    $user = $_GET['user'];

    if ($action === 'lock') {
        lockUser($user);
        header("Location:adminpage.php");
    } else if ($action === 'unlock') {
        unlockUser($user);
        header("Location:adminpage.php");
        $unlocked = true;

    }
}
$adminInfo  = $_SESSION['username'];
$userList = getAllUser($adminInfo['userName']);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['logout'])) {
    unset($_SESSION['username']);
    header("Location: ../Fabit/landingpage.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="../Administrator/assets/css/admin.css">
    <link rel="stylesheet" href="../Administrator/assets/css/restricted.css">
    <link rel="shortcut icon" href="ffavicon.svg" type="image/svg+xml" />
    <title>Admin</title>
</head>

<body>

    <div class="container">
        <!-- Sidebar Section -->
        <aside>
            <div class="toggle">
                <div class="logo">
                    <img src="../Administrator/assets/images/ffavicon.svg">
                    <h2>Fabit<span></span></h2>
                </div>
                <div class="close" id="close-btn">
                    <span class="material-icons-sharp">
                        close
                    </span>
                </div>
            </div>

            <div class="sidebar">
                <a href="#">
                    <span class="material-icons-sharp">
                        dashboard
                    </span>
                    <h3>Dashboard</h3>
                </a>
                <a href="#" class="active" >
                    <span class="material-icons-sharp">
                        person_outline
                    </span>
                    <h3>Users</h3>
                </a>
                <a href="#">
                    <span class="material-icons-sharp">
                        receipt_long
                    </span>
                    <h3>History</h3>
                </a>
                <a href="#">
                    <span class="material-icons-sharp">
                        insights
                    </span>
                    <h3>Analytics</h3>
                </a>
                <a href="#">
                    <span class="material-icons-sharp">
                        forum
                    </span>
                    <h3>Forum</h3>
                    <span class="message-count">27</span>
                </a>
                <a href="#">
                    <span class="material-icons-sharp">
                        inventory
                    </span>
                    <h3>Sale List</h3>
                </a>
                <a href="#">
                    <span class="material-icons-sharp">
                        report_gmailerrorred
                    </span>
                    <h3>Reports</h3>
                </a>
                <a href="#">
                    <span class="material-icons-sharp">
                        settings
                    </span>
                    <h3>Settings</h3>
                </a>
                <a href="#">
                    <span class="material-icons-sharp">
                        add
                    </span>
                    <h3>New Login</h3>
                </a>
                <a href="#">
                <form action="" method="POST">
                <input name="logout" hidden>
                <span class="material-icons-sharp"> logout </span>
                <!-- <h3>Logout</h3> -->
                <input type="submit" value="Logout" class="logout">
            </form>
                </a>
            </div>
        </aside>
        <!-- End of Sidebar Section -->
        

        <!-- Main Content -->
        <main>
            <h1>Analytics</h1>
            <!-- Analyses -->
            <div class="analyse">
                <div class="sales">
                    <div class="status">
                        <div class="info">
                            <h3>Total Rent</h3>
                            <h1>$13,452</h1>
                        </div>
                        <div class="progresss">
                            <svg>
                                <circle cx="38" cy="38" r="36"></circle>
                            </svg>
                            <div class="percentage">
                                <p>+81%</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="visits">
                    <div class="status">
                        <div class="info">
                            <h3>Site Visit</h3>
                            <h1>24,981</h1>
                        </div>
                        <div class="progresss">
                            <svg>
                                <circle cx="38" cy="38" r="36"></circle>
                            </svg>
                            <div class="percentage">
                                <p>-48%</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="searches">
                    <div class="status">
                        <div class="info">
                            <h3>Searches</h3>
                            <h1>14,147</h1>
                        </div>
                        <div class="progresss">
                            <svg>
                                <circle cx="38" cy="38" r="36"></circle>
                            </svg>
                            <div class="percentage">
                                <p>+21%</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Analyses -->

            <!-- New Users Section -->
            <div class="new-users">
                <h2>New Users</h2>
                <div class="user-list">
                    <div class="user">
                        <img src="../Administrator/assets/images/im1.jpg">
                        <h2>Ming</h2>
                        <p>54 Min Ago</p>
                    </div>
                    <div class="user">
                        <img src="../Administrator/assets/images/im2.jpg">
                        <h2>Cir</h2>
                        <p>3 Hours Ago</p>
                    </div>
                    <div class="user">
                        <img src="../Administrator/assets/images/im3.jpg">
                        <h2>AnNam</h2>
                        <p>6 Hours Ago</p>
                    </div>
                    <div class="user">
                        <img src="../Administrator/assets/images/im4.png">
                        <h2>More</h2>
                        <p>New User</p>
                    </div>
                </div>
            </div>
            <!-- End of New Users Section -->

            <!-- Recent Orders Table -->
<div class="recent-orders">
    <h2>User's management</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>User Name</th>
                <th>Email</th>
                <th>Avatar</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            <?php while ($user = $userList->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($user['id']) ?></td>
                    <td><?= htmlspecialchars($user['userName']) ?></td>
                    <td><?= htmlspecialchars($user['email']) ?></td>
                    <td style="text-align: center;">
                        <img src="<?= htmlspecialchars($user['avatar']) ?>" alt="Avatar" style="height: 50px; width: 50px; display: block; margin: auto;">
                    </td>
                    <td style="text-align: center;">
                        <span style="padding: 5px; color: white; border-radius: 5px; background-color: <?= $user['isLocked'] ? 'red' : 'green' ?>">
                            <?= $user['isLocked'] ? 'Locked' : 'Active' ?>
                        </span>
                    </td>
                    <td style="text-align: center;">
                        <?php if ($user['isLocked']): ?>
                            <a href="?action=unlock&user=<?= urlencode($user['userName']) ?>" class="loop-border-button">
                                Unlock
                            </a>
                        <?php else: ?>
                            <a href="?action=lock&user=<?= urlencode($user['userName']) ?>"class="loop-border-button">
                                Lock
                            </a>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    <a href="#">Show All</a>
</div>

            <!-- End of Recent Orders -->

        </main>
        <!-- End of Main Content -->

        <!-- Right Section -->
        <div class="right-section">
            <div class="nav">
                <button id="menu-btn">
                    <span class="material-icons-sharp">
                        menu
                    </span>
                </button>
                <div class="dark-mode">
                    <span class="material-icons-sharp active">
                        light_mode
                    </span>
                    <span class="material-icons-sharp">
                        dark_mode
                    </span>
                </div>

                <div class="profile">
                    <div class="info">
                        <p>Hey, <b><?=$adminInfo['userName']?></b></p>
                        <small class="text-muted">Admin</small>
                    </div>
                    <div class="profile-photo">
                        <img src="<?=$adminInfo['avatar']?>">
                    </div>
                </div>

            </div>
            <!-- End of Nav -->

            <div class="user-profile">
                <div class="logo">
                    <img src="../Administrator/assets/images/ffavicon.svg">
                    <h2>Fabit management</h2>
                    <p>Administrator</p>
                </div>
            </div>

            <div class="reminders">
                <div class="header">
                    <h2>Reminders</h2>
                    <span class="material-icons-sharp">
                        notifications_none
                    </span>
                </div>

                <div class="notification">
                    <div class="icon">
                        <span class="material-icons-sharp">
                            bug_report
                        </span>
                    </div>
                    <div class="content">
                        <div class="info">
                            <h3>Server panic system update</h3>
                            <small class="text_muted">
                                08:00 AM - 12:00 PM
                            </small>
                        </div>
                        <span class="material-icons-sharp">
                            more_vert
                        </span>
                    </div>
                </div>

                <div class="notification deactive">
                    <div class="icon">
                        <span class="material-icons-sharp">
                                report
                        </span>
                    </div>
                    <div class="content">
                        <div class="info">
                            <h3>
                            User's crypto withdrawal gateway is experiencing a disruption</h3>
                            <small class="text_muted">
                                08:00 AM - 12:00 PM
                            </small>
                        </div>
                        <span class="material-icons-sharp">
                            more_vert
                        </span>
                    </div>
                </div>

                <div class="notification add-reminder">
                    <div>
                        <span class="material-icons-sharp">
                            add
                        </span>
                        <h3>Add Reminder</h3>
                    </div>
                </div>

            </div>

        </div>


    </div>

    
    
    <script src="../Administrator/assets/js/index.js"></script>
</body>

</html>