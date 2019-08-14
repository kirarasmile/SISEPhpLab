<?php
header('Content-type:text/html; charset=utf-8');
session_start();
$_SESSION = array();
session_destroy();
setcookie('username', '', time()-99);
setcookie('code', '', time()-99);
echo "欢迎下次光临 ".'<br>';
echo "请<a href='105.php'>重新登录</a>".'<br>';
echo "请<a href='104.php'>注册</a>";