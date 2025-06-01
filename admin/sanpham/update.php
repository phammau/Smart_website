<!-- kiem tra dieu kien xem mang co ton tai khong -->
<?php
    if (is_array($sanpham)) {
        extract($sanpham);
    }
    $imagepath = "../upload/".$image;
    if (is_file($imagepath)) {
        $img ="<img src='".$imagepath."' height = '50'>";
    }else{
        $img =" no photo";
    }
?>
<div class="row">
  <div class="row frmtitle">
    <h1>CẬP NHẬT LẠI SẢN PHẨM</h1>
  </div>
  <div class="row frmcontent">
    <form action="index.php?act=updatesp" method="post" enctype="multipart/form-data">
      <div class="row mb10">
        Tên danh mục<br>
        <select name="iddm">
            <option value = "0" <?php if ($iddm == 0) echo "selected"; ?>> Tất cả</option>
            <?php
             if (isset($listdanhmuc) && is_array($listdanhmuc)){
                foreach ($listdanhmuc as $danhmuc) {
                  $select = ($iddm == $danhmuc['id']) ? "selected" : "";
                  // if ($iddm == $id) $select = "selected"; else $select = "";              
                  echo "<option value='".$danhmuc['id']."' ".$select." > ".$danhmuc['name']."</option>";
                }
            }
            ?>
        </select>
      </div>
      <div class="row mb10">
        Tên sản phẩm<br>
        <input type="text" name="tensp" value= "<?=$name?>">
      </div>
      <div class="row mb10">
        Gía sản phẩm<br>
        <input type="text" name="giasp" value= "<?=$price?>">
      </div>
      <div class="row mb10">
        Ảnh sản phẩm<br>
        <input type="file" name="anhsp" id="">
        <?=$img?>
      </div>
      <div class="row mb10">
        Mô tả sản phẩm<br>
        <textarea name="description" rows="10" cols="30"><?=$description?></textarea>
      </div>
      <div class="row mb10">
        <input type="hidden" name="id" value="<?=$id?>">
        <input type="submit" name="capnhat" value="CẬP NHẬT">
        <a href="index.php?act=listsp"><input type="button" value="DANH SÁCH"></a>
      </div>
      <?php
        if (isset($thongbao) && ($thongbao != "")) echo $thongbao;
      ?>
    </form>
  </div>
</div>