<?php
  session_start();
  error_reporting(0);
  $_SESSION['menu'] = 'home';
  include('header.php');
  include('config.php');

  $id = $_GET['id'];
  $category_name = null;
  $sql = "SELECT * FROM tb_category";
  $result = mysqli_query($conn, $sql);
  while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    if ($row['id'] == $id) {
      $category_name = $row['category_name'];
    }
  }

?>

  <div class="tile is-ancestor">

    <?php include('category_menu.php'); ?>

    <div class="tile is-parent">
      <div class="tile is-child box">

        <div class="columns">
          <div class="column" style="text-align: center;">
            <span class="title is-4"><b><?php echo $category_name; ?></b></span>
          </div>
        </div>

        <?php
          $sql = "SELECT * FROM tb_product WHERE category_name = '$category_name'";
          $result = mysqli_query($conn, $sql);
          $count = 1;
          $last_count = mysqli_num_rows($result);

          while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

            $col = $count % 2;
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
                  <img src="public/uploads/'.$row['product_picture'].'" alt="" style="width: 200px; height: 150px; background-color: #abc;"></a><br>
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
            } else {
              echo '
                <div class="column" style="//border: 1px solid red;">
              ';

              if (isset($_SESSION['login']) && $_SESSION['login'] == 'success') {
                echo '<a href="product_detail.php?id='. $row['id'] .'">';
              } else {
                echo '<a href="login.php">';
              }

              echo '
                  <img src="public/uploads/'.$row['product_picture'].'" alt="" style="width: 200px; height: 150px; background-color: #abc;"></a><br>
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
                </div>
              ';
            }

            // echo $col . '<br>';
            $count++;
          } // End while

          if ($col == 1) {
            echo '<div class="column" style="//border: 1px solid red;"></div>
            </div>';
          }
        ?>

      </div>
    </div>
  </div>

<?php include('footer.php'); ?>
