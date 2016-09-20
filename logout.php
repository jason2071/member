<?php 
require_once('./connect.php');//ติดต่อฐานข้อมูล

session_destroy();
header("location:index.php");
exit();


 ?>