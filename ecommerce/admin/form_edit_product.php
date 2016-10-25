<?php
  // session_start();
  include('header.php');
  include('process/config.php');
  $id = $_GET['id'];
  $product_name = null;
  $category_name = null;
  $product_detail = null;
  $product_price = null;
  $product_warrant = null;
  $product_count = null;
  $isImportant = 0;

  $sql = "SELECT * FROM tb_product WHERE id = $id";
  $result = mysqli_query($conn, $sql);

  while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    $product_name = $row['product_name'];
    $category_name = $row['category_name'];
    $product_detail = $row['product_detail'];
    $product_price = $row['product_price'];
    $product_warrant = $row['product_warrant'];
    $product_count = $row['product_count'];
    $isImportant = $row['isImportant'];
  }

  mysqli_free_result($result);

  if (isset($_SESSION['status'])) {
    if ($_SESSION['status'] == 'success') {
      echo '
        <script type="text/javascript">
          swal("แก้ไขสินค้าสำเร็จ", "", "success")
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
        <form action="process/update_product.php" method="post" enctype="multipart/form-data">

          <input type="hidden" name="id" value="<?php echo $id; ?>">

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
                <span class="title is-4"><b>แก้ไขสินค้า</b></span>
              </p>
            </div>
          </div>

          <div class="control is-horizontal">
            <div class="control-label">
              <label for="name" class="label">ชื่อสินค้า</label>
            </div>
            <div class="control is-grouped">
              <p class="control is-expanded">
                <input type="text" class="input" name="product_name" value="<?php echo $product_name; ?>" required>
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
                    <option disabled value="">เลือกหมวดหมู่สินค้า</option>
                    <?php

                      $sql = "SELECT * FROM tb_category";
                      $result = mysqli_query($conn, $sql);

                      while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                        if ($row['category_name'] == $category_name) {
                          echo '<option value="'. $row['category_name'] .'" selected>'. $row['category_name'] .'</option>';
                        } else {
                          echo '<option value="'. $row['category_name'] .'">'. $row['category_name'] .'</option>';
                        }
                      }

                      $conn->close();

                    ?>
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
                <input type="text" name="product_detail" class="input" value="<?php echo $product_detail; ?>" required>
              </p>
            </div>
          </div>

          <div class="control is-horizontal">
            <div class="control-label">
              <label for="name" class="label">ราคา</label>
            </div>
            <div class="control is-grouped">
              <p class="control is-expanded">
                <input type="text" name="product_price" class="input" value="<?php echo $product_price; ?>" required>
              </p>
            </div>
          </div>

          <div class="control is-horizontal">
            <div class="control-label">
              <label for="name" class="label">ประกันสินค้า</label>
            </div>
            <div class="control is-grouped">
              <p class="control is-expanded">
                <input type="text" name="product_warrant" class="input" value="<?php echo $product_warrant; ?>" required>
              </p>
            </div>
          </div>

          <div class="control is-horizontal">
            <div class="control-label">
              <label for="name" class="label">จำนวน</label>
            </div>
            <div class="control is-grouped">
              <p class="control is-expanded">
                <input type="text" name="product_count" class="input" value="<?php echo $product_count; ?>" required>
              </p>
            </div>
          </div>

          <div class="control is-horizontal">
            <div class="control-label">
              <label for="name" class="label">รูป</label>
            </div>
            <div class="control is-grouped">
              <p class="control is-expanded">
                <input type="file" name="fileUpload">
              </p>
            </div>
          </div>

          <div class="control is-horizontal">
            <div class="control-label">
              <label for="name" class="label">ตั้งเป็นสินค้าแนะนำ</label>
            </div>
            <div class="control is-grouped">
              <p class="control is-expanded">
                <?php
                  if ($isImportant == 1) {
                    echo '
                      <input type="radio" name="isImportant" value="1" style="margin-top: 10px;" checked> ใช่
                      <input type="radio" name="isImportant" value="0" style="margin-top: 10px; margin-left: 10px;"> ไม่ใช่
                    ';
                  } else {
                    echo '
                      <input type="radio" name="isImportant" value="1" style="margin-top: 10px;"> ใช่
                      <input type="radio" name="isImportant" value="0" style="margin-top: 10px; margin-left: 10px;"checked> ไม่ใช่
                    ';
                  }
                ?>
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

<?php include('footer.php');
