<div class="container">
<div class="listCart">
    <h1>Products</h1>
    <table>
        <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>

                <?php
                    $tong = 0;
                    $i = 0;
            
                    if (isset($_SESSION['mycart']) && !empty($_SESSION['mycart'])) {
                    foreach ($_SESSION['mycart'] as $cart) {
                        $hinh = $img_path.$cart[1];
                         $thanhtien = $cart[5];
                        $tong+=$thanhtien;
                        $xoasp ='<a href="index.php?quanly=deletecart&idcart='.$i.'"><input type="button" value="delete"></a>';

                        echo'<tr>
                                <td><img src="'.$hinh.'" alt="" height="60px"></td>
                                <td>'.$cart[2].'</td>
                                <td>'.$cart[3].'</td>
                                <td>'.$cart[4].'</td>
                                <td>'.$thanhtien.'</td>
                                <td>'.$xoasp.'</td>
                            </tr>';
                        $i+=1;
                    }
                        echo'<tr>
                                <td colspan="4">Total Orders</td>
                                <td>'.$tong.'</td>
                            </tr>';
                }else {
                        echo '<tr><td colspan="6">Chưa có sản phẩm nào trong giỏ hàng.</td></tr>';
                }
                ?> 
        </tbody>
    </table>

    <div class="total-section">
        <form action="index.php?quanly=Placeorder" method="POST">
            <input type="submit" name="place_order" value="Place Order">
            <a href="index.php?quanly=deletecart"><input type="button" value="Delete Order"></a>
        </form>
    </div>
</div>
</div>