<?php
    function insert_home_admin($sodon, $doanhthu, $tongsosp, $ngay){
        $sql = "INSERT INTO home_admin(sodon,doanhthu,tongsosp,ngay) VALUES('$sodon','$doanhthu', '$tongsosp', '$ngay')";
        pdo_execute($sql); //thuc thi sql
    }

    function loadall_home_admin(){
        $sql = "SELECT * FROM home_admin";
        $list_home_admin = pdo_query($sql); 
        return $list_home_admin;
    }

    function deleteall_home_admin() {
        $sql = "DELETE FROM home_admin";
        pdo_execute($sql);
    }

?>