<?php
  session_start();

  $product_name = $_POST['product_name'];
  $category_name = $_POST['category_name'];
  $product_detail = $_POST['product_detail'];
  $product_warrant = $_POST['product_warrant'];
  $product_price = $_POST['product_price'];

  $id = $_SESSION['start_array'];

  echo $id.'<br>';

  if ($id == 0) {
    $_SESSION['myproduct'][$id] = '{
      "product_name":"'.$product_name.'",
      "category_name":"'.$category_name.'",
      "product_detail":"'.$product_detail.'",
      "product_price":"'.$product_price.'",
      "product_warrant":"'.$product_warrant.'"
    }';
    $id++;
    $_SESSION['start_array'] = $id;
  } else {
    $_SESSION['myproduct'][$id] = '{
      "product_name":"'.$product_name.'",
      "category_name":"'.$category_name.'",
      "product_detail":"'.$product_detail.'",
      "product_price":"'.$product_price.'",
      "product_warrant":"'.$product_warrant.'"
    }';
    $id++;
    $_SESSION['start_array'] = $id;
  }

  $_SESSION['product_to_cart'] = 'success';
  header('Location: ../index.php');
  exit(0);

?>
