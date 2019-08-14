<?php

$dsn="mysql:host=localhost;dbname=finallab";
$db=new PDO($dsn,'root','123456');    //连接数据库
$db->query('set names utf8');      //设置字符集
$name=$_GET["picname1"];


$rs =$db->query("select * from shop where picname='$name'");
$rs->setFetchMode(PDO::FETCH_ASSOC );
if($name = $rs->fetch()){
    $response="该商品已被上传";
}
else{
    $response="该商品未在库中";
}
echo $response;