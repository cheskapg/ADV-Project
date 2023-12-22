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
            <h1 class="m-0">User Profile</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php" class="text-secondary">Home</a></li>
              <li class="breadcrumb-item active"><a href="users.php" class="text-secondary">Users</a></li>
              <li class="breadcrumb-item active">User Profile</li>
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
                  <h3 class="card-title"><a href="users.php"><button type="button" class="btn btn-success"><i class="far fa-arrow-alt-circle-left"> Back</i></button></a></h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
            <?php
            $user_id = $_GET['user_id'];

            // Fetch data from user
            $sql = "SELECT * FROM users WHERE id=$user_id";
            $result= mysqli_query($conn,$sql);
            if($result -> num_rows > 0 ){
                $row = mysqli_fetch_assoc($result);
            }

  // Update Profile Image
if (isset($_POST['updateImg'])) {
  // Image Variables
  $filename = $_FILES['file']['name'];
  $fileExt = explode('.',$filename);
  $fileActualExt = strtolower(end($fileExt));
  $nameToLower = strtolower($row['username']);
  $now = date('Y-m-d');
  $newFilename = uniqid().'_'.$nameToLower.'_'.$now.'.'.$fileActualExt;
  
  $allowed = array('jpg','jpeg','png');
  
  if(in_array($fileActualExt,$allowed)){
    if(!empty($newFilename)){
      move_uploaded_file($_FILES['file']['tmp_name'], '../dist/img/userimg/'.$newFilename);	
    }
    else{
      $notif = " <script>    
      $(document).Toasts('create', {
        title: 'Notification',
        class: 'bg-danger',        
        autohide: true,
        delay: 3000,
        body: 'Error moving file!
      });    
    </script>";
    }   
   $sql = "UPDATE users SET photo='$newFilename' WHERE id=$user_id;";
   if (mysqli_query($conn, $sql)) 
   {
    $sql = "SELECT * FROM users WHERE id=$user_id";
    $result= mysqli_query($conn,$sql);
    if($result -> num_rows > 0 ){
        $row = mysqli_fetch_assoc($result);
    }    
    $notif = " <script>
    setTimeout(function(){             
        $(document).Toasts('create', {
          title: 'Notification',
          class: 'bg-success',        
          autohide: true,
          delay: 3000,
          body: 'Your profile photo is updated successfully!'                  
        });
      }, 2500);           
      </script>";     
   }
   else{
    $notif = " <script>    
    $(document).Toasts('create', {
      title: 'Notification',
      class: 'bg-danger',        
      autohide: true,
      delay: 3000,
      body: 'Something went wrong! Please do check your connection.'
    });    
  </script>";
   }
  
  }
  else{
    $notif = " <script>    
      $(document).Toasts('create', {
        title: 'Notification',
        class: 'bg-danger',        
        autohide: true,
        delay: 3000,
        body: 'Invalid file type please try again.'
      });    
    </script>";
  }
  }
  // Update Profile Image ends here
             
          

            ?>                    
            <div class="card-deck">
            <div class="card">                       
            <form action="" method="POST" enctype="multipart/form-data">          
                        <div class="form-row mb-3">
                        <img src="../dist/img/userimg/<?php echo $row['photo'];?>" onclick="openImg()" id="profileDisplay" width="200" height="200" alt="prof" class="img-circle m-auto">
                        <input type="file"  name="file" class="form-control-file" id="profileImg" onchange="displayImg(this)" style="display: none;" disabled>
                        <div class="w-100"></div>
                        <label for="" class="m-auto">Photo</label>                        
                      </div>
                      <div class="form-row mb-3 justify-content-center mt-5">
                        <div class="col-sm-2">
                      <button id="updateButton" name="updateImg" style="display: none;"  class="btn btn-sm btn-primary w-100">Apply</button>
                      </div>
                      </div>
            </form>
            <button id="changeToggle" onclick="updateProfile()" class="btn btn-sm bg-info my-2">Change Profile Photo</button>
            <button id="cancelToggle" onclick="updateProfile()" class="btn btn-sm bg-danger" style="display: none;">Cancel</button>

            <div class="card-body">
            <button id="changeInfo" onclick="updateInfo()" class="btn btn-sm bg-teal my-3">Change Information</button>
            <button id="cancelInfo" onclick="updateInfo()" class="btn btn-sm bg-maroon my-3" style="display: none;">Cancel</button>
            <form method="POST" enctype="multipart/form-data" id="infoForm">                            
                      <div class="form-row mb-2">
                          <div class="col">
                            <label for="fname">First Name</label>
                            <input type="text" class="form-control" name="edit_fname" id="edit_fname" value="<?php echo $row['fname']?>" disabled required>
                          </div>
                          <div class="col">
                            <label for="lname">Last Name</label>
                            <input type="text" name="add_lname" id="edit_lname" class="form-control" value="<?php echo $row['lname']?>" disabled required>
                          </div>
                      </div>
      
                      <label for="gender">Gender</label>
                      <div class="form-check gender-f">
                        <input class="form-check-input" type="radio" name="edit_gender" id="edit_radMale" disabled value="Male">
                        <label class="form-check-label" for="radMale">
                          Male
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="edit_gender" id="edit_radFemale" disabled value="Female">
                        <label class="form-check-label" for="radFemale">
                          Female
                        </label>
                      </div>
      
                      <div class="form-row mb-2">
                        <div class="col">
                          <label for="address">Address</label>
                          <input type="text" class="form-control form-control-lg fs-5" name="add_address" id="edit_address" value="<?php echo $row['address']?>" disabled required >
                        </div>
                      </div>
      
                      <div class="form-row mb-2">
                        <div class="col">
                          <label for="ages">Age</label>
                          <input type="number" class="form-control"  name="add_age" id="edit_age" value="<?php echo $row['age']?>" disabled required >
                        </div>
                        <div class="col">
                          <label for="birth">Birth</label>
                          <input type="date" name="add_birth" id="edit_birth" class="form-control" value="<?php echo $row['birth']?>" disabled required>
                        </div>
                      </div>
                      <div class="form-row mb-2">
                        <div class="col">
                          <label for="contno">Contact Number</label>
                          <input type="number" class="form-control" name="add_contno" id="edit_contno" value="<?php echo $row['contno']?>" disabled required >
                        </div>
                      </div>

                        <div class="form-row mb-2">
                        <div class="col">
                          <label for="email">Email</label>
                          <input type="email" class="form-control" name="add_email" id="edit_email"  value="<?php echo $row['email']?>" disabled required >
                        </div>
                        </div>  

                        <div class="form-row mb-2">
                        <div class="col">
                          <label for="username">Username</label>
                          <input type="text" class="form-control" name="add_username" id="add_username"  value="<?php echo $row['username']?>" disabled required readonly>
                        </div>
                      </div>                                                                         
                  </form>
                  <div class="row">
                  <button id="applyChange" name="applyChange" class="btn btn-md my-3 mx-auto bg-primary" style="display: none;" >Apply Change</button>
                  </div>                                         
                  <button class="btn btn-md bg-info" data-toggle="modal" data-target="#updatePass" >Change Password</button>          
            </div>
            </div>
            </div>
            <!-- /.card-deck -->
            <div class="card my-3">
              <div class="card-header">
              <h2><span>Cart <i class="fas fa-shopping-cart"></i></span></h2>
              </div>
              <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Photo</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Date Added</th>
                        <th>Tools</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php
                       $sql = "SELECT products.photo,products.name,products.price,cart.quantity,cart.date_added,cart.id FROM cart
                       INNER JOIN products ON products.id = cart.product_id WHERE cart.user_id = $user_id;";
                       $result= mysqli_query($conn,$sql);
                       if($result -> num_rows > 0 ){
                           $row = mysqli_fetch_all($result);

                           foreach($row as $res){
                             echo '
                             <tr>
                             <td><img src="../dist/img/productimg/'.$res[0].'" width="60" height="50" alt=""></td>
                             <td>'.$res[1].'</td>
                             <td>'.$res[2].'</td>
                             <td>'.$res[3].'</td>
                             <td>'.$res[4].'</td>
                             <td><button class="btn btn-xs btn-danger delete-cart-btn" data-toggle="modal" data-target="#deleteCartUser" data-id='.$res[5].'><i class="fas fa-trash"></i> Delete</button></td>
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
                      <th>Price</th>
                      <th>Quantity</th>
                      <th>Date Added</th>
                      <th>Tools</th>
                    </tr>
                    </tfoot>
                  </table>
              </div>
            </div>
                  
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




</div>
<?php
include './includes/modals/user_modal.php';
include './includes/footer.php';
include './includes/script.php';

?>




<script>
  // Toggle 
  function updateProfile(){
    $("#changeToggle").toggle(function(){
      $("#profileImg").prop('disabled', (i, v) => !v);
    })
    $("#cancelToggle").toggle()     
    $("#updateButton").toggle()
  }
  
  function updateInfo(){
    $("#changeInfo").toggle(function(){              
     // $('#edit_fname').prop('disabled', function(i, v) { return !v; }); -- Selected input field
      // $('#edit_fname').prop('disabled', (i, v) => !v); // >> simplified from the code above
      $("#infoForm :input").prop('disabled', (i, v) => !v); // selected form by id and disabled all input fields
    });
    $("#cancelInfo").toggle()
    $("#applyChange").toggle()  
  }
  // Toggle end here


  // Image Preview Change
  function openImg(){
        document.querySelector('#profileImg').click();
      }
      function displayImg(e){
        if(e.files[0]){
          var reader = new FileReader();
    
          reader.onload = function(e){
            document.querySelector('#profileDisplay').setAttribute('src',e.target.result);
          }
          reader.readAsDataURL(e.files[0]);
        }    
      }
    
      // Update User Info.
      $(document).ready(function(){    
    $('#applyChange').on('click', function(){               
    	var edit_fname = $('#edit_fname').val();
    	var edit_lname = $('#edit_lname').val();
      var edit_gender = $("input[name='edit_gender']:checked").val();
      var edit_address = $('#edit_address').val();
      var edit_age = $('#edit_age').val();      
      var edit_birth = $('#edit_birth').val();
      var edit_contno = $('#edit_contno').val();
      var edit_email = $('#edit_email').val();           
              
      if(edit_fname.trim() == '' ){
        errorFunc('Some fields are empty! Please fill it out');
        $('#edit_fname').focus();
        return false;
    }
    else if(edit_lname.trim()== ''){
      errorFunc('Some fields are empty! Please fill it out');
        $('#edit_lname').focus();
        return false;
      }
      else if($('#edit_radMale').prop('checked')==false && $('#edit_radFemale').prop('checked')==false ){
        errorFunc('Some fields are empty! Please fill it out');
        $('.gender-f').focus();
        return false
      }
      else if(edit_address.trim()== ''){
        errorFunc('Some fields are empty! Please fill it out');
        $('#edit_address').focus();
        return false;
      }
      else if(edit_age.trim()== ''){
        errorFunc('Some fields are empty! Please fill it out');
        $('#edit_age').focus();
        return false;
      }
      else if(edit_birth.trim()== ''){
        errorFunc('Some fields are empty! Please fill it out');
        $('#edit_birth').focus();
        return false;
      }
      else if(edit_contno.trim()== ''){
        errorFunc('Some fields are empty! Please fill it out');
        $('#edit_contno').focus();
        return false;
      }
      else if(edit_email.trim()== ''){
        errorFunc('Some fields are empty! Please fill it out');
        $('#edit_email').focus();
        return false;
      }            
     else{             
        $.ajax({
            type: 'POST',
            url: 'user_edit.php?user_id=<?php echo $user_id;?>',
            data: {
              edit_fname: edit_fname,
              edit_lname: edit_lname,
              edit_gender: edit_gender,
              edit_address: edit_address,
              edit_age: edit_age,
              edit_birth: edit_birth,
              edit_contno: edit_contno,
              edit_email: edit_email,              
            },
            success: function(data){
              if(data == 'success'){                         
                if(setTimeout(function(){location.reload(true)}, 3100)){
                  succFunc('Your information updated successfully!');                
                }
              }
              else{
               errorFunc(data);
              }
              
                                      
            }
        })
   }
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



// Update Password - User
$(document).ready(function(){    
    $('#updatePassBtn').on('click', function(){     
    	var up_currentpsw = $('#up_currentpsw').val();
    	var up_newpsw = $('#up_newpsw').val();
    	var up_repeatpsw = $('#up_repeatpsw').val();

    	if(up_currentpsw.trim() == '' ){
            $('.statusMsg').html('<div class="alert alert-danger" role="alert">Please enter the empty field!</div>');
        $('#up_currentpsw').focus();
        return false;
    }else if(up_newpsw.trim() == '' ){
        $('.statusMsg').html('<div class="alert alert-danger" role="alert">Please enter the empty field!</div>');
        $('#up_newpsw').focus();
        return false;
    }else if(up_repeatpsw.trim()== ''){
        $('.statusMsg').html('<div class="alert alert-danger" role="alert">Please enter the empty field!</div>');
        $('#up_repeatpsw').focus();
        return false;
}        else{
        $.ajax({
            type: 'POST',
            url: 'user_updatepass.php?user_id=<?php echo $user_id;?>',
            data: {
              up_currentpsw: up_currentpsw,
              up_newpsw: up_newpsw,
              up_repeatpsw: up_repeatpsw
            }, 
            success: function(data){
              if(data=='success'){
                $('.statusMsg').html('<div class="alert alert-success" role="alert">Password Updated Successfully!</div>');
                $('#up_currentpsw').val('');
                $('#up_newpsw').val('');
                $('#up_repeatpsw').val('');
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


    // Delete cart item
    var cart_id; // Global Variable
    $(document).on('click', '.delete-cart-btn', function(e){
    e.preventDefault();
    $('#deleteCartUser').modal('show');
    cart_id = $(this).data('id');  
  });
    $(document).ready(function(){
      $('#deleteCartUserBtn').on('click', function(){
      $.ajax({
            type: 'POST',
            url: 'user_cart_delete.php?user_id=<?php echo $user_id;?>&cart_id='+cart_id,
            data: {},
            success: function(data){
              if(data='success'){
                setTimeout(function(){location.reload(true)}, 2000);
                succFunc('Item Removed');        
              }
              else{
                errorFunc(data);
              }                          
            }
      })
      
    });

    })



</script>
<!--  Gender = Radio Checked -->
<?php
$gender = $row['gender'];
  if($gender === "Female")
  {
    echo '<script>
    document.getElementById("edit_radFemale").checked = true;
  </script>';
  }
  else if($gender === "Male")
  {
    echo'<script>
    document.getElementById("edit_radMale").checked = true;
  </script>';
  }
  else if($gender === ""){
    echo'<script>
    document.getElementById("edit_radMale").checked = false;
    document.getElementById("edit_radFemale").checked = false;
    </script>'; 
  }


?>
</body>
</html>