<?php

function insert_sanpham($tensp, $giasp, $anhsp, $description,$iddm){
   $sql = "INSERT INTO sanpham(name,price,image,description,iddm) VALUES('$tensp','$giasp', '$anhsp', '$description', '$iddm')";
   pdo_execute($sql); //thuc thi sql
}

function delete_sanpham($id){
   $sql = "DELETE FROM sanpham WHERE id=".$id;
   pdo_execute($sql); 
}

function loadall_sanpham($kyw,$iddm){
   $sql = "SELECT * FROM sanpham WHERE 1";
   if ($kyw !="") {
     $sql.=" and name like '%".$kyw."%'";
   }
   if ($iddm > 0) {
     $sql.=" and iddm ='".$iddm."'";
   }
   $sql.=" order by id desc";
   $listsanpham = pdo_query($sql); // load du lieu
   return $listsanpham;
}
function loadall_sanpham_home(){
   $sql = "SELECT * FROM sanpham WHERE 1 ORDER BY id desc limit 0,12";
   $listsanpham = pdo_query($sql); // load du lieu
   return $listsanpham;
}
function loadone_sanpham($id){
   $sql = "SELECT * FROM sanpham WHERE id=".$id;
   $dm = pdo_query_one($sql);
   return $dm;
}

function load_ten_dm($iddm){
  if($iddm > 0){
     $sql = "SELECT * FROM danhmuc WHERE id=".$iddm;
     $dm = pdo_query_one($sql);
     extract($dm);
     return $name;
  }else {
     return "";
  }
}
function update_sanpham($id, $iddm, $tensp, $giasp, $anhsp, $description){
   if ($anhsp != "") {
      $sql = "UPDATE sanpham SET iddm='".$iddm."', name='".$tensp."', price='".$giasp."', image='".$anhsp."', description='".$description."' WHERE id=".$id;
   }else{
      $sql = "UPDATE sanpham SET iddm='".$iddm."', name='".$tensp."', price='".$giasp."', description='".$description."' WHERE id=".$id;
   }
   pdo_execute($sql); 
 }
?>