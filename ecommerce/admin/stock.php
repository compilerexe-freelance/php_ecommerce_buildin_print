<?php
  include('header.php');
  include('process/config.php');

  if (isset($_SESSION['status'])) {
    if ($_SESSION['status'] == 'success') {
      echo '
        <script type="text/javascript">
          swal("แก้ไขสต๊อกสินค้าสำเร็จ", "", "success")
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

      <form action="stock_product.php" method="post">

          <div class="columns" style="margin-top: 20px;">
            <div class="column"></div>
            <div class="column" style="text-align: center;">
              <span class="title is-4"><b>จัดการสต๊อกสินค้า</b></span>
            </div>
            <div class="column"></div>
          </div>

          <div class="columns">
            <div class="column" style="text-align: right;">
              <label for="name" class="label">เลือกหมวดหมู่สินค้า</label>
            </div>
            <div class="column" style="text-align: center;">
              <span class="select">
                <select name="category_name" style="width: 320px;" required>
                  <option selected disabled value="">เลือกหมวดหมู่สินค้า</option>
                  <!-- @foreach ($categorys as $category)
                    <option value="{{ $category->category_name }}">{{ $category->category_name }}</option>
                  @endforeach -->
                  <?php
                    $sql = "SELECT * FROM tb_category";
                    $result = mysqli_query($conn, $sql);

                    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                      echo '
                        <option value="'.$row['category_name'].'">'.$row['category_name'].'</option>
                      ';
                    }
                  ?>
                </select>
              </span>
            </div>
            <div class="column"></div>
          </div>

          <div class="columns">
            <div class="column"></div>
            <div class="column" style="text-align: center;">
              <button type="submit" class="button is-primary is-medium" style="width: 150px;">ถัดไป >></button>
            </div>
            <div class="column"></div>
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
