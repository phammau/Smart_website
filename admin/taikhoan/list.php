<div class="container">
    <div class="thongke">
    <h3>DANH SÁCH TÀI KHOẢN</h3>
    <table>
        <thead>
            <tr>
                <th>MÃ TK</th>
                <th>USER NAME</th>
                <th>PASSWORD</th>
                <th>EMAIL</th>
                <th>ADDRESS</th>
                <th>PHONE NUMBER</th>
                <th>ROLE</th>
            </tr>
        </thead>
        <tbody>
            <!-- Dòng dữ liệu -->
             <?php
                foreach ($listtaikhoan as $taikhoan) {
                    extract($taikhoan);
                    echo' 
                        <tr>
                            <td>'.$id.'</td>
                            <td>'.$user.'</td>
                            <td>'.$pass.'</td>
                            <td>'.$email.'</td>
                            <td>'.$address.'</td>
                            <td>'.$tel.'</td>
                            <td>'.$role.'</td>
                         </tr>';
                }
             ?>
        </tbody>
    </table>
    <div class="actions">
        <a href="index.php?act=xoadskh"><button>Xóa tất cả</button>
    </div>
     </div>
</div>

