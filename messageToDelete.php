<?php
require_once 'connectvars.php';

//开启一个会话
session_start();

$que = $_SERVER["QUERY_STRING"];
// echo $_SERVER["QUERY_STRING"]."<br>";

// echo explode('=', $que)[1]."<br>";
$invoNum = explode('=', $que)[1];
$conn = new mysqli($servername, $username, $password, $dbname);
// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
} 


$sql= "DELETE FROM InvoiceInfo 
WHERE UserId = '$_SESSION[user_id]' AND InvoiceNum = '$invoNum'"; 

// mysqli_query($conn,"set names UTF8");
// $result = mysqli_query($conn,$sql);

if ($conn->query($sql) === TRUE) {
    $msg = "新记录删除成功";
} else {
    $msg ="Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

echo $msg;
// if($row=mysqli_fetch_assoc($result)){
//     $_SESSION[InvoiceNum] = $row['InvoiceNum'];
//     $_SESSION[PurchaserName] = $row["PurchaserName"];
//     $_SESSION[SellerName] = $row["SellerName"];
//     $_SESSION[AmountInFiguers] = $row["AmountInFiguers"];
//     $_SESSION[InvoiceDate] = $row["InvoiceDate"];
//     $_SESSION[InvoiceCode] = $row["InvoiceCode"];
//     $_SESSION[SellerAddress] = $row["SellerAddress"];
//     $_SESSION[SellerRegisterNum] = $row["SellerRegisterNum"]; 
// }
// var_dump($row);
// var_dump($_SESSION);
$home_url = './features_manage.php';
header('Location: '.$home_url);
?>
<!-- <script language="javascript" type="text/javascript"> 
// 以下方式定时跳转
setTimeout("javascript:location.href='./features_manage.php'", 5000); 
</script> -->