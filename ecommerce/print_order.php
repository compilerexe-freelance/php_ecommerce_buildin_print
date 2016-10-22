<!DOCTYPE html>
<html>
  <head>
    <!-- <link rel="stylesheet" href="public/css/bulma.css" media="screen" title="no title">
    <link rel="stylesheet" href="public/css/font-awesome.min.css" media="screen" title="no title">
    <link rel="stylesheet" href="public/css/sweetalert.css" media="screen" title="no title">
    <script src="public/js/jquery-3.1.1.min.js"></script>
    <script src="public/js/sweetalert.min.js"></script> -->
    <style media="screen">
      table, tr, th {
        border: 1px solid red !important;
      }
    </style>
  </head>

<?php
  session_start();
  include('config.php');
  require('public/mpdf60/mpdf.php');

  $member_id = $_SESSION['member_id'];
  // $member_name = null;
  $total_price = 0;

  $sql = "SELECT * FROM tb_member WHERE id = $member_id";
  $result = mysqli_query($conn, $sql);
  while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    $member_name = $row['member_name'];
    $member_email = $row['member_email'];
    $member_tel = $row['member_tel'];
  }

  if (!isset($_SESSION['start_array'])) {
    $_SESSION['start_array'] = null;
  }

  $start_array = $_SESSION['start_array'];

  for ($i = 0; $i < $start_array; $i++) {

    if ($_SESSION['myproduct'][$i] != null) {
      $json = json_decode($_SESSION['myproduct'][$i], true);

      $order_number = $_SESSION['order_number'];
      $product_name = $json['product_name'];
      $category_name = $json['category_name'];
      $product_price = $json['product_price'];

    }

  } // End for

  $sql = "SELECT * FROM tb_order WHERE order_number = '$order_number'";
  $result = mysqli_query($conn, $sql);
  while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    $created_at = $row['created_at'];
  }

  $html = '

    <body>
      <div class="container">

        <div class="columns" style="margin-top: 10px; text-align: center;">

          <div class="column">
            <img src="public/images/print_logo.png" alt="" style="height: 80px;">
          </div>
        </div>

        <div class="columns" style="margin-top: 10px; text-align: right;">
          <div class="column">
            <b lang="th">เลขที่ใบสั่งซื้อ <span>'.$order_number.'</span></b><br>
            <b>วันที่สั่งสินค้า <span>'.$created_at.'</span></b>
          </div>
        </div>

        <div class="columns" style="margin-top: 10px; text-align: left;">
          <div class="column">
            <b>ชื่อ <span>'.$member_name.'</span></b><br>
            <b>อีเมล <span>'.$member_email.'</span></b><br>
            <b>เบอร์โทร <span>'.$member_tel.'</span></b>
          </div>
        </div><br>

        <div class="columns" style="text-align: center;">
          <div class="column" style="//border: 1px solid red;">
            <table class="table is-bordered is-striped is-narrow" border="1" style="width: 100%;">
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
              ';

              $sql = "SELECT * FROM tb_order WHERE order_number = '$order_number'";
              $result = mysqli_query($conn, $sql);
              $no = 1;
              while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

                $find_product = $row['product_name'];

                $sql2 = "SELECT * FROM tb_product WHERE product_name = '$find_product'";
                $result2 = mysqli_query($conn, $sql2);
                while($row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {

                  $html = $html . '
                    <tr>
                      <td>'.$no.'</td>
                      <td>'.$row2['product_name'].'</td>
                      <td>'.$row2['category_name'].'</td>
                      <td>'.$row2['product_detail'].'</td>
                      <td>'.$row2['product_price'].'</td>
                      <td>'.$row2['product_warrant'].'</td>
                    </tr>
                  ';
                  $total_price = $total_price + intval($row2['product_price']);
                  $no++;

                }

              }

  $html = $html . '
              </tbody>
            </table>
          </div>
        </div>

        <div class="columns">
          <div class="column" style="text-align: left;">
            <span style="color: red;">หากท่านไม่มารับสินค้าภายใน 3 วัน ทางร้านขอยกเลิกการสั่งซื้อสินค้าครั้งนี้ ขอบคุณค่ะ</span>
          </div>
          <div class="column" style="text-align: right;">
            <b>รวมจำนวนชิ้น <span>'.--$no.'</span> ชิ้น</b><br>
            <b>จำนวนเงิน <span>'.$total_price.'</span> บาท</b>
          </div>
        </div>



      </div>
    </body>
  </html>
  ';


  $pdf = new mPDF('tha','A4','0','angsa');
  //$pdf = new mPDF('tha', 'A4','0', 'THSaraban');   //การตั้งค่ากระดาษถ้าต้องการแนวตั้ง ก็ A4 เฉยๆครับ ถ้าต้องการแนวนอนเท่ากับ A4-L
  $pdf->autoScriptToLang = true;
  $pdf->autoLangToFont = true;
  $pdf->SetDisplayMode('fullpage');
  $pdf->WriteHTML($html, 2);
  $pdf->Output();

  $_SESSION['myproduct'] = null;
?>
