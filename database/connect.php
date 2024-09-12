<?php
 $host = 'localhost';
 $database = 'baitapphp';
 $username = 'root';
 $password = '';
 $drive = 'mysql';

 $option = [
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
 ];

 // Dùng dấu chấm phẩy thay vì dấu phẩy giữa các thông số
 $dsn = $drive . ":dbname=" . $database . ";host=" . $host . ";port=4444";

 try {
    $conn = new PDO($dsn, $username, $password, $option);
 } catch(Exception $exception) {
    echo $exception->getMessage();
 }
?>
