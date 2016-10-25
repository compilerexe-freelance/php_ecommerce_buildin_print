<?php
  include('header.php');
  include('../config.php');

  if (isset($_SESSION['status'])) {
    if ($_SESSION['status'] == 'success') {
      echo '
        <script type="text/javascript">
          swal("แก้ไขบัญชีสำเร็จ", "", "success")
        </script>
      ';
      $_SESSION['status'] = null;
    }
  }

  $sql = "SELECT * FROM tb_admin WHERE id = 1";
  $result = mysqli_query($conn, $sql);

  $username = null;
  $password = null;

  while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    $username = $row['username'];
    $password = $row['password'];
  }
?>

<div class="tile is-ancestor">

  <?php include('menu.php'); ?>

  <div class="tile is-parent">
    <div class="tile is-child box">

      <div class="columns" style="text-align: left;">
        <div class="column">
          <a href="logout.php" class="button is-light"><b><span class="icon"><i class="fa fa-sign-out"></i></span> ออกจากระบบ</b></a>
          <hr>
        </div>
      </div>

      <form action="process/update_admin.php" method="post">

        <div class="columns">
          <div class="column" style="text-align: center;">
            <span class="title is-4"><b>แก้ไขบัญชีผู้ใช้งาน</b></span>
          </div>
        </div>

        <div class="columns" style="text-align: center;">
          <div class="column" style="text-align: right;">
            <label><b>Username</b></label>
          </div>
          <div class="column" style="//border: 1px solid red;">
            <input type="text" name="username" class="input" value="<?php echo $username; ?>" required>
          </div>
          <div class="column" style="//border: 1px solid red;">
          </div>
        </div>

        <div class="columns" style="text-align: center;">
          <div class="column" style="text-align: right;">
            <label><b>Password</b></label>
          </div>
          <div class="column" style="//border: 1px solid red;">
            <input type="text" name="password" class="input" value="<?php echo $password; ?>" required>
          </div>
          <div class="column" style="//border: 1px solid red;">
          </div>
        </div>

        <div class="columns" style="text-align: center;">
          <div class="column" style="text-align: right;">
          </div>
          <div class="column" style="//border: 1px solid red;">
            <button type="submit" name="button" class="button is-primary is-medium" style="width: 150px;">บันทึก</button>
          </div>
          <div class="column" style="//border: 1px solid red;">
          </div>
        </div>

      </form>


    </div>
  </div>

</div>

<?php include('footer.php'); ?>
