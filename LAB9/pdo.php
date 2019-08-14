<?php
header("Content-Type: text/html; charset=utf-8");
$dsn="mysql:host=localhost;dbname=db_mysise";
$db=new PDO($dsn,'root','123456');	//连接数据库
$db->query('set names utf8'); //设置字符集
$sql="Select * from user";    //事先准备操作数据库的SQL命令
?>

<table border="1" width="95%">
    <tr bgcolor="#e0e0e0">
        <th>ID</th> <th>用户名</th> <th>密码</th>
    </tr>
    <?php 	//循环输出记录到页面上
    $result=$db->query($sql);  //执行查询创建结果集
    while($row=$result->fetch(PDO::FETCH_ASSOC)){//在表格当中输出结果集，$result->fetch(PDO::FETCH_ASSOC)函数的目的是将结果集保存到数组当中
    ?>
        <tr>
            <td ><?= $row['id']?></td>
            <td><?= $row['name']?></td>
            <td><?= $row['password']?></td>
        </tr>
    <?php } ?>
</table>

