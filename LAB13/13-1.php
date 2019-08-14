<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <script>
        function loadXMLDoc(){
            //实例化XMLHttpRequest类的对象
            var xmlhttp;
            if (window.XMLHttpRequest){
                //  IE7+, Firefox, Chrome, Opera, Safari 浏览器执行代码
                xmlhttp=new XMLHttpRequest();            }
            else{           // IE6, IE5 浏览器执行代码
                xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
            }//异步提交数据的事件响应
            xmlhttp.onreadystatechange=function(){
                if (xmlhttp.readyState==4 && xmlhttp.status==200)
                {//接收服务器返回的数据
                    document.getElementById("name").innerHTML=xmlhttp.responseText;
                }
            }
            //发送请求
            var s = document.getElementById('in').value;
            xmlhttp.open("GET","13_2.php"+"?name1="+s,true);
            xmlhttp.send();
        }
    </script>
</head>
<body>
<h3>请在下面的输入框键入字母</h3><br>
姓氏：<input id='in' type="text"onkeyup="loadXMLDoc()"><br>
<div id="name"></div>
</body>
</html>