<?php
include "lowwaf.php";
header("Content-type:text/html;charset=utf-8");
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = 'awdadmin';
$conn = mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){
    die("连接失败：".mysqli_connect_error());
}
//echo "连接成功"
?>
