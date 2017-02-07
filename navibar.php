      <nav class="navbar navbar-default navbar-inverse navbar-static-top" role ="navigation">
          <div class="navbar-header" style="margin-left:3cm;">
             <a class="navbar-brand" href="/">Koob  <span class="glyphicon glyphicon-home" style="color: rgb(255, 255, 255);"> </span>                </a>
          </div>
          <div>
          <form class="navbar-form navbar-left" role="search" method="post" action="list.php">
         <div class="form-group" style="margin-left:0.5cm;">
            <input type="text" class="form-control" id="search" name="search" placeholder="Search">
         </div>
         <button type="submit" class="btn btn-default" ><span class="glyphicon glyphicon-search" style="color: rgb(0, 0, 0);"> </span></button>
      </form>    
               
          <a class="navbar-brand navbar-right" style="margin-right:3cm;" <?php session_start(); if(!empty($_SESSION['fullname'])) {echo 'href="login.php?action=logout"'; } else { echo 'href="login.html"' ;}?> > <?php if(!empty($_SESSION['fullname'])) {echo 'Sign out'; } else { echo 'Sign in' ;}?></a>
          
               <a class="navbar-brand navbar-right" 
               <?php 
              if(!empty($_SESSION['aid'])) 
                {
                  if($_SESSION['aid']==1)
                { 
                echo "href='vendor.php'>Vendor";
                }
                  else
                {
                include('conn.php');
                $i=0;
                $array=array();
                $aid=$_SESSION['aid'];
                $note=mysql_query("SELECT * FROM notification WHERE aid=$aid");
                
                while($noteRows=mysql_fetch_row($note,MYSQL_NUM))
                {
                    $array[$i]=$noteRows[0];
                    $i++;
                }
//                var_dump($array);
                for($i=0,$pid="";$i<count($array);$i++)
                {
                    $pid.="pidAlert".$i."=".$array[$i]."&";
                }
                echo $pid;
                if($notesum=mysql_num_rows($note))
                {
                echo " <a class='navbar-brand navbar-right' href='purchase.php?$pid'>Purchase Order<span class='badge' style='background-color:red'> <b>$notesum</b></span></a>";
                }
                      else
                      {
                          echo "<a class='navbar-brand navbar-right' href='purchase.php'>Purchase Order</a>";
                      }
                  }
              }
                ?>
              </a>
          <a class="navbar-brand navbar-right"     <?php if(!empty($_SESSION['fullname'])) 
                                                     {if($_SESSION['aid']==1){echo "";}
                                                     else {echo "data-target='#password'";}} 
                                                     else { echo "href='register.html'" ;}?>>
                                                   <?php if(!empty($_SESSION['fullname']))
                                                     {if($_SESSION['aid']==1){echo "";}
                                                     else {echo $_SESSION['fullname'];}} 
                                                     else { echo 'Register' ;}?></a>
           
          </div>
       </nav>
 <div class="modal fade" id="password" role="dialog" 
   aria-labelledby="myModalLabel" aria-hidden="true">
   
            <form method="post" action="navibar.php">
<!--
               <label>Original password</label>
                <input type='password' name='password1'>
-->
                <label>New password</label>
                <input type='password' name='password'>
            <input class="btn btn-inverse" type="submit" value="submit" >
             </form>
         </div>
      </div><!-- /.modal-content -->
</div><!-- /.modal -->        
<?php
include('conn.php');
if(!empty($_POST['password']))
   {
       $password=$_POST['password'];
$update=mysql_query("UPDATE account SET password='$password'");
}
?>