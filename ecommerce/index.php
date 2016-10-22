<?php
  session_start();
  $_SESSION['menu'] = 'home';
  include('header.php');
  include('config.php');

  if (isset($_SESSION['product_to_cart'])) {
    if ($_SESSION['product_to_cart'] == 'success') {
      echo '
        <script type="text/javascript">
          swal("หยิบใส่ตะกร้าเรียบร้อยแล้ว", "", "success")
        </script>
      ';
      $_SESSION['product_to_cart'] = null;
    }
  }

?>

  <div class="tile is-ancestor">

    <?php include('category_menu.php'); ?>

    <div class="tile is-parent">
      <div class="tile is-child box">

        <div class="columns">
          <div class="column" style="text-align: center;">
            <span class="title is-4"><b>สินค้าแนะนำ</b></span>
          </div>
        </div>

        <?php
          $localhost  = 'localhost';
          $db_user    = 'root';
          $db_pass    = '';
          $db_name    = 'ecommerce';

          // Create connection
          $conn = new mysqli($localhost, $db_user, $db_pass, $db_name);
          // Check connection
          if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
          }

          $conn->query("SET NAMES utf8");
          $sql = "SELECT * FROM tb_product";
          $result = mysqli_query($conn, $sql);
          $count = 1;
          $last_count = mysqli_num_rows($result);
          // $last_count = mysqli_num_rows($result);

          while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $col = $count % 3;
            if ($col == 1) {
              echo '
              <div class="columns" style="text-align: center;">
                <div class="column" style="//border: 1px solid red;">
              ';

              if (isset($_SESSION['login']) && $_SESSION['login'] == 'success') {
                echo '<a href="product_detail.php?id='. $row['id'] .'">';
              } else {
                echo '<a href="login.php">';
              }

              echo '
                  <img src="public/uploads/'. $row['product_picture'] .'" alt="" style="width: 200px; height: 150px; background-color: #abc;"></a><br>
                  ชื่อสินค้า <span>'.$row['product_name'].'</span><br>
                  ราคา <span>'.$row['product_price'].'</span>  บาท<br>
                  คงเหลือ <span>'.$row['product_count'].'</span> ชิ้น<br>
              ';

              if (isset($_SESSION['login']) && $_SESSION['login'] == 'success') {
                echo '<a href="product_detail.php?id='. $row['id'] .'"><img src="public/images/icons/cart.png" alt="" style="height: 50px;"></a>';
              } else {
                echo '<a href="login.php"><img src="public/images/icons/cart.png" alt="" style="height: 50px;"></a>';
              }

              echo '
                </div>
              ';
              } else if ($col == 2) {
                echo '
                  <div class="column" style="//border: 1px solid red;">
                ';

                if (isset($_SESSION['login']) && $_SESSION['login'] == 'success') {
                  echo '<a href="product_detail.php?id='. $row['id'] .'">';
                } else {
                  echo '<a href="login.php">';
                }

                echo'
                    <img src="public/uploads/'. $row['product_picture'] .'" alt="" style="width: 200px; height: 150px; background-color: #abc;"></a><br>
                    ชื่อสินค้า <span>'.$row['product_name'].'</span><br>
                    ราคา <span>'.$row['product_price'].'</span>  บาท<br>
                    คงเหลือ <span>'.$row['product_count'].'</span> ชิ้น<br>
                ';

                if (isset($_SESSION['login']) && $_SESSION['login'] == 'success') {
                  echo '<a href="product_detail.php?id='. $row['id'] .'"><img src="public/images/icons/cart.png" alt="" style="height: 50px;"></a>';
                } else {
                  echo '<a href="login.php"><img src="public/images/icons/cart.png" alt="" style="height: 50px;"></a>';
                }

                echo '
                  </div>
                ';
              } else if ($col == 0){
                echo '
                  <div class="column" style="//border: 1px solid red;">
                ';

                if (isset($_SESSION['login']) && $_SESSION['login'] == 'success') {
                  echo '<a href="product_detail.php?id='. $row['id'] .'">';
                } else {
                  echo '<a href="login.php">';
                }

                echo '
                    <img src="public/uploads/'. $row['product_picture'] .'" alt="" style="width: 200px; height: 150px; background-color: #abc;"></a><br>
                    ชื่อสินค้า <span>'.$row['product_name'].'</span><br>
                    ราคา <span>'.$row['product_price'].'</span>  บาท<br>
                    คงเหลือ <span>'.$row['product_count'].'</span> ชิ้น<br>
                ';

                if (isset($_SESSION['login']) && $_SESSION['login'] == 'success') {
                  echo '<a href="product_detail.php?id='. $row['id'] .'"><img src="public/images/icons/cart.png" alt="" style="height: 50px;"></a>';
                } else {
                  echo '<a href="login.php"><img src="public/images/icons/cart.png" alt="" style="height: 50px;"></a>';
                }

                echo '
                  </div>
                </div>';
              }

              if ($count == $last_count) {
                // echo $col;
                if ($col == 1) {
                  echo '
                  <div class="column" style="//border: 1px solid red;"></div>
                  <div class="column" style="//border: 1px solid red;"></div>
                  </div>
                  ';
                } else if ($col == 2){
                  echo '
                  <div class="column" style="//border: 1px solid red;"></div>
                  </div>
                  ';
                }
              }

              // echo $col . '<br>';
              $count++;
            }

            // if ($total == 1) {
            //   echo '
            //   <div class="column" style="//border: 1px solid red;"></div>
            //   <div class="column" style="//border: 1px solid red;"></div>
            //   </div>
            //   ';
            // } else if ($total == 2) {
            //   echo '
            //   <div class="column" style="//border: 1px solid red;"></div>
            //   </div>
            //   ';
            // }
          ?>

          <!-- <div class="column" style="//border: 1px solid red;"></div>
          <div class="column" style="//border: 1px solid red;"></div>
          </div> -->

    </div>
  </div>

<?php
  include('footer.php');
?>
