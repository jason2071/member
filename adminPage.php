<?php require_once('./connect.php');//ติดต่อฐานข้อมูล 

if($_SESSION['member_id']){

    $sql = "select * from member where member_id ='".$_SESSION['member_id']."' LIMIT 1";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_assoc($result);
    $num=mysqli_num_rows($result);

    if($num<1){
        echo"No data";
        die();
    }
}else{
    session_destroy();
    header("location:index.php");
    exit();
}


?>
<html>
    <head>
        <meta charset="utf 8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin Page Form</title>
        <link rel="stylesheet" href="bootstap/css/bootstrap.min.css">
        <script type="text/javascript" src="jquery-3.1.0.min.js"></script>
        <script type="text/javascript" src="bootstap/js/bootstrap.min.js"></script>
        
    </head>
    <body>
        <?php
            require_once("theme/nav.php");
        ?>        

        
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-9">
                <div>
                    <h2>Admin : <?php echo $row['member_firstname']?></h2>
                    
                </div>
                <div>
                    <table class="table table-hover">
                        <tr>
                            <th>รหัสสมาชิก</th>
                            <th>Username</th>
                            <th>ชื่อ-นามสกุล</th>
                            <th>GPA</th>
                            <th>ประเภท</th>
                            <th></th>
                        </tr>

                <?php 
                    $sql_all = "select * from member";
                    $result_all = mysqli_query($con , $sql_all);
                    $myresult=mysqli_query($con,"SELECT * FROM member");
                    while($row_all=mysqli_fetch_array($myresult)){
                ?>
                        <tr>
                            <td><?php echo $row_all['member_id']?></td>
                            <td><?php echo $row_all['member_user']?></td>
                            <td><?php echo $row_all['member_firstname']?>   <?php echo $row_all['member_lastname']?></td>
                            <td><?php echo $row_all['member_gpa']?></td>
                            <td><?php echo $row_all['member_type']?></td>
                            <td><a class="btn btn-info" href="memberPage.php?id=<?php echo $row_all['member_id']; ?>">รายละเอียดเพิ่มเติม</a></td>
                        </tr>
                <?php
                    }
                 ?>

                    </table>
               
                </div>
                </div><!--col-xs-12 col-md-9-->
                
                <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
                    <div class="list-group">

                        <a class="list-group-item" href="adminPage.php">รายชื่อ</a>
                        <a class="list-group-item" href="logout.php">ออกจากระบบ</a>
                    </div>
                </div>
            </div><!--end row-->
        </div>
    </body>
</html>