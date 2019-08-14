<?php
header("Content-type:text/html;charset=utf8");
require_once 'lab102.php';
$result=$db->query('select * from user');
$db->exec("insert into user(id,username,password,email,mobile,usergroupid)
        values(9,'222','222','222@163.com','1277777777','普通用户')");
$db->exec("delete from user where ID in (3)");
?>
    <html>
    <body>
    <table border="1" width="50%">
        <tr>
            <th>ID</th><th>用户名</th><th>密码</th><th>邮件</th><th>电话</th><th>类型</th>
        </tr>
        <?php $result->setFetchMode(PDO::FETCH_ASSOC);

        while($row=$result->fetch()){ ?>
            <tr>
                <td ><?= $row['id']?></td>
                <td><?=$row['username']?></td>
                <td><?=$row['password']?></td>
                <td><?=$row['email']?></td>
                <td><?=$row['mobile']?></td>
                <td><?=$row['usergroupid']?></td>
            </tr>
        <?php }?>
    </table>
    <p>共有<?= $result->rowCount()?>条记录</p>
    </body>
    </html>
    connect.php:
<?php
$dsn="mysql:host=localhost;dbname=db_mysise";
$db=new PDO($dsn,'root','123456');
$db->query('set names utf8');