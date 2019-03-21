<?php
require_once '../../connectvars.php';
require_once './AipSpeech.php';

//开启一个会话
// session_start();

$que = $_SERVER["QUERY_STRING"];

// echo explode('=', $que)[1]."<br>";
$name = explode('=', $que)[1];


?>

<!doctype html>
<html lang="zh">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../css/bootstrap/favicon.ico">

    <title>进行语音识别</title>

    <!-- Bootstrap core CSS -->
    <link href="../../css/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../css/form-validation.css" rel="stylesheet">
  </head>

  <body class="bg-light">

  <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
      <a class="navbar-brand" href="../../features.php">
        <img class="rounded-circle" src="../../img/home.jpeg"  width="25" height="25">
        Home
      </a>
      <!-- <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search"> -->
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="../../userState.php">
            <img class="rounded-circle" src="../../img/login.ico"  width="25" height="25">
          </a>
        </li>
     </ul>
    </nav>

<div class="container">
  <div class="py-5 text-center">
      <img class="rounded-circle d-block mx-auto mb-4" src="../../img/speed.jpg" alt="" width="100" height="100">
      <h2>进行语音识别</h2>
  </div>
  <form action=<?php  echo './voiceupload.php?name='.$name; ?>
      method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
      <input class="form-control" type="file" name="voicefile" accept="audio/*" capture="microphone"/>
      <button class="btn btn-primary btn-lg btn-block" type="submit">提交</button>
  </form>
</div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../css/bootstrap/assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../css/bootstrap/assets/js/vendor/popper.min.js"></script>
    <script src="../../css/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../../css/bootstrap/assets/js/vendor/holder.min.js"></script>
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