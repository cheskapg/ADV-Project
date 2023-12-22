<?php
include '../../includes/config.php';


$id = $_SESSION['admin']['id'];

// Update credentials
if (isset($_POST['save'])) {
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $gender = $_POST['gender'];
  $address = $_POST['address'];
  $age = $_POST['age'];
  $birth = $_POST['birth'];
  $contno = $_POST['contno'];
	$email = $_POST['email'];
  
  $sql = "UPDATE users SET fname = '$fname', lname='$lname',gender='$gender',address='$address',age=$age,birth='$birth',contno=$contno,email='$email' WHERE id=$id"; 
   
  if (mysqli_query($conn, $sql)) 
  {
    $sql = "SELECT * FROM users WHERE id=$id";
	  $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
      $row = mysqli_fetch_assoc($result);
      $_SESSION['admin'] = $row;            
    }
    $page = basename($_SERVER['PHP_SELF']);
  
    $notif = " <script>    
    $(document).Toasts('create', {
      title: 'Notification',
      class: 'bg-success',        
      autohide: true,
      delay: 2000,
      body: 'Your information is updated successfully!'
    });    
  </script>";
  }
  else         
  {
    $notif = " <script>
    $(document).Toasts('create', {
      title: 'Notification',
      class: 'bg-danger',        
      autohide: true,
      delay: 5000,
      body: 'Something went wrong! Please do check your connection.'
    });   
  </script>";  
  }

}
// Update Credentials ends here



// Update Profile Image
if (isset($_POST['uploadimg'])) {
// Image Variables
$filename = $_FILES['file']['name'];
$fileExt = explode('.',$filename);
$fileActualExt = strtolower(end($fileExt));
$nameToLower = strtolower($_SESSION['admin']['username']);
$now = date('Y-m-d');
$newFilename = uniqid().'_'.$nameToLower.'_'.$now.'.'.$fileActualExt;

$allowed = array('jpg','jpeg','png');

if(in_array($fileActualExt,$allowed)){
  if(!empty($newFilename)){
    move_uploaded_file($_FILES['file']['tmp_name'], '../dist/img/userimg/'.$newFilename);	
  }   
 $sql = "UPDATE users SET photo='$newFilename' WHERE id=$id;";
 if (mysqli_query($conn, $sql)) 
 {
  $sql = "SELECT * FROM users WHERE id=$id";
  $result = mysqli_query($conn, $sql);
  if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['admin'] = $row;            
      }
  $notif = " <script>    
      $(document).Toasts('create', {
        title: 'Notification',
        class: 'bg-success',        
        autohide: true,
        delay: 3000,
        body: 'Your profile photo is updated successfully!'
      });    
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
<!-- / php close -->

<!-- Update Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
          <div class="modal-header bg-navy">
            <h5 class="modal-title" id="staticBackdropLabel">Profile</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true" style="color: white;">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="container-fluid">
            <form action="" method="POST" enctype="multipart/form-data">          
                        <div class="form-row mb-3">
                        <img src="../dist/img/userimg/<?php echo $_SESSION['admin']['photo']; ?>" onclick="adminImg()" id="admindisplay" width="200" height="200" alt="prof" class="img-circle m-auto navbar-prof">
                        <input type="file"  name="file" class="form-control-file" id="adminimg" onchange="displayAdminImg(this)" style="display: none;" disabled>
                        <div class="w-100"></div>
                        <label for="" class="m-auto">Photo</label>                        
                      </div>
                      <div class="form-row mb-3 justify-content-center mt-5">
                        <div class="col-sm-2">
                      <button id="uploadButton" name="uploadimg" style="display:none;" class="btn btn-sm btn-primary w-100">Apply</button>
                      </div>
                      </div>
            </form>
            <button id="ChangeImgOff" class="btn btn-sm btn-danger" style="display:none;" onclick="changeProf()">Cancel</button>
            <button id="ChangeImgOn" class="btn btn-sm btn-info"  onclick="changeProf()">Change profile</button> 
            
            <form action="" method="POST">
                      <div class="form-row mb-2">
                          <div class="col">
                            <label for="fname">First Name</label>
                            <input type="text" class="form-control" name="fname" id="fname" value="<?php echo $_SESSION['admin']['fname']; ?>" required>
                          </div>
                          <div class="col">
                            <label for="lname">Last Name</label>
                            <input type="text" name="lname" id="lname" class="form-control" value="<?php echo $_SESSION['admin']['lname']; ?>" required>
                          </div>
                      </div>
                            
                      <label for="gender">Gender</label>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="radMale" value="Male" value="<?php echo $_POST['gender']; ?>" required>
                        <label class="form-check-label" for="radMale">
                          Male
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="radFemale" value="Female" value="<?php echo $_POST['gender']; ?>">
                        <label class="form-check-label" for="radFemale">
                          Female
                        </label>
                      </div>
      
                      <div class="form-row mb-2">
                        <div class="col">
                          <label for="address">Address</label>
                          <input type="text" class="form-control form-control-lg fs-5" name="address" id="address" value="<?php echo $_SESSION['admin']['address']; ?>" required >
                        </div>
                      </div>
      
                      <div class="form-row mb-2">
                        <div class="col">
                          <label for="age">Age</label>
                          <input type="number" class="form-control" name="age" id="age" value="<?php echo $_SESSION['admin']['age']; ?>" required >
                        </div>
                        <div class="col">
                          <label for="birth">Birth</label>
                          <input type="date" name="birth" id="birth" class="form-control" value="<?php echo $_SESSION['admin']['birth']; ?>" required>
                        </div>
                      </div>

                      <div class="form-row mb-2">
                        <div class="col">
                          <label for="contno">Contact Number</label>
                          <input type="number" class="form-control" name="contno" id="contno" value="<?php echo $_SESSION['admin']['contno']; ?>" required >
                        </div>
                      </div>

                        <div class="form-row mb-2">
                        <div class="col">
                          <label for="email">Email</label>
                          <input type="email" class="form-control" name="email" id="email" value="<?php echo $_SESSION['admin']['email']; ?>" required >
                        </div>
                        </div>                        

                      <div class="form-row mb-4 mt-4">
                  <div class="col">
                    <button type="button" id="changepsw"  class="btn btn-success" data-toggle="modal" data-target="#changepswmodal"  >Change Password</button>
                  </div>
                  </div>               
                      <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
                <button type="submit" name="save" class="btn btn-primary btn-sm float-right" ><i class="fas fa-save"></i> Save</button>                       
                  </form>          
                
              </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /Modal -->
