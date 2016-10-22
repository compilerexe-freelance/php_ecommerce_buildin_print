<div class="tile is-3 is-vertical is-parent">
  <div class="tile is-child">
    <div class="box" style="height: 100%;">
      <p><span class="title is-5"><b>หมวดหมู่สินค้า</b></span></p>
      <hr size="1">
      <!-- <a href="#"><p style="margin-bottom: 10px;"><span class="title is-5">ลำโพง</span></p></a>
      <a href="#"><p style="margin-bottom: 10px;"><span class="title is-5">เพาเวอร์แอมป์</span></p></a>
      <a href="#"><p style="margin-bottom: 10px;"><span class="title is-5">ปรีแอมป์</span></p></a>
      <a href="#"><p style="margin-bottom: 10px;"><span class="title is-5">เบส</span></p></a>
      <a href="#"><p style="margin-bottom: 10px;"><span class="title is-5">อุปกรณ์ต่อพ่วง</span></p></a>
      <a href="#"><p><span class="title is-5">วิทยุ</span></p></a> -->

      <?php
        $sql = "SELECT * FROM tb_category";
        $result = mysqli_query($conn, $sql);

        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
          echo '
            <a href="category_detail.php?id='. $row['id'] .'"><p style="margin-bottom: 10px;"><span class="title is-5">'. $row['category_name'] .'</span></p></a>
          ';
        }
        mysqli_free_result($result);
      ?>

    </div>
  </div>
</div>
