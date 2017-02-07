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
            .alert {border-color:red;border-style:inset;border-size:5px;}
        </style>
  <style type="text/css"> 
*{margin:0;padding:0;list-style-type:none;}
body{color:#666;font:12px/1.5 Arial;}
/* star */
#star{position:relative;width:600px;margin:20px auto;height:24px;}
#star ul,#star span{float:left;display:inline;height:19px;line-height:19px;}
#star ul{margin:0 10px;}
#star li{float:left;width:24px;cursor:pointer;text-indent:-9999px;background:url(img/star.png) no-repeat;}
#star strong{color:#f60;padding-left:10px;}
#star li.on{background-position:0 -28px;}
#star p{position:absolute;top:20px;width:159px;height:60px;display:none;background:url(img/icon.gif); no-repeat;padding:7px 10px 0;}
#star p em{color:#f60;display:block;font-style:normal;}
</style>

<script type="text/javascript"> 
window.onload = function (){

	var oStar = document.getElementById("star");
	var aLi = oStar.getElementsByTagName("li");
	var oUl = oStar.getElementsByTagName("ul")[0];
	var oSpan = oStar.getElementsByTagName("span")[1];
	var oP = oStar.getElementsByTagName("p")[0];
	var i = iScore = iStar = 0;
	var aMsg = [
				" | Terrible",
				" | Bad",
				" | Normal",
				" | Good",
				" | Excellent"
				]
	
	for (i = 1; i <= aLi.length; i++){
		aLi[i - 1].index = i;	
		aLi[i - 1].onmouseover = function (){
			fnPoint(this.index);		
			oP.style.display = "block";		
			oP.style.left = oUl.offsetLeft + this.index * this.offsetWidth - 104 + "px";		
			oP.innerHTML = "<em><b>" + this.index + "</b> point " + aMsg[this.index - 1].match(/(.+)\|/)[1] + "</em>" + aMsg[this.index - 1].match(/\|(.+)/)[1]
		};		
		aLi[i - 1].onmouseout = function (){
			fnPoint();			
			oP.style.display = "none"
		};		
		aLi[i - 1].onclick = function (){
			iStar = this.index;
            $("#rate").val(iStar);
			oP.style.display = "none";  
		}
         
	}	
	
	function fnPoint(iArg){
		iScore = iArg || iStar;
		for (i = 0; i < aLi.length; i++) aLi[i].className = i < iScore ? "on" : "";	
	}
	
};
   
</script>
    </head>
    <body background="img/bkg.jpg">
<?php date_default_timezone_set('prc');

include('navibar.php'); 

include('conn.php');

$aid=$_SESSION['aid'];
$date=date('y-m-d h:i:s');

if(!empty($_GET['pid']))
{
    $pid=$_GET['pid'];    
    $deleteorder=mysql_query("UPDATE purchaseorder SET status='cancel' WHERE pid=$pid");
    $addcancel=mysql_query("UPDATE purchaseorder SET canceldate='$date',cancelby='customer' WHERE pid=$pid");
}

if(!empty($_POST['comment'])&&!empty($_POST['rate']))
   {
       $bid=$_SESSION['bid'];
       $comment=$_POST['comment'];
       $rate=$_POST['rate'];
       $addcomment=mysql_query("REPLACE INTO comment (bid,aid,comment) VALUES($bid,$aid,'$comment')");
       $addrate=mysql_query("REPLACE INTO rating (bid,aid,rating) VALUES($bid,$aid,$rate)");
    
    $aveRating=mysql_query("SELECT ROUND(AVG(rating),1) FROM rating  WHERE bid=$bid");
    $aveRatingRows=mysql_fetch_row($aveRating,MYSQL_NUM);
    
    $addaveRating=mysql_query("UPDATE book SET aveRating=$aveRatingRows[0] WHERE bid=$bid");
       unset($_SESSION['bid']);
    
    
    
    
    if($addaveRating)
    {
        echo "sasdasd";
    }
    else{
        echo mysql_error();
    }
   }

if(!empty($_GET['status']))
   {
       if($_GET['status']=='current')
       {
           $accountorder=mysql_query("SELECT * FROM purchaseorder WHERE aid=$aid AND (status='pending' OR status='holding') ORDER BY purchasedate DESC");
           $amount=mysql_query("SELECT COUNT(pid) FROM purchaseorder WHERE aid=$aid AND (status='pending' OR status='holding')");
       }
       else
       {
           $accountorder=mysql_query("SELECT * FROM purchaseorder WHERE aid=$aid AND (status='shipped' OR status='cancel') ORDER BY purchasedate DESC");
           $amount=mysql_query("SELECT COUNT(pid) FROM purchaseorder WHERE aid=$aid AND (status='shipped' OR status='cancel')");
       }
   }
else
{
$accountorder=mysql_query("SELECT * FROM purchaseorder WHERE aid=$aid ORDER BY purchasedate DESC");
    $amount=mysql_query("SELECT COUNT(pid) FROM purchaseorder WHERE aid=$aid");
}

$amountRow=mysql_fetch_array($amount,MYSQL_NUM);
?>
</body>
		<div class="container" style="margin-left:227; width:1000;">
			<div class="row">
				<div class="col-sm-5">
                    <a class='btn btn-default' href='purchase.php?status=current'>Current purchase</a>
                    <a class='btn btn-default' href='purchase.php?status=past'>Past purchase</a>
                    <a class='btn btn-default' href='purchase.php'>All purchase</a>
						<h3>Purchase order (amount: <font color='red'><?php echo $amountRow[0]?></font>)</h3>
							</div>
					</div>
				</div>
		<div class="header-bottom" style="margin-left:300;
"><!--header-bottom-->
			<div class="container">
				<div class="row" style="margin-right:245px;">
					<div class="col-sm-9">
                        <?php

while($accountorderRows=mysql_fetch_array($accountorder,MYSQL_NUM))
{
echo "<table  class='table table-hover'>
					<thead style='background:#f7f4eb; color:#8a7152;'>
                    <tr class='orderinfo'>
                    <td class='purchaseNo' style='width:137px;'>Purchase No. </td>
                    <td style='width:189;'>Purchase Date :</td>
                    <td style='width:164;'>Order Status: </td>
                    <td ></td>";
if($accountorderRows[7]=='cancel')
{
    echo           "<td style='width:148;'>Cancelled by at </td>";
}
 else if($accountorderRows[7]=='shipped')
 {
     echo          "<td>Shipped at</td>";   
 }
    else
{ 
    echo           "<td><a class='btn btn-default' href=\"purchase.php?pid=".$accountorderRows[0]."\"> Cancel </a></td>";
}
    echo     "      
                    </tr>
				   
					</thead>
					<tbody>
         <tr id='status$accountorderRows[0]' data-toggle='collapse' href='#collapseOne".$accountorderRows[0]."'>
                    <td class='purchaseNo'>$accountorderRows[0]</td>
                    <td> $accountorderRows[2]</td>
                    <td >$accountorderRows[7]</td>
                    <td></td>";
    if($accountorderRows[7]=='cancel')
    {
    echo  "<td>$accountorderRows[5]</br>$accountorderRows[4]</td>
                   </tr>";
    }
    else if($accountorderRows[7]=='shipped')
    {
    echo  "<td> $accountorderRows[3]</td>";
    }
    echo "<table id='collapseOne".$accountorderRows[0]."' class='table table-condensed panel-collapse collapse' style='background-color:#f7f4eb;'>
     
                        <tr>
	                       <td class='image'>Item</td>
							<td class='description'></td>
                            <td>amount</td>
							<td class='price'>Price</td> 
                        </tr >
                           ";
    $item=mysql_query("SELECT * FROM orderitem WHERE pid=$accountorderRows[0]");
    while($itemRows=mysql_fetch_array($item,MYSQL_NUM))
{
    
    $showbook=mysql_query("SELECT * FROM book WHERE bid=$itemRows[1]");
    $rows=mysql_fetch_array($showbook,MYSQL_NUM);
                            
    echo "
          <tr>
          <td class='productinfo2'><a href='detailpage.php?bid=".$rows[0]."'><img src=\"".$rows[2]."\" width=200px height=200px></a><h4><a href='detailpage.php?bid=".$rows[0]."'>$rows[1]</a></h4></td>
           <td></td>
          <td class='amount'><strong>".$itemRows[2]."</strong></td>
          <td class='price'><strong> <font color='red'>$".$rows[6]."</font> </strong></td>";
    if($accountorderRows[7]=='shipped')
    {
    echo  "<td><button onclick='session($rows[0])' class='btn btn-default' data-toggle='modal' data-target='#myModal'>Comment & Rating</button></td></tr>";
    }
         
}
    $sum=mysql_query("SELECT SUM(price) 
                  FROM book b, purchaseorder p, orderitem i 
                  WHERE p.pid=i.pid AND i.bid=b.bid AND p.pid=$accountorderRows[0]");
$sumrow=mysql_fetch_array($sum,MYSQL_NUM);
                echo "<tr><td>Total price: <strong> <font color='red'>$$sumrow[0]</font></strong></td>"; 
}
        
                ?>
                       </tbody>                  	
				</table>
                 <div class="modal fade" id="myModal" tabindex="-1" role="dialog" 
   aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" 
               data-dismiss="modal" aria-hidden="true">
                  &times;
            </button>
            <h4 class="modal-title" id="myModalLabel">
               Comment & Rate
            </h4>
         </div>
         <div class="modal-body">
            <form method="post" action="purchase.php">
                <table>
                    <thead></thead>
                    <tbody>
                        <tr><td >
                <label>Rate</label></td><td>
   <div id="star">
		<ul>
			<li><a href="javascript:;">1</a></li>
			<li><a href="javascript:;">2</a></li>
			<li><a href="javascript:;">3</a></li>
			<li><a href="javascript:;">4</a></li>
			<li><a href="javascript:;">5</a></li>
		</ul>
       <input name="rate" id="rate" style="Visibility:hidden;"/>
		<span></span>
		<p></p>
	</div>
                            </td>
                            </tr><tr><td align="left">
                <label style="position:relative; bottom:55 ">Comment</label></td><td>
                <textarea name="comment"></textarea>
                                </td>
                            </tr>
                        </tbody>
                </table>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default" 
               data-dismiss="modal">Close
            </button>
            <input class="btn btn-inverse" type="submit" value="submit" >
             </form>
         </div>
      </div><!-- /.modal-content -->
</div><!-- /.modal -->              
</html>
                <?php
                if(!empty($_GET))
   {
                    $i=0;
        while($i<count($_GET))
        {
            echo $i;
       $pid=$_GET['pidAlert'.$i.''];
       echo "<script>$('#status$pid').css('background-color','FF8888').mouseleave(function()
                    {
                    var xmlhttp=new XMLHttpRequest();
                        xmlhttp.open('GET','processorder.php?read=$pid',true);
                        xmlhttp.send();
                    console.log($pid);
                    })</script>";
            $i++;
        }
   }
?>
                <script>
                
                function session(a)
                    { 
var xmlhttp=new XMLHttpRequest();
xmlhttp.open("GET","session.php?bid="+a+"",true);
xmlhttp.send();
                        console.log(a);
                    }
                </script>