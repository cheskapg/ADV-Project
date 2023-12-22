<div class="page-wrapper">
        <div class="header">

            <nav class="topbar  d-flex py-md-1 py-2  ">
                <div class="fs">
                    <a class="fs mx-3 mx-md-5  ">Free Shipping for orders over $50 </a>

                </div>
                <div class="ms-auto">
                    <div class="nav-link  d-none d-md-flex " id="navmenu">

                        <a href="#">About</a>


                        <a href="#">Contact Us</a>


                        <a href="#">Help Center</a>


                        <a href="">Call Us 123-456-789</a>

                    </div>
                </div>

            </nav>
            <!-- main header -->
            <nav class="navbar navbar-expand-md  bg-light navbar-light">

                <div class="container container-fluid-md">

                    <div class=" col-3 col-lg-3">
                    <div class="navbar-brand" href="#Home"><a href="index.html"><img src="res/logo.png"
                                    class="logo"><img src="res/logo-name.png" class="logo-name"> </a>
                        </div>
                    </div>

                    <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">

                        <span class="navbar-toggler-icon ms-auto"></span>

                    </button>

                    <div class="col-10 collapse navbar-collapse " id="navmenu">
                        <div class="input-group search-input my-md-2 my-4"> 
                        <form method="POST" id="searchForm">
                        <div class="input-group">                            
                            <input type="text" class="form-control" name="q" id="q" placeholder="Search">
                                                  
                        </div>
                        </form>  
                        <button type="submit" name="search" id="btnSearch" class="btn btn-outline-secondary" type="button"><i
                                    class="bi bi-search"></i></button>                                        
                        </div>
                        <ul class="navbar-nav ms-2 ms-auto pe-lg-5   ">
                            <div class="container">
                                <div class="row " id="userrow">
                                    <!--MENU SIDEBYSIDE-->
                                    <!-- Login - User Dropdown -->
                                    <?php
                                        if (isset($_SESSION['user'])) {                               
                                        echo '<li class="nav-item dropdown my-md-0 my-2 col-6 d-flex justify-content-center ">
                                        <a href="#" data-bs-toggle="tooltip" data-bs-placement="auto" title="'.$_SESSION['user']['username'].'"><img src="./dist/img/userimg/'.$_SESSION['user']['photo'].'" alt="User Avatar" class="rounded-circle mr-2" width="35" height="35"></a>
                                        <ul class="dropdown-menu dropdown-menu-lg">
                                        <li class="dropdown-header text-center"><img src="./dist/img/userimg/'.$_SESSION['user']['photo'].'" alt="User Avatar" class="rounded-circle mr-2" width="100" height="100"></a>
                                        <li class="text-center">'.$_SESSION['user']['username'].'</li>
                                        </li>
                                        <li class="dropdown-divider"></li>
                                        <li><a class="dropdown-item" href="profile.php">Account</a></li>                                       
                                        <li class="dropdown-divider"></li>
                                        <li class="dropdown-footer text-center">
                                            <a href="logout.php">Logout</a>
                                        </li>
                                        </ul>                                        
                                        </li>                                    
                                        
                                        ';
                                        }
                                        else{
                                        
                                            echo 
                                            ' <li class="nav-item my-md-0 my-2 col-6 d-flex justify-content-center ">
                                            <a href=" login.php">
                                                Login
                                            </a>
                                        </li>
                                            ';
                                        }
                                        ?>
                                  
                                    <!-- hide -->
                                    <li class="nav-item d-flex justify-content-center d-md-none my-md-0 my-2 col-6">
                                        <a href="#">About</a>

                                    </li>

                                </div>

                            </div>
                            <div class="container ms-auto">

                                <div class=" row">
                                    <!--MENU SIDEBYSIDE-->
                                    <li class="nav-item my-md-0 my-2 col-6 d-flex justify-content-center ">
                                        <a href="#fav" >
                                            Favorites
                                        </a>
                                    </li>
                                    <!-- hide -->
                                    <li class="nav-item d-flex justify-content-center d-md-none my-md-0 my-2 col-6">
                                        <a href="#">Contact Us</a>

                                    </li>
                                </div>
                            </div>
                            <div class="container">

                                <div class="row" id="cartrow">
                                    <!--MENU SIDEBYSIDE-->
                                    
                                    <!-- count cart from user where today's item added for badge-->
                                    <?php
                                    
                                    if (isset($_SESSION['user'])) {                                        
                                    $sql = "SELECT Count(*) AS CartToday FROM cart WHERE user_id = ".$_SESSION['user']['id']." AND  CAST(date_added AS DATE) = CURDATE();";
                                    $res = mysqli_query($conn,$sql);
                                    if($res -> num_rows > 0){                                       
                                        $row = mysqli_fetch_all($res);
                                        $total = $row[0];

                                    }                                                                       
                                    }     
                                    ?>
                                                                       
                                    <li class="nav-item dropdown my-md-0 my-2 col-6 d-flex justify-content-center " id="cart">
                                        <a class="dropdown-toggle" data-bs-toggle="dropdown" href="#">
                                        <i class="bi bi-cart fs-5"></i>
                                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                            <!-- display total cart today-->
                                           <?php 
                                            if (isset($_SESSION['user'])) { 
                                           if(!empty($total)){
                                               echo implode($total);
                                           }
                                           else{echo 0;} 
                                        }
                                        else{echo 0;} 
                                               ?>                                           
                                        </span>
                                        </a>
                                        <ul class="dropdown-menu" style="margin-right: 100px;margin-top: 30px;  width:250px;">
                                        <li class="dropdown-header text-center text-dark fs-4">Your Cart</li>
                                        <li class="dropdown-divider"></li>
                                        
                                        <li class="dropdown-body px-3 pt-2">
                                        <?php
                                         if (isset($_SESSION['user'])) {
                                        $sql = "SELECT products.photo,products.name,products.price,cart.quantity,cart.date_added,cart.id FROM cart
                                        INNER JOIN products ON products.id = cart.product_id WHERE cart.user_id = ".$_SESSION['user']['id']." AND  CAST(cart.date_added AS DATE) = CURDATE();";
                                        $res = mysqli_query($conn,$sql);
                                        if($res -> num_rows > 0){
                                        $result = mysqli_fetch_all($res);                                   
                                            foreach($result as $row){
                                                echo 
                                                '
                                                <div class="row cartbody">
                                                <div class="col-1 mr-2">
                                                <img src="./dist/img/productimg/'.$row[0].'" width="30" height="20" alt="">
                                                </div>
                                                <div class="col-7 mx-2">
                                                <p class="d-inline-bloc text-truncate" style="max-width: 120px;">'.$row[1].'</p>
                                                </div>
                                                <div class="col-1">
                                                    <small>x'.$row[3].'</small>
                                                </div>    
                                            </div>

                                                ';
                                            }
                                        }
                                        else{
                                            echo '<li class="px-2 text-muted"><small>No added item today.</small></li>';
                                        }
                                        }
                                        else{
                                            echo '<li class="px-2 text-muted"><small>No added item today.</small></li>';
                                        }
                                        ?>
                                        
                                        
                                        
                                        
                                        
                                        
                                        <!-- <div class="row cartbody">
                                                <div class="col-1">
                                                <img src="./dist/img/productimg/1_laptop.jpg" width="30" height="20" alt="">
                                                </div>
                                                <div class="col-7 mx-2">
                                                    <p class="d-inline-bloc text-truncate" style="max-width: 120px;">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Harum ad molestias optio consequuntur, reprehenderit totam, vel labore veniam, qui ex quam amet odio fugiat atque exercitationem minima reiciendis magni sed?</p>
                                                </div>
                                                <div class="col-1">
                                                    <small>x100</small>
                                                </div>    
                                            </div>                                             
                                        </li>                                         -->
                                        <!-- <li class="px-2 text-muted"><small>No added item today.</small></li> -->
                                        <li class="dropdown-divider"></li>
                                        <li class="dropdown-footer text-center">
                                        <?php
                                            if (isset($_SESSION['user'])) {
                                               echo '<a href="cart.php">See All</a>';
                                            }
                                            else{
                                                echo '<a href="login.php">See All</a>';
                                            }
                                            ?>   
                                        </li>
                                        </ul>
                                    </li>

                                    <!-- <li class="nav-item my-md-0 my-2 col-6 d-flex justify-content-center ">
                                        <a href="cart">
                                            Cart
                                        </a>
                                    </li> -->

                                    <!-- hide -->
                                    <li class="nav-item d-flex justify-content-center d-md-none my-md-0 my-2 col-6">
                                        <a href="#">Help Center</a>
                                    </li>
                                </div>

                            </div>
                        </ul>
                        <hr>
                        <!--end of navbar-nav-->
                    </div><!-- end of col div collapse-->
                </div>
                <!--end of container-fluid -->
            </nav><!-- end of navbar MAIN-->
        </div>
    </div><!-- end of PAGE WRAPPER-->


    <!--CATEGORIESSSSS-->
    <section class="container-fluid" id="categories">
        <nav class="shopcategory navbar-expand-md bg-light  ">

            <div class=" navbar justify-content-center collapse  navbar-collapse " id="navmenu">

                <ul class=" navbar-nav  row-horizontal ">

                    <div class="container row me-2-md d-flex justify-content-center">
                        <li class="nav-item dropdown   d-flex justify-content-center  col-6 ">
                            <a class="nav-link dropdown-toggle text-dark px-5" href="products.php" id="navbarDropdown"
                                role="button">
                                Computer
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="products.php?sort=cAll">All Computers</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="products.php?sort=2">Desktop</a>

                                <a class="dropdown-item" href="products.php?sort=1">Notebooks</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown   d-flex justify-content-center  col-6">
                            <a class="nav-link dropdown-toggle text-dark px-5" href="#" id="navbarDropdown"
                                role="button">
                                Components
                            </a>
                            <div class=" dropdown-menu">
                                <a class="dropdown-item" href="products.php?sort=cpAll">All Components</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="products.php?sort=4">Chasis</a>
                                <a class="dropdown-item" href="products.php?sort=5">Processor</a>
                                <a class="dropdown-item" href="products.php?sort=6">Motherboard</a>
                                <a class="dropdown-item" href="products.php?sort=7">Graphics Card</a>
                                <a class="dropdown-item" href="products.php?sort=8">Memory</a>
                                <a class="dropdown-item" href="products.php?sort=9">Hard Drive</a>
                                <a class="dropdown-item" href="products.php?sort=23">Fan</a>
                                
                    </div>
                    </li>
            </div>
            <div class="container row me-2-md d-flex justify-content-center ">
                <li class="nav-item dropdown   d-flex justify-content-center  col-6">
                    <a class="nav-link dropdown-toggle text-dark  px-5" href="#" id="navbarDropdown" role="button">
                        Peripherals
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="products.php?sort=periAll">All Peripherals</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="products.php?sort=10">Display</a>
                        <a class="dropdown-item" href="products.php?sort=11">Audio</a>
                        <a class="dropdown-item" href="products.php?sort=12">Gaming</a>
                        <a class="dropdown-item" href="products.php?sort=24">Headset</a>
                        <a class="dropdown-item" href="products.php?sort=kbms">Keyboard | Mouse</a>
                        

                    </div>
                </li>
                <li class="nav-item dropdown   d-flex justify-content-center   col-6 ">
                    <a class="nav-link dropdown-toggle text-dark px-5" href="#" id="navbarDropdown" role="button">
                        Net Devices
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="products.php?sort=netAll">All Net Devices</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="products.php?sort=14">Adaptor</a>
                        <a class="dropdown-item" href="products.php?sort=15">Router</a>
                        <a class="dropdown-item" href="products.php?sort=16">Switch</a>

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
                        <a class="dropdown-item" href="products.php?sort=accAll">All Accessories</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="products.php?sort=17">Cable</a>
                        <a class="dropdown-item" href="products.php?sort=18">Bag</a>
                        <a class="dropdown-item" href="products.php?sort=19">Storage Devices</a>
                    </div>
                </li>
                <li class="nav-item dropdown   d-flex justify-content-center col-6">
                    <a class="nav-link dropdown-toggle text-dark px-5 " href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown">
                        Gadgets
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="products.php?sort=gadAll">All Gadgets</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="products.php?sort=20">Digital Camera</a>
                        <a class="dropdown-item" href="products.php?sort=21">Portable Media </a>
                        <a class="dropdown-item" href="products.php?sort=22">Streaming Devices</a>
                    </div>
                </li>
            </div>
            </ul>
            </div>
            <!--end of container collapse-->
        </nav>
        <!--end of container-->
    </section>
</div>