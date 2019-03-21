<?php

/*
1.在官方网站下载php SDK压缩包。

2.将下载的aip-php-sdk-version.zip解压后，复制AipOcr.php以及lib/*到工程文件夹中。

3.引入AipOcr.php
*/


// 引入文字识别OCR SDK
require_once './aip-php-sdk/AipOcr.php';

// 定义常量
const APP_ID = '15252656';
const API_KEY = 'eUD3zYMcPH6UrnW2jNeW53hj';
const SECRET_KEY = 'HjAlVUlqzXgp7IaBmdWDiG8Girfzx7rD';

// 初始化
$aipOcr = new AipOcr(APP_ID, API_KEY, SECRET_KEY);

$image = file_get_contents($_FILES["file"]["tmp_name"]);

// 如果有可选参数
$options = array();
$options["language_type"] = "CHN_ENG";
$options["detect_direction"] = "true";
$options["detect_language"] = "true";
$options["probability"] = "false";

// 带参数调用通用文字识别, 图片参数为本地图片
$rescult = $aipOcr->vatInvoice($image);

$words = $rescult['words_result'];


echo '<table border="1" width="600" align="center">';

echo "<tr><td>InvoiceNum</td><td>" . $words["InvoiceNum"] . "</tr>";
echo "<tr><td>PurchaserName</td><td>" . $words["PurchaserName"] . "</tr>";
echo "<tr><td>SellerName</td><td>" . $words["SellerName"] . "</tr>";
echo "<tr><td>AmountInFiguers</td><td>" . $words["AmountInFiguers"] . "</tr>";

echo "<tr><td>InvoiceDate</td><td>" . $words["InvoiceDate"] . "</tr>";
echo "<tr><td>InvoiceCode</td><td>" . $words["InvoiceCode"] . "</tr>";
echo "<tr><td>SellerAddress</td><td>" . $words["SellerAddress"] . "</tr>";
echo "<tr><td>SellerRegisterNum</td><td>" . $words["SellerRegisterNum"] . "</tr>";

echo '</table>';


echo "<pre>";print_r($words);echo "<pre>";

session_start();

    $_SESSION['InvoiceNum'] =$words["InvoiceNum"];
	$_SESSION['PurchaserName'] =$words["PurchaserName"];
	$_SESSION['SellerName'] =$words["SellerName"];
	$_SESSION['AmountInFiguers'] =$words["AmountInFiguers"];
	$_SESSION['InvoiceDate'] =$words["InvoiceDate"];
	$_SESSION['InvoiceCode'] =$words["InvoiceCode"];
	$_SESSION['SellerAddress'] =$words["SellerAddress"];
	$_SESSION['SellerRegisterNum'] =$words["SellerRegisterNum"];

	$home_url = '../../input.php';
    header('Location: '.$home_url);

?>
<!-- 
<script language="javascript" type="text/javascript"> 
setTimeout("javascript:location.href='../../input.php'", 0); 
</script> -->