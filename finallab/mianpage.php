<html>
<head>
    <meta charset="utf-8">
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

    <script type="text/javascript">
        function del (id) {
            if (confirm("确定删除这件商品吗？")){
                window.location = "detele.php?id="+id;
            }
        }
    </script>

    <?php
    function news($pageNum = 1, $pageSize = 3)
    {
    $array = array();
    $dsn="mysql:host=localhost;dbname=finallab";
    $db=new PDO($dsn,'root','123456');    //连接数据库
    $db->query('set names utf8');      //设置字符集
    // limit为约束显示多少条信息，后面有两个参数，第一个为从第几个开始，第二个为长度
    $rs =$db->query( "select * from shop limit " . (($pageNum - 1) * $pageSize) . "," . $pageSize);
    $rs->setFetchMode(PDO::FETCH_ASSOC);
    while ($obj = $rs->fetch()) {
    $array[] = $obj;
    }
    $db=null;
    return $array;
    }

    function allNews()
    {
        $dsn="mysql:host=localhost;dbname=finallab";
        $db=new PDO($dsn,'root','123456');    //连接数据库
        $db->query('set names utf8');      //设置字符集
        $rs =$db->query( "select count(*)num  from shop"); //可以显示出总页数
        $rs->setFetchMode(PDO::FETCH_OBJ);
        $obj = $rs->fetch();
        $db=null;
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

<p>此处显示商城商品列表</p>
<a href="uploadpage.php">点我去添加商品</a>

<tr>

    <form action="changepage4.php" method="post">
        输入商品ID进行修改<input name="id" type="text" placeholder="id" id="id" >
        <input type="submit" value="修改">
    </form>

</tr>

<table>

    <tr bgcolor="#e0e0e0">
        <th>ID</th><th>商品图片</th> <th>商品名</th><th>数量</th> <th>商品介绍</th><th>操作1</th>
        </tr>
    <?php 	//循环输出记录到页面上
    foreach($array as $row){    ?>
        <tr>
            <td><?= $row['id']?></td>
            <td><img src="IMG\<?= $row['pic']?>" width="300px" height="216px" id="a"></td>
            <td><?= $row['picname']?></td><td><?= $row['num']?></td> <td><?= $row['jieshao']?></td>
            <td>
                <a href='javascript:del(<?=$row['id']?>)'>删除</a>
            </td></tr>
    <?php } ?>
</table>

<div>

    <a href="?pageNum=1">首页</a>
    <a href="?pageNum=<?php echo $pageNum==1?1:($pageNum-1)?>">上一页</a>
    <?php
    require_once 'Page.php';
    $page =new Page();
    echo $page->getPageList();

    ?>
    <a href="?pageNum=<?php echo $pageNum==$endPage?$endPage:($pageNum+1)?>">下一页</a>
    <a href="?pageNum=<?php echo $endPage?>">尾页</a>
</div>


</body>

</html>