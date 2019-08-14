<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">

    <title>修改</title>
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
            width: 40%;
            border: 1px solid black;
        }

    </style>
    <script>

        function isRepeated() {
            if (document.getElementById("name").value.length == 0) {
                document.getElementById("sub").disabled = false;
                nameFlag=false;
                hint.innerHTML = "";
                return;
            }
            var xmlHttp;
            if (window.XMLHttpRequest) {
                xmlHttp = new XMLHttpRequest();
            }
            else {
                xmlHttp = new ActiveXObject("Microsoft XMLHTTP");
            }
            xmlHttp.onreadystatechange = function () {
                var hint = document.getElementById("hint");
                hint.innerHTML = xmlHttp.responseText;
                if (xmlHttp.responseText == "该商品在库中") {
                    nameFlag = true;
                } else {
                    nameFlag = false;
                }
                if (nameFlag ) {
                    document.getElementById("sub").disabled = false;
                } else {
                    document.getElementById("sub").disabled = true;
                }
            }
            var picname1 = document.getElementById("name");
            xmlHttp.open("get", "changgepage3.php?picname1=" + picname1.value, true);
            xmlHttp.send();
        }

    </script>
</head>
<body>
<?php
$dsn="mysql:host=localhost;dbname=finallab";
$db=new PDO($dsn,'root','123456');    //连接数据库
$db->query('set names utf8');      //设置字符集



$id = $_POST['id'];

$query="select * from shop WHERE id=$id";

$res=$db->prepare($query);
$result=$res->fetch(PDO::FETCH_ASSOC);


?>



<form action="changepage5.php" method="post">
    请再确认商品ID<input name="id" type="text" placeholder="id" id="id" >
    <label>输入商品名： </label><input name="picname" type="text" placeholder="商品名" onchange="isRepeated()"  id="name"><br\>
    <div id="hint" style="color:red"></div>
    <label>输入商品名： </label><input name="picname2" type="text" placeholder="商品名"   id="name2"><br\>
    <label>数量：</label><input type="text" name="num"  onkeyup="value=value.replace(/[^1234567890-]+/g,'')"  placeholder="仅可输入阿拉伯数字">
    <label>商品描述：</label><input type="text" name="jieshao">
    <input type="submit" value="修改"  name="save"  id="sub" disabled="true">
</form>

</body>
</html>