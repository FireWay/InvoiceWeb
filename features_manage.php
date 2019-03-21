<?php



//开启一个会话
session_start();

require_once 'connectvars.php';

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
WHERE UserId = '$_SESSION[user_id]'"; 

// mysqli_query($conn,"set names UTF8");
$result = mysqli_query($conn,$sql);

?>
<html lang="zh">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="./css/bootstrap/favicon.ico">

    <title>发票管理</title>

    <!-- Bootstrap core CSS -->
    <link href="./css/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <!-- <link href="./css/dashboard.css" rel="stylesheet"> -->
  </head>

  <body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
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

    

    <div class="container-fluid">

          <!-- <h2>发票管家</h2> -->
          <div class="text-center">
            <!-- <img class="d-block mx-auto mb-4" src="./img/in_hand.ico" alt="" width="100" height="100"> -->
            <h2>发票管家</h2>
            <!-- <p class="lead">Below is an example form built entirely with Bootstrap's form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p> -->
          </div>

          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>InvoiceNum</th>
                  <th>PurchaserName</th>
                  <th>SellerName</th>
                  <th>AmountInFiguers</th>
                  <th>InvoiceDate</th>
                  <th>InvoiceCode</th>
                  <th>SellerRegisterNum</th>
                  <th>SellerAddress</th>
                  <th>Option</th>
                </tr>
              </thead>

              <tbody>

                <?php
                  $no = 1;
                  $rid = '';
                  while($row=mysqli_fetch_assoc($result)){
                    $rid = $row['InvoiceNum'];
                    echo "<tr><td>" . $no . "</td>";
                    echo "<td>" . $row['InvoiceNum'] . "</td>";
                    echo "<td>" . $row["PurchaserName"] . "</td>";
                    echo "<td>" . $row["SellerName"] . "</td>";
                    echo "<td>" . $row["AmountInFiguers"] . "</td>";
                    echo "<td>" . $row["InvoiceDate"] . "</td>";
                    echo "<td>" . $row["InvoiceCode"] . "</td>";
                    echo "<td>" . $row["SellerRegisterNum"] . "</td>";
                    echo "<td>" . $row["SellerAddress"] . "</td>";
                    // echo "<td><a href=''>more</a></td></tr>";
                    echo 
                    '<td class="dropdown">
                      <a class="dropdown-toggle" data-toggle="dropdown" href="#">more<b class="caret"></b></a>
                      <ul class="dropdown-menu">
                        <a href="./messageToQrocde.php?InvoiceNum='.$rid.'">
                          <button class ="btn btn-sm btn-primary btn-block" >
                          生成二维码
                          </button>
                        </a></br>
                        <a href="./messageToDelete.php?InvoiceNum='.$rid.'">
                          <button class ="btn btn-sm btn-danger btn-block" >
                          删除
                          </button>
                        </a>
                      </ul>
                    </td></tr>';
                    $no = $no + 1;
                  }
                ?>

              </tbody>
            </table>
          </div>
      
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="./css/bootstrap/assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="./css/bootstrap/assets/js/vendor/popper.min.js"></script>
    <script src="./css/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>

    <!-- Graphs -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script>
      var ctx = document.getElementById("myChart");
      var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
          datasets: [{
            data: [15339, 21345, 18483, 24003, 23489, 24092, 12034],
            lineTension: 0,
            backgroundColor: 'transparent',
            borderColor: '#007bff',
            borderWidth: 4,
            pointBackgroundColor: '#007bff'
          }]
        },
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: false
              }
            }]
          },
          legend: {
            display: false,
          }
        }
      });
    </script>
  </body>
</html>
