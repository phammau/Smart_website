<div class="row">
  <div class="row frmtitle">
    <h1>THÊM MỘT SỐ SẢN PHẨM</h1>
  </div>
  <div class="row frmcontent">
    <!-- enctype="multipart/form-data" lấy hinh -->
    <form action="index.php?act=addsp" method="post" enctype="multipart/form-data">
      <div class="row mb10">
        Tên danh mục<br>
        <select name="iddm">
          <?php
            foreach ($listdanhmuc as $danhmuc) {
              extract($danhmuc);
              echo "<option value='" . $id . "'>" . $name . "</option>";
            }
          ?>
        </select> 
      </div>
      <div class="row mb10">
        Tên sản phẩm<br>
        <input type="text" name="tensp">
      </div>
      <div class="row mb10">
        Gía sản phẩm<br>
        <input type="text" name="giasp">
      </div>
      <div class="row mb10">
        Ảnh sản phẩm<br>
        <input type="file" name="anhsp">
      </div>
      <div class="row mb10">
        Mô tả sản phẩm<br>
        <textarea name="description" id="" rows="10" cols="30"></textarea>
      </div>
      
      <div class="row mb10">
        <input type="submit" name="themmoi" value="THÊM MỚI">
        <a href="index.php?act=listsp"><input type="button" value="DANH SÁCH"></a>
      </div>
      <?php
        if (isset($thongbao) && ($thongbao != "")) echo $thongbao;
      ?>
    </form>
  </div>
</div>
