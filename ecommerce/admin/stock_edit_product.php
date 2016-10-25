<?php
  include('header.php');
  include('process/config.php');

  $id = null;
  $product_name = $_POST['product_name'];

  $category_name = null;
  $product_detail = null;
  $product_price = null;
  $product_warrant = null;
  $product_count = null;

  $sql = "SELECT * FROM tb_product WHERE product_name = '$product_name'";
  $result = mysqli_query($conn, $sql);

  while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    $id = $row['id'];
    $category_name = $row['category_name'];
    $product_detail = $row['product_detail'];
    $product_price = $row['product_price'];
    $product_warrant = $row['product_warrant'];
    $product_count = $row['product_count'];
  }
?>

<div class="tile is-ancestor">

  <?php include('menu.php'); ?>

  <div class="tile is-parent">
    <div class="tile is-child box">

      <form action="process/update_product_count.php" method="post">

        <input type="hidden" name="id" value="<?php echo $id; ?>">

          <div class="columns">
            <div class="column" style="text-align: center;">
              <span class="title is-4"><b>จัดการสต๊อกสินค้า</b></span>
            </div>
          </div>

          <div class="columns">
            <div class="column" style="text-align: right;">
              <label for="name" class="label">ชื่อ</label>
            </div>
            <div class="column" style="text-align: left;">
              <span><?php echo $product_name; ?></span>
              <input type="hidden" name="product_name" value="{{ $product->product_name }}">
            </div>
            <div class="column"></div>
          </div>

          <div class="columns">
            <div class="column" style="text-align: right;">
              <label for="name" class="label">หมวดหมู่</label>
            </div>
            <div class="column" style="text-align: left;">
              <span><?php echo $category_name; ?></span>
            </div>
            <div class="column"></div>
          </div>

          <div class="columns">
            <div class="column" style="text-align: right;">
              <label for="name" class="label">รายละเอียด</label>
            </div>
            <div class="column" style="text-align: left;">
              <span><?php echo $product_detail; ?></span>
            </div>
            <div class="column"></div>
          </div>

          <div class="columns">
            <div class="column" style="text-align: right;">
              <label for="name" class="label">ราคา</label>
            </div>
            <div class="column" style="text-align: left;">
              <span><?php echo $product_price; ?></span>
            </div>
            <div class="column"></div>
          </div>

          <div class="columns">
            <div class="column" style="text-align: right;">
              <label for="name" class="label">ประกันสินค้า</label>
            </div>
            <div class="column" style="text-align: left;">
              <span><?php echo $product_warrant; ?></span>
            </div>
            <div class="column"></div>
          </div>

          <div class="columns">
            <div class="column" style="text-align: right;">
              <label for="name" class="label">จำนวน</label>
            </div>
            <div class="column" style="text-align: left;">
              <span><?php echo $product_count; ?></span>
            </div>
            <div class="column"></div>
          </div>

          <div class="columns">
            <div class="column" style="text-align: right;">
              <label for="name" class="label">คงเหลือ จำนวน</label>
            </div>
            <div class="column" style="text-align: left;">
              <input type="text" name="product_count" class="input">
            </div>
            <div class="column"></div>
          </div>

          <div class="columns">
            <div class="column" style="text-align: right;">
              <a href="stock.php" class="button is-primary is-medium" style="width: 150px;">ยกเลิก</a>
            </div>
            <div class="column" style="text-align: left;">
              <button type="submit" class="button is-primary is-medium" style="width: 150px;">บันทึก</button>
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
