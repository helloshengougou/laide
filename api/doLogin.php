<?php
    include("../inc/dbconn.php");
    
    $user = $_GET["user"];
    $pw = $_GET["pw"];

    $sql = "select * from user where user='$user'";
    // $sql = "select * from user where name=asd";

    $result = $conn->query($sql);

    if ($result->num_rows > 0){
        $row = mysqli_fetch_assoc($result);
        if ($pw == $row['password']){
            // 登录成功
            $data["code"] = 0;
            $data["user"]=$row;
        }else{
            //密码错误 
            $data["code"] = 2;
        }
    }else{
        // 用户名不存在
        $data["code"] = 1;
    }
    echo json_encode($data);
?>