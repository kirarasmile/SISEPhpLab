<?php
error_reporting(E_ALL ^ E_DEPRECATED); //降低报错级别
session_start();
require_once'mysqli2.php';
@$s = $_GET['name1'];
$result2=mysqli_query($coon2,"select username from user WHERE username LIKE '$s%'");
$b=1;
$c=mysqli_fetch_assoc($result2);
if ($s == @$c['username']) {
    $b = 0;
}
//if($b==0){
//    echo "<font color='red'>用户名重复，不可以注册</font>";
//}else{
  //  echo "<font color='red'>用户名没有重复，可以注册</font>";
//}
//while ($a = mysqli_fetch_assoc($result)) {
  //  if (@$_POST['username'] == @$row['username']) {
   //     echo " 用户名重复2";
   // }else{}
//if ($b == 0) {
  //  echo " 用户名重复";
   // } else{
  //  echo "用户名可以使用";
  //      }
 //   };

