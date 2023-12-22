<?php

include './includes/session.php';
include './includes/header.php';
$where = '';
  if(isset($_GET['category'])){
    $catid = $_GET['category'];
    $where = 'WHERE category_id ='.$catid;
  }

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
            <h1 class="m-0">Products</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php" class="text-secondary">Home</a></li>
              <li class="breadcrumb-item active">Products</li>
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
                  <h3 class="card-title"><button type="button" data-toggle="modal" data-target="#newprod" class="btn btn-success"><i class="fas fa-plus"> New</i></button></h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  
                  <!-- Category Select -->
                  <div class="row">
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                            <label>Category</label>
                            <select class="form-control select2 select2-purple" data-dropdown-css-class="select2-purple" style="width: 50%;" id="select_category" name="select_category">
                            <option value="0" >All</option>
                            <?php
                            // Fetch category
                            $sql = "SELECT * FROM category;";
                            $result = mysqli_query($conn,$sql);
                            if($result-> num_rows > 0 ){
                              $res = mysqli_fetch_all($result);
                              foreach($res as $row){
                                $selected = ($row[0] == $catid) ? ' selected="selected' : ''; 
                                echo '<option value="'.$row[0].'"'.$selected.'">'.$row[1].'</option>';
                              }
                            }

                            ?>                                   
                            </select>

                        </div>
                        <!-- /.form-group -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Photo</th>
                        <th>Product Name</th>
                        <th>Price/Item</th>
                        <th>Stocks</th>
                        <th>Tools</th>
                    </tr>
                    </thead>
                    <tbody>
                        
                    <?php
                    // Fetch Products into table
                  $sql  = "SELECT * FROM products $where;";
                  $result = mysqli_query($conn,$sql);
                  if($result -> num_rows > 0 ){
                    $res = mysqli_fetch_all($result);
                    foreach($res as $row){                     
                      echo ' 
                      <tr>
                            <td><img src="../dist/img/productimg/'.$row[6].'" width="60" height="50" alt=""></td>
                            <td class="text-break">'.$row[2].'</td>
                            <td>'.$row[4].'</td>
                            <td>'.$row[5].'</td>
                            <td>                                
                                <span><button class="btn btn-xs btn-success edit-btn" data-toggle="modal" data-target="#edit_prod" data-id='.$row[0].'><i class="fas fa-edit"></i> Edit</button></span>
                                <span><button class="btn btn-xs btn-danger delete-btn" data-toggle="modal" data-target="#deleteProd" data-id='.$row[0].'><i class="fas fa-trash"></i> Delete</button></span>
                                
                            </td>
                        </tr>
                      ';
                      
                    }
                  }
                  ?>
                    
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Photo</th>
                        <th>Product Name</th>
                        <th>Price/Item</th>
                        <th>Stocks</th>
                        <th>Tools</th>
                    </tr>
                    </tfoot>
                  </table>
                </div>
                <small id="buang"></small>
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
include './includes/modals/product_modal.php';
include './includes/footer.php';
include './includes/script.php';

?>

<script>
  // Sort Table 
   $('#select_category').change(function(){
    var val = $(this).val();
    if(val == 0){
      window.location = 'products.php';
    }
    else{
      window.location = 'products.php?category='+val;
    }
  });
   // Product Preview Image 

   // for add
  function prdctImg(){
        document.querySelector('#prdctimg').click();
      }
      function displayPrdctImg(e){
        if(e.files[0]){
          var reader = new FileReader();
    
          reader.onload = function(e){
            document.querySelector('#prdctdisplay').setAttribute('src',e.target.result);
          }
          reader.readAsDataURL(e.files[0]);
        }    
      }
    //  for edit - not use (gonna use this if i change my mind lol)
      function edit_prdctImg(){
        document.querySelector('#edit_prdctimg').click();
      }
      function edit_displayPrdctImg(e){
        if(e.files[0]){
          var reader = new FileReader();
    
          reader.onload = function(e){
            document.querySelector('#edit_prdctdisplay').setAttribute('src',e.target.result);
          }
          reader.readAsDataURL(e.files[0]);
        }    
      }
// Product Preview Image - END


      // Add Product POST Ajax
      $("#add_product_btn").on("click",function(){
        var formdata = new FormData(document.querySelector('#add_product_form'));
        var add_prdct_image = $("#prdctimg").val();
        var add_prdctname = $("#add_prdctname").val();
        var add_prdct_cat = $("#add_prdct_cat").val();
        var add_prdctdes = $("#add_prdctdes").val();
        var add_price  = $("#add_price").val();
        var add_stock = $("#add_stock").val();  

        if(add_prdct_image == ''){
          $('.statusMsg').html('<div class="alert alert-danger w-100" role="alert">Please select image for this product!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
          $("#prdctimg").focus();          
        }
        else if(add_prdctname == ''){
          $('.statusMsg').html('<div class="alert alert-danger w-100" role="alert">Please input the name for this product!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
          $("#add_prdctname").focus();          
        }
        else if(add_prdct_cat == 0){
          $('.statusMsg').html('<div class="alert alert-danger w-100" role="alert">Please select category for this product!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
          $("#add_prdct_cat").focus();          
        }
        else if(add_prdctdes ==''){
          $('.statusMsg').html('<div class="alert alert-danger w-100" role="alert">Please input the description for this product!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
          $("#add_prdctdes").focus();          
        }
        else if(add_price == ''){
          $('.statusMsg').html('<div class="alert alert-danger w-100" role="alert">Please input a price for this product!.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
          $("#add_price").focus();          
        }
        else if(add_stock == ''){
          $('.statusMsg').html('<div class="alert alert-danger w-100" role="alert">Please input the stocks for this product!.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
          $("#add_stock").focus();          
        }
        else{
          $.ajax({
            type: "POST",
            url:"product_add.php",
            data:formdata,
            processData: false,
            contentType: false,
            success:function(data){
              if(data=='success'){
                $('.statusMsg').html('<div class="alert alert-success w-100" role="alert">The product is successfully added!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                setTimeout(function(){location.reload(true)}, 1000);
              }
              else{
                $('.statusMsg').html(data);
              }
              
            }
          })          
        }
      })

      // GET PRODUCT ID
      var id;      
    $(document).on('click', '.edit-btn', function(e){ 
      e.preventDefault(); 
    id = $(this).data('id');    
    getRow(id);
  });

  $(document).on('click', '.delete-btn', function(e){ 
      e.preventDefault(); 
    id = $(this).data('id');      
  });
// END

// GET PRODUCT ROW AND DISPLAY IN MODAL
  function getRow(id){
    $.ajax({
    type: 'POST',
    url: 'product_row.php',
    data: {id:id},
    dataType:"JSON",
    success: function(data){
      $('#edit_prdctdisplay').attr("src", "../dist/img/productimg/"+data.photo);   
      $('#edit_prdctname').val(data.name);
      $('#edit_prdctdes').html(data.description);
      $('#edit_price').val(data.price);
      $('#edit_stock').val(data.stock);
      // .selectedIndex = (data.category_id);
      var selectedData = (data.category_id);
      // var selectedIndex = document.getElementById("edit_prdct_cat").selectedIndex ;
      // var selectedText = document.getElementById("edit_prdct_cat").options;
      // alert(selectedText[selectedData].index + 
      // selectedText[selectedData].text);
      // document.getElementById("edit_prdct_cat").selectedIndex = selectedData;
      $("select[name='edit_prdct_cat'] option[value='"+selectedData+"']").prop('selected', true);
      
// $('#edit_prdct_cat').find('option:selected').text();
// AAAAAHHHHHH ANIMAL SALAMAAAAAAT HOHOY
$('#edit_prdct_cat').select2().trigger('change');    
      
     
     
      
    }
  });
  }
// End


// UPDATE PRODUCT POST AJAX - START
  
  $('#edit_product_btn').on('click', function(){
    var formdata = new FormData(document.querySelector('#edit_product_form'));
    var edit_prdctname = $("#edit_prdctname").val();
      var edit_prdct_cat = $("#edit_prdct_cat").val();
      var edit_prdctdes = $("#edit_prdctdes").val();
      var edit_price  = $("#edit_price").val();
      var edit_stock = $("#edit_stock").val();  
      
      if(edit_prdctname == ''){
        $('.statusMsg').html('<div class="alert alert-danger w-100" role="alert">Please input the name for this product!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        $("#edit_prdctname").focus();          
      }
      else if(edit_prdct_cat == 0){
        $('.statusMsg').html('<div class="alert alert-danger w-100" role="alert">Please select category for this product!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        $("#edit_prdct_cat").focus();          
      }
      else if(add_prdctdes ==''){
        $('.statusMsg').html('<div class="alert alert-danger w-100" role="alert">Please input the description for this product!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        $("#add_prdctdes").focus();          
      }
      else if(edit_price == ''){
        $('.statusMsg').html('<div class="alert alert-danger w-100" role="alert">Please input a price for this product!.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        $("#edit_price").focus();          
      }
      else if(edit_stock == ''){
        $('.statusMsg').html('<div class="alert alert-danger w-100" role="alert">Please input the stocks for this product!.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        $("#add_stock").focus();          
      }
      else{
        $.ajax({
          type: "POST",
          url:"product_edit.php?product_id="+id,
          data:formdata,
          processData: false,
          contentType: false,
          success:function(data){
            if(data=='success'){
              $('.statusMsg').html('<div class="alert alert-success w-100" role="alert">The product is successfully updated!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
              setTimeout(function(){location.reload(true)}, 1000);
            }
            else{
              $('.statusMsg').html(data);
            }
          } 
                  
        })               
      }
    
  })

// UPDATE PRODUCTS - END

// Toggle Button
function change(){
    $("#changeOff").toggle(function(){
      $('#edit_prdctimg').prop('disabled', (i, v) => !v);
    })
    $("#changeOn").toggle();
    $("#uploadBtn").toggle()
  }
// UPDATE PRODUCT IMAGE
$('#uploadBtn').on('click',function(){
  var formdata = new FormData(document.querySelector('#edit_product_image'));
  var image = $('#edit_prdctimg').val();
  if(image ==''){
    $('.statusMsg').html('<div class="alert alert-danger w-100" role="alert">Please select image for this product!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    $("#edit_prdctimg").focus();
  }
  else{
    $.ajax({
      type:'POST',
      url:'product_update_img.php?product_id='+id,
      data:formdata,
      processData: false,
      contentType: false,
      success:function(data){
            if(data=='success'){
              $('.statusMsg').html('<div class="alert alert-success w-100" role="alert">The product is successfully updated!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
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

// DELETE PRODUCT
$('#deleteProdBtn').on('click',function(){
  $.ajax({
    type:'POST',
    url:'product_delete.php?product_id='+id,
    success:function(){
      if(data='success'){
        setTimeout(function(){location.reload(true)}, 1500);
        succFunc('Product deleted successfully!');        
      }
      else{
        errorFunc(data);
      }
    }
  })
})
function errorFunc(msg){
      $(document).Toasts('create', {
      title: 'Notification',
      class: 'bg-danger',        
      autohide: true,
      delay: 3000,
      body: msg
    }); 
    }
    function succFunc(msg){
      $(document).Toasts('create', {
      title: 'Notification',
      class: 'bg-success',        
      autohide: true,
      delay: 3000,
      body: msg
    }); 
    }
    // END
  
</script>

</body>
</head>