<?php
  session_start();
  include('config.php');

  $product_name = $_POST['product_name'];
  $category_name = $_POST['category_name'];
  $product_detail = $_POST['product_detail'];
  $product_price = $_POST['product_price'];
  $product_warrant = $_POST['product_warrant'];
  $product_count = $_POST['product_count'];
  $product_important = $_POST['isImportant'];

  $target_dir = "../../public/uploads/";
  $name_file = rand(1000000,9999999);
  // $target_file = $target_dir . basename($name_file) . '.jpg';
  $target_file = $target_dir . basename($_FILES["fileUpload"]["name"]);
  $uploadOk = 1;
  $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

  $new_target_file = $target_dir . basename($name_file.'.'.$imageFileType);
  $new_name_file = $name_file.'.'.$imageFileType;
  // Check if image file is a actual image or fake image

  $check = getimagesize($_FILES['fileUpload']["tmp_name"]);
  if($check !== false) {
      echo "File is an image - " . $check["mime"] . ".";
      $uploadOk = 1;
  } else {
      echo "File is not an image.";
      $uploadOk = 0;
  }

  // Check if file already exists
  if (file_exists($target_file)) {
      // echo "Sorry, file already exists.";
      $uploadOk = 0;
  }
  // Check file size
  // if ($_FILES['fileUpload']["size"] > 500000) {
  //     echo "Sorry, your file is too large.";
  //     $uploadOk = 0;
  // }
  // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png") {
      echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
  }
  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
  } else {

      if (move_uploaded_file($_FILES['fileUpload']["tmp_name"], $new_target_file)) {
          // echo "The file ". basename($name_file). " has been uploaded.";
          echo $name_file;
      } else {
          echo "Sorry, there was an error uploading your file.";
      }
  }

  $sql = "INSERT INTO tb_product (product_name, category_name, product_detail, product_price, product_warrant, product_count, product_picture, isImportant)
  VALUES ('$product_name', '$category_name', '$product_detail', '$product_price', '$product_warrant', '$product_count', '$new_name_file', '$product_important')";

  if ($conn->query($sql) === TRUE) {
    $_SESSION['status'] = 'success';
    header('Location: ../form_add_product.php');
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();


?>
