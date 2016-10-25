<?php
  session_start();
  include('config.php');

  $username = $_POST['username'];
  $password = $_POST['password'];
  $check = 0;

  $sql = "SELECT * FROM tb_admin";
  $result = mysqli_query($conn, $sql);

  while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    if ($row['username'] == $username && $row['password'] == $password) {
      $check = 1;
    }
  }

  if ($check == 1) {
    $_SESSION['admin'] = 'success';
    header('Location: ../main.php');
    exit(0);
  } else {
    $_SESSION['error'] = 'fail';
    header('Location: ../login.php');
    exit(0);
  }

?>
