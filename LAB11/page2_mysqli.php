<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>分页</title>
    <style>
        a{
            margin-left: 5pt;
            margin-right: 5pt;
        }
        body{
            text-align: center;
        }
        table{
            margin: auto;
            width: 80%;
            border: 1px solid black;
        }

    </style>

    <?php
    require_once 'Page.php';

    //分页的函数
    function news($pageNum = 1, $pageSize = 3)
    {
        $array = array();
        $coon = mysqli_connect('localhost', 'root','123456');
        mysqli_select_db($coon, "lab11");
        mysqli_set_charset($coon, "utf8");
        // limit为约束显示多少条信息，后面有两个参数，第一个为从第几个开始，第二个为长度
        $rs = "select * from sheet1 limit " . (($pageNum - 1) * $pageSize) . "," . $pageSize;
        $r = mysqli_query($coon, $rs);
        while ($obj = mysqli_fetch_array($r)) {
            $array[] = $obj;
        }
        mysqli_close($coon);
        return $array;
    }

    //显示总页数的函数
    function allNews()
    {
        $coon = mysqli_connect('localhost', 'root','123456');
        mysqli_select_db($coon, "lab11");
        mysqli_set_charset($coon, "utf8");
        $rs = "select count(*)num  from sheet1"; //可以显示出总页数
        $r = mysqli_query($coon, $rs);
        $obj = mysqli_fetch_object($r);
        mysqli_close($coon);
        return $obj->num;
    }

    $allNum = allNews();
    $pageSize = 5; //约定每页显示几条信息
    $pageNum = empty($_GET["pageNum"])?1:$_GET["pageNum"];
    $endPage = ceil($allNum/$pageSize); //总页数
    $array = news($pageNum,$pageSize);
    ?>

</head>

<body>
<p>本例题使用mysqli_的各个函数访问数据库并分页展示所有数据</p>

<table>
    <tr bgcolor="#e0e0e0">
        <th>ID</th> <th>用户名</th> <th>标题</th>
        <th>内容</th> <th>邮箱</th><th>时间</th></tr>
    <?php 	//循环输出记录到页面上
    foreach($array as $row){    ?>
        <tr><td ><?= $row['id']?></td> <td><?= $row['author']?></td>
            <td><?= $row['title']?></td> <td><?= $row['content']?></td>
            <td><?= $row['email']?></td>
            <td><?= $row['date']?></td></tr>
    <?php } ?>
</table>

<div>

    <?php
    require_once 'Page.php';
    $page =new Page();
    echo $page->getPageList();


    ?>
</div>

</body>
</html>