<?php
//开启一个会话
session_start();

require_once 'connectvars.php';
?>

<!doctype html>
<html lang="zh">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="./css/bootstrap/favicon.ico">

    <title>功能</title>

    <!-- Bootstrap core CSS -->
    <link href="./css/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <!-- <link href="./css/carousel.css" rel="stylesheet"> -->
  </head>
  <body>

    

    <main role="main">
        <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 ">
            <a class="navbar-brand" href="./features.php">
              <img class="rounded-circle" src="./img/home.jpeg"  width="25" height="25">
              Home
            </a>
            <!-- <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search"> -->

            <ul class="navbar-nav px-3">
              <li class="nav-item text-nowrap">
                <a class="nav-link" href="./userState.php">
                  <img class="rounded-circle" src=<?php if(isset($userpic) && $userpic != '') {echo $userpic;} ?>  width="25" height="25">
                </a>
              </li>
            </ul>
          </nav>

          <header class="container">
            <div class="py-5 text-center">
              <!-- <img class="d-block mx-auto mb-4" src="https://getbootstrap.com/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72"> -->
              <h2 style="display:none">功能</h2>
              <!-- <p class="lead">Below is an example form built entirely with Bootstrap's form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p> -->
            </div>
          </header>

      <!-- Wrap the rest of the page in another container to center all the content. -->

      <div class="container marketing">

        <!-- Three columns of text below the carousel -->
        <div class="row">

          <div class="col-lg-3"  align="center">
            <a href="./features_manage.php">
              <img class="" src="./img/features_manage.ico" alt="Generic placeholder image" width="140" height="140">
            </a>
            <h2>发票管理</h2>
            <!-- <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p> -->
            <!-- <p><a class="btn btn-secondary" href="./features_manage.php" role="button">Out &raquo;</a></p> -->
          </div>

          <div class="col-lg-3" align="center">
            <a href="./input.php">
              <img class="" src="./img/in_hand.ico" alt="Generic placeholder image" width="140" height="140">
            </a>
              <h2>信息录入</h2>
              <!-- <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p> -->
              <!-- <p><a class="btn btn-secondary" href="./input.php" role="button">HandWriting &raquo;</a></p> -->
            </div>
  
          <div class="col-lg-3" align="center">
              <a href="./features/pictureRecognition/invoice.html">
                <img class="" src="./img/in_orc.ico" alt="Generic placeholder image" width="140" height="140">
              </a>
              <h2>发票识别</h2>
              <!-- <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p> -->
              <!-- <p><a class="btn btn-secondary" href="./in_orc_temp.html" role="button">ORC &raquo;</a></p> -->
          </div>
  
          <div class="col-lg-3" align="center">
              <a href="./features/qrcodeRecognition/qrcodescan.html">
                <img class="" src="./img/in_qrcode.ico" alt="Generic placeholder image" width="140" height="140">
              </a>

              <h2>二维码识别</h2>
              <!-- <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.</p> -->
              <!-- <p><a class="btn btn-secondary" href="./in_qcode_temp.html" role="button">Qcode &raquo;</a></p> -->
            </div>

        </div><!-- /.row -->


        

        <!-- /END THE FEATURETTES -->
      </div><!-- /.container -->

    </main>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="./css/bootstrap/assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="./css/bootstrap/assets/js/vendor/popper.min.js"></script>
    <script src="./css/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="./css/bootstrap/assets/js/vendor/holder.min.js"></script>
  </body>
</html>
