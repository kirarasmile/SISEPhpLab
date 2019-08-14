<?php
header("Content-Type: text/html; charset=utf-8");
error_reporting(E_ALL ^ E_DEPRECATED); //降低报错级别
$conn=mysql_connect('localhost','root','123456') or die('连接数据库出错'); //连接数据库服务器
mysql_query("set names 'utf-8'");	 		//设置字符集
mysql_select_db("db_mysise",$conn);	//选择数据库
$sql="Select * from user";            //事先准备操作数据库的SQL命令
?>

<table border="1" width="95%">
    <tr bgcolor="#e0e0e0">
        <th>ID</th> <th>用户名</th> <th>密码</th>
    </tr>
    <?php 	//循环输出记录到页面上
    $result=mysql_query($sql,$conn);   //创建满足SQL命令的结果集
    while($row=mysql_fetch_assoc($result)){  //在表格当中输出结果集，mysql_fetch_assoc($result)函数的目的是将结果集保存到数组当中
        ?>
        <tr>
            <td ><?= $row['id']?></td>
            <td><?= $row['name']?></td>
            <td><?= $row['password']?></td>
        </tr>
    <?php } ?>
</table>

