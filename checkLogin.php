<?php require_once('./connect.php');//ติดต่อฐานข้อมูล

//var_dump($_POST);
//die();

 if ($_POST){
     $user=$_POST['inputUser'];
     $pass=md5($_POST['inputPass']);
     //var_dump($user);die();

     $sql="select * from member where member_user='$user' and member_pass='$pass' LIMIT 1";
     $result =  mysqli_query($con, $sql);
     $num =  mysqli_num_rows($result);
     
     $row = mysqli_fetch_assoc($result);
     //var_dump($row);die();

     if($num==1){
         $_SESSION['username']=$row['member_user'];
         $_SESSION['member_id']=$row['member_id'];
         header(("Location:memberPage.php?id=".$row['member_id']));



     }
     if($row['member_type']=="admin"){

        echo "Admin";
         header(("Location:adminPage.php?id=".$row['member_id']));

     }else{
        echo "index";
        header("location:index.php");
    }
}
?>