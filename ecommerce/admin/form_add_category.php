<?php
  session_start();
  include('header.php');

  if (isset($_SESSION['status'])) {
    if ($_SESSION['status'] == 'success') {
      echo '
        <script type="text/javascript">
          swal("เพิ่มหมวดหมู่สำเร็จ", "", "success")
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

      <form action="process/insert_category.php" method="post">

          <div class="columns" style="text-align: left;">
            <div class="column">
              <a href="form_add_category.php" class="button is-light"><b><span class="icon"><i class="fa fa-plus"></i></span> เพิ่มหมวดหมู่สินค้า</b></a>
              <a href="list_category.php" class="button is-light"><b><span class="icon"><i class="fa fa-pencil"></i></span> แก้ไขหมวดหมู่สินค้า</b></a>
              <a href="list_delete_category.php" class="button is-light"><b><span class="icon"><i class="fa fa-minus-circle"></i></span> ลบหมวดหมู่สินค้า</b></a>
              <hr>
            </div>
          </div>

          <div class="control is-horizontal" style="margin-bottom: 30px;">
            <div class="control-label">
            </div>
            <div class="control is-grouped">
              <p class="control is-expanded" style="text-align: center;">
                <span class="title is-4"><b>เพิ่มหมวดหมู่สินค้า</b></span>
              </p>
            </div>
          </div>

          <div class="control is-horizontal" style="margin-bottom: 30px;">
            <div class="control-label">
              <label for="name" class="label">ชื่อหมวดหมู่สินค้า</label>
            </div>
            <div class="control is-grouped">
              <p class="control is-expanded">
                <input type="text" class="input" id="category_name" name="category_name" required>
              </p>
            </div>
          </div>

          <div class="control is-horizontal">
            <div class="control-label">
            </div>
            <div class="control is-grouped">
              <p class="control is-expanded" style="text-align: right;">
                <button type="submit" class="button is-primary is-medium" style="width: 150px;">บันทึก</button>
              </p>
              <p class="control is-expanded" style="text-align: left;">
                <button type="reset" class="button is-primary is-medium" style="width: 150px;">ยกเลิก</button>
              </p>
            </div>
          </div>

        </form>

    </div>
  </div>

</div>

<script type="text/javascript">
  $(document).ready(function() {
    $('#list_product').show();
  });
</script>

<?php include('footer.php'); ?>
