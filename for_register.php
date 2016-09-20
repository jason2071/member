<?php require_once('./connect.php');//ติดต่อฐานข้อมูล

//รับค่าจาก Form register.php
$uName=$_POST['uName'];
$pWord=md5($_POST['password']);
$fName=$_POST['firstName'];
$lName=$_POST['lastName'];
$age=$_POST['age'];
$gender=$_POST['gender'];
$phone=$_POST['phone'];
$mail=$_POST['mail'];

//echo $uName,$pWord,$fName,$lName,$age,$gender,$phone,$mail;

$sql="insert into member(member_user,member_pass,member_firstname,member_lastname,member_age,member_gender,member_phone,member_mail)"
        . "values('$uName','$pWord','$fName','$lName','$age','$gender','$phone','$mail')";
$result=  mysqli_query($con, $sql);
header("Location:index.php");
//echo $sql;