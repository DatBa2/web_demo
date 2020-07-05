<?php
    $connect = new mysqli('localhost','root','','login');

    if ($connect->connect_errno){
        echo "Lỗi kết nối MYSQL: ".$connect->connect_error;
        exit();
    }
?>