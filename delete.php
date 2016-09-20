<?php require_once('./connect.php');


if ($_SESSION['member_id']){

	$sql = "select * from member where member_id ='".$_SESSION['member_id']."' LIMIT 1";
    $result = mysqli_query($con , $sql);
    $row = mysqli_fetch_assoc($result);

}else{
    session_destroy();
    header("location:index.php");
    exit();
}

//$member_id=$row['member_id'];//

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    if ($row['member_type']=='admin') {
        $member_id=$_GET['id'];

        // sql to delete a record
		$sql = "DELETE FROM member WHERE member_id=$member_id";

		if ($con->query($sql) === TRUE) {
		    echo "Record deleted successfully";
		    header("location:adminPage.php");
		} else {
		    echo "Error deleting record: " . $con->error;
		}

		$con->close();


    }else{
    	echo "Error";
    	die();
    }
}




 ?>