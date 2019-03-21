<?php
//使用会话内存储的变量值之前必须先开启会话
session_start();

require_once 'connectvars.php';



//使用一个会话变量检查登录状态
if(!isset($_SESSION['user_id'])){
    // echo 'You are Logged as '.$_SESSION['user_id'].'<br/>';
    //点击“Log Out”,则转到logOut页面进行注销
    // echo '<a href="logOut.php"> Log Out('.$_SESSION['user_id'].')</a>';
    $home_url = './index.php';
    header('Location:'.$home_url);
} else {
    $conn = new mysqli($servername, $username, $password, $dbname);
    // 检测连接
    if ($conn->connect_error) {
        die("连接失败: " . $conn->connect_error);
    } 
    mysqli_query($conn, 'set names utf8');
    $sql="UPDATE 
    UserInfo SET UserEmail='$_POST[UserEmail]', UserName='$_POST[UserName]' 
    WHERE UserId = '$_SESSION[user_id]'";
    if ($conn->query($sql) === TRUE) {
        $msg = "新记录插入成功";
    } else {
        $msg ="Error: " . $sql . "<br>" . $conn->error;
    }
    // var_dump($msg);
    $sql="UPDATE 
    UserLoginInfo 
    SET UserNotes = '$_POST[UserNotes]' 
    WHERE UserId = '$_SESSION[user_id]'";
    if ($conn->query($sql) === TRUE) {
        $msg = "新记录插入成功";
    } else {
        $msg ="Error: " . $sql . "<br>" . $conn->error;
    }
    // var_dump($msg);
    $conn->close();
    $home_url = './userState.php';
    header('Location:'.$home_url);
}



?>
