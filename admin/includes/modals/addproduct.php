<!-- MODAL  -->
<div class="modal fade" id="newprod" data-backdrop="static" data-keyboard="false"  aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
          <div class="modal-header bg-navy">
            <h5 class="modal-title" id="staticBackdropLabel">Add Product</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true" style="color: white;">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="container-fluid">
                <form>
                    <div class="form-row mb-3">
                      <img src="https://eskipaper.com/images/images-2.jpg" onclick="prdctImg()" id="prdctdisplay" width="200" height="200" alt="prof" class="m-auto">
                      <input type="file"  name="prdctimg" class="form-control-file" id="prdctimg" onchange="displayPrdctImg(this)" style="display: none;">
                    </div>
    
                    <div class="form-row mb-2">
                        <div class="col">
                          <label for="prdctname">Product Name</label>
                          <input type="text" class="form-control" name="prdctname" id="prdctname" value="" required>
                        </div>                       
                    </div>

                    <!-- Category Select -->
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                            <label>Category</label>
                            <select id="selectmodal" name="selectcategory" class="form-control select2 select2-purple" data-dropdown-css-class="select2-purple" style="width: 100%;">
                            <option value="" selected="selected">Selected Category</option>
                            <option value="Network Adapter">Network Adapter</option>
                            <option value="Monitor">Monitor</option>
                            <option value="GPU">GPU</option>
                            <option value="Storage">Storage</option>                              
                            </select>
                        </div>
                        <!-- /.form-group -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->


                    <div class="form-row mb-2">
                      <div class="col">
                        <label for="address">Description</label>
                        <textarea class="form-control" id="address" rows="3" required></textarea>
                      </div>
                    </div>
    
                    <div class="form-row mb-2">
                      <div class="col">
                        <label for="price">Price</label>
                        <input type="number" class="form-control" name="price" id="price" value="" required>
                      </div>
                      <div class="col">
                        <label for="stock">Stock</label>
                        <input type="number" class="form-control" name="stock" id="stock" value="" required>
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
