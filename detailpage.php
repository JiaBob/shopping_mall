<?php
 include('navibar.php');

if(!empty($_SESSION['aid']))
{
    $aid=$_SESSION['aid'];
}

$bid=$_GET['bid'];
  
include('conn.php');

if(!empty($_GET['buyid']))
{
if(empty($_SESSION['aid']))
{
    header("Location:login.html");
}
$buyid=$_GET['buyid'];
$checkcart=mysql_query("SELECT * FROM cart WHERE bid=$buyid AND aid=$aid");
if(mysql_num_rows($checkcart)==0)
{
$cart=mysql_query("INSERT INTO cart(bid,aid)VALUES($buyid,$aid)");
}
else
{ 
    echo "<script>alert('Duplicate book');window.history.back(-1); </script>";
}
}

$bookinfo=mysql_query("SELECT * FROM book WHERE bid=$bid");
$infoRows=mysql_fetch_array($bookinfo,MYSQL_NUM);

$bookdetail=mysql_query("SELECT * FROM bookdetail WHERE bid=$bid");
$detailRows=mysql_fetch_array($bookdetail,MYSQL_NUM);

$comment=mysql_query("SELECT * FROM comment WHERE bid=$bid");
$comment_num=mysql_num_rows($comment);

?>
<html>
<head>
    <title>Detailpage</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="http://apps.bdimg.com/libs/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
      <script src="https://code.jquery.com/jquery.js"></script>
      <script src="bootstrap/js/bootstrap.min.js"></script>
    <style>
        div.photo,div.book,div.stock,div.purchase {float:left}
        div.description {clear:both}
        .thumbs img {
	border: solid 1px white;
	width: 70px;
	height: 70px;
}
.thumbs img:hover {
	border-color: red;
}
    </style>
</head>
    
<body background="img/bkg.jpg">
    <div class="product-details"><!--product-details-->
        <div class="panel-heading">
      <button id="category" class="btn btn-default" data-toggle="collapse" data-parent="#parent" 
          href="#sub1" style="width:150px;height: 70px;background-color:transparent;  position: fixed; left:9.5%;
    top: 89px; ">
        <h4><?php if(!empty($_SESSION['category'])){echo $_SESSION['category'];}else{echo "Categories";} ?></h4>
        </button>
     </div>
        <div id="sub1" class="panel-collapse collapse" style="font-weight:bold;font-size:15px;border-size:auto; position: fixed;left:8.5%;
    top: 158px;">
      <div class="panel-body" >
      <a class="big" href="list.php?category=Arts" >Arts & Photos</a>
      </div>
          
		 <div class="panel-body">
        <a class="big" href="list.php?category=Children">Children's Books</a>
      </div>
		 <div  class="panel-body">
        <a class="big" href="list.php?category=Education">Education & Reference</a>
      </div>
         <div class="panel-body">
        <a class="big" href="list.php?category=Science"> Science Fiction & Fantasy</a>
      </div>
         <div  class="panel-body">
        <a class="big" href="list.php?category=Sports"> Sports & Outdoors</a>
      </div>
    </div>
  
</div>
						<div class="col-sm-5"  style="float:left; width:auto; margin-left:300px;">
							<div class="view-product">
                                <p><img id="large" src="<?php echo $detailRows[3] ?>" width=290px height=300px /></p>
<p class="thumbs">   
	<a href="<?php echo $detailRows[3] ?>" ><img src="<?php echo $detailRows[3] ?>" /></a>
	<a href="<?php echo $detailRows[4] ?>" ><img src="<?php echo $detailRows[4] ?>"/></a>
	<a href="<?php echo $detailRows[5] ?>" ><img src="<?php echo $detailRows[5] ?>" /></a>
	<a href="<?php echo $detailRows[6] ?>" ><img src="<?php echo $detailRows[6] ?>"/></a>

</p>
								
                            </div>

						</div>
						<div class="col-sm-7" style="float:left; width:auto; margin-left:100px;">
							<div class="product-information">
								<h3><?php echo $infoRows[1] ?></h3>
						
                                <p><b>Price:</b> <span><?php echo $infoRows[6] ?></span> </p>
								<p><b>Category:</b> <?php echo $infoRows[4]; ?></p>
                                <p><b>Author:</b> <?php echo $infoRows[3]; ?></p>
                                <p><b>Average Rating:</b>
                                    <?php
if($infoRows[7]<2)
{
    echo "<font size='3px' >".$infoRows[7]."</font><span class='glyphicon glyphicon-warning-sign' style='color: orange'></span></td>";
}
    else
    {
         echo "<font size='3px'>".$infoRows[7]."</font>";
    }
?>
</p>
								<p><b>In Stock:</b> <?php echo $infoRows[5]?'Yes':'No' ?> </p>
                                
                               
     <span>
                                    
                               <?php 
    if(!empty($_SESSION['aid'])){if($_SESSION['aid']!=1){
                                    echo "<a class='btn  btn-default btn-lg' href='cart.php?bid=$detailRows[0]' role='button' style='width:130px; background:#FFECF5'>
									<div align='center' style='color:#CE0000'>	Buy</div></a>
                                     <a class='btn  btn-default btn-lg' href='detailpage.php?bid=".$detailRows[0]."&buyid=".$detailRows[0]."' role='button' style='width:130px; background:#CE0000'>
										<div align='center' style='color:white'>Add to cart</div></a>";}
                                }
                                 else{echo "<a class='btn  btn-default btn-lg' href='cart.php?bid=$detailRows[0]' role='button' style='width:130px; background:#FFECF5'>
									<div align='center' style='color:#CE0000'>	Buy</div></a>
                                     <a class='btn  btn-default btn-lg' href='detailpage.php?bid=".$detailRows[0]."&buyid=".$detailRows[0]."' role='button' style='width:130px; background:#CE0000'>
										<div align='center' style='color:white'>Add to cart</div></a>";}
                                
         ?>
								
                                        
                            </span>
                              </div>
						</div>
					</div>

    
    <div class="category-tab shop-details-tab">
        	<div class="col-sm-12" style="float:left; width:56%;margin-left:299px;" >
                
    <ul id="myTab" class="nav nav-tabs">
								<li class="active"><a href="#details" data-toggle="tab"><b>Details</b></a></li>
								
								<li><a href="#reviews" data-toggle="tab"><b>Reviews</b> <strong><?php echo "<span class='badge' style='background-color: #009FCC'>$comment_num</span>"; ?></strong></a></li>
                </ul>
            
					<div id="myTabContent" class="tab-content">
   <div class="tab-pane fade in active" id="details">
      <p><?php echo $detailRows[1] ?></p>
   </div>
		<div class="tab-pane fade" id="reviews">
            
            <?php
            while($commentRows=mysql_fetch_array($comment,MYSQL_NUM))
         {
            $rate=mysql_query("SELECT rating FROM rating WHERE bid=$bid AND aid='$commentRows[1]'");
             $ratingRows=mysql_fetch_array($rate,MYSQL_NUM);
             $account=mysql_query("SELECT fullname FROM account WHERE aid='$commentRows[1]'");
             $accountRows=mysql_fetch_array($account,MYSQL_NUM);
             echo "<ul>
             <li style='position: relative;list-style: none;outline: 0;padding: 25px;border-bottom: 1px dashed red;margin-left:-39px; '>
        <div style='float: left;overflow: hidden;width: 100px;text-align: center;line-height: 2;margin-left:-59; '>
                <img  src='//img.alicdn.com/tps/i3/TB1yeWeIFXXXXX5XFXXuAZJYXXX-210-210.png' style='width: 30px;height: 30px;'>
             <div >$accountRows[0]</div> 
        </div>
        <div style='box-sizing: border-box;overflow: hidden;margin-left:133px;position: relative;zoom: 1.5;'>
             $commentRows[2]
        </div>
             
             </li>
             </ul>"; 
         }
            ?>
      
   </div>			
					
					
				</div>

    </div>
    </div>
    <script>
    $(document).ready(function(){

	$(".thumbs a").mouseenter(function(){
		$("#large").attr({ src: $(this).attr("href")});
		return false;
	});
    $(".thumbs a").click(function(){
		$("#large").attr({ src: $(this).attr("href")});
		return false;
	});
});
    </script>
<!--
    <script type="text/javascript">
	$(function () {
		var t = $("#text_box1");
		$("#add1").click(function () {
			t.val(parseInt(t.val()) + 1)
			
		})
		$("#min1").click(function () {
			if(t.val()>0){
				t.val(parseInt(t.val()) - 1)
				
			}
		})
		
	})
	</script>
-->
</body>
</html>
