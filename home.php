<?php
session_start();
// if ($_SESSION['username'] == null) {
//     header("Location:./landingpage.php");
//     exit;
// }

$userList = $_SESSION['users'];
$currentUser = null;

foreach ($userList as $user) {
    if ($user['username'] == $_SESSION['username']) {
        $currentUser = $user;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['logout'])) {
    unset($_SESSION['username']);
    header("Location:./landingpage.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>

    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="./assets/css/home.css" />
    <link rel="shortcut icon" href="ffavicon.svg" type="image/svg+xml" />
    
  </head>
  <body>
    <div class="container">
      <aside>
        <div class="top">
          <div class="logo">
            <img src="../ffavicon.svg" alt="Logo" />
            <h2>Fabit<span class="danger"></span></h2>
          </div>
          <div class="close" id="close-btn">
            <span class="material-icons-sharp"> close </span>
          </div>
        </div>

        <div class="sidebar">
          <a href="#" class="active">
            <span class="material-icons-sharp"> dashboard </span>
            <h3>Dashboard</h3>
          </a>
          <a href="#">
            <span class="material-icons-sharp"> arrow_circle_up </span>
            <h3>Tranfers</h3>
          </a>
          <a href="#">
            <span class="material-icons-sharp"> arrow_circle_down</span>
            <h3>Deposit</h3>
            </a>
          <a href="#">
            <span class="material-icons-sharp"> receipt_long </span>
            <h3>Orders</h3>
          </a>
            <a href="#">
                <span class="material-icons-sharp"> credit_card </span>
                <h3>Payments</h3>
            </a>
          <a href="#">
            <span class="material-icons-sharp"> token </span>
            <h3>Spot</h3>
          </a>
          <a href="#">
            <span class="material-icons-sharp"> mail_outline </span>
            <h3>Messages</h3>
            <span class="message-count">26</span>
          </a>
          <a href="#">
            <span class="material-icons-sharp"> inventory </span>
            <h3>Lists</h3>
          </a>
          <a href="#">
            <span class="material-icons-sharp"> report_gmailerrorred </span>
            <h3>Reports</h3>
          </a>
          <a href="./assets/php/profile.php">
            <span class="material-icons-sharp"> settings </span>
            <h3>Settings</h3>
          </a>
          <a href="">
            <form action="" method="POST">
                <input name="logout" hidden>
                <span class="material-icons-sharp"> logout </span>
                <!-- <h3>Logout</h3> -->
                <input type="submit" value="Logout" class="logout">
            </form>
          </a>
        </div>
      </aside>

      <main>
        <h1>Dashboard</h1>

        <div class="date">
          <input type="date" />
        </div>

        <div class="insights">
          <!-- SALES -->
          <div class="sales">
            <span class="material-icons-sharp"> analytics </span>
            <div class="middle">
              <div class="left">
                <h3>Balance</h3>
                <h1>$1000.00</h1>
              </div>
              <div class="progress">
                <svg>
                  <circle cx="38" cy="38" r="36"></circle>
                </svg>
                <div class="number">
                  <p>81%</p>
                </div>
              </div>
            </div>
            <small class="text-muted"> Last 24 hours </small>
          </div>

          <!-- EXPENSES -->
          <div class="expenses">
            <span class="material-icons-sharp"> bar_chart </span>
            <div class="middle">
              <div class="left">
                <h3>Today's Pnl</h3>
                <h1>$141.60</h1>
              </div>
              <div class="progress">
                <svg>
                  <circle cx="38" cy="38" r="36"></circle>
                </svg>
                <div class="number">
                  <p>62%</p>
                </div>
              </div>
            </div>
            <small class="text-muted"> Last 24 hours </small>
          </div>

          <!-- INCOME -->
          <div class="income">
            <span class="material-icons-sharp"> stacked_line_chart </span>
            <div class="middle">
              <div class="left">
                <h3>Total Income</h3>
                <h1>$30.64</h1>
              </div>
              <div class="progress">
                <svg>
                  <circle cx="38" cy="38" r="36"></circle>
                </svg>
                <div class="number">
                  <p>44%</p>
                </div>
              </div>
            </div>
            <small class="text-muted"> Last 24 hours </small>
          </div>
        </div>

        <div class="holding">
          <h2>Holding</h2>
          <table id="holding--table">
            <thead>
              <tr>
                <th>Coin</th>
                <th>Total</th>
                <th>Price</th>
                <th>Growth</th>
                <th></th>
              </tr>
            </thead>
            <!-- Add tbody here | JS insertion -->
          </table>
          <a href="#">Show All</a>
        </div>
      </main>

      <div class="right">
        <div class="top">
          <button id="menu-btn">
            <span class="material-icons-sharp"> menu </span>
          </button>
          <div class="theme-toggler">
            <span class="material-icons-sharp active"> light_mode </span>
            <span class="material-icons-sharp"> dark_mode </span>
          </div>
          <div class="profile">
            <div class="info">
              <p>Welcome back, <b><?php echo $currentUser['username'] ?></b></p>
              <small class="text-muted">User</small>
            </div>
            <div class="profile-photo">
              <img src="<?php echo "./assets/images/avatar/".$currentUser['avatar']; ?>" alt="Profile Picture" />
            </div>
          </div>
        </div>

        <div class="square">
          <h2>News</h2>
          <!-- Add updates div here | JS insertion -->
        </div>

        <div class="coin-markets">
          <h2>Coin Markets</h2>
          <div id="analytics">
            <!-- Add items div here | JS insertion -->
          </div>
          <div class="item add-coin">
            <div>
              <span class="material-icons-sharp"> add </span>
              <h3>Add Coin</h3>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="/assets/js/homejs/recent-order-data.js"></script>
    <script src="/assets/js/homejs/update-data.js"></script>
    <script src="/assets/js/homejs/sales-analytics-data.js"></script>
    <script src="/assets/js/home.js"></script>
  </body>
</html>
