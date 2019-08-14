
<html >
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
    <title>主搜索引擎下拉框自动显示数据</title>
</head>
<script src="js/dropbox.js" type="text/javascript"></script>
<body>
<form action="" method="post" enctype="multipart/form-data">
    <input name="txt" id="txt" type="text" onkeyup ="showHint(this.value)" />
    <input type="submit"  name="submit" value="Upload" /><br />
    <span id="txtHint" ></span>
</form>
</body>
</html>