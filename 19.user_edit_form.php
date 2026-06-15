<html>
    <head><title>修改使用者</title></head>
    <body>
    <?php
    error_reporting(0);
    session_start();
    if (!$_SESSION["id"]) {
        echo "請登入帳號";
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>"; #SEEION保護
    }
    else{   
        $conn=mysqli_connect("120.105.96.90", "immust", "immustimmust", "immust");   #經典conn連結SQL result選取ALL資料
        $result=mysqli_query($conn, "select * from user where id='{$_GET['id']}'"); 
        $row=mysqli_fetch_array($result);
        echo "
        <form method=post action=20.user_edit.php>  
            <input type=hidden name=id value={$row['id']}> 
            帳號：{$row['id']}<br> 
            密碼：<input type=text name=pwd value={$row['pwd']}><p></p>
            <input type=submit value=修改>
        </form>
        "; 
        #16與17和18行儲存要修改的帳號ID送至資料送至20.user_edit.php
    }
    ?>
    </body>
</html>
