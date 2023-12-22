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
            <h1 class="m-0">Category</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php" class="text-secondary">Home</a></li>
              <li class="breadcrumb-item"><a href="products.php" class="text-secondary">Products</a></li>
              <li class="breadcrumb-item active">Category</li>
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
                  <h3 class="card-title"><button type="button" class="btn btn-success" data-toggle="modal" data-target="#newCategory" ><i class="fas fa-plus"> New</i></button></h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        
                        <th>Category Name</th>
                        <th>Tools</th>

                    </tr>
                    </thead>
                    <tbody>
                      <?php
                      
                      $sql = "SELECT * FROM category;";
                      $result = mysqli_query($conn,$sql);
                      if($result-> num_rows > 0){
                        $res = mysqli_fetch_all($result);
                        foreach($res as $row){
                          echo '
                          <tr>                            
                          <td>'.$row[1].'</td>                            
                          <td>                                
                              <span><button class="btn btn-sm btn-success edit-cat-Btn" data-toggle="modal" data-target="#edit_Category" data-id='.$row[0].'><i class="fas fa-edit"></i> Edit</button></span>
                              <span><button class="btn btn-sm btn-danger del-cat-Btn" data-toggle="modal" data-target="#delete_Category" data-id='.$row[0].'><i class="fas fa-trash"></i> Delete</button></span>
                              
                          </td>
                      </tr>                  
                                ';
                        }
                      }
                      
                      ?>                                                                     
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Category Name</th>
                        <th>Tools</th>
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





<!-- /.wrapper -->
</div>
<?php
include './includes/modals/category_modal.php';
include './includes/footer.php';
include './includes/script.php';

?>
<script>
  // ADD CATEGORY
  $('#add_cat_btn').on('click',function(){
    var add_cat = $('#add_catname').val();
    if(add_cat == ''){
      $('.statusMsg').html('<div class="alert alert-danger w-100" role="alert">Please enter category name.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        $("#add_catname").focus();
    }
    else{
      $.ajax({
        type:"POST",
        url:'category_add.php',
        data:{add_cat : add_cat},
        success:function(data){
          if(data=='success'){
            $('.statusMsg').html('<div class="alert alert-success w-100" role="alert">Successfully added!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
              setTimeout(function(){location.reload(true)}, 1000);
          }
          else{
            $('.statusMsg').html(data);
          }
        }
      })
    }
  })
  // END

  var id; // global variable
  // GET CATEGORY ID
  $('.edit-cat-Btn').on('click',function(){
    id = $(this).data('id');
    getRow(id);
  })
  $('.del-cat-Btn').on('click',function(){
    id = $(this).data('id');
  })

  // EDIT CATEGORY
  $('#edit_cat_btn').on('click',function(){
    var edit_cat = $('#edit_catname').val();
    if(edit_cat == ''){
      $('.statusMsg').html('<div class="alert alert-danger w-100" role="alert">Please enter category name.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        $("#edit_catname").focus();
    }
    else{
      $.ajax({
        type:"POST",
        url:'category_edit.php?cat_id='+id,
        data:{edit_cat : edit_cat},
        success:function(data){
          if(data=='success'){
            $('.statusMsg').html('<div class="alert alert-success w-100" role="alert">Successfully updated!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
              setTimeout(function(){location.reload(true)}, 1000);
          }
          else{
            $('.statusMsg').html(data);
          }  
        }
      })
    }
  })
  function getRow(id){
    $.ajax({
    type: 'POST',
    url: 'category_fetch.php',
    data: {id:id},
    dataType:"JSON",
    success: function(data){      
      $('#edit_catname').val(data.category);  
    }
  });
  }


  // delete category
  $('#deleteCatBtn').on('click',function(){
  $.ajax({
    type:'POST',
    url:'category_delete.php?cat_id='+id,
    success:function(data){
      if(data='success'){
        $('.statusMsg').html('<div class="alert alert-success w-100" role="alert">Successfully deleted!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
              setTimeout(function(){location.reload(true)}, 1000);
      }
      else{
        $('.statusMsg').html(data);
      }  
    }
  })
})
</script>
</body>
</head>