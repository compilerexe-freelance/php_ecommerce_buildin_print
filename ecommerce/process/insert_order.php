<a id="link" href="../print_order.php" target="_blank">TestLink</a>
<?php
  session_start();
  include('../config.php');

  $member_id = $_SESSION['member_id'];
  $member_name = null;

  $sql = "SELECT * FROM tb_member WHERE id = $member_id";
  $result = mysqli_query($conn, $sql);
  while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    $member_name = $row['member_name'];
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
      $created_at = date('Y-m-d');

      $sql = "INSERT INTO tb_order (order_number, member_name, product_name, category_name, product_price, created_at)
      VALUES ('$order_number', '$member_name', '$product_name', '$category_name', '$product_price', '$created_at')";

      if ($conn->query($sql) === TRUE) {


      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }

  }
  
  header('Location: ../print_order.php');
  exit(0);
?>
