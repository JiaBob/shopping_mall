<?php
session_start();
$_SESSION['bid']=$_GET['bid'];
header("Location:purchase.php");
?>