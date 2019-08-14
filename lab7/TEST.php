<?php
session_start();
if (isset($_POST["submit"])){
    $user=$_POST["userName"];
    $pw=$_POST["PW"];
    if ($user=="admin123" && $pw=='123'){
        $_SESSION['user']=$user;
        header('Location:test22.php');}
    else
        echo "用户名或密码错误";	 }
else
    echo '
        <form method="post" action="">
            <table width="689" height="212" border="1" align="center" bgcolor="#ADEEC3">
            <tr><td colspan="4" align="center"><h2>登录</h2></td></tr>
            <tr>
    	    <td align="center" bordercolor="lightpink">用户名：</td>		<td align="center"><input type="text" name="userName" /></td>
	        </tr>
	        <tr>
    	    <td align="center" bordercolor="lightpink">密 码：</td>		<td align="center"><input type="password" name="PW" /></td>
	        </tr>
	        <tr>
    	    <td align="center" bordercolor="lightpink"><input name="submit" type="submit" value="登录" /></td>
	        </tr>
        </form>'   ;

?>