<html>
<head><title>防止SQL注入</title></head>
<body>
<form method="post" action="">
    用户名：<input title="" name="name" type="text" /><br/>
    密&nbsp;&nbsp;码：<input title="" name="password" type="password" /><br/>
    <input title="" name="login1" type="submit" value="bug漏洞" />
    <input title="" name="login2" type="submit" value="防止SQL注入" />
</form>
</body>
</html>


<?php

$dsn="mysql:host=localhost;dbname=db_mysise";
$db=new PDO($dsn,'root','123456');   //连接数据库
if(isset($_POST['login1'])) {
    if ($_POST['login1']) {
        $name = $_POST['name'];
        $password = $_POST['password'];

        $sql = "select * from user where name='$name'";
        $result = $db->prepare($sql);//准备执行查询
        $result->execute();//执行查询的同时绑定参数
        $row=$result->fetch();//以关联数组的形式将结果集中

        if ($row) {
            echo "<script language=\'javascript\'>alert(\"登陆成功！\");
                  location.href=\"\";</script>";
            unset($_POST['login1']);
        } else {
            echo "<script language=\'javascript\'>alert(\"登陆失败！\");
                  location.href=\"\";</script>";
            unset($_POST['login1']);
        }
    }
}

if(isset($_POST['login2'])) {
    if ($_POST['login2']) {
        $name = $_POST['name'];
        $password = $_POST['password'];
        require('lab9_1.php');
        $sql = "select * from user where name=?";
        $result = $db->prepare($sql);//准备执行查询
        $result->bindParam(1,$password);
        $result->execute();//执行查询的同时绑定参数
        $row2 = $result->fetch(1);//以关联数组的形式将结果集中
        if ($row2) {
            echo "<script language=\'javascript\'>alert(\"登陆成功！\");
                  location.href=\"\";</script>";
            unset($_POST['login1']);
        } else {
            echo "<script language=\'javascript\'>alert(\"登陆失败！\");
                  location.href=\"\";</script>";
            unset($_POST['login1']);
        }
    }
}





?>