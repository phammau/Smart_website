<?php
    include("../model/pdo.php");
    include("header.php");
    include("../model/danhmuc.php");
    include("../model/sanpham.php");
    include("../model/taikhoan.php");
    include("../model/thongke.php");
    include("../model/home_admin.php");

    //controler
    if(isset($_GET["act"])){
        $act = $_GET["act"];
        switch ($act) {
            // danh muc
            case 'adddm':
                //kiem tra xem nguoi dung có click vao nut add khong
                if (isset($_POST['themmoi']) && ($_POST['themmoi'])){
                    $tenloai = $_POST['tenloai'];
                    insert_danhmuc($tenloai);
                    $thongbao = "them thanh cong";
                }
                include("danhmuc/add.php");
                break;

             case 'listdm':
                $listdanhmuc = loadall_danhmuc();
                include("danhmuc/list.php");
                break;

            case 'xoadm':
                if (isset($_GET['id']) && ($_GET['id']) > 0) {
                    delete_danhmuc($_GET['id']);
                }
                //cap nhat lai danh sach
                $listdanhmuc = loadall_danhmuc(); // load du lieu
                include("danhmuc/list.php");
                break;

            case 'suadm':
                //lay theo duong dan
                if(isset($_GET['id']) && ($_GET['id']) > 0){
                    $dm = loadone_danhmuc($_GET['id']);
                }
                include("danhmuc/update.php");
                break;

            case 'updatedm':
                if (isset($_POST['capnhat']) && ($_POST['capnhat'])){
                    $tenloai = $_POST['tenloai'];
                    $id = $_POST['id'];
                    update_danhmuc($id, $tenloai);
                    $thongbao = "Update thanh cong";
                }
                $listdanhmuc = loadall_danhmuc(); 
                include("danhmuc/list.php");
                break;

            // san pham
            case 'addsp':
                //kiem tra xem nguoi dung co click vao nut add khong
                if (isset($_POST['themmoi']) && ($_POST['themmoi'])){
                    $tensp = $_POST['tensp'];
                    $giasp = $_POST['giasp'];
                    $description = $_POST['description'];
                    $filename = $_FILES['anhsp']['name'];//lay theo ten anh
                    $iddm = $_POST['iddm'];

                    $target_dir = "../upload/";
                    $target_file = $target_dir . basename($_FILES["anhsp"]["name"]);
                    if (move_uploaded_file($_FILES["anhsp"]["tmp_name"], $target_file)) {
                        $anhsp = $_FILES['anhsp']['name'];
                    } else {
                        $anhsp = "";
                    }
                    //xử lý chỉ cho nhập số
                    if (!is_numeric($giasp)) {
                        echo "<script>alert('Giá sản phẩm phải là số!');
                            window.location.href = 'index.php?act=addsp';
                        </script>";
                    }else{
                        insert_sanpham($tensp, $giasp, $anhsp, $description, $iddm);
                        $thongbao = "them thanh cong";
                    }
                }
                $listdanhmuc = loadall_danhmuc();
                include("sanpham/add.php");
                break;

            case 'listsp':
                if (isset($_POST['listok']) && ($_POST['listok'])){
                    $kyw = $_POST['kyw'];
                    $iddm = $_POST['iddm'];
                }else{
                    $kyw = '';
                    $iddm = 0;
                }
                $listdanhmuc = loadall_danhmuc();
                $listsanpham = loadall_sanpham($kyw,$iddm);
                include("sanpham/list.php");
                break;

            case 'xoasp':
                if (isset($_GET['id']) && ($_GET['id']) > 0) {
                    delete_sanpham($_GET['id']);
                }
                //cap nhat lai danh sach
                $listsanpham = loadall_sanpham("", 0); // load du lieu
                include("sanpham/list.php");
                break;
                
            case 'suasp':
                //lay theo duong dan
                if(isset($_GET['id']) && ($_GET['id']) > 0){
                    $sanpham = loadone_sanpham($_GET['id']);
                }
                $listdanhmuc = loadall_danhmuc();
                include("sanpham/update.php");
                break;

            case 'updatesp':
                if (isset($_POST['capnhat']) && ($_POST['capnhat'])){
                    $tensp = $_POST['tensp'];
                    $giasp = $_POST['giasp'];
                    $description = $_POST['description'];
                    $filename = $_FILES['anhsp']['name'];//lay theo ten anh
                    $iddm = $_POST['iddm'];
                    $id = $_POST['id'];
                     
                    //xu ly anh 
                    $target_dir = "../upload/";
                    $target_file = $target_dir . basename($_FILES["anhsp"]["name"]);
                    if (move_uploaded_file($_FILES["anhsp"]["tmp_name"], $target_file)) {
                        $anhsp = $_FILES['anhsp']['name'];
                    } else {
                        $anhsp = "";
                    }
       
                    //xử lý chỉ cho nhập số
                    if (!is_numeric($giasp)) {
                        echo "<script>alert('Giá sản phẩm phải là số!');
                            window.location.href = 'index.php?act=addsp';
                        </script>";
                    }else{
                        update_sanpham($id, $iddm, $tensp, $giasp, $anhsp, $description);
                        $thongbao = "Update thanh cong";
                    }                   
                }
                $listdanhmuc = loadall_danhmuc();
                $listsanpham = loadall_sanpham("", 0); 
                include("sanpham/list.php");
                break;

            case 'dskh':
                $listtaikhoan = loadall_taikhoan(); 
                include("taikhoan/list.php");
                break;

            case 'xoadskh':
                deleteall_taikhoan();
                $listtaikhoan = loadall_taikhoan(); 
                include("taikhoan/list.php");
                break;

            case 'exitaddmin':
                header("Location: ../index.php"); // Chuyển hướng về trang chủ
                exit;
                break;

            case 'thongke':
                $listthongke = loadall_thongke();
                include("taikhoan/thongke.php");
                break;

            case 'xoadsthongke':
                deleteall_thongke();
                $listthongke = loadall_thongke(); 
                include("taikhoan/thongke.php");
                break;

            case 'Xuat_file':
                //Lấy dữ liệu từ bảng home_admin
                $data = loadall_home_admin();
                
                //Header để tải về file Excel (chỉ bảng)
                header("Content-Type: application/vnd.ms-excel; charset=utf-8");
                header("Content-Disposition: attachment; filename=thongke_home_admin.xls");
                header("Pragma: no-cache");
                header("Expires: 0");

                // In bảng HTML (chỉ phần table)
                echo '
                    <table border="1">
                        <thead>
                            <tr>
                                <th>SỐ ĐƠN HÀNG TRONG NGÀY</th>
                                <th>DOANH THU TRONG NGÀY</th>
                                <th>TỔNG SỐ SẢN PHẨM</th>
                                <th>NGÀY</th>
                            </tr>
                        </thead>
                        <tbody>';

                foreach ($data as $row) {
                    echo '<tr>
                            <td>' . $row['sodon'] . '</td>
                            <td>' . number_format($row['doanhthu'], 0, ',', '.') . '</td>
                            <td>' . $row['tongsosp'] . '</td>
                            <td>' . $row['ngay'] . '</td>
                          </tr>';
                }
            
                echo '</tbody></table>';
                exit;
                break;

            case 'trangchu':
                include("home_admin.php");
                break;

            default:
                include("home_admin.php");
                break;
        }
    }else{
        include("home_admin.php");
    }
    include("footer.php");
?>