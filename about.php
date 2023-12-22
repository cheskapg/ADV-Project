<?php
include './includes/config.php';

session_start();
if (isset($_SESSION['admin'])) {
  header("Location: ./admin/index.php");
}
$found = 0;

// if(isset($_POST['q'])){
//     $keyword = $_POST['q'];
//     if(!empty($keyword)){
//         $sql = "SELECT * FROM products WHERE name LIKE '%$keyword%';";
//         $res = mysqli_query($conn,$sql);
//         if($res -> num_rows > 0){
//             $rows = mysqli_fetch_all($res);
//             $found = count($rows);
//         } 
//     }
// }
$keyword = $_GET['s'];


include './includes/header2.php';
?>
<body>
<?php 
include './includes/navbar.php';
echo $keyword;

include './includes/script2.php';
?>