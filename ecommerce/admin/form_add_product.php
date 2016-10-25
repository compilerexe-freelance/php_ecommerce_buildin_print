<?php
  // session_start();
  include('header.php');
  include('process/config.php');

  if (isset($_SESSION['status'])) {
    if ($_SESSION['status'] == 'success') {
      echo '
        <script type="text/javascript">
          swal("เพิ่มสินค้าสำเร็จ", "", "success")
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
        <form action="process/insert_product.php" method="post" enctype="multipart/form-data">

          <div class="columns" style="text-align: left;">
            <div class="column">
              <a href="form_add_product.php" class="button is-light"><b><span class="icon"><i class="fa fa-plus"></i></span> เพิ่มสินค้า</b></a>
              <a href="list_product.php" class="button is-light"><b><span class="icon"><i class="fa fa-pencil"></i></span> แก้ไขสินค้า</b></a>
              <a href="list_delete_product.php" class="button is-light"><b><span class="icon"><i class="fa fa-minus-circle"></i></span> ลบสินค้า</b></a>
              <hr>
            </div>
          </div>

          <div class="control is-horizontal" style="margin-bottom: 30px;">
            <div class="control-label">
            </div>
            <div class="control is-grouped">
              <p class="control is-expanded" style="text-align: center;">
                <span class="title is-4"><b>เพิ่มสินค้า</b></span>
              </p>
            </div>
          </div>

          <div class="control is-horizontal">
            <div class="control-label">
              <label for="name" class="label">ชื่อสินค้า</label>
            </div>
            <div class="control is-grouped">
              <p class="control is-expanded">
                <input type="text" class="input" name="product_name" required>
              </p>
            </div>
          </div>

          <div class="control is-horizontal">
            <div class="control-label">
              <label for="name" class="label">หมวดหมู่</label>
            </div>
            <div class="control is-grouped">
              <p class="control is-expanded">
                <span class="select">
                  <select name="category_name" required>
                    <option selected disabled value="">เลือกหมวดหมู่สินค้า</option>
                    <?php

                      $sql = "SELECT * FROM tb_category";
                      $result = mysqli_query($conn, $sql);

                      while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                        echo '<option value="'. $row['category_name'] .'">'. $row['category_name'] .'</option>';
                      }

                    ?>
                    <!-- <option value="ลำโพง">ลำโพง</option>
                    <option value="เพาเวอร์แอมป์">เพาเวอร์แอมป์</option>
                    <option value="ปรีแอมป์">ปรีแอมป์</option>
                    <option value="เบส">เบส</option>
                    <option value="อุปกรณ์ต่อพ่วง">อุปกรณ์ต่อพ่วง</option>
                    <option value="วิทยุ">วิทยุ</option> -->
                  </select>
                </span>
              </p>
            </div>
          </div>

          <div class="control is-horizontal">
            <div class="control-label">
              <label for="name" class="label">รายละเอียด</label>
            </div>
            <div class="control is-grouped">
              <p class="control is-expanded">
                <input type="text" name="product_detail" class="input" required>
              </p>
            </div>
          </div>

          <div class="control is-horizontal">
            <div class="control-label">
              <label for="name" class="label">ราคา</label>
            </div>
            <div class="control is-grouped">
              <p class="control is-expanded">
                <input type="text" name="product_price" class="input" required>
              </p>
            </div>
          </div>

          <div class="control is-horizontal">
            <div class="control-label">
              <label for="name" class="label">ประกันสินค้า</label>
            </div>
            <div class="control is-grouped">
              <p class="control is-expanded">
                <input type="text" name="product_warrant" class="input" required>
              </p>
            </div>
          </div>

          <div class="control is-horizontal">
            <div class="control-label">
              <label for="name" class="label">จำนวน</label>
            </div>
            <div class="control is-grouped">
              <p class="control is-expanded">
                <input type="text" name="product_count" class="input" required>
              </p>
            </div>
          </div>

          <div class="control is-horizontal">
            <div class="control-label">
              <label for="name" class="label">รูป</label>
            </div>
            <div class="control is-grouped">
              <p class="control is-expanded">
                <input type="file" name="fileUpload" required>
              </p>
            </div>
          </div>

          <div class="control is-horizontal">
            <div class="control-label">
              <label for="name" class="label">ตั้งเป็นสินค้าแนะนำ</label>
            </div>
            <div class="control is-grouped">
              <p class="control is-expanded">
                <input type="radio" name="isImportant" value="1" style="margin-top: 10px;"> ใช่
                <input type="radio" name="isImportant" value="0" style="margin-top: 10px; margin-left: 10px;"> ไม่ใช่
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
