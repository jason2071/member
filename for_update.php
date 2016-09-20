<?php require_once('./connect.php');

if(isset($_SESSION['member_id'])){

	$sql = "select * from member where member_id ='".$_SESSION['member_id']."' LIMIT 1";
    $result = mysqli_query($con , $sql);
    $row = mysqli_fetch_assoc($result);



}else{
    session_destroy();
    header("location:index.php");
    exit();
}

$member_id=$row['member_id'];//

//if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    if ($row['member_type']=='admin') {
        $member_id=$_POST['memberid'];
    }
//}

$sql_member = "select * from member where member_id=$member_id";
$result_member = mysqli_query($con, $sql_member);
$row_member = mysqli_fetch_assoc($result_member);


	
	$pass=$_POST['pWord'];
	$fname=$_POST['firstName'];
	$lname=$_POST['lastName'];
	$age=$_POST['age'];
	$gender=$_POST['gender'];
	$phone=$_POST['phone'];
	$mail=$_POST['mail'];


if (empty($pass)) {

		$sql_update="update member set 
				member_firstname='$fname',
				member_lastname='$lname',
				member_age='$age',
				member_gender='$gender',
				member_phone='$phone',
				member_mail='$mail' 
				where member_id = ('$member_id')";

		if($result=  mysqli_query($con, $sql_update)){
            echo"update OK";
            header( "location:memberPage.php?id=$member_id");
            exit();
        }else{
            echo"update error!";
        }

	}else{
		$pass2=md5($pass);
		$sql_update="update member set 
				member_pass='$pass2',
				member_firstname='$fname',
				member_lastname='$lname',
				member_age='$age',
				member_gender='$gender',
				member_phone='$phone',
				member_mail='$mail' 
				where member_id = ('$member_id')";
		if($result=  mysqli_query($con, $sql_update)){
            echo"update OK";
            header( "location:memberPage.php?id=$member_id");
            exit();
        }else{
            echo"update error!";
        }
		
	}