<?php
  session_start();
  include('../config.php');

  $email = $_POST['email'];
  $password = $_POST['password'];
  $check = 0;

  $sql = "SELECT * FROM tb_member";
  $result = mysqli_query($conn, $sql);

  while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    if ($row['member_email'] == $email && $row['member_password'] == $password) {
      $_SESSION['member_id'] = $row['id'];
      $check = 1;
    }
  }

  if ($check == 1) {
    $_SESSION['login'] = 'success';
    header('Location: ../index.php');
    exit(0);
  } else {
    $_SESSION['error'] = 'fail';
    header('Location: ../login.php');
    exit(0);
  }

?>
