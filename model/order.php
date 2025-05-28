<?php
   function insert_bill($user, $address, $email, $tel, $order_date, $product_name, $price, $quantity, $total){
        $sql = "INSERT INTO bill(user,address,email,tel,order_date,product_name,price,quantity,total) VALUES('$user','$address', '$email', '$tel', '$order_date','$product_name', '$price', '$quantity', '$total')";
        pdo_execute($sql); //thuc thi sql
    }
?>