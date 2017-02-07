<?php

include('navibar.php');
include('conn.php');

if(empty($_SESSION['aid']))
   {
       header("Location:login.html");
   }
$aid=$_SESSION['aid'];

if(!empty($_GET['bid']))
{
$bid=$_GET['bid'];
$addtocart=mysql_query("INSERT INTO cart (aid,bid)VALUES($aid,$bid)");
}

if(!empty($_GET['delete']))
{
    $deleteid=$_GET['delete'];
    $delete=mysql_query("DELETE FROM cart WHERE bid=$deleteid");
}

$account=mysql_query("SELECT address FROM account WHERE aid=$aid");
$accountRow=mysql_fetch_array($account,MYSQL_NUM);
?>
<html>
<head>    
    <title>Cart</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="http://apps.bdimg.com/libs/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
      <script src="https://code.jquery.com/jquery.js"></script>
      <style>
         td:nth-child(5) input {height:32px; width:50px; text-align:center; border:1px solid #ccc;}
    </style>
    
</head>

<body background="img/bkg.jpg">
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<form role="form" name="buy" method="post" action="buy.php" >
                        <h4>Deliver address</h4>
                        <input type="text" name="address" value=<?php echo $accountRow[0] ?> >
						<h3>Shopping cart</h3>
						
							</div>
					</div>
				</div>
    </section>
			
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							
						</div>
						
	<section id="Shopping">
		
			<div class="table-responsive ">
				<table class="table table-condensed">
					<thead>
						<tr class="product1">
							<td class="image">Item</td>
							<td class="description"></td>
                            <td></td>
							<td class="price"> 
          Price
                               </td>
						</tr>
					</thead>
					<tbody>
                        
                        <?php
$cart=mysql_query("SELECT bid FROM cart WHERE aid=$aid");
    $up=0;
    $down=-1;
while($cartRows=mysql_fetch_array($cart,MYSQL_NUM))
{
    
$book=mysql_query("SELECT * FROM book WHERE bid=$cartRows[0]");
$rows=mysql_fetch_array($book,MYSQL_NUM);
echo "<tr><td><input type='checkbox' name='bid[]' value=".$rows[0]." checked=true ></td>
          <td class='product2'><a href='detailpage.php?bid=".$rows[0]."'><img src=\"".$rows[2]."\" width=200px height=200px></a><h4><a href='detailpage.php?bid=".$rows[0]."'>$rows[1]</a></h4></td>
          <td class='Rating'><h4>  </h4></td>
          <td class='price'><strong> <font color='red'>".$rows[6]."</font> </strong></td>
          <td><input id=".$up." type='text' name='amount' value='1'>
<div class='btn-group-vertical'>
    <button type='button' id=".$up." class='btn btn-default btn-xs'>
          <span class='glyphicon glyphicon-chevron-up'></span>
        </button> 
    <button type='button' id=".$down." class='btn btn-default btn-xs'>
          <span class='glyphicon glyphicon-chevron-down'></span> 
        </button>
</div></td>
<td><a class='btn btn-default' href='cart.php?delete=".$rows[0]."' role='button'>Delete</a></td></tr> ";
    $up++;
    $down--;    
}

                        ?>
                        </tbody>                  	
				</table>
                
<!--
         <ul class="pager">
  <li><a href="#">Previous</a></li>
  <li><a href="#">Next</a></li>
</ul>
-->
                <input type="submit" class='btn btn-default' name="submit" value="buy">
                        </form>
			</div>
		</div>
	</section> 
</body>    
</html>
        <script type="text/javascript">
    var amount=<?php echo $up ?>;
    var i=0;
    var down=-1;
    while(i<=amount){
		$('button[id='+i+']').click(function () {            
            var t = $(this).parent().siblings();
			t.val(parseInt(t.val()) + 1)
		})
		$('button[id='+down+']').click(function () {
            var d = $(this).parent().siblings();
			if(d.val()>0){
				d.val(parseInt(d.val()) - 1)
				
			}
		})
    down--;
    i++;
    }
	</script>