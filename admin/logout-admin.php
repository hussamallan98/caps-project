<?php 
session_start();
unset($_SESSION['admin-id']);
header("location:login.php");

?>