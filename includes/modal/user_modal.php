<!-- Delete User Cart Modal -->
    <div class="modal fade" id="deleteCartUser" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title" id="staticBackdropLabel">Are you sure you want to delete this item?</h6>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>     
      <div class="modal-footer">                                                    
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x"></i> No</button>
        <button type="submit" id="deleteCartUserBtn" class="btn btn-success btn-md" ><i class="bi bi-check2"></i> Yes</button>

      </div>
    </div>
  </div>
</div>


<!-- Change User Password Modal -->
<div class="modal fade" id="changePassword" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" id="updatePassBtn">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- Checkout Modal -->
<div class="modal fade" id="checkout" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Checkout</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <!-- <div class="container-fluid" id="cartList">
                                            
      </div>-->

      <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Photo</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Quantity</th>                        
                        <th>Subtotal</th>                       
                    </tr>
                    </thead>
                    <tbody>
                     
                    </tbody>                    
                    <tfoot>
                    <?php
                    if($result -> num_rows > 0 ){
                    foreach($row as $res){                      
                      echo '
                      <tr>
                      <td><img src="./dist/img/productimg/'.$res[0].'" width="60" height="50" alt=""></td>
                      <td>'.$res[1].'</td>
                      <td>₱'.$res[2].'</td>
                      <td>'.$res[3].'</td>                                                   
                      <td>₱'.$subtotal.'</td>                      
                      </tr>
                      ';
                    }
                  }
                    ?>
                    </tfoot>
                  </table>
                  <div class="row">
                    <div class="col">
                    <small class="fs-4">Total Amount:</small>
                    <div class="w-100"></div>
                    <strong class="fs-4 mx-2" id="totalAmount">₱ <?php echo $total ?></strong>
                    </div>
                    <div class="col">
                    <small class="fs-4">Cash</small>
                    <input type="number" class="form-control" id="cashAmount" placeholder="Cash Amount">
                    </div>
                  </div>          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" id="toCheckout">Proceed to checkout</button>
      </div>
    </div>
  </div>
</div>