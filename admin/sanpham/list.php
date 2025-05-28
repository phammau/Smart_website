<div class="container">
    <h3>DANH SÁCH SẢN PHẨM</h3>
    <form action="index.php?act=listsp" method ="post">
        <input type="text" name="kyw">
        <select name="iddm">
            <option value="0" selected> Tất cả</option>
            <?php
             if (isset($listdanhmuc) && is_array($listdanhmuc)){
                 foreach ($listdanhmuc as $danhmuc) {
                    extract($danhmuc);
                    echo "<option value='".$id."'> ".$name."</option>";
                }
            }
            ?>
        </select>
        <input type="submit" name="listok" value="Go">
    </form>
    <table>
        <thead>
            <tr>
                <th>MÃ LOẠI</th>
                <th>TÊN SẢN PHẨM</th>
                <th>GIÁ</th>
                <th>HÌNH ẢNH</th>
                <th>MÔ TẢ</th>
                <th>HÀNH ĐỘNG</th>
            </tr>
        </thead>
        <tbody>
            <!-- Dòng dữ liệu -->
             <?php
                foreach ($listsanpham as $sanpham) {
                    extract($sanpham);
                    $suasp = "index.php?act=suasp&id=".$id;
                    $xoasp = "index.php?act=xoasp&id=".$id;
                    
                    $imagepath = "../upload/".$image;
                    if (is_file($imagepath)) {
                        $imgtag ="<img src='".$imagepath."' height = '50'>";
                    }else{
                        $imgtag =" no photo";
                    }
                    echo' <tr>
                            <td>'.$iddm.'</td>
                            <td>'.$name.'</td>
                            <td>'.$price.'</td>
                            <td>'.$imgtag.'</td>
                            <td>'.$description.'</td>
                           
                            <td>
                                <a href="'.$suasp.'"><button class="edit">Sửa</button></a>
                                <a href="'.$xoasp.'"><button class="delete">Xóa</button></a>
                            </td>
                         </tr>';
                }
             ?>
        </tbody>
    </table>
    <div class="actions">
        <a href="index.php?act=addsp"><button>Nhập thêm</button>
    </div>
</div>

