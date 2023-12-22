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
            <h1 class="m-0">Users</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php" class="text-secondary">Home</a></li>
              <li class="breadcrumb-item active">Users</li>
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
                  <h3 class="card-title"><button type="button" class="btn btn-success"  data-toggle="modal" data-target="#newUser"><i class="fas fa-plus"> New</i></button></h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Tools</th>
                    </tr>
                    </thead>
                    <tbody>
                      <!-- Display Users in Table -->
                      <?php
                      $sql  = "SELECT * FROM users WHERE usertype = 0 ORDER BY id;";
                      $result = mysqli_query($conn,$sql);
                      if ($result->num_rows > 0) {
                        $res = mysqli_fetch_all($result);
                        foreach($res as $row){

                        
                        echo '
                        <tr>
                        <td>'.$row[1].' '.$row[2].'</td>
                            <td>'.$row[3].'</td>
                            <td class="text-break">'.$row[8].'</td>
                            <td  class="text-break">'.$row[4].'</td>
                            <td>                                
                                <span><a href="user_view.php?user_id='.$row[0].'"><button class="btn btn-xs btn-info m-1"><i class="fas fa-eye"></i> View</button></a></span>
                                <span><button class="btn btn-xs btn-danger m-1 delete" data-id="'.$row[0].'"><i class="fas fa-trash" data-toggle="modal" data-target="#deleteUser"></i> Delete</button></span>
                                
                            </td>
                            </tr>
                            ';}
                      }
                      ?>                      

                    </tbody>
                    <tfoot>
                    <tr>
                      <th>Name</th>
                      <th>Gender</th>
                      <th>Email</th>
                      <th>Address</th>
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
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->




<!-- /.wrapper -->
</div>
<?php
include './includes/modals/user_modal.php'; 
include './includes/footer.php';
include './includes/script.php';

?>
<!-- Add new user Ajax method - POST -->
<script>
    $(document).ready(function(){    
    $('#new_user_save').on('click', function(){          
      var emailValidation = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
    	var add_fname = $('#add_fname').val();
    	var add_lname = $('#add_lname').val();
      var add_gender = $("input[name='add_gender']:checked").val();
      var add_address = $('#add_address').val();
      var add_age = $('#add_age').val();      
      var add_birth = $('#add_birth').val();
      var add_contno = $('#add_contno').val();
      var add_email = $('#add_email').val(); 
      var add_username = $('#add_username').val();
      var add_psw = $('#add_psw').val();
      var add_repeatpsw = $('#add_repeatpsw').val();     
              
      if(add_fname.trim() == '' ){
        $('.statusMsg').html('<div class="alert alert-danger w-100" role="alert">Some fields are empty! Please fill it out.</div>');
        $('#add_fname').focus();
        return false;
    }
    else if(add_lname.trim()== ''){
      $('.statusMsg').html('<div class="alert alert-danger w-100" role="alert">Some fields are empty! Please fill it out.</div>');
        $('#add_lname').focus();
        return false;
      }
      else if($('#add_radMale').prop('checked')==false && $('#add_radFemale').prop('checked')==false ){
        $('.statusMsg').html('<div class="alert alert-danger w-100" role="alert">Please select your gender.</div>');
        $('.gender-f').focus();
        return false
      }
      else if(add_address.trim()== ''){
      $('.statusMsg').html('<div class="alert alert-danger w-100" role="alert">Some fields are empty! Please fill it out.</div>');
        $('#add_address').focus();
        return false;
      }
      else if(add_age.trim()== ''){
      $('.statusMsg').html('<div class="alert alert-danger w-100" role="alert">Some fields are empty! Please fill it out.</div>');
        $('#add_age').focus();
        return false;
      }
      else if(add_birth.trim()== ''){
      $('.statusMsg').html('<div class="alert alert-danger w-100" role="alert">Some fields are empty! Please fill it out.</div>');
        $('#add_birth').focus();
        return false;
      }
      else if(add_contno.trim()== ''){
      $('.statusMsg').html('<div class="alert alert-danger w-100" role="alert">Some fields are empty! Please fill it out.</div>');
        $('#add_contno').focus();
        return false;
      }
      else if(add_email.trim()== ''){
      $('.statusMsg').html('<div class="alert alert-danger w-100" role="alert">Some fields are empty! Please fill it out.</div>');
        $('#add_email').focus();
        return false;
      }
      else if(add_email.trim()!= '' && !emailValidation.test(add_email)){
      $('.statusMsg').html('<div class="alert alert-danger w-100" role="alert">Invalid email format, Please try again.</div>');
        $('#add_email').focus();
        return false;
      }
      else if(add_username.trim()== ''){
      $('.statusMsg').html('<div class="alert alert-danger w-100" role="alert">Some fields are empty! Please fill it out.</div>');
        $('#add_username').focus();
        return false;
      }
      else if(add_psw.trim()== ''){
      $('.statusMsg').html('<div class="alert alert-danger w-100" role="alert">Some fields are empty! Please fill it out.</div>');
        $('#add_psw').focus();
        return false;
      }
      else if(add_repeatpsw.trim()== ''){
      $('.statusMsg').html('<div class="alert alert-danger w-100" role="alert">Some fields are empty! Please fill it out.</div>');
        $('#add_repeatpsw').focus();
        return false;
      }
     else{
        
      //  alert(add_fname+'\n'+add_lname+'\n'+add_gender+'\n'+add_address+'\n'+add_age+'\n'+add_birth+'\n'+add_contno+'\n'+add_email+'\n'+add_psw+'\n'+add_repeatpsw);    
        $.ajax({
            type: 'POST',
            url: 'user_add.php',
            data: {
              add_fname: add_fname,
              add_lname: add_lname,
              add_gender: add_gender,
              add_address: add_address,
              add_age: add_age,
              add_birth: add_birth,
              add_contno: add_contno,
              add_email: add_email,
              add_username: add_username,
              add_psw: add_psw,
              add_repeatpsw: add_repeatpsw
            },
            success: function(data){
              if(data == 'success'){
                $('.statusMsg').html('<div class="alert alert-success w-100" role="alert">User successfully added!</div>');
                $('#add_fname').val('');
                $('#add_lname').val('');
                $("input[name='add_gender']:checked").val('');
                $('#add_address').val('');
                $('#add_age').val('');      
                $('#add_birth').val('');
                $('#add_contno').val('');
                $('#add_email').val(''); 
                $('#add_username').val('');
                $('#add_psw').val('');
                $('#add_repeatpsw').val('');
                setTimeout(function(){location.reload(true)}, 1200);
              }
              else{
                $('.statusMsg').html(data);
              }                        
            }
        })
   }
    	});
        
    });
   
    // For delete
    var user_id; // Global Variable
    $(document).on('click', '.delete', function(e){
    e.preventDefault();
    $('#deleteUser').modal('show');
    user_id = $(this).data('id');  
  });

  $(document).ready(function(){    
    $('#deleteUserBtn').on('click', function(){
      $.ajax({
            type: 'POST',
            url: 'user_delete.php?user_id='+user_id,
            data: {},
            success: function(data){
              if(data='success'){
                setTimeout(function(){location.reload(true)}, 1500);
                succFunc('User deleted successfully!');        
              }
              else{
                errorFunc(data);
              }              
            }
      })
    });
  });
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
  
</script>


</body>
</head>