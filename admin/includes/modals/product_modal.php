<?php
include '../includes/config.php';
?>
<!-- Add Product MODAL  -->
<div class="modal fade" id="newprod" data-backdrop="static" data-keyboard="false"  aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
          <div class="modal-header bg-navy">
            <h5 class="modal-title" id="staticBackdropLabel">Add Product</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true" style="color: white;">&times;</span>
            </button>
          </div>
          <div class="modal-header">
            <div class="statusMsg w-100"></div>
            </div>
          <div class="modal-body">
            <div class="container-fluid">
                <form id="add_product_form" method="POST" enctype="multipart/form-data">
                    <div class="form-row mb-3">
                      <img src="../dist/img/productimg/product-placeholder.jpg" onclick="prdctImg()" id="prdctdisplay" width="200" height="200" alt="prof" class="m-auto">
                      <input type="file"  name="prdctimg" class="form-control-file" id="prdctimg" onchange="displayPrdctImg(this)" style="display: none;">
                      <div class="w-100"></div>
                        <label for="" class="m-auto">Photo</label>
                    </div>
    
                    <div class="form-row mb-2">
                        <div class="col">
                          <label for="prdctname">Product Name</label>
                          <input type="text" class="form-control" name="add_prdctname" id="add_prdctname" required>
                        </div>                       
                    </div>

                    <!-- Category Select -->
                    <div class="row">                        
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                            <label>Category</label>
                            <select id="add_prdct_cat" name="add_prdct_cat" class="form-control select2 select2-purple" data-dropdown-css-class="select2-purple" style="width: 100%;">
                            <option value="0"> -Select Category- </option>
                            <?php

                            $sql = "SELECT * FROM category;";
                            $result = mysqli_query($conn,$sql);
                            if($result-> num_rows > 0 ){
                              $res = mysqli_fetch_all($result);
                              foreach($res as $row){                               
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


                    <div class="form-row mb-2">
                      <div class="col">
                        <label for="address">Description</label>
                        <textarea class="form-control" id="add_prdctdes" name="add_prdctdes" rows="10" required></textarea>
                      </div>
                    </div>
    
                    <div class="form-row mb-2">
                      <div class="col">
                        <label for="price">Price</label>
                        <input type="number" class="form-control" name="add_price" id="add_price" value="" required>
                      </div>
                      <div class="col">
                        <label for="stock">Stock</label>
                        <input type="number" class="form-control" name="add_stock" id="add_stock" value="" required>
                      </div>
                    </div>                    
                </form>
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fas fa-times"></i> Cancel</button>
                    <button type="submit" id="add_product_btn" class="btn btn-primary btn-sm float-right" ><i class="fas fa-save"></i> Save</button>  
              </div>
          </div>
        </div>
      </div>
    </div>




    <!-- EDIT PRODUCT MODAL -->
    <div class="modal fade" id="edit_prod" data-backdrop="static" data-keyboard="false"  aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
          <div class="modal-header bg-navy">
            <h5 class="modal-title" id="staticBackdropLabel">Update Product</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true" style="color: white;">&times;</span>
            </button>
          </div>
          <div class="modal-header">
            <div class="statusMsg w-100"></div>
            </div>
          <div class="modal-body">
            <div class="container-fluid">
              <!-- Update photo form -->
            <form id="edit_product_image" action="" method="POST" enctype="multipart/form-data">          
                        <div class="form-row mb-3">
                        <img src="http://localhost/ecommerce/eshop/dist/img/userimg/userplaceholder.png" onclick="edit_prdctImg()" id="edit_prdctdisplay" alt="prof" class="m-auto" width="500" height="500">
                        <input type="file"  name="edit_prdctimg" class="form-control-file" id="edit_prdctimg" onchange="edit_displayPrdctImg(this)" style="display: none;" disabled>
                        <div class="w-100"></div>
                        <label for="" class="m-auto">Photo</label>                        
                      </div>                     
            </form>
            <button id="uploadBtn" name="uploadImg" style="display:none;" class="btn btn-sm btn-primary w-100 mb-3">Apply</button>
            <button id="changeOff" class="btn btn-sm btn-danger" style="display:none;" onclick="change()">Cancel</button>
            <button id="changeOn" class="btn btn-sm btn-info"  onclick="change()">Change Photo</button> 
            <!-- END -->

                <form id="edit_product_form" method="POST" enctype="multipart/form-data">
                        
                    <div class="form-row mb-2">
                        <div class="col">
                          <label for="prdctname">Product Name</label>
                          <input type="text" class="form-control" name="edit_prdctname" id="edit_prdctname" required>
                        </div>                       
                    </div>

                    <!-- Category Select -->
                    <div class="row">                        
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                            <label>Category</label>
                            <select id="edit_prdct_cat" name="edit_prdct_cat" class="form-control select2 select2-purple" data-dropdown-css-class="select2-purple" style="width: 100%;">                            
                            <?php

                            $sql = "SELECT * FROM category;";
                            $result = mysqli_query($conn,$sql);
                            if($result-> num_rows > 0 ){
                              $res = mysqli_fetch_all($result);
                              foreach($res as $row){                               
                                echo '<option value="'.$row[0].'" >'.$row[1].'</option>';
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


                    <div class="form-row mb-2">
                      <div class="col">
                        <label for="address">Description</label>
                        <textarea class="form-control" id="edit_prdctdes" name="edit_prdctdes" rows="10" required></textarea>
                      </div>
                    </div>
    
                    <div class="form-row mb-2">
                      <div class="col">
                        <label for="price">Price</label>
                        <input type="number" class="form-control" name="edit_price" id="edit_price" value="" required>
                      </div>
                      <div class="col">
                        <label for="stock">Stock</label>
                        <input type="number" class="form-control" name="edit_stock" id="edit_stock" value="" required>
                      </div>
                    </div>                    
                </form>
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fas fa-times"></i> Cancel</button>
                    <button type="submit" id="edit_product_btn" class="btn btn-primary btn-sm float-right" ><i class="fas fa-save"></i> Save</button>  
              </div>
          </div>
        </div>
      </div>
    </div>

    <!-- DELETE PRODUCT MODAL -->
     <div class="modal fade" id="deleteProd" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable modal-md">
        <div class="modal-content">
          <div class="modal-header bg-warning">
            <h4 class="modal-title" id="staticBackdropLabel">Are you sure you want to delete this product?</h4>            
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true" style="color: white;">&times;</span>
            </button>
          </div>
          <div class="modal-body">           
            <div class="container-fluid">
              <div class="statusMsg"></div>              
               <div class="w-100 mb-3"></div>                               
                <button type="submit" id="deleteProdBtn" class="btn btn-success btn-md" ><i class="fas fa-check"></i> Yes</button>
                <button type="button" class="btn btn-danger btn-md" data-dismiss="modal"><i class="fas fa-times"></i> No</button>                  
            </div>
          </div>
        </div>
      </div>
    </div>   