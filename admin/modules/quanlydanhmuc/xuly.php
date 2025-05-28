<?php
include("../../config/config.php");

$tendanhmuc = $_POST['tendanhmuc'];
$thutu = $_POST['thutu'];
 echo "Dữ liệu nhận được:<br>";
    echo "Tên danh mục: " . htmlspecialchars($tendanhmuc) . "<br>";
    echo "Thứ tự: " . htmlspecialchars($thutu) . "<br>";

if(isset($_POST['themdanhmuc'])){
    $sql_them = "INSERT INTO table_danhmuc(tendanhmuc, thutu) VALUES ('$tendanhmuc', '$thutu')";
    mysqli_query($mysqli, $sql_them);
    header("Location: ../../index.php?action=quanlydanhmucsanpham");
}
?>
