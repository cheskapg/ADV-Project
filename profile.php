<?php
include './includes/config.php';

session_start();
if (isset($_SESSION['admin'])) {
  header("Location: ./admin/index.php");
}

if (!isset($_SESSION['user'])) {
  header("Location: index.html");
} 
 
include './includes/header2.php';
?>
<body>
<?php 
include './includes/navbar.php';


?>
<!-- Profile -->
<section class="my-5">
    <div class="container mt-3" id="refreshcont">       
        <div class="row">
            <div class="col-md text-center" id="photoFormRow">
            <form action="" method="POST" enctype="multipart/form-data" id="photoForm">
                <?php
                
            if(isset($_SESSION['user'])){

            $sql = "SELECT * FROM users WHERE id = ".$_SESSION['user']['id'].";";
            $res = mysqli_query($conn,$sql);
            if($res -> num_rows > 0){
                $user = mysqli_fetch_assoc($res);
                $_SESSION['user'] = $user;
                
            }

            }            
                ?>           
            <div class="form-row mb-3">
            <img src="./dist/img/userimg/<?php echo $user['photo'] ?>" onclick="openImg()" id="profileDisplay" style="width:250px;height:250px;" alt="prof" class="img-fluid rounded">
            <input type="file"  name="file" class="form-control-file" id="profileImg" onchange="displayImg(this)" style="display: none;" disabled>
            <div class="w-100"></div>
            <label for="" class="m-auto">Photo</label>                        
            </div>
            <div class="form-row mb-3 mt-5">
            <div class="col">
            <button id="updateButton" name="updateImg" style="display: none;"  class="btn btn-sm btn-primary w-100">Apply</button>
            </div>
            </div>
            </form>
            
            <button id="changeToggle" onclick="updateProfile()" class="btn btn-sm bg-info my-2">Change Profile Photo</button>
            <button id="cancelToggle" onclick="updateProfile()" class="btn btn-sm bg-danger text-light" style="display: none;">Cancel</button>                
            </div>

            <div class="col-md">

            <button id="changeInfo" onclick="updateInfo()" class="btn btn-sm bg-info my-3">Change Information</button>
            <button id="cancelInfo" onclick="updateInfo()" class="btn btn-sm bg-danger text-light my-3" style="display: none;">Cancel</button>
            <form method="POST" enctype="multipart/form-data" id="infoForm">                            
                      <div class="form-row mb-2">
                          <div class="col">
                            <label for="fname">First Name</label>
                            <input type="text" class="form-control" name="edit_fname" id="edit_fname" value="<?php echo $user['fname']?>" disabled required>
                          </div>
                          <div class="col">
                            <label for="lname">Last Name</label>
                            <input type="text" name="add_lname" id="edit_lname" class="form-control" value="<?php echo $user['lname']?>" disabled required>
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
                          <input type="text" class="form-control form-control-lg fs-5" name="add_address" id="edit_address" value="<?php echo $user['address']?>" disabled required >
                        </div>
                      </div>
      
                      <div class="form-row mb-2">
                        <div class="col">
                          <label for="ages">Age</label>
                          <input type="number" class="form-control"  name="add_age" id="edit_age" value="<?php echo $user['age']?>" disabled required >
                        </div>
                        <div class="col">
                          <label for="birth">Birth</label>
                          <input type="date" name="add_birth" id="edit_birth" class="form-control" value="<?php echo $user['birth']?>" disabled required>
                        </div>
                      </div>
                      <div class="form-row mb-2">
                        <div class="col">
                          <label for="contno">Contact Number</label>
                          <input type="number" class="form-control" name="add_contno" id="edit_contno" value="<?php echo $user['contno']?>" disabled required >
                        </div>
                      </div>

                        <div class="form-row mb-2">
                        <div class="col">
                          <label for="email">Email</label>
                          <input type="email" class="form-control" name="add_email" id="edit_email"  value="<?php echo $user['email']?>" disabled required >
                        </div>
                        </div>  

                        <div class="form-row mb-2">
                        <div class="col">
                          <label for="username">Username</label>
                          <input type="text" class="form-control" name="add_username" id="add_username"  value="<?php echo $user['username']?>" disabled required readonly>
                        </div>
                      </div>                                                                         
                  </form>                 
                  <button id="applyChange" name="applyChange" class="btn btn-md my-3 mx-auto text-light w-100 bg-primary" style="display: none;" >Apply Change</button>
                  <div class="w-100"></div>
                  <button class="btn btn-md bg-warning text-dark change-pass" data-toggle="modal" data-target="#changePassword" id="changepass" >Change Password</button>                    
                </div>                                         
                  
        
            </div>

        </div>
    </div>
</section>


<?php 
include './includes/modal/user_modal.php';
include './includes/script2.php';
?>


<script>
// Show change password modal
$(document).on('click', '.change-pass', function(e){
    e.preventDefault();
    $('#changePassword').modal('show');    
  });

// Update Password - User
$(document).ready(function(){    
    $('#updatePassBtn').on('click', function(){     
    	var up_currentpsw = $('#up_currentpsw').val();
    	var up_newpsw = $('#up_newpsw').val();
    	var up_repeatpsw = $('#up_repeatpsw').val();

    	if(up_currentpsw.trim() == '' ){
        toastr.error('Please enter the empty field!', 'Ecommerce');
        $('#up_currentpsw').focus();
        return false;
    }else if(up_newpsw.trim() == '' ){
      toastr.error('Please enter the empty field!', 'Ecommerce');
        $('#up_newpsw').focus();
        return false;
    }else if(up_repeatpsw.trim()== ''){
      toastr.error('Please enter the empty field!', 'Ecommerce');
        $('#up_repeatpsw').focus();
        return false;
}        else{
        $.ajax({
            type: 'POST',
            url: 'user_updatepass.php?user_id=<?php echo $_SESSION['user']['id'];?>',
            data: {
              up_currentpsw: up_currentpsw,
              up_newpsw: up_newpsw,
              up_repeatpsw: up_repeatpsw
            }, 
            success: function(data){
              if(data=='success'){
                $("#changePassword").modal('hide');
                toastr.success('Password updated!', 'Ecommerce');
                $('#up_currentpsw').val('');
                $('#up_newpsw').val('');
                $('#up_repeatpsw').val('');                
                $( "#refreshcont" ).load( "profile.php #refreshcont" ); 
              }
              else{
                toastr.error(data, 'Ecommerce');
              }                        
               
                
            }
        })
    }
    	});
        
    });


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
    // Preview END


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
        url: 'user_edit.php?user_id=<?php echo $_SESSION['user']['id'];?>',
        data: {
            edit_fname: edit_fname,
            edit_lname: edit_lname,
            edit_gender: edit_gender,
            add_address: edit_address,
            edit_age: edit_age,
            edit_birth: edit_birth,
            edit_contno: edit_contno,
            edit_email: edit_email,              
        },
        success: function(data){            
            if(data == 'success'){   
                if(setTimeout(function(){location.reload(true)}, 3100)){
                    toastr.success('Your profile information is successfully updated!', 'Ecommerce');
              $( "#infoForm" ).load( "profile.php #infoForm" );
                }
                
              
              
            }
            else{
                toastr.error(data, 'Ecommerce');
            }
            
                                    
        }
    })
    }
    });

    });
// UPDATE INFO END

 // Prevent form from submitting
 $('form').each(function(){
    $(this).submit(function(e){
        e.preventDefault();        
        return  false;
    })
}) 
// End


// UPDATE USER IMAGE
$('#updateButton').on('click',function(){   
  var formdata = new FormData(document.querySelector('#photoForm'));  
  var image = $('#profileImg').val();
  if(image ==''){
    toastr.error('Please select image before applying the changes!', 'Ecommerce');
    $("#profileImg").focus();
  }
  else{
    $.ajax({
      type:'POST',
      url:'user_update_img.php?user_id=<?php echo $_SESSION['user']['id']; ?>',
      data:formdata,
      processData: false,
      contentType: false,
      success:function(data){
            if(data=='success'){
                if(setTimeout(function(){location.reload(true)}, 3100)){
                    toastr.success(' Your profile photo is updated successfully!', 'Ecommerce');
              $( "#photoForm" ).load( "profile.php #photoForm" );
              $( "#userrow" ).load( "profile.php #userrow" );
              $( "#refreshcont" ).load( "profile.php #refreshcont" );
                }
            }
            else{
                toastr.error(data, 'Ecommerce');
            }
          } 
    })
  }
})
// END 



</script>

<?php

// <!--  Gender = Radio Checked -->
$gender = $user['gender'];
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