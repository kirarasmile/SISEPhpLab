<!DOCTYPE html>
<html><head>
    <meta name="content-type"; charset="UTF-8">
</head><body>
<div align="center">
    <form id="loginform" action="lab103.php" method="post">
        <table border="0"> <tr>
                <td>用户名：</td> <td> <input type="text" id="name" name="username"
                                          required="required" value="<?php echo isset($_COOKIE[""])?$_COOKIE[""]:"";?>"> </td>
            </tr>
            <tr>
                <td>密   码：</td> <td><input type="text" id="password" name="password"></td>
            </tr>
            <tr> <td colspan="2" align="center" style="color:red;font-size:10px;"> <!--提示信息--> <?php
                    $err=isset($_GET["err"])?$_GET["err"]:""; switch($err) { case 1: echo "用户名或密码错误！"; break;
                        case 2: echo "用户名或密码不能为空！"; break; } ?> </td> </tr>
            <tr> <td colspan="2" align="center">
                    <input type="submit" id="login" name="login" value="登录"> </tr>
            <tr> <td colspan="2" align="center"> <a href="104.php">注册</ a> </td> </tr>
        </table>
    </form>
</div>