<div class="container">
    <h3>DANH SÁCH LOẠI HÀNG</h3>
    <table>
        <thead>
            <tr>
                <th>MÃ LOẠI</th>
                <th>TÊN LOẠI</th>
                <th>HÀNH ĐỘNG</th>
            </tr>
        </thead>
        <tbody>
            <!-- Dòng dữ liệu -->
             <?php
                foreach ($listdanhmuc as $danhmuc) {
                    extract($danhmuc);
                    $suadm = "index.php?act=suadm&id=".$id;
                    $xoadm = "index.php?act=xoadm&id=".$id;
                    echo '<tr>
                            <td>'.$id.'</td>
                            <td>'.$name.'</td>
                            <td>
                                <a href="'.$suadm.'"><button class="edit">Sửa</button></a>
                                <a href="'.$xoadm.'"><button class="delete">Xóa</button>
                            </td>
                        </tr>';
                }
             ?>
        </tbody>
    </table>
    <div class="actions">
        <a href="index.php?act=adddm"><button>Nhập thêm</button>
    </div>
</div>

