<!-- kiem tra dieu kien xem mang co ton tai khong -->
<?php
    if (is_array($dm)) {
        extract($dm);
    }
?>
<div class="row">
  <div class="row frmtitle">
    <h1>CẬP NHẬT LẠI HÀNG HÓA</h1>
  </div>
  <div class="row frmcontent">
    <form action="index.php?act=updatedm" method="post">
      <div class="row mb10">
        Mã loại<br>
        <input type="text" name="maloai" disabled>
      </div>
      <div class="row mb10">
        Tên loại<br>
        <input type="text" name="tenloai" value="<?php if (isset($name) !="") echo $name; ?>">
      </div>
      <div class="row mb10">
        <!-- luu lại id trên 1 cai input hidden -->
        <input type="hidden" name="id" value="<?php if (isset($id) > 0) echo $id; ?>">
        <input type="submit" name="capnhat" value="CẬP NHẬT">
        <input type="reset" value="NHẬP LẠI">
        <a href="index.php?act=listdm"><input type="button" value="DANH SÁCH"></a>
      </div>
      <?php
        if (isset($thongbao) && ($thongbao != "")) echo $thongbao;
      ?>
    </form>
  </div>
</div>