<?php
include './includes/config.php';

session_start();
if (isset($_SESSION['admin'])) {
  header("Location: ./admin/index.php");
}
 
// include './includes/header2.php';
?>

<?php 
//include './includes/navbar.php';
$found = 0;

if(isset($_GET['s'])){
    $keyword = $_GET['s'];
    if(!empty($keyword)){
        $sql = "SELECT * FROM products WHERE name LIKE '%$keyword%';";
        $res = mysqli_query($conn,$sql);
        if($res -> num_rows > 0){
            $rows = mysqli_fetch_all($res);
            $found = count($rows);
        } 
    }
}

include './includes/header2.php';
?>
<body>
<?php 
include './includes/navbar.php'; ?>


   <!-- SEARCH RESULT -->
   <section>
       <div class="container my-5">
           <h1>SEARCH RESULTS OF <i>" <?php echo $keyword;?>"</i></h1>
           <h4><?php echo $found;?> ITEM/S FOUND</h4>
       <div class="row justify-content-center">
           <?php
          
            if(isset($_GET['s'])){
            $keyword = $_GET['s'];
            if(!empty($keyword)){
                $sql = "SELECT * FROM products WHERE name LIKE '%$keyword%';";
                $res = mysqli_query($conn,$sql);
                if($res -> num_rows > 0){
                    $rows = mysqli_fetch_all($res);
                    $found = count($rows);
                
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
                else{
                    echo '<div class="container mt-5 pt-5 text-center">
                    <h4 class="my-5">The product you are looking for is/are not available!</h4>
                    <a href="products.php" class="btn btn-sm btn-outline-warning w-50 fs-6" >BROWSE PRODUCTS</a>
                </div>';
                }        
            }
            else{
                echo '<div class="container mt-5 pt-5 text-center">
                    <h4 class="my-5">The product you are looking for is/are not available!</h4>
                    <a href="products.php" class="btn btn-sm btn-outline-warning w-50 fs-6" >BROWSE PRODUCTS</a>
                </div>';
            }
            }
            
           ?>
       </div>
       </div>
   </section>
   

   <?php include './includes/script2.php'; ?>
