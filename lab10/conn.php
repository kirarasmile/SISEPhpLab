<?
$dsn="mysql:host=localhost;dbname=db_mysise";
$db=new PDO($dsn,'root','123456');    //连接数据库
$db->query('set names utf-8');      //设置字符集
?>