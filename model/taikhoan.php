<?php
    function insert_taikhoan($email, $user, $pass){
       $sql = "INSERT INTO taikhoan(email, user, pass) VALUES('$email','$user', '$pass')";
       pdo_execute($sql); //thuc thi sql
    }

    function check_user($user, $pass){
        $sql = "SELECT * FROM taikhoan WHERE user='".$user."' AND pass='".$pass."'";
        $sp = pdo_query_one($sql);
        return $sp;
    }
 
    function check_email($email){
        $sql = "SELECT * FROM taikhoan WHERE email='".$email."'";
        $sp = pdo_query_one($sql);
        return $sp;
    }

    function loadall_taikhoan(){
        $sql = "SELECT * FROM taikhoan ORDER BY id desc";
        $listtaikhoan = pdo_query($sql); 
        return $listtaikhoan;
    }

    function deleteall_taikhoan() {
        $sql = "DELETE FROM taikhoan";
        pdo_execute($sql);
    }
?>