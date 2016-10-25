<?php
  include('header.php');
  include('process/config.php');
?>

<div class="tile is-ancestor">

  <?php include('menu.php'); ?>

  <div class="tile is-parent">
    <div class="tile is-child box">

      <form action="stock_edit_product.php" method="post">

          <div class="columns" style="margin-top: 20px;">
            <div class="column"></div>
            <div class="column" style="text-align: center;">
              <span class="title is-4"><b>จัดการสต๊อกสินค้า</b></span>
            </div>
            <div class="column"></div>
          </div>

          <div class="columns">
            <div class="column" style="text-align: right;">
              <label for="name" class="label">เลือกสินค้า</label>
            </div>
            <div class="column" style="text-align: center;">
              <span class="select">
                <select name="product_name" style="width: 320px;" required>
                  <option selected disabled value="">เลือกสินค้า</option>
                  <!-- @foreach ($categorys as $category)
                    <option value="{{ $category->category_name }}">{{ $category->category_name }}</option>
                  @endforeach -->
                  <?php
                    $category_name = $_POST['category_name'];
                    $sql = "SELECT * FROM tb_product WHERE category_name = '$category_name'";
                    $result = mysqli_query($conn, $sql);

                    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                      echo '
                        <option value="'.$row['product_name'].'">'.$row['product_name'].'</option>
                      ';
                    }
                  ?>
                </select>
              </span>
            </div>
            <div class="column"></div>
          </div>

          <div class="columns">
            <div class="column" style="text-align: right;">
              <a href="stock.php" class="button is-primary is-medium" style="width: 150px;"><< ย้อนกลับ</a>
            </div>
            <div class="column" style="text-align: left;">
              <button type="submit" class="button is-primary is-medium" style="width: 150px;">ถัดไป >></button>
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
