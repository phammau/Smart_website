<div class="container">
    <div class="thongke">
        <h3>DANH SÁCH THỐNG KÊ ĐƠN HÀNG</h3>
        <table>
            <thead>
                <tr>
                    <th>MÃ TK</th>
                    <th>USER NAME</th>
                    <th>ADDRESS</th>
                    <th>EMAIL</th>
                    <th>TEL</th>
                    <th>ORDER_DATE</th>
                    <th>PRODUCT_NAME</th>
                    <th>PRICE</th>
                    <th>QUANTITY</th>
                    <th>TOTAL</th>
                </tr>
            </thead>
            <tbody>
                <!-- Dòng dữ liệu -->
                 <?php
                    foreach ($listthongke as $item) {
                        extract($item);
                        echo' 
                            <tr>
                                <td>'.$id.'</td>
                                <td>'.$user.'</td>
                                <td>'.$address.'</td>
                                <td>'.$email.'</td>
                                <td>'.$tel.'</td>
                                <td>'.$order_date.'</td>
                                <td>'.$product_name.'</td>
                                <td>'.$price.'</td>
                                <td>'.$quantity.'</td>
                                <td>'.$total.'</td>
                             </tr>';
                    }
                 ?>
            </tbody>
        </table>
        <div class="actions">
            <a href="index.php?act=xoadsthongke"><button>Xóa tất cả</button>
        </div>
    </div>
</div>

