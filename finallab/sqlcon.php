<?php
$dsn="mysql:host=localhost;dbname=finallab";
$db=new PDO($dsn,'root','123456');    //连接数据库
$db->query('set names utf8');      //设置字符集
