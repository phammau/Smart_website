<?php
     function loadall_thongke(){
        $sql = "SELECT * FROM bill ORDER BY id desc";
        $listbill = pdo_query($sql); 
        return $listbill;
    }

    function deleteall_thongke() {
        $sql = "DELETE FROM bill";
        pdo_execute($sql);
    }

    function get_thongke() {
        $sql = "SELECT * FROM bill";
        return  pdo_query($sql);
    }
?>