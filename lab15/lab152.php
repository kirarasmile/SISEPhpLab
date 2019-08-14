<?php

session_start();
$filename="./toupiao.txt";
if(!file_exists($filename)){    //如果没有保存票数的文件，就创建这个文件，在里面添加信息，票数都为0
    $handle=fopen($filename, "w+");
    fwrite($handle, "php	0\r\n");
    fwrite($handle, "asp	0\r\n");
    fwrite($handle, "jsp	0\r\n");
    fclose($handle);
    echo "document create suceed";
}
if(isset($_GET['submit'])){
    $radio=$_GET['radio'];
    $handle=fopen($filename, "r");   //以读的方式打开文件
    $phps=fgets($handle);            //获取每一行的数据
    $asps=fgets($handle);
    $jsps=fgets($handle);
    $php=explode("\t", $phps);      //以tab键分割成数组，第一个元素是开发语言，第二个元素是票数
    $asp=explode("\t", $asps);
    $jsp=explode("\t", $jsps);
    fclose($handle);				//关闭文件

    $handle=fopen($filename, "w+");		  //以写的方式打开文件
    $phpnum=(int)$php[1];				//把票数转换成整型
    $aspnum=(int)$asp[1];
    $jspnum=(int)$jsp[1];
    if($radio==$php[0]){	       //判断是投给那个语言，然后该语言票数加1
        $phpnum++;
        fwrite($handle, "php	$phpnum\r\n");
        fwrite($handle, "asp	$asp[1]");
        fwrite($handle, "jsp	$jsp[1]");
    }else if($radio==$asp[0]){
        $aspnum++;
        fwrite($handle, "php	$php[1]");
        fwrite($handle, "asp	$aspnum\r\n");
        fwrite($handle, "jsp	$jsp[1]");
    }else if($radio==$jsp[0]){
        $jspnum++;
        fwrite($handle, "php	$php[1]");
        fwrite($handle, "asp	$asp[1]");
        fwrite($handle, "jsp	$jspnum\r\n");
    }
    echo "<h1>投票完毕</h1>";                      //显示信息
    echo "目前 php 的票数为：<font color='red'>$phpnum</font><br>";
    echo "目前 asp 的票数为：<font color='red'>$aspnum</font><br>";
    echo "目前 jsp 的票数为：<font color='red'>$jspnum</font><br>";
    $sum=$phpnum+$aspnum+$jspnum;                   //求总票数
    echo "总票数为：<font color='red' size='5'>$sum</font><br>";
    fclose($handle);                              //关闭文件
    echo "<a href='lab151.php'>点我返回投票页面</a>>";
}
?>


