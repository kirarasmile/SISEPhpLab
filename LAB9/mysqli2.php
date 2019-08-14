<?php
$coon2 = mysqli_connect('localhost', 'root','123456'); //连接数据库服务器
mysqli_set_charset($coon2, "utf8");	 		//设置字符集
mysqli_select_db($coon2,"db_mysise");	//选择数据库