<?php
header("Content-Type: text/html; charset=utf-8");
$dsn="mysql:host=localhost;dbname=db_mysise";
$db=new PDO($dsn,'root','123456');    //连接数据库
$db->query('set names utf8'); //设置字符集
$sql="select * from usergroup right join user on user.id=usergroup.id";    //事先准备操作数据库的SQL命令
?>
<table border="1" width="95%">
    <tr bgcolor="#e0e0e0">
        <th>序号</th>
        <th>用户名</th>
        <th>密码</th>
        <th>邮箱</th>
        <th>电话</th>
        <th>角色</th>
    </tr>
    <?php  //循环输出记录到页面上
    $result=$db->prepare($sql);
    $result->execute();
    while($row=$result->fetch(PDO::FETCH_ASSOC)){

        ?>
        <meta charset="utf-8">
        <tr>
            <!--    echo "序号：".$row['id']."<br/>";-->
            <td><?=$row["id"]?></td>
            <td><?=$row["username"]?></td>
            <td><?=$row["password"]?></td>
            <td><?=$row["email"]?></td>
            <td><?=$row["mobile"]?></td>
            <td><?=$row["usergroupdesc"]?></td>
        </tr>
    <?php } ?>
</table>
<p>共有<?=$result->rowCount()?>条记录</p>