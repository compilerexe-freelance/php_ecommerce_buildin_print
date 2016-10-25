<?php
  // session_start();
  include('header.php');
  include('process/config.php');

  if (isset($_SESSION['status'])) {
    if ($_SESSION['status'] == 'success') {
      echo '
        <script type="text/javascript">
          swal("ลบสมาชิกสำเร็จ", "", "success")
        </script>
      ';
      $_SESSION['status'] = null;
    }
  }
?>

<div class="tile is-ancestor">

    <?php include('menu.php'); ?>

    <div class="tile is-parent">
      <div class="tile is-child box">
        <form action="{{ url('admin/category/add') }}" method="post">

          <div class="columns" style="text-align: left;">
            <div class="column">
              <a href="list_member.php" class="button is-light"><b><span class="icon"><i class="fa fa-bars"></i></span> รายชื่อสมาชิก</b></a>
              <!-- <a href="list_product.php" class="button is-light"><b><span class="icon"><i class="fa fa-pencil"></i></span> แก้ไขข้อมูลสมาชิก</b></a> -->
              <!-- <a href="list_delete_product.php" class="button is-light"><b><span class="icon"><i class="fa fa-minus-circle"></i></span> ลบสมาชิก</b></a> -->
              <hr>
            </div>
          </div>

          <div class="columns" style="text-align: center;">
            <div class="column">
              <span class="title is-4"><b>ข้อมูลสมาชิก</b></span>
            </div>
          </div>

          <div class="columns" style="text-align: center;">
            <div class="column">
              <table class="table is-bordered is-striped is-narrow">
                <thead>
                  <tr>
                    <th>ลำดับที่</th>
                    <th>ชื่อ</th>
                    <th>ที่อยู่</th>
                    <th>เบอร์</th>
                    <th>อีเมล</th>
                    <th></th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $sql = "SELECT * FROM tb_member";
                    $result = mysqli_query($conn, $sql);

                    $count = 1;
                    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                      echo '
                        <tr>
                          <td>'. $count .'</td>
                          <td>'. $row['member_name'] .'</td>
                          <td>'. $row['member_address'] .'</td>
                          <td>'. $row['member_tel'] .'</td>
                          <td>'. $row['member_email'] .'</td>
                          <td><a href="form_edit_member.php?id='.$row['id'].'" style="width: 100%;"><span><i class="fa fa-pencil"></i> แก้ไข</span></a></td>
                          <td><a href="process/delete_member.php?id='.$row['id'].'" style="width: 100%;"><span><i class="fa fa-minus-circle"></i> ลบ</span></a></td>
                        </tr>
                      ';
                      $count++;
                    }

                    mysqli_free_result($result);
                    mysqli_close($conn);
                  ?>
                </tbody>
              </table>
            </div>
          </div>

        </form>

      </div>
    </div>
  </div>

<?php include('footer.php'); ?>
