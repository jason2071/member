<?php 
require_once('./connect.php');

    $score=0;                            
    if(isset($_POST['score'])){

        $id=$_POST['memberid'];
        var_dump($id);

        $score=$_POST['score'];
        if($score>= 80){
            $a="A";
        }elseif($score >= 70){
            $a="B";
        }elseif($score >= 60){
            $a="C";
        }elseif($score >= 50){
            $a="D";
        }else{  
            $a="F";
        }
        $sql_update = "update member set member_gpa = ('$a') where member_id = ('$id')";
        if($result=  mysqli_query($con, $sql_update)){
            //echo"update OK";
            header( "location:memberPage.php?id=".$id );
            exit();
        }else{
            echo"update error!";
        }
    }
