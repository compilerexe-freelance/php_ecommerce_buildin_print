<?php
  session_start();
  $_SESSION['menu'] = 'contact';
  include('header.php');
  include('config.php');
?>

  <div class="tile is-ancestor">

    <?php include('category_menu.php'); ?>

    <div class="tile is-parent">
      <div class="tile is-child box">

        <div class="columns">
          <div class="column" style="text-align: center;">
            <span class="title is-4"><b>ติดต่อเรา</b></span>
          </div>
        </div>

        <div class="columns" style="text-align: left;">
          <div class="column" style="//border: 1px solid red;//text-align: left;">
            <img src="public/images/icons/placeholder.png" alt="" style="height: 40px; margin-right: 20px;" />
            <label for="" style="font-size: 18px;"><b>17/16 ม.1 ต.ปากแคว อ.เมือง จ.สุโขทัย 64000</b></label>
          </div>
        </div>

        <div class="columns" style="text-align: left;">
          <div class="column" style="//border: 1px solid red;//text-align: left;">
            <img src="public/images/icons/phone-call.png" alt="" style="height: 40px; margin-right: 20px;" />
            <label for="" style="font-size: 18px;"><b>0-5561-4728</b></label>
          </div>
        </div>

        <div class="columns" style="text-align: left;">
          <div class="column" style="//border: 1px solid red;//text-align: left;">
            <img src="public/images/icons/letter.png" alt="" style="height: 40px; margin-right: 20px;" />
            <label for="" style="font-size: 18px;"><b>Bkhifi@hotmail.com</b></label>
          </div>
        </div>

      </div>
    </div>

  </div>

<?php
  include('footer.php');
?>
