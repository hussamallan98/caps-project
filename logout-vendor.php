<?php 
session_start();
unset($_SESSION['vend-id']);
header("location:index.php");

?>