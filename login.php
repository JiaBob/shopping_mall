<?php
session_start();

//log out
if($_GET['action'] == "logout"){
    unset($_SESSION['fullname']);
    unset($_SESSION['aid']);
    header("Location:index.php");
}

//log in
if(!isset($_POST['submit'])){
    
}

$username = htmlspecialchars($_POST['account']);
$password = MD5($_POST['password']);

include('conn.php');

//检测用户名及密码是否正确
$check_query = mysql_query("select aid from account where fullname='$username' and password='$password' 
limit 1");
if($result = mysql_fetch_array($check_query))
{
    $_SESSION['fullname'] = $username;
    $_SESSION['aid']=$result['aid'];
   echo "<script> history.go(-2); </script>";
} else {
    echo "<script> history.go(-1); </script>";
}
?>