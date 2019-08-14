<!DOCTYPE html>
<html>

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
            if (xmlHttp.responseText == "该商品未在库中") {
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
        xmlHttp.open("get", "upload3.php?picname1=" + picname1.value, true);
        xmlHttp.send();
    }

</script>
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

<head lang="en">
    <meta charset="UTF-8">
    <title>上传商品图片</title>
</head>
<body>
<h3 align="center">上传商品详情</h3>
<table>
    <form method="post" action="upload2.php"
          enctype="multipart/form-data" >
        请选择你的上传商品图片：<br/>
        <input name="myFile" type="file"><br/>
        <p>请输入商品的名字<input name="picname" type="text" placeholder="商品名" onchange="isRepeated()"  id="name"><br\>
        <div id="hint" style="color:red"></div><br\></p>
        <p>请输入商品的数量<input name="num" type="text" onkeyup="value=value.replace(/[^1234567890-]+/g,'')" placeholder="仅可输入阿拉伯数字" ></p>
        请输入商品的描述<input name="jieshao" type="text" style="width:545px;height:35px" /><br/>
        <input type="hidden" name="MAX_FILE_SIZE"
               value="5120"/>
        <input type="submit" value="上传" name="save"  id="sub" disabled="true"/>
    </form>

</table>
</body>
</html>