<?php
  session_start();
  include('config.php');

  $id = $_GET['id'];

  $sql = "DELETE FROM tb_product WHERE id = $id";

  if ($conn->query($sql) === TRUE) {
    $_SESSION['status'] = 'success';
    header('Location: ../list_delete_product.php');
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();

?>
