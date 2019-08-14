<head>
    <!-- 以下方式定时转到其他页面 -->
    <meta http-equiv="refresh" content="1;url=mianpage.php">
</head>
<?php
// 处理编辑操作的页面 
$dsn="mysql:host=localhost;dbname=finallab";
$db=new PDO($dsn,'root','123456');    //连接数据库
$db->query('set names utf8');      //设置字符集


$id = $_POST['id'];


$picname = $_POST['picname2'];
$num = $_POST['num'];
$jieshao = $_POST['jieshao'];
// 更新数据
$rs =$db->query("UPDATE shop SET picname='$picname',num='$num',jieshao='$jieshao' WHERE  id='$id'");
