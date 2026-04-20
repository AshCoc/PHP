<?php
    error_reporting(0);
    session_start();          #session檢查
    if (!$_SESSION["id"]) {
        echo "請先登入";
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";  #跳轉回2.login.html
    }
    else{
        echo "歡迎, ".$_SESSION["id"]."[<a href=12.logout.php>登出</a>] [<a href=18.user.php>管理使用者</a>] [<a href=22.bulletin_add_form.php>新增佈告</a>]<br>"; //連結布告欄資料
        $conn=mysqli_connect("120.105.96.90", "immust", "immustimmust", "immust"); //連結帳號資料
        $result=mysqli_query($conn, "select * from bulletin"); //SELECT * FROM 布告欄
        echo "<table border=2><tr><td></td><td>佈告編號</td><td>佈告類別</td><td>標題</td><td>佈告內容</td><td>發佈時間</td></tr>"; //設定表格
        while ($row=mysqli_fetch_array($result)){
            echo "<tr><td><a href=26.bulletin_edit_form.php?bid={$row["bid"]}>修改</a>  
            <a href=28.bulletin_delete.php?bid={$row["bid"]}>刪除</a></td><td>"; //修改與刪除
            echo $row["bid"];
            echo "</td><td>";
            echo $row["type"];
            echo "</td><td>"; 
            echo $row["title"];
            echo "</td><td>";
            echo $row["content"]; 
            echo "</td><td>";
            echo $row["time"];
            echo "</td></tr>";
        }
        echo "</table>";
    
    }

?>