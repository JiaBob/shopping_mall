<?php
session_start();
$fullname=$_POST['fullname'];
$password=MD5($_POST['password1']);
$email=$_POST['email'];
$address=$_POST['address']; 

include('conn.php');
//$sqlSelect="SELECT TOP 1 aid FROM account";
//$result=$conn->query($sqlSelect);
//$aid=$result["aid"];
//echo $aid;
//$check_name="SELECT fullname FROM account WHERE fullname='$fullname'"
//    if(mysql_num_rows($chech_name)>=1){
//       exit(' 对不起!!!<strong style=color:red>'.$name.'</strong>用户已经有人注册。');
//}
$insert = mysql_query("INSERT INTO account (fullname, password, email,address)
VALUES ('$fullname', '$password', '$email','$address')");

$check_query = mysql_query("select aid from account where fullname='$fullname'");


if ($result = mysql_fetch_array($check_query)) {
    $_SESSION['fullname'] = $fullname;
    $_SESSION['aid']=$result['aid'];
    header("Location:index.php");
} 
else {
    echo mysql_error();
}


?>