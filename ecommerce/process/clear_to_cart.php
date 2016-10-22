<?php
  session_start();
  $_SESSION['myproduct'] = null;

  header('Location: ../confirm_order.php');
  exit(0);
?>
