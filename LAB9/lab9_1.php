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

<?php
header("content-type:text/html;charset=utf-8");
session_start();
require_once 'Mysqliconn.php';
$result=mysqli_query($conn,"select user.*,usergroup.usergroupdesc from user  join usergroup on user.usergroupid=usergroup.id");
if(isset($_POST['sub'])){
    $_SESSION['username']=$_POST['username'];
    $a=1;//0和1 表示yes和no 1表示用户不存在
    while($row=mysqli_fetch_assoc($result)){
        if($_POST['username']==$row['username']){
            $password=$row['password'];
            $a=0;}
    }
    if($a==0){
        if($password===$_POST['password']){
            echo "<h1>欢迎您，".$_SESSION['username']."</h1>";
            $_SESSION['door']=1;
            echo "<h2><a href='Denglu.php'>注销</a></h2>";
        }else{
            echo "<h2>用户名或密码错误！</h2>";
        }
    }else{
        echo "<h2>用户名不存在，请选择：</h2>";
        echo "<h2><a href='register.php.php'>请注册</a></h2>";
        echo "<h2><a href='Denglu.php'>请登录</a></h2>";
    }
}
else{
    if(isset($_SESSION['door'])&&$_SESSION['door']==1){
        echo "<h1>欢迎您，".$_SESSION['username']."</h1>";
        echo "<h2><a href='Denglu.php'>注销</a></h2>";
    }
    else{
        echo "<h2>未登录用户不予许访问！</h2>";
    }
}
mysqli_free_result($result);
mysqli_close($conn);

<?php
$conn=mysqli_connect('127.0.0.1','root','hao5201314','db_mysise');
mysqli_query($conn,"set names 'utf8'");
//mysqli_select_db($conn,"usergroup");
?>

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
        <td><?=$row['id']?></td><
        td><?=$row['username']?></td>
        <td><?=$row['password']?></td>
        <td><?=$row['email']?></td>
        <td><?=$row['mobile']?></td>
        <td><?=$row['usergroupdesc']?></td>
    </tr>
    <?php } ?>
</table>
共有<?php echo $result->rowCount(); $db=NULL; ?>条记录


    <?php

    $dsn="mysql:host=127.0.0.1;dbname=db_mysise";
    $db=new PDO($dsn,'root','hao5201314');
    $db->query('set names utf8');


    <?php

header("content-type:text/html;charset=utf-8");
require_once 'mysqliconn.php';
$result=mysqli_query($conn,"select user.*,usergroup.usergroupdesc from user  join usergroup on user.usergroupid=usergroup.id");
?>
    <center>
        <div style="border:3px dashed #20ffca; width:30%;" >
            <form action="" method="post">
                <p><input type="text" name="username" placeholder="用户名"/></p>
                <input type="password" name="password" placeholder="密码"/></p>
                <input type="password" name="surepassword" placeholder="确定密码"/></p>
                <input type="text" name="email" placeholder="邮箱"/></p>
                <input type="text" name="mobile" placeholder="电话"/></p>
                <input type="submit" name="submit" value="注册"/>
            </form>
        </div>
    </center>
    <?php
    $a=1;//用户不存在
    if(isset($_POST["submit"])){
        if($_POST['password']==$_POST['surepassword']){//密码与再次确定的密码相等
            while($row=mysqli_fetch_assoc($result)){
                if($_POST['username']==$row['username']){
                    $a=0;
                }  }
            if($a==0){
                echo "<script>alert('用户名已存在，请重新输入！')</script>";
            }
            else{
                $username=$_POST["username"];$password=$_POST["password"];$email=$_POST["email"];$mobile=$_POST["mobile"];
                $sql="insert into user(username,password,email,mobile,usergroupid)
        values('$username','$password','$email','$mobile',2)";
                mysqli_query($conn,$sql) or die("注册失败！");
                header("location:Denglu.php");
            }
        }
        else{
            echo "<script>alert('两次密码不同，请重新注册！')</script>";
        }
    }
    ?>

    <meta charset="utf8">
    <center>以下部分仅供参考</center>
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
<?php
mysqli_free_result($result);
mysqli_close($conn);
?>