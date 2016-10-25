<?php
  // session_start();
  include('header.php');
  include('process/config.php');

  if (isset($_SESSION['status'])) {
    if ($_SESSION['status'] == 'success') {
      echo '
        <script type="text/javascript">
          swal("ลบสมาชิกสำเร็จ", "", "success")
        </script>
      ';
      $_SESSION['status'] = null;
    }
  }

  $strEndDate = date('Y-m-d');
  $sql = "SELECT * FROM tb_order";
  $result = mysqli_query($conn, $sql);

  while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    $strStartDate = $row['created_at'];
    $intTotalDay = ((strtotime($strEndDate) - strtotime($strStartDate))/  ( 60 * 60 * 24 )) + 1;
    $intTotalDay--;

    if ($intTotalDay >= 3) {
      $id_expired = $row['id'];
      $order_number = $row['order_number'];
      $sql2 = "DELETE FROM tb_order WHERE order_number = '$order_number'";
      $result2 = mysqli_query($conn, $sql2);
    }
  }

  mysqli_free_result($result);
?>

<div class="tile is-ancestor">

    <?php include('menu.php'); ?>

    <div class="tile is-parent">
      <div class="tile is-child box">
        <form action="#" method="post">

          <div class="columns" style="text-align: left;">
            <div class="column">
              <a href="list_order.php" class="button is-light"><b><span class="icon"><i class="fa fa-bars"></i></span> รายการสั่งซื้อ</b></a>
              <!-- <a href="list_product.php" class="button is-light"><b><span class="icon"><i class="fa fa-pencil"></i></span> แก้ไขข้อมูลสมาชิก</b></a> -->
              <!-- <a href="list_delete_product.php" class="button is-light"><b><span class="icon"><i class="fa fa-minus-circle"></i></span> ลบสมาชิก</b></a> -->
              <!-- <hr> -->
            </div>
          </div>

          <div class="columns" style="text-align: center;">
            <div class="column">
              <span class="title is-4"><b>รายการสั่งซื้อ</b></span>
            </div>
          </div>

          <div class="columns" style="text-align: center;">
            <div class="column">
              <table class="table is-bordered is-striped is-narrow">
                <thead>
                  <tr>
                    <th>ลำดับที่</th>
                    <th>เลขที่สั่งซื้อ</th>
                    <th>ชื่อ</th>
                    <th>วันที่</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $sql = "SELECT * FROM tb_order GROUP BY order_number";
                    $result = mysqli_query($conn, $sql);

                    $count = 1;
                    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                      echo '
                        <tr>
                          <td>'. $count .'</td>
                          <td><a href="view_order.php?order_number='.$row['order_number'].'">'. $row['order_number'] .'</a></td>
                          <td>'. $row['member_name'] .'</td>
                          <td>'. $row['created_at'] .'</td>
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

<?php include('footer.php'); ?>
