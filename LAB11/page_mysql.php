<?php
require_once 'Page.php';
$db = mysql_connect('localhost', 'root', '123456') or die("Could not connect to database.");//连接数据库
mysql_query("set names 'utf8'");//输出中文
mysql_select_db('lab11');    //选择数据库
$sql = "select * from sheet1"; //一个简单的查询
@$page = new Page('',$sql,$_GET['page'],5,"?page=");
$rows = $page->list;
?>

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
<body>
<p>本例题使用mysql_*的各个函数访问数据库并分页展示所有数据</p>
<p>因mysql_* 已过期，不推荐使用</p>

<table>
    <tr bgcolor="#e0e0e0">
        <th>ID</th> <th>用户名</th> <th>标题</th>
        <th>内容</th> <th>邮箱</th><th>时间</th></tr>
    <?php 	//循环输出记录到页面上
    foreach($rows as $row){    ?>
        <tr><td ><?= $row['ID']?></td> <td><?= $row['author']?></td>
            <td><?= $row['title']?></td> <td><?= $row['content']?></td>
            <td><?= $row['email']?></td>
            <td><?= $row['date']?></td></tr>
    <?php } ?>
</table>

<p> <?php echo $page->getPageList(); //输出分页列表
    ?>
</p>

</body>