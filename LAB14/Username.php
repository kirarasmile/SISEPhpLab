<?php

include "DBcon.php";
$name=$_GET["username"];
$sql="select * from user where username='$name'";
$result=$con->query($sql);
if($result->fetch_array()){
    $response="该用户名已被占用";
}
else{
    $response="该用户名可以使用";
}
echo $response;