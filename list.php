<!DOCTYPE html>
<html lang="en">
    <style>

a.big:hover,a.big:active {font-size:140%;}
</style>
<head>
  
  
    <title>Listpage</title>
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="http://apps.bdimg.com/libs/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
      <script src="https://code.jquery.com/jquery.js"></script>
      <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="bootstrap/css/bootstrap.css"></script>
    
    <style>
        .col-sm-11 {margin:12px} 
        a {color:black}
        body{background-position:center; background-repeat:no-repeat;}
    </style>
</head>

<body background="img/bkg.jpg">
    <?php 
include('navibar.php');
include('conn.php');

$page=1;
$offset=0;
$page_size=4;
$uplimit=$page_size;

//paging
if(!empty($_GET['page']))
   {
       $page=$_GET['page'];
       if($page>0)
       {
       $_SESSION['page']=$page;
       }
       else if($page=='back')
       {
       $_SESSION['page']=$_SESSION['page']-1;
           if($_SESSION['page']<=0)
           {
               $_SESSION['page']=1;
           }
       }
       else
       {
       $_SESSION['page']=$_SESSION['page']+1;

       }
    
       $offset=$page_size*($_SESSION['page']-1);
       $uplimit=$page_size;
   }
if(!empty($_SESSION['category']))
{
    $category=$_SESSION['category'];
$book=mysql_query("SELECT * FROM book WHERE category='$category' LIMIT $offset,$uplimit");
$booksum=mysql_query("SELECT * FROM book WHERE category='$category'");
}
else
{
$book=mysql_query("SELECT * FROM book LIMIT $offset,$uplimit");
$booksum=mysql_query("SELECT * FROM book");

}

//sorting
if(!empty($_GET['desc']))
       {
    $_SESSION['sort']='desc';
   }

if(!empty($_SESSION['sort'])&&$_SESSION['sort']=='desc')
{
    if(!empty($_SESSION['category']))
{

    $category=$_SESSION['category'];   
    $book=mysql_query("SELECT * FROM book WHERE category='$category' ORDER BY price DESC LIMIT $offset,$uplimit");
    $booksum=mysql_query("SELECT * FROM book WHERE category='$category' ");
}
else
{
    $book=mysql_query("SELECT * FROM book ORDER BY price DESC LIMIT $offset,$uplimit");
    $booksum=mysql_query("SELECT * FROM book");
}
}
if(!empty($_GET['asc']))
       {
    $_SESSION['sort']='asc';
   }
if(!empty($_SESSION['sort'])&&$_SESSION['sort']=='asc')
{
     if(!empty($_SESSION['category']))
{
    $category=$_SESSION['category'];   
    $book=mysql_query("SELECT * FROM book WHERE category='$category' ORDER BY price ASC LIMIT $offset,$uplimit");
    $booksum=mysql_query("SELECT * FROM book WHERE category='$category' ");
}
else
{
    $book=mysql_query("SELECT * FROM book ORDER BY price ASC LIMIT $offset,$uplimit");
    $booksum=mysql_query("SELECT * FROM book");
}
}
if(!empty($_POST['searchbid']))
   {
       $bid=$_POST['searchbid'];
       $_SESSION['searchbid']=$bid;
       $book=mysql_query("SELECT * FROM book WHERE bid='$bid' LIMIT $offset,$uplimit");
       $booksum=mysql_query("SELECT * FROM book WHERE bid='$bid'");
   }

if(!empty($_POST['search']))
   {
       $keyword=$_POST['search'];
       $_SESSION['search']=$keyword;
       $book=mysql_query("SELECT * FROM book WHERE name LIKE '%$keyword%' LIMIT $offset,$uplimit");
       $booksum=mysql_query("SELECT * FROM book WHERE name LIKE '%$keyword%'");
   }

if(!empty($_GET['category']))
{
    $_SESSION['page']=1;
    $category=$_GET['category'];
    $_SESSION['category']=$category;
    $book=mysql_query("SELECT * FROM book WHERE category='$category' LIMIT $offset,$uplimit");
    $booksum=mysql_query("SELECT * FROM book WHERE category='$category' ");
}

    ?>

<div class="col-md-1" style="float:left; width:250px; margin-left:100px;">
            
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
    
			
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row" style="float:left; width:850px;">
					<div class="col-sm-11">
						<div class="navbar-header">
							
						</div>

	<section id="Shopping">
		
			<div class="table-responsive ">
                <?php 
    if(!empty($_SESSION['aid']))
{
    if($_SESSION['aid']==1)
{
    echo "<a class='btn btn-default' href='addbookform.php'>Add new book</a>";
    echo "<form method='post' role='searchbid'  action='list.php'>
         <div class='form-group'>
            <input type='text' class='form-control' name='searchbid' placeholder='Search BID' style='width: 15.5%;'>
         </div>
         <button type='submit' class='btn btn-default' ><span class='glyphicon glyphicon-search' style='color: rgb(0, 0, 0);'> </span></button>
      </form>    ";
}
}
?>
				<table class="table table-condensed">
					<thead>
						<tr class="product1">
							<td class="image">Item</td>
                            <td>Author</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
							<td class="description">Rating</td>
							<td class="price"> 
                                <?php if(!empty($_SESSION['sort'])){if($_SESSION['sort']=='asc'){echo "<a type='button' href='list.php?desc=true ' class='btn btn-default btn-sm'  data-toggle='tooltip' data-placement='bottom' title='DESC'>
          Price<span class='glyphicon glyphicon-arrow-up'></span> 
        </a>";} else{echo "<a type='button' href='list.php?asc=true' class='btn btn-default btn-sm'  data-toggle='tooltip' data-placement='bottom' title='DESC'>
          Price<span class='glyphicon glyphicon-arrow-down'></span> 
        </a>";}}else{echo "<a type='button' href='list.php?asc=true' class='btn btn-default btn-sm'  data-toggle='tooltip' data-placement='bottom' title='DESC'>
          Price<span class='glyphicon glyphicon-arrow-down'></span> 
        </a>";} ?>
                        
                            </td>
						</tr>
					</thead>
					<tbody>
<?php

$bookamount=mysql_num_rows($booksum);
$page_num=ceil($bookamount/$page_size);
    
while($bookRow=mysql_fetch_array($book,MYSQL_NUM))
{
     
    echo "             <tr>
							<td class='product2'>
								<a href='detailpage.php?bid=".$bookRow[0]."'><img src=\"".$bookRow[2]."\" width=200px height=200px></a>
                                <strong><h4><a href='detailpage.php?bid=".$bookRow[0]."'>".$bookRow[1]."</a></h4></strong>
								
							</td>
                            <td class='Rating' style='vertical-align: middle;'>
                                <font size='4px' color='black'>".$bookRow[3]."</font>
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
    <td class='Rating' style='vertical-align: middle;'>";
if($bookRow[7]<2)
{
    echo "<font size='4px' color='black'>".$bookRow[7]."</font><span class='glyphicon glyphicon-warning-sign' style='color: orange'></span>";
}
    else
    {
         echo "<font size='4px' color='black'>".$bookRow[7]."</font>";
    }
    echo                   "</td>
							<td class='price' style='vertical-align: middle;'>
								<strong><font size='4px' color='red'>$".$bookRow[6]."</font> </strong>
							</td>";
    if(!empty($_SESSION['aid']))
{
    if($_SESSION['aid']==1)
     {
     echo "<td style='vertical-align: middle;'>	<a class='btn  btn-default' href='updatebookform.php?bid=$bookRow[0]' role='button'>Change</a></td>						</tr>";
     }
    else
    {
        echo "<td style='vertical-align: middle;'>	<a class=\"btn  btn-default\" href=\"detailpage.php?bid=".$bookRow[0]."\" role=\"button\">	Buy</a></td>						</tr>";
    }
}
}
?>
					</tbody>
                    	
				</table>
                
    <ul class="pagination">
    <li <?php
if(!empty($_SESSION['page'])){
    if($_SESSION['page']==1)
    {
        echo " class='disabled'>";
    }
    else
    {
        echo "<a href='list.php?page=back' aria-label='Previous'>";
    }
}
    ?>
        <span aria-hidden='true'>&laquo;</span>
      </a>
    </li>
   <?php
   for($i=1;$i<=$page_num;$i++)
   {
       echo "<li id=page".$i."><a  href='list.php?page=$i'>$i</a></li>";
   }
   ?>
    <li  <?php
if(!empty($_SESSION['page'])){
    if($_SESSION['page']>=$page_num)
    {
        echo " class='disabled'>";
    }
    else
    {
        echo "<a href='list.php?page=next' aria-label='Next'>";
    }
}
    ?>
        <span aria-hidden='true'>&raquo;</span>
      </a>
    </li>
  </ul>
			</div>
		</div>
	</section> 
<script>
    <?php
   if(!empty($_SESSION['page']))
   {
       $page=$_SESSION['page'];
       
       echo "$('#page".$page."').attr('class','active')
       ";
   }
else
{
    echo "$('#page1').attr('class','active')
    ";
}
    ?>
    function change1(){
        $('a[title="DESC"]').attr('href','list.php?asc=true').attr('onclick','change2()')
    }
    function change2(){
        $('a[title="DESC"]').attr('href','list.php?desc=true').attr('onclick','change1()')
    }
</script>
	
	

	
					
					
   
</body>
</html>