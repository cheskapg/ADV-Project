<!-- Modal For New User -->
<div class="modal fade" id="newUser" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
          <div class="modal-content">
            <div class="modal-header bg-navy">             
              <h5 class="modal-title w-100" id="staticBackdropLabel">Add User</h5>             
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" style="color: white;">&times;</span></button>
            </div>
            <div class="modal-header">
            <div class="statusMsg w-100"></div>
            </div>
            <div class="modal-body">
              <div class="container-fluid">                
                  <form method="POST" enctype="multipart/form-data">
                      <div class="form-row mb-3">
                        <img src="../dist/img/userimg/userplaceholder.png" onclick="userImg()" id="userdisplay" width="200" height="200" alt="prof" class="img-circle m-auto">
                        <input type="file"  name="userimg" class="form-control-file" id="add_userimg" onchange="displayUserImg(this)" style="display: none;" disabled>
                        <div class="w-100"></div>
                        <label for="" class="m-auto">Photo</label>
                      </div>
      
                      <div class="form-row mb-2">
                          <div class="col">
                            <label for="fname">First Name</label>
                            <input type="text" class="form-control" name="add_fname" id="add_fname" required>
                          </div>
                          <div class="col">
                            <label for="lname">Last Name</label>
                            <input type="text" name="add_lname" id="add_lname" class="form-control" required>
                          </div>
                      </div>
      
                      <label for="gender">Gender</label>
                      <div class="form-check gender-f">
                        <input class="form-check-input" type="radio" name="add_gender" id="add_radMale" value="Male">
                        <label class="form-check-label" for="radMale">
                          Male
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="add_gender" id="add_radFemale" value="Female">
                        <label class="form-check-label" for="radFemale">
                          Female
                        </label>
                      </div>
      
                      <div class="form-row mb-2">
                        <div class="col">
                          <label for="address">Address</label>
                          <input type="text" class="form-control form-control-lg fs-5" name="add_address" id="add_address" required >
                        </div>
                      </div>
      
                      <div class="form-row mb-2">
                        <div class="col">
                          <label for="ages">Age</label>
                          <input type="number" class="form-control" name="add_age" id="add_age" required >
                        </div>
                        <div class="col">
                          <label for="birth">Birth</label>
                          <input type="date" name="add_birth" id="add_birth" class="form-control" required>
                        </div>
                      </div>
                      <div class="form-row mb-2">
                        <div class="col">
                          <label for="contno">Contact Number</label>
                          <input type="number" class="form-control" name="add_contno" id="add_contno" required >
                        </div>
                      </div>

                        <div class="form-row mb-2">
                        <div class="col">
                          <label for="email">Email</label>
                          <input type="email" class="form-control" name="add_email" id="add_email"  required >
                        </div>
                        </div>  

                        <div class="form-row mb-2">
                        <div class="col">
                          <label for="username">Username</label>
                          <input type="text" class="form-control" name="add_username" id="add_username"  required >
                        </div>
                      </div>

                      <div class="form-row mb-2">
                        <div class="col">
                          <label for="newpsw">Password</label>
                          <input type="password" class="form-control" name="add_psw" id="add_psw" required >
                        </div>
                      </div>
                      <div class="form-row mb-2">
                        <div class="col">
                          <label for="repeatpsw">Repeat Password</label>
                          <input type="password" class="form-control" name="add_repeatpsw" id="add_repeatpsw" required>
                        </div>
                      </div>                       
                  </form>
                  <div class="modal-footer">
                  <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fas fa-times"></i> Cancel</button>
                  <button type="submit" id="new_user_save" class="btn btn-primary btn-sm "  ><i class="fas fa-save"></i> Save</button> 
                  </div>          
                  
      
                </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /New user -->


      <!-- Change Password Modal -->
      <div class="modal fade" id="updatePass" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
          <div class="modal-header bg-navy">
            <h5 class="modal-title" id="staticBackdropLabel">Change Password</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true" style="color: white;">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="container-fluid">
              <div class="statusMsg"></div>
                <form method="POST">
                  <div class="form-row mb-2">
                    <div class="col">
                      <label for="currentpsw">Current Password</label>
                      <input type="password" class="form-control" name="up_currentpsw" id="up_currentpsw" value="" required>
                    </div>
                  </div>
                  <div class="form-row mb-2">
                    <div class="col">
                      <label for="newpsw">New Password</label>
                      <input type="password" class="form-control" name="up_newpsw" id="up_newpsw" required >
                    </div>
                  </div>
                  <div class="form-row mb-2">
                    <div class="col">
                      <label for="repeatpsw">Repeat Password</label>
                      <input type="password" class="form-control" name="up_repeatpsw" id="up_repeatpsw" required>
                    </div>
                  </div>                                 
                </form> 
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
                <button type="submit" id="updatePassBtn" class="btn btn-primary btn-sm float-right" ><i class="fas fa-save"></i> Save</button>                  
            </div>
          </div>
        </div>
      </div>
    </div>   

    <!-- Delete User Modal -->
    <div class="modal fade" id="deleteUser" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable modal-md">
        <div class="modal-content">
          <div class="modal-header bg-warning">
            <h4 class="modal-title" id="staticBackdropLabel">Are you sure you want to delete this user?</h4>            
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true" style="color: white;">&times;</span>
            </button>
          </div>
          <div class="modal-body">
           <h6>All the information associated with this account will be deleted.</h6>
            <div class="container-fluid">
              <div class="statusMsg"></div>                               
                <button type="submit" id="deleteUserBtn" class="btn btn-success btn-md" ><i class="fas fa-check"></i> Yes</button>
                <button type="button" class="btn btn-danger btn-md" data-dismiss="modal"><i class="fas fa-times"></i> No</button>                  
            </div>
          </div>
        </div>
      </div>
    </div>   

    <!-- Delete User Cart Modal -->
    <div class="modal fade" id="deleteCartUser" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable modal-md">
        <div class="modal-content">
          <div class="modal-header bg-warning">
            <h4 class="modal-title" id="staticBackdropLabel">Are you sure you want to delete this item?</h4>            
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true" style="color: white;">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="container-fluid">
              <div class="statusMsg"></div>                               
                <button type="submit" id="deleteCartUserBtn" class="btn btn-success btn-md" ><i class="fas fa-check"></i> Yes</button>
                <button type="button" class="btn btn-danger btn-md" data-dismiss="modal"><i class="fas fa-times"></i> No</button>                  
            </div>
          </div>
        </div>
      </div>
    </div>   
