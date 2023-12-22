<?php

include './includes/session.php';
include './includes/header.php';
?>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
<?php
include './includes/navbar.php';
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php" class="text-secondary">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    
<!-- Main content -->
<section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
              <?php 
                $sql = "SELECT * FROM products;";
                $result = mysqli_query($conn,$sql);
                if($result -> num_rows > 0 ){
                  $numProd = mysqli_fetch_all($result);
                  $total = count($numProd);
                }
                 ?>
                <h3><?php echo $total ?></h3>

                <p>Products</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="products.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <?php
                $monthy=0;
                $sql = "SELECT SUM(sales.amount_paid) AS Monthly FROM sales ORDER BY MONTH(NOW());";
                $res = mysqli_query($conn,$sql);
                if($res -> num_rows > 0){
                  $result = mysqli_fetch_array($res);  
                  $monthy = $result[0];               
                }               
                ?>
                <h3>₱ <span><?php echo $monthy;?></span></h3>

                <p>Monthly Sales</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <?php 
                $sql = "SELECT * FROM users WHERE usertype = 0;";
                $result = mysqli_query($conn,$sql);
                if($result -> num_rows > 0 ){
                  $numUser = mysqli_fetch_all($result);
                  $total = count($numUser);
                }
                 ?>
                <h3 class="text-light"><?php echo $total ?></h3>

                <p class="text-light">Users</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-stalker"></i>
              </div>
              <a href="users.php" class="small-box-footer"><span class="text-light">More info <i class="fas fa-arrow-circle-right"></i></span></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
              <?php
                $daily;
                $sql = "SELECT SUM(sales.amount_paid) AS Daily FROM sales WHERE CAST(sales.sales_date AS DATE) = CURDATE();";
                $res = mysqli_query($conn,$sql);
                if($res -> num_rows > 0){
                  $result = mysqli_fetch_array($res);  
                  $daily = $result[0];
                  if($daily == null){
                    $daily = 0;
                  }               
                }                          
                ?>
                <h3>₱ <span><?php echo $daily; ?></span></h3>

                <p>Today Sales</p>
              </div>
              <div class="icon">
                <i class="ionicons ion-cash"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <div class="container-fluid">
                  <!-- BAR CHART -->
                  <div class="card card-info">
                    <div class="card-header">
                      <h3 class="card-title">Monthly Reports</h3>
      
                      <div class="card-tools">
                        <!-- This work in php -->
                      <form class="form-inline">
                          <div class="form-group">
                            <h3 class="card-title">Select Year: </h3>
                            <select class="form-sm-control input-sm rounded px-2" id="select_year">

                              <option value="2022">2022</option>
                              <option value="2022">2023</option>
                              <option value="2022">2024</option>
                              <option value="2022">2025</option>
                              <option value="2022">2026</option>
                              <option value="2022">2027</option>
                              <option value="2022">2028</option>
                              <option value="2022">2029</option>
                              <option value="2022">2030</option>
                              <!-- <?php
                                for($i=2015; $i<=2065; $i++){
                                  $selected = ($i==$year)?'selected':'';
                                  echo "
                                    <option value='".$i."' ".$selected.">".$i."</option>
                                  ";
                                }
                              ?> -->
                            </select>
                          </div>
                        </form>

                      </div>
                    </div>
                    <div class="card-body">
                      <div class="chart">
                        <canvas id="barChart" style="min-height: 500px; height: 500px; max-height: 500px; max-width: 100%;"></canvas>
                      </div>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->          
                </div>  


        </div>       
        <!-- /.row (main row) -->





      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  
<!-- /.wrapper -->
</div>
<?php 
include './includes/footer.php';
include './includes/script.php';

// $month = array();

// for( $m = 1; $m <= 12; $m++ ){
//   $mnth =  date('M', mktime(0, 0, 0, $m, 1));
//     array_push($month, $mnth);
// }

// $sql = "SELECT MONTHNAME(users.datecreated) as monthname, COUNT(users.id) as totaluser FROM users WHERE usertype = 0 GROUP BY MONTH(users.datecreated) ORDER BY YEAR(NOW()) ;";
// $res = mysqli_query($conn,$sql);
// if($res -> num_rows > 0){
//     $rows = mysqli_fetch_all($res);

//     foreach($rows as $row){
//   //     $month = array_replace($month,
//   //     array_fill_keys(
//   //         array_keys($ar, $value),
//   //         $replacement
//   //     )
//   // );
//         //$month[] = $row[0];
//         array_push($month,$row[0]);

//         $totaluser[] = $row[1];
//     }

// }



$month = array();
$sql = "SELECT MONTHNAME(users.datecreated) as monthname, COUNT(users.id) as totaluser FROM users WHERE usertype = 0 GROUP BY MONTH(users.datecreated) ORDER BY YEAR(NOW()) ;";
$res = mysqli_query($conn,$sql);
if($res -> num_rows > 0){
    $rows = mysqli_fetch_all($res);

    foreach($rows as $row){
     
        // $month[] = $row[0];
        array_push($month,$row[0]);

        $totaluser[] = $row[1];
    }

}

$sql2 = "SELECT MONTHNAME(sales.sales_date) as monthname, SUM(sales.amount_paid) as totalamount FROM sales GROUP BY MONTH(sales.sales_date) ORDER BY YEAR(NOW());";
$res2 = mysqli_query($conn,$sql2);
if($res2 -> num_rows > 0){
  $rows = mysqli_fetch_all($res2);

  foreach($rows as $row){
   
    array_push($month,$row[0]);
      $totalamount[] = $row[1];
  }

}
$month = array_unique($month);


?>
<!-- Bar chart -->
<script>
  const labels = <?php echo json_encode($month); ?>;

  const data = {
    labels: labels,
    datasets: [
    {
      label               : 'Sales',
      backgroundColor     : 'rgb(40,167,69,1)',
      borderColor         : 'rgb(40,167,69,1)',
      pointRadius         : false,
      pointColor          : 'rgb(40,167,69,1)',
      pointStrokeColor    : '#c1c7d1',
      pointHighlightFill  : '#fff',
      pointHighlightStroke: 'rgb(35,146,61,0.5)',
      data: <?php echo json_encode($totalamount) ?>,
    },
    {
      label               : 'Registered Users',
      backgroundColor     : 'rgba(255, 193, 7, 1)',
      borderColor         : 'rgba(255, 193, 7, 1)',
      pointRadius         : false,
      pointColor          : 'rgba( 255, 193, 7, 1)',
      pointStrokeColor    : '#c1c7d1',
      pointHighlightFill  : '#fff',
      pointHighlightStroke: 'rgb(237,177,0,1)',
      data: <?php echo json_encode($totaluser) ?>, 
    }]
  };

  const config = {
    type: 'bar',
    data: data,    
    options: {}
  };

  const myChart = new Chart(
    document.getElementById('barChart'),
    config
  );
</script>

<!-- 
<script>
  $(function () {

    // CHART DATA
    var ChartData = {
      labels  : <?php //echo json_encode($month); ?>,
      datasets: [
        {
          label               : 'Sales',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : <?php //echo json_encode($totalamount);?>
        },
        {
          label               : 'Registered Users',
          backgroundColor     : 'rgba(210, 214, 222, 1)',
          borderColor         : 'rgba(210, 214, 222, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : <?php //echo json_encode($totaluser);?>, 
        },
      ]
    }

   
    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = $.extend(true, {}, ChartData)
    var temp0 = ChartData.datasets[0]
    var temp1 = ChartData.datasets[1]
    barChartData.datasets[0] = temp1
    barChartData.datasets[1] = temp0

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    new Chart(barChartCanvas, {
      type: 'bar',
      data: barChartData,
      options: barChartOptions
    })

  })
</script> -->

</body>
</head>