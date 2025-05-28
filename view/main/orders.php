<div class="orders">
         <h3>THÔNG TIN ĐẶT HÀNG</h3>
            <form action="index.php?quanly=Finish" method="post">
                <?php
                    if (isset($_SESSION['account'])) {
                        $user = $_SESSION['account']['user'];
                        $address = $_SESSION['account']['address'];
                        $email = $_SESSION['account']['email'];
                        $tel = $_SESSION['account']['tel'];
                    }else {
                        $user = "";
                        $address = "";
                        $email = "";
                        $tel = "";
                    }
                    $day = date("d/m/Y");
                ?>
                <div class="form-group">
                    <label for="name">Người đặt hàng</label>
                    <input type="text" name="user" value="<?=$user?>">
                </div>
                <div class="form-group">
                    <label for="address">Địa chỉ</label>
                    <input type="text" name="address" value="<?=$address?>">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" value="<?=$email?>">
                </div>
                <div class="form-group">
                    <label for="phone">Điện thoại</label>
                    <input type="text" name="tel" value="<?=$tel?>">
                </div>
                <div class="form-group">
                    <label for="day">Ngày đặt hàng</label>
                    <input type="text" name="dayy" value="<?=$day?>">
                </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                                <?php
                                    $tong = 0;
                                    $i = 0;
                                    if (isset($_SESSION['order_data']) && !empty($_SESSION['order_data'])) {
                                    foreach ($_SESSION['order_data'] as $cart) {
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
                    <input type="submit" name="finish" value="Finish">
                    <input type="button" onclick="window.location.href='index.php?quanly=Huy_order'" value="Delete All">
            </form>
    </div>
 <div>