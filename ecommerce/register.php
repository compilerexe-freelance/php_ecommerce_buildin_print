<?php
  session_start();
  $_SESSION['menu'] = 'register';
  include('header.php');
  include('config.php');

  if (isset($_SESSION['status'])) {
    if ($_SESSION['status'] == 'success') {
      echo '
        <script type="text/javascript">
          swal("สมัครสมาชิกสำเร็จ", "", "success")
        </script>
      ';
      $_SESSION['status'] = null;
    }
  }

  if (isset($_SESSION['error'])) {
    if ($_SESSION['error'] == 'fail') {
      echo '
        <script type="text/javascript">
          swal("กรุณาตรวจสอบรหัสผ่านอีกครั้ง", "", "error")
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

        <form action="process/insert_member.php" method="post">

          <div class="control is-horizontal">
            <div class="control-label">
            </div>
            <div class="control is-grouped">
              <p class="control is-expanded" style="text-align: center;">
                <span class="title is-4"><b>สมัครสมาชิก</b></span>
              </p>
            </div>
          </div>

          <div class="control is-horizontal">
            <div class="control-label">
              <label for="name" class="label">ชื่อ-นามสกุล</label>
            </div>
            <div class="control is-grouped">
              <p class="control is-expanded">
                <input type="text" class="input" name="member_name" required>
              </p>
            </div>
          </div>

          <div class="control is-horizontal">
            <div class="control-label">
              <label for="name" class="label">ที่อยู่</label>
            </div>
            <div class="control is-grouped">
              <p class="control is-expanded">
                <input type="text" class="input" name="member_address" required>
              </p>
            </div>
          </div>

          <div class="control is-horizontal">
            <div class="control-label">
              <label for="name" class="label">เบอร์โทร</label>
            </div>
            <div class="control is-grouped">
              <p class="control is-expanded">
                <input type="text" class="input" name="member_tel" required>
              </p>
            </div>
          </div>

          <div class="control is-horizontal">
            <div class="control-label">
              <label for="name" class="label">อีเมล</label>
            </div>
            <div class="control is-grouped">
              <p class="control is-expanded">
                <input type="email" class="input" name="member_email" required>
              </p>
            </div>
          </div>

          <div class="control is-horizontal">
            <div class="control-label">
              <label for="name" class="label">รหัสผ่าน</label>
            </div>
            <div class="control is-grouped">
              <p class="control is-expanded">
                <input type="password" class="input" name="password" pattern=".{4,}" placeholder="ขั้นต่ำ 4 ตัวอักษร" required>
              </p>
            </div>
          </div>

          <div class="control is-horizontal">
            <div class="control-label">
              <label for="name" class="label">ยืนยันรหัสผ่าน</label>
            </div>
            <div class="control is-grouped">
              <p class="control is-expanded">
                <input type="password" class="input" name="password_confirmation" pattern=".{4,}" placeholder="ขั้นต่ำ 4 ตัวอักษร" required>
              </p>
            </div>
          </div>

          <div class="control is-horizontal">
            <div class="control-label">
            </div>
            <div class="control is-grouped">
              <p class="control is-expanded" style="text-align: center;">
                <button type="submit" class="button is-primary is-medium">ลงทะเบียน</butotn>
              </p>
            </div>
          </div>

        </div>

      </div>
    </div>
  </div>

<?php
  include('footer.php');
?>
