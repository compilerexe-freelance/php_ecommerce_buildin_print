<?php
  session_start();
  include('config.php');

  $category_name = $_POST['category_name'];

  $sql = "INSERT INTO tb_category (category_name) VALUES ('$category_name')";

  if ($conn->query($sql) === TRUE) {
    $_SESSION['status'] = 'success';
    header('Location: ../form_add_category.php');
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();

?>
