<?php
  session_start();
  include('config.php');

  $id = $_POST['id'];
  $category_name = $_POST['category_name'];

  $sql = "UPDATE tb_category SET category_name = '$category_name' WHERE id = $id";

  if ($conn->query($sql) === TRUE) {
    $_SESSION['status'] = 'success';
    header('Location: ../list_category.php');
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();

?>
