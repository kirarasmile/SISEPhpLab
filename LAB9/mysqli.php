<?php

require_once 'Objsqlconn.php';
header("content-type:text/html;charset=utf-8");
$result=$db->query("select user.*,usergroup.usergroupdesc from user  join usergroup on user.usergroupid=usergroup.id");
?>
<meta charset="utf8">
<table border="1" width="95%">
    <tr bgcolor="#e0e0e0">
        <th>ID</th><th>用户名</th><th>密码</th><th>邮箱</th><th>电话</th><th>角色</th>
    <tr>
        <?php while($row=$result->fetch(1)){ ?>
    <tr>
        <td><?=$row['id']?></td>
        <td><?=$row['username']?></td>
        <td><?=$row['password']?></td>
        <td><?=$row['email']?></td>
        <td><?=$row['mobile']?></td>
        <td><?=$row['usergroupdesc']?></td>
    </tr>
    <?php } ?>
</table>
共有<?php echo $result->rowCount(); $db=NULL; ?>条记录

