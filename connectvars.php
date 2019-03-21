<?php
//开启一个会话
// session_start();

$servername = "";
$username = "";
$password = "";
$dbname = "web_info";

$conn = new mysqli($servername, $username, $password, $dbname);
    // 检测连接
    if ($conn->connect_error) {
        die("连接失败: " . $conn->connect_error);
    } 
    // $userpic = "./img/logout.ico";
    // $usernotes = "";

mysqli_query($conn, 'set names utf8');

if(isset($_SESSION[user_id]) && $_SESSION[user_id] != ''){
    // $sql= "SELECT  UserPicPath,UserNotes
    //     FROM UserLoginInfo
    //     WHERE UserId = '$_SESSION[user_id]'"; 
    $sql = "SELECT 
    UserLoginInfo.UserPicPath,UserLoginInfo.UserNotes,UserInfo.UserEmail,UserInfo.UserName  
    FROM UserLoginInfo ,UserInfo 
    WHERE UserLoginInfo.UserId = '$_SESSION[user_id]'
    AND UserLoginInfo.UserId = UserInfo.UserId";

    // mysqli_query($conn,"set names UTF8");
    $result = mysqli_query($conn,$sql);
    if($row=mysqli_fetch_assoc($result)){
        $userpic = $row['UserPicPath'];
        $usernotes = $row['UserNotes'];
        $useremail = $row['UserEmail'];
        $user_name = $row['UserName'];
    }
    // $row=mysqli_fetch_assoc($result);
    // var_dump($_SESSION);
    // var_dump($row);
    $conn->close();
} else {
    $userpic = "./img/logout.ico";
    $usernotes = "";
    $useremail = "";
    $user_name = "";
}

?>

