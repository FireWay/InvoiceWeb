<?php
//开启一个会话
session_start();
if(isset($_SESSION['user_id']) && $_SESSION['user_id'] != ''){
  $home_url = './features.php';
  header('Location: '.$home_url);
}
?>
<!doctype html>
<html lang="zh">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="./css/bootstrap/favicon.ico">

    <title>发票管理系统主页</title>

    <!-- Bootstrap core CSS -->
    <link href="./css/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./css/signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <div class="form-signin">
      <img class="mb-4" src="./img/index.ico" alt="" width="100" height="100">
	  <a href="./signin.php"><button class="btn btn-lg btn-primary btn-block">登录</button></a>
	  </br>
	  <a href="./registered.html"><button class="btn btn-lg btn-primary btn-block">注册</button></a>
      <!-- <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p> -->
    </div>
  </body>
</html>
