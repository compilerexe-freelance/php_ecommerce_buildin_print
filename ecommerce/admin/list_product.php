<?php
  include('header.php');
  include('process/config.php');
?>

<div class="tile is-ancestor">

    <?php include('menu.php'); ?>

    <div class="tile is-parent">
      <div class="tile is-child box">
        <form action="{{ url('admin/category/add') }}" method="post">

          <div class="columns" style="text-align: left;">
            <div class="column">
              <a href="form_add_product.php" class="button is-light"><b><span class="icon"><i class="fa fa-plus"></i></span> เพิ่มสินค้า</b></a>
              <a href="list_product.php" class="button is-light"><b><span class="icon"><i class="fa fa-pencil"></i></span> แก้ไขสินค้า</b></a>
              <a href="list_delete_product.php" class="button is-light"><b><span class="icon"><i class="fa fa-minus-circle"></i></span> ลบสินค้า</b></a>
              <hr>
            </div>
          </div>

          <div class="columns" style="text-align: center;">
            <div class="column">
              <span class="title is-4"><b>แก้ไขสินค้า</b></span>
            </div>
          </div>

          <div class="columns" style="text-align: center;">
            <div class="column">
              <table class="table is-bordered is-striped is-narrow">
                <thead>
                  <tr>
                    <th>ลำดับที่</th>
                    <th>ชื่อสินค้า</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $sql = "SELECT * FROM tb_product";
                    $result = mysqli_query($conn, $sql);

                    $count = 1;
                    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                      echo '
                        <tr>
                          <td>'. $count .'</td>
                          <td>'. $row['product_name'] .'</td>
                          <td><a href="form_edit_product.php?id='. $row['id'] .'" class="button is-primary" style="width: 100%;">แก้ไข</a></td>
                        </tr>
                      ';
                      $count++;
                    }

                    mysqli_free_result($result);
                    mysqli_close($conn);
                  ?>
                </tbody>
              </table>
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
