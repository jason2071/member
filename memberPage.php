<?php require_once('./connect.php');//ติดต่อฐานข้อมูล 

if($_SESSION['member_id']){

    $sql = "select * from member where member_id ='".$_SESSION['member_id']."' LIMIT 1";
    $result = mysqli_query($con , $sql);
    $row = mysqli_fetch_assoc($result);//MYSQLI_ASSOC,MYSQLI_NUM,MYSQLI_BOLT
    
    $num=mysqli_num_rows($result);

    if($num<1){

        session_destroy();
        echo"No data";
        die();
    }

}else{
    
    session_destroy();//ลบsession กลับหน้า index
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
$num_member=mysqli_num_rows($result_member);

?>
<html>
    <head>
        <meta charset="utf 8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Member Page</title>
        <link rel="stylesheet" href="bootstap/css/bootstrap.min.css">
        <script type="text/javascript" src="jquery-3.1.0.min.js"></script>
        <script type="text/javascript" src="bootstap/js/bootstrap.min.js"></script>
        
    </head>
    <body>
        <?php
            require_once("theme/nav.php");
        ?>        
        <div class="container">
            <div class="jumbotron">
                <h1>Wellcome : <?php echo $row_member['member_firstname']; ?></h1>
            </div>
            <div row>
                <div class="col-xs-12 col-md-9">
                    <table class="table table-hover">
                    <?php 
                        if($row['member_type']=="admin"){
                        
                     ?>
                            <tr>
                                <th>รหัสสมาชิก :</th>
                                <td><?php echo $row_member['member_id']?></td>
                            </tr>
                            <tr>
                                <th>Username :</th>
                                <td><?php echo $row_member['member_user']?></td>
                            </tr>
                            <tr>
                                <th>Password :</th>
                                <td><?php echo $row_member['member_pass']?></td>
                            </tr>
                    <?php 
                        }
                    ?>

                        <tr>
                            <th>ชื่อ-นามสกุล :</th>
                            <td><?php echo $row_member['member_firstname']?>  <?php echo $row_member['member_lastname']?></td>
                        </tr>
                        <tr>
                            <th>อายุ :</th>
                            <td><?php echo $row_member['member_age']?> ปี</td>
                        </tr>
                        <tr>
                            <th>เพศ :</th>
                            
                            <td><?php 
				                if ($row_member['member_gender']=="male"){
                                    echo "ชาย";
				                }elseif ($row_member['member_gender']=="female"){
                                    echo "หญิง";
				                }?>
                            </td>
                        </tr>
                        <tr>
                            <th>เบอร์โทรศัพท์ :</th>
                            <td><?php echo $row_member['member_phone']?></td>
                        </tr>
                        <tr>
                            <th>E-mail :</th>
                            <td><?php echo $row_member['member_mail']?></td>
                        </tr>
                        <tr>
                            <th>GPA :</th>
                            <td><?php echo $row_member['member_gpa']?></td>
                        </tr>

                    </table>
                </div>
                <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
                <?php
                    if($row['member_type']=="admin"){
                 ?>
                    <div>
                        <form method="post" name="form1" action="gpaSave.php">
                            <h3>GPA : </h3>
                            <input class="form-control" name="score">
                            <input type="hidden" name="memberid" value="<?php echo $row_member['member_id']; ?>">
                            <button class="btn btn-danger" type="submit">คำนวณ</button>
                        </form>
                    </div>
                <?php } ?>
                    <br>
                    <div class="list-group">
                        <a class="list-group-item" href="update.php?id=<?php echo $row_member['member_id']?>" >แก้ไข</a>
                    <?php
                    if($row['member_type']=="admin"){
                    ?>
                        <a class="list-group-item" href="adminPage.php" >รายชื่อ</a> 
                    <?php
                    	if($row_member['member_type']!="admin"){
                	?>
                        <a class="list-group-item" href="delete.php?id=<?php echo $row_member['member_id']?>" >ลบ</a> 
                    <?php }} ?>                       
                        <a class="list-group-item" href="logout.php">ออกจากระบบ</a>
                    </div>
                </div>
            </div>
        </div>
        
    </body>
</html>