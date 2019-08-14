<?php
header("content-type:text/html;charset=utf-8");
require_once 'mysqliconn.php';
session_start();
session_unset();    //删除$_SESSION中的Session变量
session_destroy(); //销毁Session，删除Session ID
$result=mysqli_query($conn,"select user.*,usergroup.usergroupdesc from user  join usergroup on user.usergroupid=usergroup.id");
?>
    <meta charset="utf8">
    <center><div style="border:3px dashed #20ffca; width:20%;">
            <form method="post" action="Denglu2.php">
                <p>用户名：<input type="text" name="username"></p>
                密码：<input type="password" name="password"></p>
                <input type="submit" name="sub" value="登录">
            </form></div>

        <p> 以下部分仅供参考</p>
        <table border='1' width="95%">
            <tr bgcolor="#e0e0e0">
                <th>ID</th><th>用户名</th><th>密码</th><th>邮箱</th><th>电话</th><th>角色</th>
            <tr>
                <?php while($row=mysqli_fetch_assoc($result)){?>
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
    </center>
<?php
mysqli_free_result($result);
mysqli_close($conn);
?>