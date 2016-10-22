<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>e-commerce</title>
    <link rel="stylesheet" href="public/css/bulma.css" media="screen" title="no title">
    <link rel="stylesheet" href="public/css/font-awesome.min.css" media="screen" title="no title">
    <link rel="stylesheet" href="public/css/sweetalert.css" media="screen" title="no title">
    <script src="public/js/jquery-3.1.1.min.js"></script>
    <script src="public/js/sweetalert.min.js"></script>
    <style media="screen">
      @font-face {
        font-family: 'Kanit';
        font-style: normal;
        font-weight: 400;
        src: local('Kanit'), local('Kanit-Regular'), url("public/fonts/Kanit.woff2") format('woff2');
        unicode-range: U+0E01-0E5B, U+200B-200D, U+25CC;
      }
      body {
        font-family: 'Kanit', sans-serif;
        /*background-image: url("{{ url('images/background.jpeg') }}");*/
        /*background-size: contain;*/
        background-color: #000;
      }
      .footer_bg {
        background-color: #000;
      }
      .list_menu li a{
        color: #fff;
      }
      .list_menu li a:hover {
        background-color: #808080;
        color: #fff;
      }
      button {
        font-family: 'Kanit';
      }
      .active_menu {
        background-color: #404040;
      }
      th, td {
        text-align: center !important;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="header">
        <img src="public/images/banner.jpg" alt="">
      </div>
      <div class="columns" style="margin-top: 10px; text-align: right;">

        <?php
          if (isset($_SESSION['login']) && $_SESSION['login'] == 'success') {
            echo '<div class="column is-10">';
          } else {
            echo '<div class="column is-12">';
          }
        ?>

          <div class="tabs is-medium">
            <ul class="list_menu">
              <li><a href="index.php" <?php if (isset($_SESSION['menu']) && $_SESSION['menu'] == 'home') {echo 'class="active_menu"';} ?>>หน้าแรก</a></li>
              <li><a href="register.php" <?php if (isset($_SESSION['menu']) && $_SESSION['menu'] == 'register') {echo 'class="active_menu"';} ?>>สมัครสมาชิก</a></li>

              <?php
                if (isset($_SESSION['login']) && $_SESSION['login'] == 'success') {
                  echo '<li><a href="logout.php">ออกจากระบบ</a></li>';
                } else {

                  if (isset($_SESSION['menu']) && $_SESSION['menu'] == 'login') {
                    echo '<li><a href="login.php" class="active_menu">เข้าสู่ระบบ</a></li>';
                  } else {
                    echo '<li><a href="login.php">เข้าสู่ระบบ</a></li>';
                  }

                }
              ?>

              <li><a href="contact.php" <?php if (isset($_SESSION['menu']) && $_SESSION['menu'] == 'contact') {echo 'class="active_menu"';} ?>>ติดต่อเรา</a></li>
            </ul>
          </div>
        </div>

        <?php
          if (isset($_SESSION['login']) && $_SESSION['login'] == 'success') {
            echo '
              <div class="column">
                <a href="confirm_order.php" class="button is-primary is-medium">
                  <img src="public/images/icons/user.png" alt="" style="height: 30px; margin-right: 10px;">
                  บัญชีผู้ใช้งาน
                </a>
              </div>
            ';
          }
        ?>

      </div>
