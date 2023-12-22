<?php
session_start();
error_reporting(0);
if(isset($_SESSION['user'])){
    header('location: index.html');
  }
  

if (isset($_SESSION['admin'])) {
    header('Location: ./admin/index.php');
}