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

$member_id=$row['member_id'];//

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    if ($row['member_type']=='admin') {
        $member_id=$_GET['id'];
     }
}

$sql_member = "select * from member where member_id=$member_id";
$result_member = mysqli_query($con, $sql_member);
$row_member = mysqli_fetch_assoc($result_member);

 ?>

<html>
    <head>
        <meta charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Update</title>
        
        <link rel="stylesheet" href="bootstap/css/bootstrap.min.css">
        <script type="text/javascript" src="jquery-3.1.0.min.js"></script>
        <script type="text/javascript" src="bootstap/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="signin.css">
    </head>
    
    <body>
        <div class="container">
            <form name="form1" method="POST" class="form-signin" action="for_update.php">
                <h2 class="form-signin-heading">อัพเดตข้อมูล</h2>
                <?php 
                if($row['member_type']=="admin"){ 
                ?>
                    <label>Username :</label>
                    <input class="form-control" type="text" name="uName" value="<?php echo $row_member['member_user']?>" disabled/>
                <?php 
                }else{ 
                ?>
                    <input class="form-control" type="text" name="uName" value="<?php echo $row_member['member_user']; ?>" disabled/>
                <?php 
                } 
                ?>
                
                <label>Password :</label>
                <input class="form-control" type="password" name="pWord" pattern="^\S{3,}$" value="" autofocus/>
                
                <label>ชื่อ :</label>
                <input class="form-control" type="text" name="firstName" value="<?php echo $row_member['member_firstname']; ?>" required/>
                
                <label>นามสกุล :</label>
                <input class="form-control" type="text" name="lastName" value="<?php echo $row_member['member_lastname']; ?>" required />
                
                <label>อายุ :</label>
                <input class="form-control" type="text" name="age" id="age" value="<?php echo $row_member['member_age']; ?>"/>
                
                <label>เพศ :</label>
                <p>
                <?php 
                	if ($row_member['member_gender']=="male") {
                ?>
                	<label>
                    <input type="radio"name="gender" value="male" id="gender_0" checked />ชาย
                    </label><br>
                    <label>
                        <input type="radio"name="gender" value="female" id="gender_1"/>หญิง
                    </label>
                <?php
                	}else{
               	?>
					<label>
                    <input type="radio"name="gender" value="male" id="gender_0"/>ชาย
                    </label><br>
                    <label>
                        <input type="radio"name="gender" value="female" id="gender_1" checked />หญิง
                    </label>
               	<?php
                	}
                 ?>

                </p>
                
                <label>เบอร์มือถิอ :</label>
                <input class="form-control" type="text" name="phone"" value="<?php echo $row_member['member_phone']; ?>"/>
                
                <label>E-mail :</label>
                <input class="form-control" type="text" name="mail"" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" value="<?php echo $row_member['member_mail']; ?>"/>
                <br>
                <input class="form-control" type="hidden" name="memberid"" value="<?php echo $row_member['member_id']; ?>"/>
                <button class="btn btn-primary" type="submit" id="btnUpdate">อัพเดต !</button>
                <a href="memberPage.php?id=<?php echo $row_member['member_id']; ?>" class="btn btn-default">กลับหน้าหลัก</a>
                
            </form>
        </div>
    </body>
</html>