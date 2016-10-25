<?php
  session_start();
  include('config.php');

  $id = $_POST['id'];
  $member_name = $_POST['member_name'];
  $member_address = $_POST['member_address'];
  $member_tel = $_POST['member_tel'];
  $member_email = $_POST['member_email'];
  $member_password = $_POST['member_password'];

  $sql = "UPDATE tb_member SET
  member_name = '$member_name',
  member_address = '$member_address',
  member_tel = '$member_tel',
  member_email = '$member_email',
  member_password = '$member_password'

  WHERE id = $id";

  if ($conn->query($sql) === TRUE) {
    $_SESSION['status'] = 'success';
    header('Location: ../form_edit_member.php?id='.$id);
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();

?>
