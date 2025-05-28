function nhapSo() {
    const gia = document.getElementById("giasp").value;
    if (!/^\d+(\.\d+)?$/.test(gia)) {
        alert("Vui lòng chỉ nhập số cho giá sản phẩm!");
        return false;
    }
    return true;
}
