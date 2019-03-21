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

mysqli_query($conn, 'set names utf8');

$sql= "SELECT 
InvoiceNum,PurchaserName,SellerName,AmountInFiguers,
InvoiceDate,InvoiceCode,SellerRegisterNum,SellerAddress 
FROM InvoiceInfo
WHERE UserId = '$_SESSION[user_id]' AND InvoiceNum = '$invoNum'"; 

// mysqli_query($conn,"set names UTF8");
$result = mysqli_query($conn,$sql);


if($row=mysqli_fetch_assoc($result)){
    $_SESSION[InvoiceNum] = $row['InvoiceNum'];
    $_SESSION[PurchaserName] = $row["PurchaserName"];
    $_SESSION[SellerName] = $row["SellerName"];
    $_SESSION[AmountInFiguers] = $row["AmountInFiguers"];
    $_SESSION[InvoiceDate] = $row["InvoiceDate"];
    $_SESSION[InvoiceCode] = $row["InvoiceCode"];
    $_SESSION[SellerAddress] = $row["SellerAddress"];
    $_SESSION[SellerRegisterNum] = $row["SellerRegisterNum"]; 
}
var_dump($row);
var_dump($_SESSION);

// http://120.79.248.172/public/QRcodeDemo/make.php
$home_url = './features/qrcodeRecognition/qrcodemaker.php';
header('Location: '.$home_url);
?>
<!-- <script language="javascript" type="text/javascript"> 
// 以下方式定时跳转
setTimeout("javascript:location.href='http://120.79.248.172/public/QRcodeDemo/make.php'", 5000); 
</script> -->