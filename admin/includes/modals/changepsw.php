
<!-- Modal Changing Password -->
<div class="modal fade" id="changepswmodal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                      <input type="password" class="form-control" name="currentpsw" id="currentpsw" value="" required>
                    </div>
                  </div>
                  <div class="form-row mb-2">
                    <div class="col">
                      <label for="newpsw">New Password</label>
                      <input type="password" class="form-control" name="newpsw" id="newpsw" required >
                    </div>
                  </div>
                  <div class="form-row mb-2">
                    <div class="col">
                      <label for="repeatpsw">Repeat Password</label>
                      <input type="password" class="form-control" name="repeatpsw" id="repeatpsw" required>
                    </div>
                  </div>                                 
                </form> 
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
                <button type="submit" id="changepswSave" class="btn btn-primary btn-sm float-right" ><i class="fas fa-save"></i> Save</button>                  
            </div>
          </div>
        </div>
      </div>
    </div>    
    
    
    <!-- /Modal -->