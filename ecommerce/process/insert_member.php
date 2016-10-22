<?php
  session_start();
  include('../config.php');

  $member_name = $_POST['member_name'];
  $member_address = $_POST['member_address'];
  $member_tel = $_POST['member_tel'];
  $member_email = $_POST['member_email'];
  $password = $_POST['password'];
  $password_confirmation = $_POST['password_confirmation'];

  if ($password != $password_confirmation) {
    $_SESSION['error'] = 'fail';
    header('Location: ../register.php');
    exit(0);
  } else {

    $sql = "INSERT INTO tb_member (member_name, member_address, member_tel, member_email, member_password)
    VALUES ('$member_name', '$member_address', '$member_tel', '$member_email', '$password')";

    if ($conn->query($sql) === TRUE) {
      $_SESSION['status'] = 'success';
      header('Location: ../register.php');
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();

  }

?>
