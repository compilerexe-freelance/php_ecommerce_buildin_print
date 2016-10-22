<?php
  session_start();
  $_SESSION['menu'] = 'home';
  include('header.php');
  include('config.php');

  if (!isset($_SESSION['order_number'])) {
    $random = rand(1000000,9999999);
    $_SESSION['order_number'] = $random;
  }

  $member_id = $_SESSION['member_id'];
  $member_name = null;

  $sql = "SELECT * FROM tb_member WHERE id = $member_id";
  $result = mysqli_query($conn, $sql);
  while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    $member_name = $row['member_name'];
  }

?>

  <div class="tile is-ancestor">

    <?php include('category_menu.php'); ?>

    <div class="tile is-parent">
      <div class="tile is-child box">

        <div class="columns">
          <div class="column" style="text-align: right;">
            <b>เลขที่ใบสั่งซื้อ <span><?php echo $_SESSION['order_number']; ?></span></b><br>
            <b>ชื่อ <span><?php echo $member_name; ?></span></b>
          </div>
        </div>

        <div class="columns" style="text-align: center;">
          <div class="column" style="//border: 1px solid red;">
            <table class="table is-bordered is-striped is-narrow">
              <thead>
                <tr>
                  <th>ลำดับ</th>
                  <th>ชื่อสินค้า</th>
                  <th>หมวดหมู่สินค้า</th>
                  <th>รายละเอียดสินค้า</th>
                  <th>ราคา</th>
                  <th>ประกัน</th>
                </tr>
              </thead>
              <tbody>

                <?php

                  if (!isset($_SESSION['start_array'])) {
                    $_SESSION['start_array'] = null;
                  }

                  $start_array = $_SESSION['start_array'];
                  $no = 1;
                  for ($i = 0; $i < $start_array; $i++) {

                    if ($_SESSION['myproduct'][$i] != null) {
                      $json = json_decode($_SESSION['myproduct'][$i], true);
                      echo '
                      <tr>
                        <td>'.$no.'</td>
                        <td>'.$json['product_name'].'</td>
                        <td>'.$json['category_name'].'</td>
                        <td>'.$json['product_detail'].'</td>
                        <td>'.$json['product_price'].'</td>
                        <td>'.$json['product_warrant'].'</td>
                      </tr>
                      ';
                      $no++;
                    }

                  }

                ?>

                <!-- <tr>
                  <td>1</td>
                  <td>test 1</td>
                  <td>ลำโพง</td>
                  <td>...</td>
                  <td>1000 บาท</td>
                  <td>1 ปี</td>
                  <td><a href="#" class="button is-danger" style="width: 100%;">ลบสินค้า</a></td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>test 2</td>
                  <td>ลำโพง</td>
                  <td>...</td>
                  <td>2000 บาท</td>
                  <td>2 ปี</td>
                  <td><a href="#" class="button is-danger" style="width: 100%;">ลบสินค้า</a></td>
                </tr> -->
              </tbody>
            </table>
            <span style="color: red;">หากท่านไม่มารับสินค้าภายใน 3 วัน ทางร้านจะขอยกเลิกการสั่งซื้อสินค้าครั้งนี้ ขอบคุณค่ะ</span>
          </div>
        </div>

        <div class="columns" style="text-align: center;">
          <div class="column" style="text-align: right;">
            <a href="confirm_order.php" id="link_cancel"><button type="button" id="btn_cancel" class="button is-primary is-medium" style="width: 150px;">ยกเลิก</button></a>
          </div>
          <div class="column" style="text-align: left;">
            <a href="process/insert_order.php" target="_blank" id="print"><button type="button" class="button is-primary is-medium" style="width: 150px;">พิมพ์</button></a>
          </div>
        </div>

      </div>
    </div>

  </div>

  <script>
    $(document).ready(function() {
      $('#print').click(function() {
        $('#btn_cancel').attr('disabled', true);
        $('#btn_cancel').attr('class', 'button is-dark is-medium');
        $('#link_cancel').attr('href', '#');
      });
    });
  </script>

<?php
  include('footer.php');
?>
