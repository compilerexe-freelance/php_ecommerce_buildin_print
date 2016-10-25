<?php
  // session_start();
  include('header.php');
  include('process/config.php');

  $id = $_GET['id'];
  $member_name = null;
  $member_address = null;
  $member_tel = null;
  $member_email = null;
  $member_password = null;

  $sql = "SELECT * FROM tb_member WHERE id = $id";
  $result = mysqli_query($conn, $sql);

  while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    $member_name = $row['member_name'];
    $member_address = $row['member_address'];
    $member_tel = $row['member_tel'];
    $member_email = $row['member_email'];
    $member_password = $row['member_password'];
  }

  if (isset($_SESSION['status'])) {
    if ($_SESSION['status'] == 'success') {
      echo '
        <script type="text/javascript">
          swal("แก้ไขสมาชิกสำเร็จ", "", "success")
        </script>
      ';
      $_SESSION['status'] = null;
    }
  }
?>

<div class="tile is-ancestor">

    <?php include('menu.php'); ?>

    <div class="tile is-parent">
      <div class="tile is-child box">
        <form action="process/update_member.php" method="post">

          <input type="hidden" name="id" value="<?php echo $id; ?>">

          <div class="columns" style="text-align: left;">
            <div class="column">
              <a href="list_member.php" class="button is-light"><b><span class="icon"><i class="fa fa-bars"></i></span> รายชื่อสมาชิก</b></a>
              <!-- <a href="list_product.php" class="button is-light"><b><span class="icon"><i class="fa fa-pencil"></i></span> แก้ไขข้อมูลสมาชิก</b></a> -->
              <!-- <a href="list_delete_product.php" class="button is-light"><b><span class="icon"><i class="fa fa-minus-circle"></i></span> ลบสมาชิก</b></a> -->
              <hr>
            </div>
          </div>

          <div class="columns" style="text-align: center;">
            <div class="column">
              <span class="title is-4"><b>แก้ไขสมาชิก</b></span>
            </div>
          </div>

          <form action="process/insert_member.php" method="post">

            <div class="control is-horizontal">
              <div class="control-label">
                <label for="name" class="label">ชื่อ-นามสกุล</label>
              </div>
              <div class="control is-grouped">
                <p class="control is-expanded">
                  <input type="text" class="input" name="member_name" value="<?php echo $member_name; ?>" required>
                </p>
              </div>
            </div>

            <div class="control is-horizontal">
              <div class="control-label">
                <label for="name" class="label">ที่อยู่</label>
              </div>
              <div class="control is-grouped">
                <p class="control is-expanded">
                  <input type="text" class="input" name="member_address" value="<?php echo $member_address; ?>" required>
                </p>
              </div>
            </div>

            <div class="control is-horizontal">
              <div class="control-label">
                <label for="name" class="label">เบอร์โทร</label>
              </div>
              <div class="control is-grouped">
                <p class="control is-expanded">
                  <input type="text" class="input" name="member_tel" value="<?php echo $member_tel; ?>" required>
                </p>
              </div>
            </div>

            <div class="control is-horizontal">
              <div class="control-label">
                <label for="name" class="label">อีเมล</label>
              </div>
              <div class="control is-grouped">
                <p class="control is-expanded">
                  <input type="email" class="input" name="member_email" value="<?php echo $member_email; ?>" required>
                </p>
              </div>
            </div>

            <div class="control is-horizontal">
              <div class="control-label">
                <label for="name" class="label">รหัสผ่าน</label>
              </div>
              <div class="control is-grouped">
                <p class="control is-expanded">
                  <input type="text" class="input" name="member_password" pattern=".{4,}" value="<?php echo $member_password; ?>" placeholder="ขั้นต่ำ 4 ตัวอักษร" required>
                </p>
              </div>
            </div>

            <!-- <div class="control is-horizontal">
              <div class="control-label">
              </div>
              <div class="control is-grouped">
                <p class="control is-expanded" style="text-align: center;">
                  <button type="submit" class="button is-primary is-medium">ลงทะเบียน</butotn>
                </p>
              </div>
            </div> -->

            <div class="columns" style="text-align: center;">
              <div class="column">
                <button type="submit" class="button is-primary is-medium" style="width: 150px;">บันทึก</butotn>
              </div>
            </div>

          </form>

      </div>
    </div>
  </div>

<?php include('footer.php'); ?>
