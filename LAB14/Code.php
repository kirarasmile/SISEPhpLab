<?php
require_once 'DBcon.php';
if(isset($_POST{"register"})){
    $db = mysqli_connect('localhost', 'root','123456');
  //  mysqli_select_db($coon, "lab12");
   // mysqli_set_charset($coon, "utf8");
    //$db=new PDO("mysql:host=localhost;dbname=db_mysise","root","123456");
    $db->query("set names utf8");
    $username=$_POST{"name"};
    $psw1=$_POST{"password1"};
    $psw2=$_POST{"password2"};
    $email=$_POST{"email"};
    $mobile=$_POST{"mobile"};
    if($username==null){
        echo "用户名不允许为空";
    }else{
        if($psw1==null){
            echo "密码不允许为空";
        }
        else{
            if($psw1!=$psw2) {
                echo "前后密码不一致";
            }else {
                $sql="insert into user(username,password,email,mobile)
        values('$username','$psw1','$email','$mobile')";
                mysqli_query($con,$sql) or die("注册失败！");
                unset($_POST{"register"});
                echo "注册成功";
            }
        }
    }
}

?>