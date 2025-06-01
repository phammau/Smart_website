<div class="container">
    <div class="thongke">
    <h3>TỔNG QUAN BÁN HÀNG</h3>
    <table>
        <thead>
            <tr>
                <th>SỐ ĐƠN HÀNG TRONG NGÀY </th>
                <th>DOANH THU TRONG NGÀY</th>
                <th>TỔNG SỐ SẢN PHẨM TRONG NGÀY</th>
                <th>NGÀY</th>
            </tr>
        </thead>
        <tbody>
             <?php
                $daily = [];
                $listthongke = get_thongke();
                //Gom dữ liệu theo ngày
                foreach ($listthongke as $thongke) {
                    extract($thongke);
                    if (!isset($daily[$order_date])) {
                    $daily[$order_date] = [
                        'count' => 0,
                        'totalRevenue' => 0,
                        'totalQuantity' => 0
                    ];
                }
                $daily[$order_date]['count'] += 1;
                $daily[$order_date]['totalRevenue'] += $total;
                $daily[$order_date]['totalQuantity'] += $quantity;
            }
                foreach ($daily as $date => $stats) {
                    echo '
                        <tr>
                            <td>' . $stats['count'] . '</td>
                            <td>' . number_format($stats['totalRevenue']) . ' VNĐ</td>
                            <td>' . $stats['totalQuantity'] . '</td>
                            <td>' . $date . '</td>
                        </tr>';

                    insert_home_admin(
                        $stats['count'],
                        $stats['totalRevenue'],
                        $stats['totalQuantity'],
                        $date
                    );
                }
            ?>
        </tbody>
    </table>
    <a href="index.php?act=Xuat_file"><button type="button">XUẤT FILE EXCEL</button></a>
    </div>
</div>