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

    <title>用户信息</title>

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
        <img class="d-block mx-auto mb-4" src=<?php 
          if(isset($userpic) && $userpic != '') {echo $userpic;} 
          ?> alt="" width="100" height="100">
        <h2>用户信息</h2>
        <!-- <p class="lead">Below is an example form built entirely with Bootstrap's form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p> -->
      </div>

      <div class="row">
        
		<div class="col-md-12 order-md-1">
          <!-- <h4 class="mb-3">发票信息</h4> -->
          <form action="userStateUpdate.php" method="post" class="needs-validation" novalidate>
            
            <div class="row">

              <div class="col-md-6 mb-3">
                <label for="UserName">用户昵称</label>
                <input type="text" class="form-control" name="UserName" placeholder="用户昵称"
                 <?php  
                    echo "value = '" .$user_name. "' ";
                  ?> required>

                <div class="invalid-feedback">
                  要求输入用户昵称
                </div>
              </div>

              <div class="col-md-6 mb-3">
                <label for="lastName">用户邮箱</label>
                <input type="email" class="form-control" name="UserEmail" placeholder="用户邮箱"
                 <?php  
                    echo "value = '".$useremail."' ";
                  ?> >
              </div>
            </div>
            
            <div class="mb-3">
              <label for="UserNotes">备注</label>
              <input type="text" class="form-control" name="UserNotes" placeholder="这人很懒，什么都没写"
              <?php  
                    echo "value = '" .$usernotes. "' ";
                ?>>
            </div>
			<a href="./features.php">
                <button class="btn btn-primary btn-lg btn-block" type="submit">修改</button><br/>
			</a>
            
          </form>
          <a href="./logout.php">
                <button class="btn btn-primary btn-lg btn-block">登出</button>
            </a>
        </div>
      </div>

      
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