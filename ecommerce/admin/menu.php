<div class="tile is-3 is-vertical is-parent">

  <div class="tile is-child box" style="text-align: center;">
    <a href="main.php" class="button is-info is-medium" style="width: 100%; margin-bottom: 10px;">หน้าแรก</a>
    <button id="btn_product" class="button is-info is-medium" style="width: 100%; margin-bottom: 10px;">สินค้า</button>
    <div id="list_product">
      <ul style="text-align: left;">
        <li><a href="form_add_product.php" class="button is-link" style="text-decoration: none;">- จัดการสินค้า</a></li>
        <li><a href="form_add_category.php" class="button is-link" style="text-decoration: none;">- จัดการหมวดหมู่สินค้า</a></li>
        <li><a href="#" class="button is-link" style="text-decoration: none;">- จัดการสต๊อกสินค้า</a></li>
      </ul>
    </div><br>
    <a href="#" class="button is-info is-medium" style="width: 100%; margin-bottom: 10px;">ข้อมูลลูกค้า</a>
    <a href="#" class="button is-info is-medium" style="width: 100%; margin-bottom: 10px;">รายงานการสั่งซื้อ</a>
  </div>

</div>

<script type="text/javascript">

  $(document).ready(function() {

    $('#list_product').hide();

    $('#btn_product').click(function() {
      $('#list_product').fadeIn();
    });

  });

</script>
