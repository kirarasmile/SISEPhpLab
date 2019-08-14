<?php
session_start();
if (isset($_SESSION['user']))
    echo "欢迎您，".$_SESSION["user"]."<br/>
	<a href='TEST333.php?action=logout'>注销</a> ";
else
    echo "未登录用户不允许访问";

?>