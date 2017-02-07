<?php date_default_timezone_set('prc');
session_start();
include('conn.php');

if(!empty($_POST['bid']))
{
$aid=$_SESSION['aid'];
$orderaddress=$_POST['address'];
$purchasedate=date('y-m-d h:i:s');
$status="pending";

$order=mysql_query("INSERT INTO purchaseorder (aid,orderaddress,purchasedate,status)VALUES('$aid','$orderaddress','$purchasedate','$status')");

$bid=$_POST['bid'];
$amount=$_POST['amount'];

$findpid=mysql_query("SELECT pid FROM purchaseorder WHERE aid=$aid ORDER BY purchasedate DESC");
$pid=mysql_fetch_array($findpid,MYSQL_NUM);

for($i=0;$i<count($bid);$i++)
{
    var_dump($bid);
$addbook=mysql_query("INSERT INTO orderitem (pid,bid,amount)VALUES('$pid[0]','$bid[$i]','$amount')");
$deletecart=mysql_query("DELETE FROM cart WHERE bid=$bid[$i]");
    if($deletecart)
    {
        echo "asdasd";
    }
    else
    {
        mysql_error();
    }
}
}
header("Location:purchase.php");

?>