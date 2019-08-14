<?php
header("content-type:text/html;charset=utf-8");
/*版本五：
1.使用$_FILES超全局变量获取上传文件信息（前提是已经提交了表单）
2.过滤上传文件的错误号
3.判断文件大小
4.过滤上传文件的类型
5.为上传后的文件名定义(随机获取一个文件名)
6.保存上传的文件到指定目录*/
//1.使用$_FILES超全局变量获取上传文件信息（前提是已经提交了表单）
if( isset($_POST['save']) ) {
    $filename = $_FILES['myFile']['name'];
    $type     = $_FILES['myFile']['type'];
    $tmp_name = $_FILES['myFile']['tmp_name'];
    $size     = $_FILES['myFile']['size'];
    $error    = $_FILES['myFile']['error'];
    $picname = $_POST['picname'];
    $num = $_POST['num'];
    $jieshao = $_POST['jieshao'];

//2.过滤上传文件的错误号
    if ($error > 0) {
        switch ($error) {//获取错误信息
            case 1:
                $info =
                    "上传得文件超过了 php.ini中upload_max_filesize 选项中的最大值.";
                break;
            case 2:
                $info = "上传文件大小超过了html中MAX_FILE_SIZE 选项中的最大值.";
                break;
            case 3:
                $info = "文件只有部分被上传";
                break;
            case 4:
                $info = "没有文件被上传.";
                break;
            case 6:
                $info = "找不到临时文件夹.";
                break;
            case 7:
                $info = "文件写入失败！";
                break;
        }
        die("上传文件错误,原因:" . $info);
    }

//3.过滤上传文件的类型
    $typelist = array("image/jpeg",
        "image/jpg", "image/png");//定义允许的类型
    if (!in_array($type, $typelist)) {
        die("上传文件类型非法!" . $type);
        exit;
    }

//4.本次上传文件大小的过滤（自己选择）
    echo "上传文件的大小：".$size;
    if ($size > 5*1024*1024) {
        die("上传文件大小超出5M");
        exit;
    }

//5.保存上传的文件到指定目录
//  ../upload/ 上一级目录
//   ./upload/  和 "upload/" 当前目录

    $path = "IMG";//定义一个上传后的目录
    if (!(file_exists($path))) {
        if (!mkdir($path, 0777))    //在当前目录中创建path目录
            echo "创建文件夹失败";
    }
    //重命名文件
    $date=date('Ymdhis');//得到当前时间,如;2007070516314
    $filename=$date.".".pathinfo($filename)['extension'];//得到一个新的文件为'20070705163148.jpg',即新的路径
    $path .= "/" . $filename;
    if (is_uploaded_file($tmp_name)) {//判断是否是一个上传的文件
        if (move_uploaded_file($tmp_name,$path)) {//执行文件上传(移动上传文件)
            echo "文件上传成功!";
            //echo "<p>上传的图片文件：<img src= ".$path.\ $picname."/></p>";
            $dsn="mysql:host=localhost;dbname=finallab";
            $db=new PDO($dsn,'root','123456');    //连接数据库
            $db->query('set names utf8');      //设置字符集

           // $db->exec("insert into shop(picname,pic,num,jieshao)
       // values('".$picname."','".$filename."','".$num."','".$jieshao."')");
            $sql="insert into shop(picname,pic,num,jieshao)
       values('$picname','$filename','$num','$jieshao')";
            $res=$db->exec($sql);
            $db=null;
            echo $path;
            echo "<p><a href='mianpage.php'>返回商品显示页面</a></p>";

        } else {
            die("上传文件失败！");
        }
    } else {
        die("不是一个上传文件!");
    }

}
else
    echo "页面错误";
?>