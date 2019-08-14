<?php
$username = isset($_POST['username'])?$_POST['username']:"";
$password = isset($_POST['password'])?$_POST['password']:"";
if(!empty($username)&&!empty($password)) {
    require_once "lab102.php";
    $ret = $db->query("SELECT username,password FROM user WHERE username = $username AND password = $password");
    $row = mysqli_fetch_array($ret);
    if($username==$row['username']&&$password==$row['password']) {
        session_start();
        $_SESSION['user']=$username;
        header("Location:106.php");
        mysqli_close($db); }else {
        header("Location:105.php?err=1"); }
}else {
    header("Location:105.php?err=2"); }?>