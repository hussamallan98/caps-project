<?php 
session_start();
unset($_SESSION['cust-id']);
header("location:index.php");

?>