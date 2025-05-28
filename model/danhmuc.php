<?php

 function insert_danhmuc($tenloai){
   $sql = "INSERT INTO danhmuc(name) VALUES('$tenloai')";
   pdo_execute($sql); //thuc thi sql
 }
 function delete_danhmuc($id){
   $sqlsp = "DELETE FROM sanpham WHERE iddm=".$id;
   pdo_execute($sqlsp); 
   $sql = "DELETE FROM danhmuc WHERE id=".$id;
   pdo_execute($sql); 
 }
 function loadall_danhmuc(){ 
   $sql = "SELECT * FROM danhmuc ORDER BY id desc";
   $listdanhmuc = pdo_query($sql); // load du lieu
   return $listdanhmuc;
 }
 function loadone_danhmuc($id){
   $sql = "SELECT * FROM danhmuc WHERE id=".$id;
   $dm = pdo_query_one($sql);
   return $dm;
 }
function update_danhmuc($id, $tenloai){
   $sql = "UPDATE danhmuc SET name='".$tenloai."' WHERE id=".$id;
   pdo_execute($sql); 
 }
?>