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
<div class="msg" style="z-index: 999;"></div>

<section>
  <div class="container mt-5">
    <h3>Your cart</h3>  
  <table id="example2" class="table table-bordered table-hover" style="border-bottom: 1px solid gray;border-top: 1px solid gray; border-radius: 5px;">
                    <thead>
                    <tr>
                        <th>Photo</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Added</th>
                        <th>Subtotal</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php
                      $total = 0;
                      if (isset($_SESSION['user'])) {
                       $sql = "SELECT products.photo,products.name,products.price,cart.quantity,cart.date_added,cart.id FROM cart
                       INNER JOIN products ON products.id = cart.product_id WHERE cart.user_id = ".$_SESSION['user']['id'].";";
                       $result= mysqli_query($conn,$sql);
                       if($result -> num_rows > 0 ){
                           $row = mysqli_fetch_all($result);

                           foreach($row as $res){
                             $price = $res[2];
                             $qty = $res[3];
                             $subtotal = $price * $qty;                             
                             $a[]='';
                             array_push($a,$subtotal);
                             $total = array_sum($a);
                             echo '
                             <tr>
                             <td><img src="./dist/img/productimg/'.$res[0].'" width="60" height="50" alt=""></td>
                             <td>'.$res[1].'</td>
                             <td>₱'.$res[2].'</td>
                             <td>'.$res[3].'</td>                             
                             <td>'.$res[4].'</td>
                             <td>₱'.$subtotal.'</td>
                             <td><button class="btn btn-sm btn-danger delete-cart-btn" data-toggle="modal" data-target="#deleteCartUser" data-id="'.$res[5].'"><i class="bi bi-trash"></i></button></td>
                             </tr>
                             ';
                           }
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
                      <th>Added</th>
                      <th>Subtotal</th>
                      <th></th>
                    </tr>
                    </tfoot>
                  </table>
                  <div class="row my-4">
                    <div class="col text-end mb-5">
                    <h3 id="carttotal">Total: ₱
                      <?php echo $total;
                      ?> </h3>
                    <button class="btn btn-success btn-lg float-end checkout-btn" data-toggle="modal" data-target="#checkout">Check Out</button>
                    </div>
                  </div>
                  
            </div>
  </div>
  </div>
</section>



<?php 
include './includes/modal/user_modal.php';
include './includes/script2.php';
?>
<!-- DATATABLES -->
<script>
    $(function () {
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>

  <!-- AJAX -->
<script>
  // Delete user cart item.

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
            url: 'user_cart_delete.php?user_id=<?php echo $_SESSION['user']['id'];?>&cart_id='+cart_id,
            data: {},
            success: function(data){
              if(data=='success'){
                $("#deleteCartUser").modal('hide');
              toastr.success('Item Removed', 'Ecommerce');
              // Refresh
              $( "#example2" ).load( "cart.php #example2" ); //Table
              $( "#carttotal" ).load( "cart.php #carttotal" ); // Cart total amount
              $( "#cartrow" ).load( "products.php #cartrow" ); // Cart Badge
              }
              else{
                toastr.success(data, 'Ecommerce');
              }      
              
             
            }
      })
      
    });

    })


// GET USER CART ITEMS
// function getRow(id){
//     $.ajax({
//     type: 'POST',
//     url: 'cart_row.php',
//     data: {id:id},
//     dataType:"JSON",
//     success: function(data){
    
//     }
//   });
//   }
// End

//  Show modal checkout
$(document).on('click', '.checkout-btn', function(e){
    e.preventDefault();
    $('#checkout').modal('show');  
  });

  // Proceed to checkout
  $(document).ready(function(){
      $('#toCheckout').on('click', function(){
        var amount = $('#cashAmount').val();
        if(amount ===''){
          toastr.error('Please enter your cash amount!', 'Ecommerce');
        $("#cashAmount").focus();
        }
        else{
      $.ajax({
            type: 'POST',
        url: 'checkout.php?user_id=<?php echo $_SESSION['user']['id'];?>&amount_paid=<?php echo $total;?>',       
            data: {},
            success: function(data){
              if(data=='success'){
                $("#checkout").modal('hide');
              toastr.success('Successfully Purchased', 'Ecommerce');
              $( "#example2" ).load( "cart.php #example2" );
             
              }
              else{
                toastr.error(data, 'Ecommerce');
              }      
              
             
            }
      })
    }
    
    });

    })



    

    toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": true,
  "progressBar": true,
  "positionClass": "toast-top-right",
  "preventDuplicates": false,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "3000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}

    

</script>


</body>
</htmt>