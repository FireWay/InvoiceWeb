
<?php
/*
	echo "<pre>";
	echo $_POST["InvoiceNum"]."</br>";
	echo $_POST["PurchaserName"]."</br>";
	echo $_POST["SellerName"]."</br>";	//单选，按字符串操作。
	echo $_POST["AmountInFiguers"]."</br>";
	echo $_POST["InvoiceDate"]."</br>";
	echo $_POST["InvoiceCode"]."</br>";
	echo $_POST["SellerAddress"]."</br>";
	echo $_POST["SellerRegisterNum"]."</br>";
	
	print_r($_POST);
	echo "</pre>";
*/
	//开启一个会话
	session_start();

    $_SESSION['InvoiceNum'] =$_POST["InvoiceNum"];
	$_SESSION['PurchaserName'] =$_POST["PurchaserName"];
	$_SESSION['SellerName'] =$_POST["SellerName"];
	$_SESSION['AmountInFiguers'] =$_POST["AmountInFiguers"];
	$_SESSION['InvoiceDate'] =$_POST["InvoiceDate"];
	$_SESSION['InvoiceCode'] =$_POST["InvoiceCode"];
	$_SESSION['SellerAddress'] =$_POST["SellerAddress"];
	$_SESSION['SellerRegisterNum'] =$_POST["SellerRegisterNum"];

	$home_url = '../../input.php';
    header('Location: '.$home_url);
?>
<!-- <script language="javascript" type="text/javascript"> 
// FIX 提交路径
setTimeout("javascript:location.href='../../input.php'", 0); 
</script> -->