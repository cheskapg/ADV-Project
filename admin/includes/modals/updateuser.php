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
                <form>
                    <div class="form-row mb-3">
                      <img src="https://eskipaper.com/images/images-2.jpg" onclick="userImg()" id="userdisplay" width="200" height="200" alt="prof" class="img-circle m-auto">
                      <input type="file"  name="userimg" class="form-control-file" id="userimg" onchange="displayUserImg(this)" style="display: none;">
                      <div class="w-100"></div>
                      <label for="" class="m-auto">Photo</label>
                    </div>
    
                    <div class="form-row mb-2">
                        <div class="col">
                          <label for="fname">First Name</label>
                          <input type="text" class="form-control" name="fname" id="fname" value="" required>
                        </div>
                        <div class="col">
                          <label for="lname">Last Name</label>
                          <input type="text" name="lname" id="lname" class="form-control" value="" required>
                        </div>
                    </div>
    
                    <label for="gender">Gender</label>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="radmale" id="radMale">
                      <label class="form-check-label" for="radMale">
                        Male
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="radfemale" id="radFemale">
                      <label class="form-check-label" for="radFemale">
                        Female
                      </label>
                    </div>
                          
    
                    <div class="form-row mb-2">
                      <div class="col">
                        <label for="address">Address</label>
                        <textarea class="form-control" name="address" id="address" rows="3"></textarea>
                      </div>
                    </div>
    
                    <div class="form-row mb-2">
                      <div class="col">
                        <label for="ages">Age</label>
                        <input type="text" class="form-control" name="age" id="age" value="" >
                      </div>
                      <div class="col">
                        <label for="birth">Birth</label>
                        <input type="date" name="birth" id="birth" class="form-control" value="">
                      </div>
                    </div>
    
                    <div class="form-row mb-4 mt-4">
                      <div class="col">
                        <button type="button" id="changepsw"  class="btn btn-success" data-toggle="modal" data-target="#changepswmodal"  >Change Password</button>
                      </div>
                    </div>
    
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
                <button type="submit"  class="btn btn-primary btn-sm float-right" ><i class="fas fa-save"></i> Save</button>
                </form>          
                
              </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /Modal -->