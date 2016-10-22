<?php
  session_start();
  $_SESSION['menu'] = 'login';
  include('header.php');
  include('config.php');

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

  <div class="tile is-ancestor">

    <?php include('category_menu.php'); ?>

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
              <label><b>E-Mail</b></label>
            </div>
            <div class="column" style="//border: 1px solid red;">
              <input type="email" name="email" class="input" value="" required>
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

<?php
  include('footer.php');
?>
