<!-- Modal For add Category -->
<div class="modal fade" id="newCategory" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-navy">
        <h5 class="modal-title" id="staticBackdropLabel">New Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="color: white;">&times;</span>
        </button>
      </div>
      <div class="modal-header">
            <div class="statusMsg w-100"></div>
            </div>
      <div class="modal-body">
        <div class="container-fluid">
            <form method="POST">

                <div class="form-row mb-4">
                  <div class="col">
                    <label for="catname">Category Name</label>
                    <input type="text" class="form-control" name="add_catname" id="add_catname" required>
                  </div>
                </div>
                
            </form>     
            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fas fa-times"></i> Cancel</button>
                <button type="submit" id="add_cat_btn" class="btn btn-primary btn-sm float-right" ><i class="fas fa-save"></i> Save</button>     
          </div>
      </div>
    </div>
  </div>
</div>
<!-- /Modal for add category -->

<!-- EDIT CATEGORY -->
<div class="modal fade" id="edit_Category" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-navy">
        <h5 class="modal-title" id="staticBackdropLabel">Edit Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="color: white;">&times;</span>
        </button>
      </div>
      <div class="modal-header">
            <div class="statusMsg w-100"></div>
            </div>
      <div class="modal-body">
        <div class="container-fluid">
            <form method="POST">

                <div class="form-row mb-4">
                  <div class="col">
                    <label for="catname">Category Name</label>
                    <input type="text" class="form-control" name="edit_catname" id="edit_catname" required>
                  </div>
                </div>
                
            </form>     
            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fas fa-times"></i> Cancel</button>
                <button type="submit" id="edit_cat_btn" class="btn btn-primary btn-sm float-right" ><i class="fas fa-save"></i> Save</button>     
          </div>
      </div>
    </div>
  </div>
</div>

<!-- END -->
<div class="modal fade" id="delete_Category" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-navy">
        <h5 class="modal-title" id="staticBackdropLabel">Are you sure you want to delete this category?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="color: white;">&times;</span>
        </button>
      </div>
      <div class="modal-header">
            <div class="statusMsg w-100"></div>
            </div>
      <div class="modal-body">                                                       
                <button type="submit" id="deleteCatBtn" class="btn btn-success btn-md" ><i class="fas fa-check"></i> Yes</button>
                <button type="button" class="btn btn-danger btn-md" data-dismiss="modal"><i class="fas fa-times"></i> No</button>        
          </div>
      </div>
    </div>
  </div>
</div>