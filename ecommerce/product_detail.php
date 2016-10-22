<?php
  session_start();
  $_SESSION['menu'] = 'home';
  include('header.php');
  include('config.php');

  if (!isset($_SESSION['myproduct'])) {
    $_SESSION['start_array'] = 0;
    $_SESSION['myproduct'] = array();
  }

  $id = $_GET['id'];
  $product_name = null;
  $category_name = null;
  $product_detail = null;
  $product_warrant = null;
  $product_price = null;
  $product_count = null;
  $product_picture = null;

  $sql = "SELECT * FROM tb_product WHERE id = $id";
  $result = mysqli_query($conn, $sql);
  while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    $product_name = $row['product_name'];
    $category_name = $row['category_name'];
    $product_detail = $row['product_detail'];
    $product_warrant = $row['product_warrant'];
    $product_price = $row['product_price'];
    $product_count = $row['product_count'];
    $product_picture = $row['product_picture'];
  }
?>

  <div class="tile is-ancestor">

    <?php include('category_menu.php'); ?>

    <div class="tile is-parent">
      <div class="tile is-child box">

        <form id="myform" action="process/product_to_cart.php" method="post">

          <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
          <input type="hidden" name="product_name" value="<?php echo $product_name; ?>">
          <input type="hidden" name="category_name" value="<?php echo $category_name; ?>">
          <input type="hidden" name="product_detail" value="<?php echo $product_detail; ?>">
          <input type="hidden" name="product_warrant" value="<?php echo $product_warrant; ?>">
          <input type="hidden" name="product_price" value="<?php echo $product_price; ?>">

          <div class="columns">
            <div class="column" style="text-align: center;">
              <span class="title is-4"><b>รายละเอียดสินค้า</b></span>
            </div>
          </div>

          <div class="columns" style="text-align: center;">
            <div class="column" style="//border: 1px solid red;">
              <img src="public/uploads/<?php echo $product_picture; ?>" alt="" style="width: 200px; height: 150px; background-color: #abc;">
            </div>
          </div>

          <div class="columns" style="text-align: center;">
            <div class="column" style="text-align: right;">
              <label><b>ชื่อสินค้า</b></label>
            </div>
            <div class="column" style="//border: 1px solid red;">
              <span><?php echo $product_name; ?></span>
            </div>
            <div class="column" style="//border: 1px solid red;">
            </div>
          </div>

          <div class="columns" style="text-align: center;">
            <div class="column" style="text-align: right;">
              <label><b>รายละเอียด</b></label>
            </div>
            <div class="column" style="//border: 1px solid red;">
              <span><?php echo $product_detail; ?></span>
            </div>
            <div class="column" style="//border: 1px solid red;">
            </div>
          </div>

          <div class="columns" style="text-align: center;">
            <div class="column" style="text-align: right;">
              <label><b>ประกันสินค้า</b></label>
            </div>
            <div class="column" style="//border: 1px solid red;">
              <span><?php echo $product_warrant; ?></span>
            </div>
            <div class="column" style="//border: 1px solid red;">
            </div>
          </div>

          <div class="columns" style="text-align: center;">
            <div class="column" style="text-align: right;">
              <label><b>ราคา</b></label>
            </div>
            <div class="column" style="//border: 1px solid red;">
              <span><?php echo $product_price; ?></span>
            </div>
            <div class="column" style="text-align: left;">
              <span>บาท</span>
            </div>
          </div>

          <div class="columns" style="text-align: center;">
            <div class="column" style="text-align: right;">
              <label><b>คงเหลือ</b></label>
            </div>
            <div class="column" style="//border: 1px solid red;">
              <span><?php echo $product_count; ?></span>
            </div>
            <div class="column" style="text-align: left;">
              <span>ชิ้น</span>
            </div>
          </div>

          <div class="columns" style="text-align: center;">
            <div class="column" style="text-align: right;">

            </div>
            <div class="column" style="//border: 1px solid red;">
              <a href="#" onclick="document.getElementById('myform').submit()"><img src="public/images/icons/cart.png" alt="" style="height: 70px;"></a>
              <button type="button" name="button"  class="button is-primary is-medium" style="margin-top: 10px; margin-left: 20px;">ยกเลิก</button>
            </div>
            <div class="column" style="text-align: left;">

            </div>
          </div>

        </form>

      </div>
    </div>
  </div>

<?php
  include('footer.php');
?>
