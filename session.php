<?php
session_start();
if(!empty($_GET['bid']))
{
$bid=$_GET['bid'];
$_SESSION['bid']=$bid;
}

?>