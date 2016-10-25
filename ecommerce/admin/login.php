<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>e-commerce</title>
    <link rel="stylesheet" href="../public/css/bulma.css" media="screen" title="no title">
    <link rel="stylesheet" href="../public/css/font-awesome.min.css" media="screen" title="no title">
    <link rel="stylesheet" href="../public/css/sweetalert.css" media="screen" title="no title">
    <script src="../public/js/jquery-3.1.1.min.js"></script>
    <script src="../public/js/sweetalert.min.js"></script>
    <style media="screen">
      @font-face {
        font-family: 'Kanit';
        font-style: normal;
        font-weight: 400;
        src: local('Kanit'), local('Kanit-Regular'), url("../public/fonts/Kanit.woff2") format('woff2');
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
    <?php
      session_start();

      if (isset($_SESSION['error'])) {
        if ($_SESSION['error'] == 'fail') {
          echo '
            <script type="text/javascript">
              swal("กรุณาตรวจสอบข้อมูลอีกครั้ง", "", "error")
            </script>
          ';
          $_SESSION['error'] = null;
        }
      }
    ?>
    <div class="container">
      <div class="header">
        <img src="../public/images/banner.jpg" alt="">
      </div>
      <div class="tile is-ancestor">

        <div class="tile is-parent">
          <div class="tile is-child box">

            <form action="process/check_login.php" method="post">

              <div class="columns">
                <div class="column" style="text-align: center;">
                  <span class="title is-4"><b>เข้าสู่ระบบ</b></span>
                </div>
              </div>

              <div class="columns" style="text-align: center;">
                <div class="column" style="text-align: right;">
                  <label><b>Username</b></label>
                </div>
                <div class="column" style="//border: 1px solid red;">
                  <input type="text" name="username" class="input" value="" required>
                </div>
                <div class="column" style="//border: 1px solid red;">
                </div>
              </div>

              <div class="columns" style="text-align: center;">
                <div class="column" style="text-align: right;">
                  <label><b>Password</b></label>
                </div>
                <div class="column" style="//border: 1px solid red;">
                  <input type="password" name="password" class="input" value="" required>
                </div>
                <div class="column" style="//border: 1px solid red;">
                </div>
              </div>

              <div class="columns" style="text-align: center;">
                <div class="column" style="text-align: right;">
                </div>
                <div class="column" style="//border: 1px solid red;">
                  <button type="submit" name="button" class="button is-primary is-medium">เข้าสู่ระบบ</button>
                </div>
                <div class="column" style="//border: 1px solid red;">
                </div>
              </div>

            </form>

          </div>
        </div>

      </div>

<?php include('footer.php'); ?>
