<?php
$coon = mysqli_connect('localhost', 'root','123456');
mysqli_select_db($coon, "lab12");
mysqli_set_charset($coon, "utf8");

$s = $_GET['name1'];
$result=mysqli_query($coon,"select admin from user WHERE name LIKE '$s%'");
echo "建议:";
while($a=mysqli_fetch_assoc($result)){
echo $a['name']." & ";

}

