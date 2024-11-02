<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>fabit</title>
    <!-- link -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/landingpage.css" />
    <link rel="stylesheet" href="assets/css/theme_change.css" />
    <link rel="stylesheet" href="assets/css/progressbar.css" />
    <link rel="shortcut icon" href="ffavicon.svg" type="image/svg+xml" />
    <!-- font -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
      integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap"
      rel="stylesheet"
    />
  </head>

  <body class="light-theme">
    <!-- header -->
    <header class="header" data-header>
      <div id="progress-container">
        <div id="progress-bar"></div>
      </div>
      <div class="container">
        <a href="#" class="logo">
          <img src="ffavicon.svg" width="32" height="32" alt="fabitlogo" />
          FABIT
        </a>
        <!-- navigation -->
        <nav class="navbar" data-navbar>
          <ul class="navbar-list">
            <li class="navbar-item">
              <a href="#" class="navbar-link active" data-nav-link>Homepage</a>
            </li>

            <li class="navbar-item">
              <a
                href="./assets/php/buynsell.php"
                class="navbar-link"
                data-nav-link
                >Buy Crypto</a
              >
            </li>

            <li class="navbar-item">
              <a href="landingpage.php" class="navbar-link" data-nav-link
                >Markets</a
              >
            </li>

            <li class="navbar-item">
              <a href="#" class="navbar-link" data-nav-link>Sell Crypto</a>
            </li>

            <li class="navbar-item">
              <a href="#" class="navbar-link" data-nav-link>Blog</a>
            </li>

            <li class="navbar-item">
              <a href="#" class="navbar-link" data-nav-link>Converted</a>
            </li>
          </ul>
        </nav>

        <button
          class="nav-toggle-btn"
          aria-label="Toggle menu"
          data-nav-toggler
        >
          <span class="line line-1"></span>
          <span class="line line-2"></span>
          <span class="line line-3"></span>
        </button>

        <div class="btn-containerr">
          <a href="../Fabit/app/views/logsign.php" id="loginBtn" class="btn-stroke"
            >Login</a
          >
          <a href="../Fabit/app/views/logsign.php" id="signupBtn" class="btn-stroke"
            >Sign Up</a
          >
          <div class="line-next-to-btn"></div>
        </div>

        <!-- theme -->
        <button
          class="theme-toggle-btn"
          aria-label="Toggle theme"
          data-theme-toggler
        >
          <i class="fa-solid fa-sun"></i>
          <i class="fa-solid fa-cloud-moon"></i>
        </button>
      </div>
    </header>