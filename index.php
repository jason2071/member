<?php require_once('./connect.php');//ติดต่อฐานข้อมูล
    //$_SESSION['member_id']="";
    if(isset($_SESSION['member_id'])){

         $sql="select * from member where member_id='".$_SESSION['member_id']."' LIMIT 1";
         $result =  mysqli_query($con, $sql);
         $num = mysqli_num_rows($result);
         $row = mysqli_fetch_assoc($result);//MYSQLI_ASSOC,MYSQLI_NUM,MYSQLI_BOLT

         if($num<1){
            session_destroy();
            header("Refresh:0");
         }

         if($row['member_type']=='admin'){
            header(("Location:adminPage.php?id=".$row['member_id']));
         }else{
            header(("Location:memberPage.php?id=".$row['member_id']));
         }

    }
?>
<html>
    <head>
        <meta charset="utf 8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Index</title>

        <!-- Bootstrap.min.css -->
        <link rel="stylesheet" href="bootstap/css/bootstrap.min.css">

        <!-- jquery-3.1.0.min.js-->
        <script type="text/javascript" src="jquery-3.1.0.min.js"></script>

        <!-- Bootstrap.min.js-->
        <script type="text/javascript" src="bootstap/js/bootstrap.min.js"></script>

        <!-- signin.css -->
        <link rel="stylesheet" href="signin.css">

    </head>
    <body>

        <div class="container" >
            <form name="form1" method="POST" class="form-signin" action="checkLogin.php">

                <h2 class="form-signin-heading jumbotron">Please Login</h2>

                <label for="inputUser" >Username</label>
                <input type="user" name="inputUser" id="inputUser" class="form-control" required autofocus/>

                <label for="inputPass">Password</label>
                <input type="password" name="inputPass" id="inputPass" class="form-control" required autofocus/>
                <br>
                <button class="btn btn-primary btn-lg" type="submit">Sign in !</button>
                <a class="btn btn-lg" href="register.php">สมัครสมาชิก</a>
            </form>            
        </div>
    </body>
</html>
