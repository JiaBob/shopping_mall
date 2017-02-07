<?php date_default_timezone_set('prc');
session_start();
include('conn.php');

if(!empty($_GET['status']))
{
    $pid=$_GET['pid'];
    $status=$_GET['status'];
    $date=date('y-m-d h:i:s');
    
    $aid=mysql_query("SELECT aid FROM purchaseorder WHERE pid=$pid");
    $getaid=mysql_fetch_row($aid,MYSQL_NUM);
    
    $note=mysql_query("INSERT INTO notification (pid,aid,readstatus)VALUES($pid,$getaid[0],0)");
    if(!$note)
    {
        echo mysql_error();
    }
    $changestatus=mysql_query("UPDATE purchaseorder SET status='$status',senddate='$date' WHERE pid=$pid");
    if($changestatus)
    {
        header("Location:vendor.php");
    }
    else
    {
        echo mysql_error();
    }
}
if(!empty($_GET['read'])
   {
       $read=$_GET['read'];
       $readNote=mysql_query("UPDATE notification SET readstatus=1 WHERE pid=$read");
   }
?>