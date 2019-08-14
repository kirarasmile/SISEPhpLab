<?php
header("content-type:text/html;charset=utf-8");
$dsn="mysql:host=localhost;dbname=db_mysise";
$db=new PDO($dsn,'root','123456');    //连接数据库
$db->query('set names utf-8');      //设置字符集
?>
<?php
require('conn.php');

error_reporting(0);
if(isset($_POST['sub'])) {
    if(($_POST['pass1']||$_POST["name"]|| $_POST['pass2'])!=null){

        if ($_POST['pass1'] != $_POST['pass2']) {
            echo "<script>alert('两次密码不一致');</script>";

        }else {
            $n = $_POST['name'];
            $sql="select * from user where username=?";
            $result =$db->prepare($sql);
            $result->bindParam(1,$n);
            $result->execute();
            if($result->rowCount()>0){
                echo "<script>alert('用户名已存在，请重新输入！');
                </script>";
            }else{
                $i=$db->query("select id from user order by id desc limit 1");
                $i->setFetchMode(PDO::FETCH_ASSOC);
                $ide=$i->fetch();
                $id=$ide["id"]+1;
                $s="insert into user(id,username,password,email,mobile,usergroupid) values(?,?,?,?,?,?)";
                $r=$db->prepare($s);
                $name=$_POST["name"];$p=$_POST["pass2"];$e=$_POST["email"];$m=$_POST["tel"];$gid=2;

                $r->bindParam(1,$id);
                $r->bindParam(2,$name);
                $r->bindParam(3,$p);
                $r->bindParam(4,$e);
                $r->bindParam(5,$m);
                $r->bindParam(6,$gid);
                $r->execute();
                header("Location:t3.php");
            }
        }
    }else{
        echo "<script>
        alert('用户名和密码都不能为空');
        </script>";

    }

}else{
    echo '<form method="post" action="">
    <input name="name" type="text" placeholder="用户名" ><br>
    <input name="pass1" type="password" placeholder="密码"><br>
    <input name="pass2" type="password" placeholder="密码确认"><br>
    <input name="email" type="email" placeholder="邮件"><br>
    <input name="tel" type="tel" placeholder="电话"><br>
    <input name="sub" type="submit" value="注册">
</form>';
}
?>
<?php
require('conn.php');
session_start();
if(isset($_POST["submit"])){
    $usr=$_POST["n"];
    $pwd=$_POST["p"];
    if($usr==null||$pwd==null){
        echo "<script>
alert('用户名密码不能为空！');
</script>";

    }else{
        $q="select * from user where username=? ";
        $w=$db->prepare($q);
        $w->bindParam(1,$usr);

        $w->execute();
        if($w->rowCount()==1) {
            $w->setFetchMode(PDO::FETCH_ASSOC);
            $row=$w->fetch();
            if ( $pwd == $row['password']) {
                $_SESSION['user'] = $usr;
            }else{
                echo "<script>alert('密码错误！');
</script>";
            }

        } else {
            echo "用户名不存在，请选择：<br>";
        }
    }
}else
{
    echo '<form method="post" action="">

        <input name="n" type="text"><br>
        <input name="p" type="password"><br>
        <input name="submit" type="submit" value="登录">

</form>';
}
?>
?>