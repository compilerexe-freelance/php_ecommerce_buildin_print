<?php
  session_start();

  $id = $_GET['id'];

  $start_array = $_SESSION['start_array'];
  for ($i = 0; $i < $start_array; $i++) {
    // $json = json_decode($_SESSION['myproduct'][$i], true);
    if ($i == $id) {
      $_SESSION['myproduct'][$i] = null;
      header('Location: ../confirm_order.php');
      exit(0);
    }
  }

?>
