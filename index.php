<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Trang chủ</title>
    <link rel="icon" href="upload/logo.png" type="image/x-icon" />
    <link rel="stylesheet"  href="css\style.css" />
    <link rel="stylesheet"  href="css\style.productitem.css"/>
    <link rel="stylesheet"  href="css\dangky.css"/>
    <link rel="stylesheet"  href="css\cartview.css"/>
    <link rel="stylesheet"  href="css\orders.css"/>
     <link rel="stylesheet"  href="css\introduce.css"/>
</head>
</head>

<body>
    
    <?php   
        session_start();
        include("model/pdo.php");
        include("model/sanpham.php");
        include("model/danhmuc.php");
        include("view/header.php");
        include("view/slider.php");
        include("global.php");
        include("model/taikhoan.php");
        include("model/order.php");

        $newsp = loadall_sanpham_home();
        $dsdm = loadall_danhmuc();
        if(!isset($_SESSION['mycart'])) $_SESSION['mycart'] = [];

        if ((isset($_GET['quanly'])) && ($_GET['quanly']) !="") {
            $tam = $_GET['quanly'];
            switch ($tam) {
                case "addtocart":
                    if ((isset($_POST['addtocart'])) && ($_POST['addtocart'])) {
                        $id = $_POST['id'];
                        $image = $_POST['image'];
                        $name = $_POST['name'];
                        $price = $_POST['price'];
                        $soluong = 1;

                        $found = false;
                        foreach ($_SESSION['mycart'] as &$item) {
                            if ($item[0] == $id) {  // So sánh id sản phẩm
                                $item[4] += $soluong;  // Tăng số lượng
                                $item[5] = $item[4] * $item[3]; // Cập nhật thành tiền (số lượng * giá)
                                $found = true;
                                break;
                            }
                        }
                    
                        if (!$found) {
                            $tongtien = $price * $soluong;
                            $spadd = [$id, $image, $name, $price, $soluong, $tongtien];
                            $_SESSION['mycart'][] = $spadd;
                        }
                    }
                    include("view/main/viewCart.php");
                    break;
                    
                case "deletecart":
                    if (isset($_GET['idcart'])){
                        array_splice($_SESSION['mycart'],$_GET['idcart'],1);
                    }else {
                       $_SESSION['mycart'] = [];
                    }
                    header('Location: '.$_SERVER['HTTP_REFERER']);//load lai trang
                    break;

                case "Signup":
                    if ((isset($_POST['Signup'])) && ($_POST['Signup']) !="") {
                        $email = $_POST['email'];
                        $pass = $_POST['pass'];
                        $user = $_POST['user'];
                        insert_taikhoan($email, $user, $pass);
                        echo "<script>alert('Đã đăng ký thành công');</script>";
                    }
                    include("view/taikhoan/dangky.php");
                    break;
                
                case "Signin":
                if ((isset($_POST['Signin'])) && ($_POST['Signin']) !="") {
                    $pass = $_POST['pass'];
                    $user = $_POST['user'];
                    $checkUser = check_user($user, $pass);

                    if (is_array($checkUser)) {
                        $_SESSION['account'] =$checkUser;
                        // Kiểm tra role
                        if ($checkUser['role'] == 1) {
                            // Nếu là admin thì chuyển vào admin
                            echo "<script>alert('Đã đăng nhập vào trang Admin'); window.location.href='admin/index.php';</script>";
                        } else {
                            // Người dùng thường
                            echo "<script>alert('Đăng nhập thành công'); window.location.href='index.php';</script>";
                        }
                    }else {
                        echo "<script>alert('Tài khoản không tồn tại. Vui lòng kiểm tra lại!');</script>";
                    }
                }
                    include("view/taikhoan/dangnhap.php");
                    break;

                case "ForgotPassword":
                    if ((isset($_POST['guiemail'])) && ($_POST['guiemail']) !="") {
                        $email = $_POST['email'];
                        $checkemail = check_email($email);
                        if (is_array($checkemail)) {
                            echo "<script>alert('Mật khẩu của bạn là: ".$checkemail['pass']."');</script>";
                        }else {
                            echo "<script>alert('Email không tồn tại. Vui lòng kiểm tra lại!');</script>";
                        }
                    }
                    include("view/taikhoan/quenmatkhau.php");
                    break;

                case "Finish":
                    if ((isset($_POST['finish'])) && ($_POST['finish']) !="") {
                        $user = $_POST['user'];
                        $address = $_POST['address'];
                        $email = $_POST['email'];
                        $tel = $_POST['tel'];
                        $order_date = date("Y-m-d");
                        
                        if (isset($_SESSION['order_data']) && !empty($_SESSION['order_data'])) {
                            foreach ($_SESSION['order_data'] as $item) {
                                $product_name = $item[2];
                                $price = $item[3];
                                $quantity = $item[4];
                                $total = $item[5];
                                insert_bill($user, $address, $email, $tel, $order_date, $product_name, $price, $quantity, $total);
                            }
                            echo "<script>alert('Đặt hàng thành công!'); window.location.href='index.php';</script>";
                            unset($_SESSION['order_data']);
                            exit();
                        }else {
                            echo "<script>alert('Không có dữ liệu đặt hàng.'); window.location.href='index.php';</script>";
                            exit();
                        }
                    }
                    break;
                
                case "Huy_order":
                    unset($_SESSION['order_data']);
                    echo "<script>alert('Đã xóa toàn bộ sản phẩm trong giỏ hàng!'); window.location='index.php';</script>";
                    break;
                
                case "Orders":
                    include("view/main/orders.php");
                    break;

                case "Placeorder":
                    if (isset($_SESSION['mycart']) && !empty($_SESSION['mycart'])) {
                        $_SESSION['order_data'] = $_SESSION['mycart'];
                        unset($_SESSION['mycart']); // Xóa giỏ hàng để trở về trạng thái rỗng
                        header('Location: index.php?quanly=Orders'); 
                        exit(); // Dừng chương trình sau khi chuyển hướng
                    } else {
                        echo "<script>alert('Giỏ hàng trống! Vui lòng thêm sản phẩm trước khi đặt hàng.');</script>";
                        echo "<script>window.location.href='index.php?quanly=addtocart';</script>";
                        exit();
                    }
                    break;

                case "Introduce":
                    include("view/main/introduce.php");
                    break;

                case "sanpham":
                    if(isset($_POST['kyw']) && ($_POST['kyw'] != "")){
                        $kyw = $_POST['kyw'];
                    }else {
                        $kyw = "";
                    }
                    if(isset($_GET['iddm']) && ($_GET['iddm'] > 0)){
                        $iddm = $_GET['iddm'];
                    }else {
                        $iddm = 0;
                    }
                    $dssp =  loadall_sanpham($kyw,$iddm);
                    $tendm = load_ten_dm($iddm);
                    include("view/sanpham.php");              
                    break;

                case "sanphamct":
                    if(isset($_GET['idsp']) && ($_GET['idsp'] > 0)){
                        $id = $_GET['idsp'];
                        $onesp =  loadone_sanpham($id);
                        include("view/sanphamct.php");
                    }else{
                        include("view/home.php");
                    }                
                    break;
                default:
                    include("view/home.php");
                    break;
                }
            }else {
                include("view/home.php");
            }
        include("view/footer.php");
    ?>
</body>

</html>