<?php

//$s = $_GET['info'];
//$answer = "建议：".$s
//    ." , 给你返回数据：恍恍惚惚.....";
//echo $answer;

//$con=mysql_connect("localhost","root","123456");
//mysql_query("set names 'utf8'");
//mysql_select_db("lab12");


$coon = mysqli_connect('localhost', 'root','123456');
mysqli_select_db($coon, "lab12");
mysqli_set_charset($coon, "utf8");

$s = $_GET['name1'];
$result=mysqli_query($coon,"select name from test WHERE name LIKE '$s%'");
echo "建议:";
while($a=mysqli_fetch_assoc($result)){
    echo $a['name']." & ";

}


