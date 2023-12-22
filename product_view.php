<?php
include './includes/config.php';

session_start();
if (isset($_SESSION['admin'])) {
  header("Location: ./admin/index.php");
}
 
include './includes/header2.php';
?>
<body>
<?php 
include './includes/navbar.php';
?>

<!-- Categories -->
<!-- <section class="container-fluid" id="categories">
        <nav class="shopcategory navbar-expand-md bg-light  ">

            <div class=" navbar justify-content-center collapse  navbar-collapse " id="navmenu">

                <ul class=" navbar-nav  row-horizontal ">

                    <div class="container row me-2-md d-flex justify-content-center">
                        <li class="nav-item dropdown   d-flex justify-content-center  col-6 ">
                            <a class="nav-link dropdown-toggle text-dark px-5" href="#" id="navbarDropdown"
                                role="button">
                                Computer
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="category/comp/cat-AllComputer.html">All Computers</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="category/comp/comp-desktop.html">Desktop</a>

                                <a class="dropdown-item" href="category/comp/comp-notebooks.html">Notebooks</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown   d-flex justify-content-center  col-6">
                            <a class="nav-link dropdown-toggle text-dark px-5" href="#" id="navbarDropdown"
                                role="button">
                                Components
                            </a>
                            <div class=" dropdown-menu">
                                <a class="dropdown-item" href="category/compo/cat-AllComponents.html">All Components</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="category/compo/compo-chasis.html">Chasis</a>
                                <a class="dropdown-item" href="category/compo/compo-processor.html">Processor</a>
                                <a class="dropdown-item" href="category/compo/compo-motherboard.html">Motherboard</a>
                                <a class="dropdown-item" href="category/compo/compo-graphics.html">Graphics Card</a>
                                <a class="dropdown-item" href="category/compo/compo-memory.html">Memory</a>
                                <a class="dropdown-item" href="category/compo/compo-hard.html">Hard Drive</a>
                                
                    </div>
                    </li>
            </div>
            <div class="container row me-2-md d-flex justify-content-center ">
                <li class="nav-item dropdown   d-flex justify-content-center  col-6">
                    <a class="nav-link dropdown-toggle text-dark  px-5" href="#" id="navbarDropdown" role="button">
                        Peripherals
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="category/peri/cat-AllPeripherals.html">All Peripherals</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="category/peri/peri-display.html">Display</a>
                        <a class="dropdown-item" href="category/peri/peri-audio.html">Audio</a>
                        <a class="dropdown-item" href="category/peri/peri-gaming.html">Gaming</a>
                        <a class="dropdown-item" href="category/peri/peri-keyboard.html">Keyboard | Mouse</a>

                    </div>
                </li>
                <li class="nav-item dropdown   d-flex justify-content-center   col-6 ">
                    <a class="nav-link dropdown-toggle text-dark px-5" href="#" id="navbarDropdown" role="button">
                        Net Devices
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="category/net/cat-AllNetDevices.html">All Net Devices</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="category/net/net-adaptor.html">Adaptor</a>
                        <a class="dropdown-item" href="category/net/net-router.html">Router</a>
                        <a class="dropdown-item" href="category/net/net-switch.html">Switch</a>

                    </div>
                </li>
            </div>
            <div class="container row me-2-md d-flex justify-content-center ">
                <li class="nav-item dropdown   d-flex justify-content-center   col-6 ">
                    <a class="nav-link dropdown-toggle text-dark px-5" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown">
                        Accessories
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="category/acc/cat-AllAccessories.html">All Accessories</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="category/acc/acc-cable.html">Cable</a>
                        <a class="dropdown-item" href="category/acc/acc-bag.html">Bag</a>
                        <a class="dropdown-item" href="category/acc/acc-storage.html">Storage Devices</a>
                    </div>
                </li>
                <li class="nav-item dropdown   d-flex justify-content-center col-6">
                    <a class="nav-link dropdown-toggle text-dark px-5 " href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown">
                        Gadgets
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="category/gad/cat-AllGadgets.html">All Gadgets</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="category/gad/gad-camera.html">Digital Camera</a>
                        <a class="dropdown-item" href="category/gad/gad-media.html">Portable Media </a>
                        <a class="dropdown-item" href="category/gad/gad-stream.html">Streaming Devices</a>
                    </div>
                </li>
            </div>
            </ul>
            </div> -->
            <!--end of container collapse-->
        <!-- </nav> -->
        <!--end of container-->
    <!-- </section> -->
    <!-- end categories -->

    <?php
    $product_id = $_GET['product_id'];
    $msg='';
    if(!empty($product_id)){
      $sql = "SELECT * FROM products WHERE id = $product_id;";
      $res = mysqli_query($conn,$sql);
      if($res -> num_rows > 0 ){
        $product = mysqli_fetch_all($res);
        foreach($product as $row){

        }
        
      } 
    }
    else{
      $msg = '<script> toastr.error(data, "Ecommerce");</script>';
    }
    
    ?>


    <!-- Product View -->
    <section class="mt-5">
      <div class="container mt-3 mb-5">
        <div class="row">
          <div class="col-md">
            <div class="img-magnifier-container">
              <img id="myimage" class="img-fluid" src="./dist/img/productimg/<?php echo $row[6] ?>" width="500" height="350" alt="...">
            </div>
          </div>
          <div class="col-md mt-4">
            <h3><?php echo $row[2] ?></h3>
            <h6 class="fs-5 text-secondary">Description:</h6>
            <h5><?php echo $row[3] ?></h5>
            <h6 class="fs-4">Price: <strong>₱ <?php echo $row[4] ?> </strong> </h6>
            <?php
            if (isset($_SESSION['user'])) {
            echo '<button id="addtocart" class="btn btn-sm btn-success w-50 fs-5" > ADD TO CART</button>';
            }
            else{
              echo '<a href="login.php" id="addtocart" class="btn btn-sm btn-success w-50 fs-5" > ADD TO CART</a>
              ';
            }
            ?>
            <select name="qty" id="qty" class="d-none">
              <?php
              for($i = 1;$i<=20;$i++){
                echo '<option value="'.$i.'">'.$i.'</option>';
              }            
              ?>              
            </select>                        
          </div>
        </div>        
      </div>
    </section>

    <?php 
include './includes/script2.php';
?>
    <!-- Magnifying -->
    <script>
      function magnify(imgID, zoom) {
  var img, glass, w, h, bw;
  img = document.getElementById(imgID);

  /* Create magnifier glass: */
  glass = document.createElement("DIV");
  glass.setAttribute("class", "img-magnifier-glass");

  /* Insert magnifier glass: */
  img.parentElement.insertBefore(glass, img);

  /* Set background properties for the magnifier glass: */
  glass.style.backgroundImage = "url('" + img.src + "')";
  glass.style.backgroundRepeat = "no-repeat";
  glass.style.backgroundSize = (img.width * zoom) + "px " + (img.height * zoom) + "px";
  bw = 3;
  w = glass.offsetWidth / 2;
  h = glass.offsetHeight / 2;

  /* Execute a function when someone moves the magnifier glass over the image: */
  glass.addEventListener("mousemove", moveMagnifier);
  img.addEventListener("mousemove", moveMagnifier);

  /*and also for touch screens:*/
  glass.addEventListener("touchmove", moveMagnifier);
  img.addEventListener("touchmove", moveMagnifier);
  function moveMagnifier(e) {
    var pos, x, y;
    /* Prevent any other actions that may occur when moving over the image */
    e.preventDefault();
    /* Get the cursor's x and y positions: */
    pos = getCursorPos(e);
    x = pos.x;
    y = pos.y;
    /* Prevent the magnifier glass from being positioned outside the image: */
    if (x > img.width - (w / zoom)) {x = img.width - (w / zoom);}
    if (x < w / zoom) {x = w / zoom;}
    if (y > img.height - (h / zoom)) {y = img.height - (h / zoom);}
    if (y < h / zoom) {y = h / zoom;}
    /* Set the position of the magnifier glass: */
    glass.style.left = (x - w) + "px";
    glass.style.top = (y - h) + "px";
    /* Display what the magnifier glass "sees": */
    glass.style.backgroundPosition = "-" + ((x * zoom) - w + bw) + "px -" + ((y * zoom) - h + bw) + "px";
  }

  function getCursorPos(e) {
    var a, x = 0, y = 0;
    e = e || window.event;
    /* Get the x and y positions of the image: */
    a = img.getBoundingClientRect();
    /* Calculate the cursor's x and y coordinates, relative to the image: */
    x = e.pageX - a.left;
    y = e.pageY - a.top;
    /* Consider any page scrolling: */
    x = x - window.pageXOffset;
    y = y - window.pageYOffset;
    return {x : x, y : y};
  }
}
    </script>
    <script>
/* Execute the magnify function: */
magnify("myimage", 3);
/* Specify the id of the image, and the strength of the magnifier glass: */
</script>

<!-- Add to cart button -->
<script>
  $(document).ready(function(){
    $("button[id='addtocart']").on('click',function(){
      var qty = $("select[id='qty']").val();
      $.ajax({
            type: 'POST',
            url: 'cart_add.php?user_id=<?php echo $_SESSION['user']['id'];?>&product_id=<?php echo $product_id;?>&qty='+qty,
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
    })
  })

</script>


<?php
echo $msg;

?>

</body>
</html>