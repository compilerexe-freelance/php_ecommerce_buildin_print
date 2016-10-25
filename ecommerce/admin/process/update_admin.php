<?php
  session_start();
  include('config.php');

  $username = $_POST['username'];
  $password = $_POST['password'];

  $sql = "UPDATE tb_admin SET
  username = '$username',
  password = '$password'

  WHERE id = 1";

  if ($conn->query($sql) === TRUE) {
    $_SESSION['status'] = 'success';
    header('Location: ../info_admin.php');
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();

?>
