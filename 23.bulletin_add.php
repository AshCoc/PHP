<?php
    error_reporting(0);
    session_start();
    if (!$_SESSION["id"]) {
        echo "please login first";
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>"; #SESSION保護 2.login.html應改改為新版的10.login.html
    }
    else{
        $conn=mysqli_connect("120.105.96.90", "immust", "immustimmust", "immust");
        $sql="insert into bulletin(title, content, type, time)
        values('{$_POST['title']}','{$_POST['content']}', {$_POST['type']},'{$_POST['time']}')";  #從POST接收資料 再放入$sql 新增布告
        if (!mysqli_query($conn, $sql)){
            echo "新增命令錯誤";
        }
        else{
            echo "新增佈告成功，三秒鐘後回到網頁";
            echo "<meta http-equiv=REFRESH content='3, url=11.bulletin.php'>";
        }
    }
?>
