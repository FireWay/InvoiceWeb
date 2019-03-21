<?php
require_once 'connectvars.php';

//开启一个会话
session_start();
$msg = "";
if(!isset($_POST['InvoiceNum']) || $_POST['InvoiceNum'] == ''){
    //$_SESSION['flag'] = "true";
} else {

// echo "user id: " . $_SESSION[user_id] . " user name: " . $_SESSION['user_name'];
    // 创建连接
    $conn = new mysqli($servername, $username, $password, $dbname);
    // 检测连接
    if ($conn->connect_error) {
        die("连接失败: " . $conn->connect_error);
    } 
    
    mysqli_query($conn, 'set names utf8');
    
    $sql="INSERT INTO InvoiceInfo 
    (UserId,InvoiceNum,PurchaserName,
    SellerName,AmountInFiguers,InvoiceDate,
    InvoiceCode,SellerAddress,SellerRegisterNum) 
    VALUES 
    ('$_SESSION[user_id]','$_POST[InvoiceNum]','$_POST[PurchaserName]',
    '$_POST[SellerName]','$_POST[AmountInFiguers]','$_POST[InvoiceDate]',
    '$_POST[InvoiceCode]','$_POST[SellerAddress]','$_POST[SellerRegisterNum]')";

    if ($conn->query($sql) === TRUE) {
        $msg = "新记录插入成功";
    } else {
        $msg ="Error: " . $sql . "<br>" . $conn->error;
    }
    
    $sql="INSERT INTO InvoiceCreateInfo
    (UserId,InvoiceNum)
    VALUES
    ('$_SESSION[user_id]','$_POST[InvoiceNum]')";

    if ($conn->query($sql) === TRUE) {
      $msg = "新记录插入成功";
    } else {
      $msg ="Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}

?>
<!-- 
'$_SESSION[user_id]', 
'$_SESSION[InvoiceNum]',
'$_SESSION[PurchaserName]',
'$_SESSION[SellerName]',
'$_SESSION[AmountInFiguers]',
'$_SESSION[InvoiceDate]',
'$_SESSION[InvoiceCode]',
'$_SESSION[SellerAddress]',
'$_SESSION[SellerRegisterNum]') 
-->

<!doctype html>
<html lang="zh">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="./css/bootstrap/favicon.ico">

    <title>发票信息输入</title>

    <!-- Bootstrap core CSS -->
    <link href="./css/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./css/form-validation.css" rel="stylesheet">
  </head>

  <body class="bg-light">

  <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
      <a class="navbar-brand" href="./features.php">
        <img class="rounded-circle" src="./img/home.jpeg"  width="25" height="25">
        Home
      </a>
      <!-- <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search"> -->
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="./userState.php">
            <img class="rounded-circle" src="./img/login.ico"  width="25" height="25">
          </a>
        </li>
     </ul>
    </nav>

    <div class="container">
      <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="./img/in_hand.ico" alt="" width="100" height="100">
        <h2>输入发票信息
          <a href="./features/speechRrecognition/in_voice.php">
            <img class="rounded-circle" src="./img/speed.jpg"  width="25" height="25">
          </a>
        </h2>
        <!-- <p class="lead">Below is an example form built entirely with Bootstrap's form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p> -->
        <?php echo $msg; ?>
      </div>

      <div class="row">
        
		    <div class="col-md-12 order-md-1">
          <!-- <h4 class="mb-3">发票信息</h4> -->
          <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" class="needs-validation" novalidate>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="PurchaserName">购买方名称</label>
                <input type="text" class="form-control" name="PurchaserName" placeholder="购买方名称"
                 <?php  
                 if(isset($_SESSION[PurchaserName]) && $_SESSION[PurchaserName] != '') {
                    echo "value = " . $_SESSION[PurchaserName] . " ";} 
                  ?> required>

                <div class="invalid-feedback">
                  要求输入购买方名称
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="SellerName">销售方名称</label>
                <input type="text" class="form-control" name="SellerName" placeholder="销售方名称"
                 <?php  
                  if(isset($_SESSION[SellerName]) && $_SESSION[SellerName] != '') {
                    echo "value = " . $_SESSION[SellerName] . " ";} 
                  ?> required>

                <div class="invalid-feedback">
                  要求输入销售方名称
                </div>
              </div>
            </div>
            
            <div class="mb-3">
              <label for="InvoiceNum">发票号码</label>
              <input type="text" class="form-control" name="InvoiceNum" placeholder="8位纯数字"
              <?php  
                 if(isset($_SESSION[InvoiceNum]) && $_SESSION[InvoiceNum] != '') {
                    echo "value = " . $_SESSION[InvoiceNum] . " ";} 
              ?>>
            </div>
			
			      <div class="mb-3">
              <label for="AmountInFiguers">消费总额</label>
              <input type="text" class="form-control" name="AmountInFiguers" placeholder="包括税款，可以带小数"
              <?php  
                 if(isset($_SESSION[AmountInFiguers]) && $_SESSION[AmountInFiguers] != '') {
                    echo "value = " . $_SESSION[AmountInFiguers] . " ";} 
              ?>>
            </div>
			
			      <div class="mb-3">
              <label for="InvoiceDate">发票日期</label>
              <input type="text" class="form-control" name="InvoiceDate" placeholder="开具发票的时间"
              <?php  
                 if(isset($_SESSION[InvoiceDate]) && $_SESSION[InvoiceDate] != '') {
                    echo "value = " . $_SESSION[InvoiceDate] . " ";} 
              ?>>
            </div>
			
			      <div class="mb-3">
              <label for="InvoiceCode">发票代码</label>
              <input type="text" class="form-control" name="InvoiceCode" placeholder="10位纯数字"
              <?php  
                 if(isset($_SESSION[InvoiceCode]) && $_SESSION[InvoiceCode] != '') {
                    echo "value = " . $_SESSION[InvoiceCode] . " ";} 
              ?>>
            </div>

            <div class="mb-3">
              <label for="SellerAddress">销售方地址电话</label>
              <input type="text" class="form-control" name="SellerAddress" placeholder="销售方地址电话"
              <?php  
                 if(isset($_SESSION[SellerAddress]) && $_SESSION[SellerAddress] != '') {
                    echo "value = " . $_SESSION[SellerAddress] . " ";} 
              ?>>
            </div>
			
			      <div class="mb-3">
              <label for="SellerRegisterNum">销售方纳税编号</label>
              <input type="text" class="form-control" name="SellerRegisterNum" placeholder="数字英文混合的16位字符"
              <?php  
                 if(isset($_SESSION[SellerRegisterNum]) && $_SESSION[SellerRegisterNum] != '') {
                    echo "value = " . $_SESSION[SellerRegisterNum] . " ";} 
              ?>>
            </div>

            <button class="btn btn-primary btn-lg btn-block" type="submit">提交</button>

          </form>
        </div>
      </div>

      <?php
        $_SESSION[InvoiceNum] = '';
        $_SESSION[PurchaserName] = '';
        $_SESSION[SellerName] = '';
        $_SESSION[AmountInFiguers] = '';
        $_SESSION[InvoiceDate] = '';
        $_SESSION[InvoiceCode] = '';
        $_SESSION[SellerAddress] = '';
        $_SESSION[SellerRegisterNum] = ''; 
      ?>
      
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="./css/bootstrap/assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="./css/bootstrap/assets/js/vendor/popper.min.js"></script>
    <script src="./css/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="./css/bootstrap/assets/js/vendor/holder.min.js"></script>
    <script>
      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function() {
        'use strict';

        window.addEventListener('load', function() {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');

          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
    </script>
  </body>
</html>

<!-- <script language="javascript" type="text/javascript"> 
// 以下方式定时跳转
setTimeout("javascript:location.href='./in_hand.html'", 3000); 
</script> -->