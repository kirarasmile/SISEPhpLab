取出user中的所有数据<br>
<table border="1px">
    <tr>
        <th>id</th>
        <th>用户名</th><th>密码</th><th>email</th><th>电话</th><th>类型</th>
    </tr>

    <?php
    header("content-type:text/html;charset=utf-8");
    $dsn="mysql:host=localhost;dbname=db_mysise";
    $db=new PDO($dsn,'root','123456');    //连接数据库
    $db->query('set names utf-8');      //设置字符集

    $result=$db->query('select * from user');
    $result->setFetchMode(PDO::FETCH_ASSOC);
    while($row=$result->fetch()){
        ?>
        <tr>
            <td><?=$row['id'] ?></td>
            <td><?=$row['admin'] ?></td>
            <td><?=$row['password'] ?></td>
            <td><?=$row['email'] ?></td>
            <td><?=$row['mobile'] ?></td>
            <td><?=$row['usergroupid'] ?></td>
        </tr>
    <?php
    }
    ?>
</table>
<p>共有<?=$result->rowCount()?>条记录</p>