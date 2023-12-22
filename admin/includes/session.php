<?php
include '../includes/config.php';

session_start();

error_reporting(0);

if (isset($_SESSION['user'])) {
    header("Location: ../index.php");
}
