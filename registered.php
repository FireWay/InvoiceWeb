<?php
header("content-type:text/html:charset=utf-8");

require_once 'connectvars.php';

session_start();


// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);
// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

mysqli_query($conn, 'set names utf8');
 
$sql="INSERT INTO UserInfo (UserId,UserName,UserPasswd,UserEmail) 
VALUES ('$_POST[UserId]','$_POST[UserName]','$_POST[UserPasswd]','$_POST[UserEmail]')";

if ($conn->query($sql) === TRUE) {
    echo "新记录插入成功";
    $_SESSION['user_id']=$_POST[UserId];
    $_SESSION['user_name']=$_POST[UserName];
    // $home_url = './features.php';
    // header('Location: '.$home_url);
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
 
$sql="INSERT INTO UserLoginInfo (UserId,UserPicPath,UserNotes) 
VALUES ('$_POST[UserId]','./img/login.ico','')";

if ($conn->query($sql) === TRUE) {
    echo "新记录插入成功";
    // $_SESSION['user_id']=$_POST[UserId];
    // $_SESSION['user_name']=$_POST[UserName];
    $home_url = './features.php';
    header('Location: '.$home_url);
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>
<script language="javascript" type="text/javascript"> 
// 以下方式定时跳转
setTimeout("javascript:location.href='./registered.html'", 3000); 
</script>