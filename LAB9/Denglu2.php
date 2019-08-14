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
        echo "<h2><a href='register.php'>请注册</a></h2>";
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
?>