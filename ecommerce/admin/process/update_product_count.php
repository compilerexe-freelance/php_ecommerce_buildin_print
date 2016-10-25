<?php
  session_start();
  include('config.php');

  $id = $_POST['id'];
  $product_count = $_POST['product_count'];

  $sql = "UPDATE tb_product SET product_count = '$product_count' WHERE id = $id";

  if ($conn->query($sql) === TRUE) {
    $_SESSION['status'] = 'success';
    header('Location: ../stock.php');
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();

?>
