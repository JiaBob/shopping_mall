<?php
session_start();

unset($_SESSION['pid']);
$pid=$_GET['pid'];
$_SESSION['pid']=$pid;

?>