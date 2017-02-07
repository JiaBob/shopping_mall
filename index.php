
<?php echo phpinfo(); ?>
<?php

$conn = new PDO("mysql:host=localhost;dbname=noise", "root", "88329900");
//$conn = @mysql_connect("localhost","root","88329900");
if (!$conn){
    die("连接数据库失败：" . mysql_error());
}
//mysql_select_db("noise", $conn);
//字符转换，读库
//mysql_query("set character set 'gbk'");
//写库
//mysql_query("set names 'gbk'");
    
$conn->exec('set names utf8');
$res = $conn->query('select dB from dBinfo');
$rows = array();

$res->setFetchMode(PDO::FETCH_NUM); 

$i=0;
$dBarray=array();
while($row = $res->fetch()){
    
    $dBarray[$i]=$row[0];
    $i++;
}

$time=time();
$mintime=time()-60;
//$dB=mysql_query("SELECT dB FROM dbinfo WHERE time BETWEEN 1464431340 and 1464431400");//need update
    

//while($dBrows=mysql_fetch_row($dB,MYSQL_NUM))
//{
//    $dBarray[$i]=$dBrows[0];
//    $i++;
//}
$json=json_encode($dBarray);

?>

<script>


</script>
<!DOCTYPE html>
<html>
<head>    
    <title>Cart</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
      <link href="http://apps.bdimg.com/libs/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
      <script src="https://code.jquery.com/jquery.js"></script>
      <script src="bootstrap/js/bootstrap.min.js"></script>
   <script type="text/javascript" src="http://cdn.hcharts.cn/jquery/jquery-1.8.3.min.js"></script>
   <script type="text/javascript" src="http://cdn.hcharts.cn/highcharts/highcharts.js"></script>
      <style>
         .container1 {margin-left: 280px;margin-right: 400px;width:800px;height:380px;}
          .container {width:830px;height:400px;float:left}
          #statistics {float:left;margin-top:30px}
          #addchart {clear:both;margin-left:420px}
    </style>
    
</head>
</html>

<body>
    <h1 class="text-center"><strong>Noise collection</strong></h1>
    <div class="container1" id="container0"></div>
    <div id="newchart"></div>
    <div id="addchart" >
    <form  class="form-inline" id="timeinfo">
        <div class="form-group">
            <input type="datetime-local" name='datestart' id='datestart'>
        </div>
        <div class="form-group">
            <input  type="datetime-local" name='dateend' id='dateend'>
        </div>
        <div class="form-group">
            <input class="btn tbn-primary" value="New" type="button" name='new' onclick="check(1)">
        </div>
        <div class="form-group">
        <input class="btn tbn-primary" value="Delete" type="button" name='delete' onclick="deletechart()">
        </div>
    </form>
    </div>
    
</body>
<script>

    var method,index=0;
    
    function deletechart(){
    if(index>0){
        $('#new'+index+'').remove();
        index--;
    }
    }
    function getMean(array){
        var sum=0;
        for(var i=0;i<array.length;i++){
            sum+=array[i];
        }
        return sum/array.length
    }
    function getSd(array){
        var mean=getMean(array);
        var sum=0;
        for(var i=0;i<array.length;i++){
            sum+=Math.pow(array[i]-mean,2)
        }
        return Math.sqrt(sum/array.length)
    }
    function check(i){
     if(i==1){
        method=1;
     }
    else{
        method=2;
    }
    if($('#datestart').val()!=null&&$('#dateend').val()!=null&&$('#datestart').val()<$('#dateend').val()){
        var datestart=$('#datestart').val();
        var dateend=$('#dateend').val()
        $.getJSON("NoiseSensor/newchart.php?datestart="+datestart+"&dateend="+dateend+"",function(data,status){
            
            var newdBarray=data; 
            
             //convert string json to int json
            var intdBarray=new Array();
            for(var i=0;i<newdBarray.length;i++){
                intdBarray[i]=parseInt(newdBarray[i])/10;
            }
            var mean=getMean(intdBarray).toFixed(2);
            var max=Math.max.apply(null,intdBarray);
            var min=Math.min.apply(null,intdBarray);
            var sd=getSd(intdBarray).toFixed(2);
            if(method==1){
                index++;
                $('#newchart').append("<div id=new"+index+" style='margin-left:141px;width:1200px;height:380px'><div id=statistics><h3>Mean:&nbsp;"+mean+"</h3><h3>Max:&nbsp;&nbsp;&nbsp;"+max+"</h3><h3>Min:&nbsp;&nbsp;&nbsp;&nbsp;"+min+"</h3><h3>Sd:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+sd+"</h3></div><div id=container"+index+" class='container'></div></div>");
                var date=new Date($('#datestart').val());
                console.log(date);
                createchart(intdBarray,date);
            }
        console.log($('#datestart').val()); 
        });
    }
    }
    var date=new Date();
    var dBarray=<?php echo $json;?>;
    //convert string json to int json

    var intdBarray=new Array();
    for(var i=0;i<dBarray.length;i++){
        intdBarray[i]=parseInt(dBarray[i])/10;
    }
    // create the chart
    createchart(intdBarray,date);
    console.log(dBarray); 
    
    dynamic();
function dynamic(){
    var date=new Date();
    $.getJSON("NoiseSensor/dynamic.php",function(data,status){
        data=1;
    var dBarray=data;
    //convert string json to int json

    intdBarray.push(parseInt(data)/10);
    console.log(intdBarray);
    var chart=$('#container0').highcharts();
    chart.series[0].setData(intdBarray);                    

    });
    setTimeout(dynamic,1000);
}
    
    function createchart(intdBarray,date){
        
        //get time
        var year=date.getFullYear();
        var month=date.getMonth()+1;
        var day=date.getDate();
        var timestamp = Date.parse(date);
        $('#container'+index+'').highcharts({
        chart: {
            zoomType:'x',
        },
        
        title: { text: 'dB'
        },
        legend:{
            itemStyle:{cursor:'pointer'}
        },
        xAxis: {
            type: 'datetime',
            dateTimeLabelFormats: {
                day: '%e of %b'
            }
        },
        yAxis:  {
            title:{
                text:'Noise intensity(dB)'
            }
        },
        series : [{
            name : year+'-'+month+'-'+day,
            data : intdBarray,
            pointStart : timestamp-60000+28800000,//60 seconds earlier than the local time(+8 hour)
            pointInterval : 1000 // one second
        }] 
    });
    }



</script>