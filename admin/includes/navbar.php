      <!-- Navbar -->
      <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="index.php" class="nav-link">Home</a>
          </li>
        </ul>
    
        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
          <!-- Profile Dropdown Menu -->
          <li class="nav-item dropdown mb-2">
            <a href="#" class="nav-link" data-toggle="dropdown">
              <img src="../dist/img/userimg/<?php echo $_SESSION['admin']['photo']; ?>" alt="User Avatar" class="img-circle mr-2 navbar-prof" width="35" height="35">
              <span> <?php echo $_SESSION['admin']['fname'].' '.$_SESSION['admin']['lname']; ?> </span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <div class="dropdown-header bg-gray-dark">
                <img src="../dist/img/userimg/<?php echo $_SESSION['admin']['photo']; ?>" alt="User Avatar" width="150" height="150" class="dropdown-item img-circle px-5 m-auto navbar-prof disabled">
                <h5 class="name"><?php echo $_SESSION['admin']['fname'].' '.$_SESSION['admin']['lname'] ?></h5>
                <h6>Admin</h6>
              </div>
              <!-- <span class="dropdown-item dropdown-header">15 Notifications</span> -->
              <div class="dropdown-divider"></div>
              <div class="dropdown-footer">
                <button class="dropdown-item bg-success mb-2" data-toggle="modal" data-target="#staticBackdrop">Update</button>
                <a href="../logout.php"><button class="dropdown-item bg-danger">Sign-out</button></a>
              </div>
              <!-- <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a> -->
            </div>
          </li>
    
        </ul>
      </nav>
      <!-- /.navbar -->
  
    
    <?php
    include '.../../modals/updateadmin.php';
    include '.../../modals/changepsw.php';
    include 'menubar.php';
     ?>
      
    

   
      
    
