<!DOCTYPE html>
<html>
<head>
    <meta name="content-type"; charset="UTF-8">
</head><body>
<div  align="center">
    <div >
        <form action="lab103.php" method="post"> <table border="0">
                <tr>
                    <td><input type="text" id="id_name" name="username" required="required" placeholder="用户名"></td>
                </tr> <tr>
                    <td><input type="password" id="password" name="password" placeholder="密码"
                               required="required"></td>
                </tr> <tr>
                    <td><input type="password" id="re_password"
                               name="re_password" required="required" placeholder="重复密码"></td> </tr> <tr>
                    <td><input type="email" id="email" name="email" required="required" placeholder="邮箱"></td> </tr> <tr>
                    <td><input type="text" id="mobile" name="mobile" required="required" placeholder="电话"></td> </tr> <tr>
                <tr> <td colspan="2" align="center" style="color:red;font-size:10px;"> <!--提示信息-->
                        <?php
                        $err=isset($_GET["err"])?$_GET["err"]:"";
                        switch($err) { case 1: echo "用户名已存在！"; break; case 2:
                            echo "密码与重复密码不一致！"; break; case 3: echo "注册成功！"; break; }
                        ?>
                    </td> </tr> <tr> <td colspan="2" align="center">
                        <input type="submit" id="register" name="register" value="注册">
                        <input type="reset" id="reset" name="reset" value="重置"> </td></tr>
                <tr> <td colspan="2" align="center">
                        如果已有账号，快去<a href="105.php">登录</ a>吧！ </td> </tr> </table> </form> </div>
    <?php
    header("Content-type:text/html;charset=utf8");
    require_once 'lab102.php';
    $result=$db->query('select * from user');
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