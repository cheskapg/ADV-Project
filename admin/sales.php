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
            <h1 class="m-0">Sales</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php" class="text-secondary">Home</a></li>
              <li class="breadcrumb-item active">Sales</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <!-- Dateranger picker -->
                  <input type="text" class="float-right" name="daterange" value="01/01/2018 - 01/15/2018" style="cursor: pointer;" />
                </div>

                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>User</th>
                        <th>Receipt ID</th>
                        <th>Amount</th>
                        <th>Date Issue</th>
                       
                    </tr>
                    </thead>
                    <tbody>
                      <?php
                      $sql = "SELECT users.fname,users.lname,sales.receipt_id,sales.amount_paid,sales.sales_date FROM sales INNER JOIN users ON users.id = sales.user_id;";
                      $res =mysqli_query($conn,$sql);
                      if($res -> num_rows > 0){
                        $result = mysqli_fetch_all($res);
                        foreach($result as $row){
                          echo 
                          '
                        <tr>
                          <td>'.$row[0].' '.$row[1].'</td>
                          <td>'.$row[2].'</td>
                          <td>'.$row[3].'</td>
                          <td>'.$row[4].'</td>
                        </tr>  
                          ';
                          
                        }
                      }
                      
                      ?>                         
                                                           
                    </tbody>
                    <tfoot>
                      <tr>
                      <th>User</th>
                        <th>Receipt ID</th>
                        <th>Amount</th>
                        <th>Date Issue</th>
                        
                    </tr>
                    </tfoot>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



<!-- /.wrapper -->
</div>
<?php 
include './includes/footer.php';
include './includes/script.php';

?>
</body>
</head>