<?php
include './includes/config.php';

session_start();
if (isset($_SESSION['admin'])) {
  header("Location: ./admin/index.php");
}




$where ="";
$catName = "All";
if(isset($_GET['sort'])){
    $sort = $_GET['sort'];
    if($sort == "cAll"){
        // Computers
        $where = "WHERE category_id=1 OR category_id=2";
        $catName = "Computers";
    }
    else if ($sort == "kbms"){
        $where = "WHERE category_id in (3,13)";
        $catName = "Keyboard | Mouse";
    }
    else if($sort == "cpAll"){
        //Componenets        
        $where = "WHERE category_id in (4,5,6,7,8,9,23)";
        $catName = "Components";
    }
    else if($sort == "periAll"){
        //Peripherals
        $where = "WHERE category_id in (10,11,12,13,3,24)";
        $catName = "Peripherals";
    }
    else if($sort == "netAll"){
        // Net
        $where = "WHERE category_id in (14,15,16)";
        $catName = "Internet Devices";
    }
    else if($sort == "accAll"){
        // Accessories
        $where = "WHERE category_id in (17,18,19)";
        $catName = "Accessories";
    }
    else if($sort =="gadAll"){
        // Gadgets
        $where = "WHERE category_id in (20,21,22)";
        $catName = "Gadgets";
    }
    else{
        $where = "WHERE category_id=".$sort;
        $catName = getCatName($conn,$sort);
    }
    
}
else{
    $where = "";
}

function getCatName($conn,$cat_id){
    $name ="";
    $sql = "SELECT category from category WHERE id=$cat_id;";
    $res = mysqli_query($conn,$sql);
    if($res -> num_rows > 0 ){              
        $rows = mysqli_fetch_all($res);
        $name = $rows[0];
    }
    return implode($name);
}

include './includes/header2.php';
?>
<body>
<?php 
include './includes/navbar.php';
?>

    <!-- Products -->
    <section>
    <div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <h2><?php echo ucfirst($catName);?></h2>
            <?php 
            $sql = " SELECT * FROM products $where ORDER BY id DESC;";
            $res = mysqli_query($conn,$sql);
            if($res -> num_rows > 0 ){              
                $rows = mysqli_fetch_all($res);
                
                foreach($rows as $row){
                    
                    echo '
                    <div class="card m-2" style=" width: 15rem;">
                       <img class="card-img-top mt-5" width="100" height="150"  src="./dist/img/productimg/'.$row[6].'" alt="Card image cap">
                        <div class="card-body">
                        <p class="card-text text-center text-truncate">'.$row[2].' </p>
                        <p class="card-text fs-4">₱'.$row[4].' </p>                        
                        </div>

                        <div class="card-footer">
                        <a href="product_view.php?product_id='.$row[0].'" class="btn btn-sm  btn-outline-primary cardbutts" data-bs-placement="auto" title="View Product"><i class="bi bi-eye"></i> View</a>';
                        if (isset($_SESSION['user'])) {
                            echo '
                        <button id="addtocart" data-id='.$row[0].' class="btn btn-sm btn-outline-success cardbutts" data-bs-placement="auto" title="Add to cart"><i class="bi bi-cart-plus fs-5"></i></button> ';}
                        else{
                            echo '
                        <a href="login.php" class="btn btn-sm btn-outline-success cardbutts" data-bs-placement="auto" title="Add to cart"><i class="bi bi-cart-plus fs-5"></i></a> ';
                        }
                        echo '
                        <input type="number" id="product_qty" data-bs-toggle="tooltip" data-bs-placement="top" title="Quantity" class="cardbutts d-none" style="width:50px;" id="qty" min="1" value="1" max="100">       

                        </div>                        
                    </div> 
                       ';
                    
                }
            }
            ?>
    </div>
    </div>            
    </section> 
    
    
<?php 
include './includes/script2.php';
?>
    <script>
        // Tooltips
   $(document).ready(function(){
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl)
})
   })

   var product_id;
//    Add to cart btn
   $(document).ready(function(){
  $("button[id='addtocart']").on('click',function(){
    product_id = $(this).data('id');
    var qty = $("input[id='product_qty']").val();
    $.ajax({
            type: 'POST',
            url: 'cart_add.php?user_id=<?php echo $_SESSION['user']['id'];?>&product_id='+product_id+'&qty='+qty,
            data: {},
            success: function(data){
              if(data=='success'){                
              toastr.success('Item Added', 'Ecommerce');
              $( "#cartrow" ).load( "products.php #cartrow" );                  
              }
              else{
                toastr.error(data, 'Ecommerce');
              }             
              
             
            }
      })   
    
  });

});
    </script>   
							
    
</body>
</html>