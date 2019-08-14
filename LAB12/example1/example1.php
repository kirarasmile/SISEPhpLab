<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" ">
    <script>
        function loadXMLDoc()
        {   //实例化XMLHttpRequest类的对象
            var xmlhttp;
            if (window.XMLHttpRequest){
            //  IE7+, Firefox, Chrome, Opera, Safari 浏览器执行代码
                xmlhttp=new XMLHttpRequest();            }
            else{          // IE6, IE5 浏览器执行代码
                xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
            }
            //异步提交数据的事件响应
            xmlhttp.onreadystatechange=function(){
                if (xmlhttp.readyState==4 && xmlhttp.status==200)
                {   //接收服务器返回的数据
                    document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
                }
            }
            //发送请求
            xmlhttp.open("GET","ajax_example1.txt",true);
            xmlhttp.send();
        }
    </script>
</head>
<body>
<div id="myDiv"><h3>使用 AJAX 修改该文本内容</h3></div>
<button type="button" onclick="loadXMLDoc()">修改内容</button>
</body>
</html>