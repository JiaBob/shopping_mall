<html>
   <head>
      <title>Add Book</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="http://apps.bdimg.com/libs/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
      <script src="https://code.jquery.com/jquery.js"></script>
      <script src="bootstrap/js/bootstrap.min.js"></script>
     <style>
         input[type="text"] {width:200px;}
         div.col-sm-9 input[type="text"] {width:400px;}
         textarea[type="text"] {width:400px;}
         option {width:200px;}
         form  {margin-left:50px;}

         span {color: darkred}
     </style>

   </head>
    <body background="img/bkg.jpg">
        <?php
include('conn.php');

if(!empty($_GET['bid']))
{
$bid=$_GET['bid'];
$book=mysql_query("SELECT * FROM book WHERE bid=$bid");
$bookRow=mysql_fetch_array($book,MYSQL_NUM);
    
$bookdetail=mysql_query("SELECT * FROM bookdetail WHERE bid=$bid");
$bookdetailRow=mysql_fetch_array($bookdetail,MYSQL_NUM);

}
?>

<?php
if(!empty($_POST['bookname']))
{
$bookname=$_POST['bookname'];
$price=$_POST['price'];
$author=$_POST['author'];
$category=$_POST['category'];
$description=$_POST['description'];
if($_POST['stock']="instock")
{
$stock=1;
}
else
{
$stock=2;
}
$photo1=$_POST['photoURL1'];
$photo2=$_POST['photoURL2'];
$photo3=$_POST['photoURL3'];
$photo4=$_POST['photoURL4'];
    
$addtobook=mysql_query("INSERT INTO book (name,thumbphoto,author,category,instock,price)VALUE('$bookname','$photo1','$author','$category',$stock,$price)");
        
$addtobookdetail=mysql_query("INSERT INTO bookdetail (bookdescribe,picture1,picture2,picture3,picture4)VALUE($description,$photo1,$photo2,$photo3,$photo4)");
if($addtobook||$addtobookdetail)
{
    echo "success!";
}
else
{
    echo mysql_error();
}
    }


?>

</form>
    <h1 style="text-align:center;">Add New Book</h1>
    
    <form  role="form" name="register" method="post" action="addbookform.php" style="  width: 20%;
  height: 50%;
  margin-left: 570px;
  top: 0; left: 0; bottom: 0; right: 0;">

<!--
    <div class="form-group">
        <div class="col-sm-3">
        <img src="" width=250 height=170>
        </div>
        <div class="col-sm-9">
        <p><label for="photoURL">Photo1 URL<span></span></label>
        <input type="text" class="form-contorl" id="photoURL1" name="photoURL1">
        <button type="button" class="btn btn-default" id="test1">test</button>
        (thumbnail)
        </p>
            <p>
        <label for="photoURL">Photo2 URL<span></span></label>
        <input type="text" class="form-contorl" id="photoURL2" name="photoURL2">
        <button type="button" class="btn btn-default" id="test2">test</button>
        </p>
            <p>
        <label for="photoURL">Photo3 URL<span></span></label>
        <input type="text" class="form-contorl" id="photoURL3" name="photoURL3">
        <button type="button" class="btn btn-default" id="test3">test</button>
        </p>
            <p>
        <label for="photoURL">Photo4 URL<span></span></label>
        <input type="text" class="form-contorl" id="photoURL4" name="photoURL4">
        <button type="button" class="btn btn-default" id="test4">test</button>
                </p>
        </div>
        </div>
-->
        
    <div class="form-group" style="margin-left=10px;">
        <label class="checkbox-inline" style="padding-left:0px;">
      <input type="radio" name="stock" id="instock" 
             value="instock" ><strong> in stock</strong>
   </label>
   <label class="checkbox-inline"style="padding-left:15px;">
      <input type="radio" name="stock" id="outofstock" 
         value="outofstock" checked><strong> out of stock</strong>
   </label>
            </div>
    <div class="form-group">
        <label for="Bookname">Book name<span></span></label>
        <input type="text" class="form-control" id="bookname"  name="bookname" placeholder="The book name">
        </div>
    <div class="form-group">
        <label for="Price">Price<span></span></label>
        <input type="text" class="form-control" id="price" name="price" placeholder="The price">
        </div>
    <div class="form-group">
        <label for="Author">Author<span></span></label>
        <input type="text" class="form-control" id="author" name="author" placeholder="The author">
        </div>
    <div class="form-group" style="width:200px;	height:auto;" >
        <label for="Category">Category<span></span></label>
      <select class="form-control" id="category" name="category">
         <option value="Arts">Arts & Photography</option>
         <option value="Children">Children's Books</option>
         <option value="Education">Education & Reference</option>
         <option value="Science">Science Fiction & Fantasy</option>
         <option value="Sports">Sports & Outdoors</option>
      </select>

        </div>
    <div class="form-group" >
        <label for="description">Description<span></span></label>
        <textarea type="text" class="form-control" rows=3 id="description" name="description" placeholder="Description" style="width:200px;"></textarea>
        </div>
        
        <input type="submit" name="submit" class="btn btn-default" value="submit" margin-left: 10px;></input>
    
    </form> 

<script>
    
    $('#test1').click(function(){
$('img').attr('src',$('#photoURL1').val())
    });
     $('#test2').click(function(){
$('img').attr('src',$('#photoURL2').val())
    });
     $('#test3').click(function(){
$('img').attr('src',$('#photoURL3').val())
    });
     $('#test4').click(function(){
$('img').attr('src',$('#photoURL4').val())
    });
</script>
</body>
</html>