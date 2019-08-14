<?php
$username = isset($_POST['username'])?$_POST['username']:"";
$password = isset($_POST['password'])?$_POST['password']:"";
$re_password = isset($_POST['re_password'])?$_POST['re_password']:"";
$email = isset($_POST['email'])?$_POST['email']:"";
$mobile = isset($_POST['mobile'])?$_POST['mobile']:"";
if($password == $re_password) {
    require_once"lab102.php";
    $ret =$db->query("SELECT username FROM user WHERE username = '".$username."'");
    $row = mysqli_fetch_array($ret);
    if($username == $row['username']) {
        header("Location:104.php?err=1"); }
    else {
        $db->exec("insert into user(username,password,email,mobile,usergroupid)
        values('".$username."','".$password."','".$email."','".$mobile."','".普通用户."')");
        header("Location:register.php?err=3");
    }
    mysqli_close($db);
}
else { header("Location:register.php?err=2"); }
?>