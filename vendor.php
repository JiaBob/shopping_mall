<html>
    <head>
<title>Purchase</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="http://apps.bdimg.com/libs/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
      <script src="https://code.jquery.com/jquery.js"></script>
        <script src="/bootstrap/js/bootstrap.min.js"></script>
        <style>
            #rate {margin:10px; width:35}
            textarea {margin:10px; width:400px; height:150px}
            #hover:hover,#hover:active {background-color:#ffffff;}
        </style>
    </head>
    <body background="img/bkg.jpg">
<?php date_default_timezone_set('prc');

include('navibar.php'); 

include('conn.php');

if(!empty($_POST['search']))
   {
       $pid=$_POST['search'];
       $book=mysql_query("SELECT * FROM purchaseorder WHERE pid=$pid");
   }

if(!empty($_GET['status']))
   {
       if($_GET['status']=='pending')
       {
           $accountorder=mysql_query("SELECT * FROM purchaseorder WHERE status='pending' ORDER BY purchasedate DESC");
           $amount=mysql_query("SELECT COUNT(pid) FROM purchaseorder WHERE status='pending'");
       }
       else if($_GET['status']=='past')
       {
           $accountorder=mysql_query("SELECT * FROM purchaseorder WHERE status='shipped' OR status='cancel' ORDER BY purchasedate DESC");
           $amount=mysql_query("SELECT COUNT(pid) FROM purchaseorder WHERE status='shipped' OR status='cancel'");
       }
       else
       {
           $accountorder=mysql_query("SELECT * FROM purchaseorder WHERE status='hold' ORDER BY purchasedate DESC");
           $amount=mysql_query("SELECT COUNT(pid) FROM purchaseorder WHERE status='hold'");
       }
   }
else if(!empty($pid))
{
    $accountorder=mysql_query("SELECT * FROM purchaseorder WHERE pid=$pid ORDER BY purchasedate DESC");
    $amount=mysql_query("SELECT COUNT(pid) FROM purchaseorder WHERE pid=$pid");
}
else
{
$accountorder=mysql_query("SELECT * FROM purchaseorder ORDER BY purchasedate DESC");
$amount=mysql_query("SELECT COUNT(pid) FROM purchaseorder");
}

$amountRow=mysql_fetch_array($amount,MYSQL_NUM);
?>
</body>
		<div class="container" >
			<div class="row" style="margin-left:138; width:1000;">
                    <div class="row">
                        <div class="col-md-2">
                <form role="search" method="post" action="vendor.php">
         <div class="form-group">
            <input type="text" class="form-control" id="search" name="search" placeholder="Search">
         </div>
                    </div>
                    <div class="col-sm-2">
         <button type="submit" class="btn btn-default" >search pid</button>
      </form>    
                </div>
					</div>
                <a class='btn btn-default' href='vendor.php?status=pending'>Pending order</a>
                 <a class='btn btn-default' href='vendor.php?status=hold'>Hold order</a>
                    <a class='btn btn-default' href='vendor.php?status=past'>Past order</a>
                    <a class='btn btn-default' href='vendor.php'>All order</a>
                <h3>Purchase order (amount: <font color='red'><?php echo $amountRow[0]?></font>)</h3>
                </div>
				</div>
		<div class="header-bottom"><!--header-bottom-->
			<div class="container" style="margin-left:209;“>
				<div class="row">
					<div class="col-sm-9">
                        <?php


while($accountorderRows=mysql_fetch_array($accountorder,MYSQL_NUM))
{
$selectaccount=mysql_query("SELECT fullname FROM account WHERE aid=$accountorderRows[1]");
$selectaccountRows=mysql_fetch_array($selectaccount,MYSQL_NUM);
echo "<table class='table table-condensed' border='0'>
					<thead >
                    <tr style='background:#f7f4eb; color:#8a7152; margin-bottom:auto'>
                    <td style=' width:305;'>Customer name : $selectaccountRows[0]</td>
                    <td style=' width:308;'>Deliever address :$accountorderRows[6]</td>
                    <td></td>
                    <td></td>
                    </tr>
                    <tr class='orderinfo' style='background:#f7f4eb; color:#8a7152;'>
                    <td class='purchaseNo'  style=' height:33;'>Purchase No.</td>
                    <td style=' height:33;'>Purchase Date : </td>
                    <td style=' height:33;'>Order Status: </td>
                    ";
    if($accountorderRows[7]=='pending')
    {
echo  "             <td><a class='btn btn-default ' id=ship$accountorderRows[0] href='processorder.php?status=shipped&pid=$accountorderRows[0]' >ship</a></td>";
    }
    else
    {
        echo "<td></td>";
    }

//if($accountorderRows[7]!='cancel'&&$accountorderRows[7]!='shipping')
//{ 
//    echo           "<td><a class='btn btn-default' href=\"vendor.php?cancel=".$accountorderRows[0]."\"> Cancel </a></td>
//                    <td><a class='btn btn-default' href=\"vendor.php?ship=".$accountorderRows[0]."\"> Ship </a></td>";
//}
    echo           "</tr>
    <tr id='hover' data-toggle='collapse' href='#collapseOne".$accountorderRows[0]."'>
                    <td class='purchaseNo'>$accountorderRows[0]</td>
                    <td> $accountorderRows[2]</td>
                    <td>$accountorderRows[7]</td>
                    <td></td>
                   </tr>
    <table id='collapseOne".$accountorderRows[0]."' class='table table-condensed panel-collapse collapse' style='background-color:#f7f4eb;'>
				    <tr class='productinfo1'>
							<td class='image'>Item</td>
							<td class='stock'>Stock Status</td>
                            <td>amount</td>
							<td class='price'>Price</td>          
				    </tr>
					</thead>
					<tbody>";
    $item=mysql_query("SELECT * FROM orderitem WHERE pid=$accountorderRows[0]");
    while($itemRows=mysql_fetch_array($item,MYSQL_NUM))
{
    $showbook=mysql_query("SELECT * FROM book WHERE bid=$itemRows[1]");
    $rows=mysql_fetch_array($showbook,MYSQL_NUM);
    if($rows[5])
    {
        $stock="In Stock";
    }
    else
    {
        echo "<script>$('#ship$accountorderRows[0]').addClass('disabled')</script>";
        $stock="<span title='Warning'  
      data-container='body' data-toggle='hover' data-placement='top' 
      data-content='The order can not be shipped' class='glyphicon glyphicon-warning-sign' style='color: orange'></span>Out of Stock";
    }
    echo "         
          <tr>
          <td class='productinfo2'><a href='detailpage.php?bid=".$rows[0]."'><img src=\"".$rows[2]."\" width=200px height=200px></a><h4><a href='detailpage.php?bid=".$rows[0]."'>$rows[1]</a></h4></td>
          <td>$stock</td>
          
          <td class='amount'><strong>".$itemRows[2]."</strong></td>
          <td class='price'><strong> <font color='red'>$".$rows[6]."</font> </strong></td>
         ";
}
    $sum=mysql_query("SELECT SUM(price) 
                  FROM book b, purchaseorder p, orderitem i 
                  WHERE p.pid=i.pid AND i.bid=b.bid AND p.pid=$accountorderRows[0]");
$sumrow=mysql_fetch_array($sum,MYSQL_NUM);
                echo "<tr><td>Total price: <strong> <font color='red'>$$sumrow[0]</font></strong></td></tr>"; 
}
       
                ?>
                        </tbody>                  	
				</table>
</html>
                <script>
            $(function () 
      { 
            var options={trigger:'hover'}
            $("[data-toggle='hover']").popover(options);
      });
               function session1(a)
                    { 
var xmlhttp=new XMLHttpRequest();
xmlhttp.open("GET","session2.php?pid="+a+"",true);
xmlhttp.send();
                        console.log(a);
                    }
                </script>