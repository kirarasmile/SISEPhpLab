<html>

<head>
    <meta charset="UTF-8">
    <script>
        function loadXMLDoc(){
            //实例化XMLHttpRequest类的对象
            var xmlhttp;
            if (window.XMLHttpRequest){
                //  IE7+, Firefox, Chrome, Opera, Safari 浏览器执行代码
                xmlhttp=new XMLHttpRequest();            }
            else{           // IE6, IE5 浏览器执行代码
                xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
            }//异步提交数据的事件响应
            xmlhttp.onreadystatechange=function(){
                if (xmlhttp.readyState==4 && xmlhttp.status==200)
                {//接收服务器返回的数据
                    document.getElementById("name").innerHTML=xmlhttp.responseText;
                }
            }
            //发送请求
            var s = document.getElementById('register').value;
            xmlhttp.open("GET","a.php"+"?name1="+s,true);
            xmlhttp.send();
        }
        function loadXMLDoc2(){
            //实例化XMLHttpRequest类的对象
            var xmlhttp;
            if (window.XMLHttpRequest){
                //  IE7+, Firefox, Chrome, Opera, Safari 浏览器执行代码
                xmlhttp=new XMLHttpRequest();            }
            else{           // IE6, IE5 浏览器执行代码
                xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
            }//异步提交数据的事件响应
            xmlhttp.onreadystatechange=function(){
                if (xmlhttp.readyState==4 && xmlhttp.status==200)
                {//接收服务器返回的数据
                    document.getElementById("name").innerHTML=xmlhttp.responseText;
                }
            }
            //发送请求
            var s = document.getElementById('register').value;
            xmlhttp.open("GET","LAB14_2.php"+"?name1="+s,true);
            xmlhttp.send();
        }


    </script>
</head>
<body ononline="loadXMLDoc2">

<?php

header("content-type:text/html;charset=utf-8");
require_once 'mysqliconn.php';
$result=mysqli_query($conn,"select user.*,usergroup.usergroupdesc from user  join usergroup on user.usergroupid=usergroup.id");
?>
    <center>
        <div style="border:3px dashed #20ffca; width:30%;" >
            <form action="" method="POST" >
                <p><input id='register' type="text" name="username" placeholder="用户名" onkeyup="loadXMLDoc()" /></p>
                <p ><font color="#FF0000">
                检测用户名：</font><div id="name" ></div>
                </p>
                <input type="password" name="password" placeholder="密码"/></p>
                <input type="password" name="surepassword" placeholder="确定密码"/></p>
                <input type="text" name="email" placeholder="邮箱"/></p>
                <input type="text" name="mobile" placeholder="电话"/></p>
                <input type="submit" name="submit"  value="注册"
             <?php
            require("LAB14_2.php");
                ?> />
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
        </tr>
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
</body>
</html>