<?php
//开启一个会话
session_start();

//插入连接数据库的相关信息
require_once 'connectvars.php';

$error_msg = "";
//如果用户未登录，即未设置$_SESSION['user_id']时，执行以下代码
if(!isset($_SESSION['user_id'])){
    if(isset($_POST['submit'])){//用户提交登录表单时执行如下代码
        $dbc = mysqli_connect($servername,$username,$password,$dbname);
        $user_userid = mysqli_real_escape_string($dbc,trim($_POST['UserId']));
        $user_password = mysqli_real_escape_string($dbc,trim($_POST['UserPasswd']));

        if(!empty($user_userid)&&!empty($user_password)){
            //MySql中的SHA()函数用于对字符串进行单向加密
            // $query = "SELECT UserId, UserName FROM UserInfo WHERE UserId = '$user_userid' AND "."UserPasswd = SHA('$user_password')";
            $query = "SELECT UserId, UserName FROM UserInfo WHERE UserId = '$user_userid' AND "."UserPasswd = '$user_password'";
            //用用户名和密码进行查询
            $data = mysqli_query($dbc,$query);
            //若查到的记录正好为一条，则设置SESSION，同时进行页面重定向
            if(mysqli_num_rows($data)==1){
                $row = mysqli_fetch_array($data);
                $_SESSION['user_id']=$row['UserId'];
                $_SESSION['user_name']=$row['UserName'];
                $home_url = './features.php';
                header('Location: '.$home_url);
            }else{//若查到的记录不对，则设置错误信息
                $error_msg = 'Sorry, you must enter a valid username and password to log in.';
            }
        }else{
            $error_msg = 'Sorry, you must enter a valid username and password to log in.';
        }
    }
}else{//如果用户已经登录，则直接跳转到已经登录页面
    $home_url = './features.php';
    header('Location: '.$home_url);
}
?>




<html lang="zh">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="./css/bootstrap/favicon.ico">

    <title>登录</title>

    <!-- Bootstrap core CSS -->
    <link href="./css/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./css/signin.css" rel="stylesheet">
  </head>

  <body class="text-center">

    
    <form method = "post" action="<?php echo $_SERVER['PHP_SELF'];?>" class="form-signin">
        <img class="mb-4"  src="./img/logout.ico" alt="" width="100" height="100">
        <h1 class="h3 mb-3 font-weight-normal">登录</h1>
        <?php
            if(!isset($_SESSION['user_id'])){
                echo '<p class="error">'.$error_msg.'</p>';
        ?>
        <label for="UserId" class="sr-only">账号</label>
        <input type="text"  id="UserId"  name="UserId" class="form-control" placeholder="账号" required>
        <label for="inputPassword" class="sr-only">密码</label>
        <input type="password" name="UserPasswd" class="form-control" placeholder="密码" required>
        <!-- <div class="checkbox mb-3">
            <label>
            <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div> -->
        <!-- <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button> -->
        <input  class="btn btn-lg btn-primary btn-block"  type="submit" value="登录" name="submit"/>
        <!-- <a href="features.php">Sign in</a> -->
        <!-- <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p> -->
        <?php
            }
        ?>
    </form>

   
  </body>
</html>