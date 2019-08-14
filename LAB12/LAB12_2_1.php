<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <script>
        function printWord()
        {
            var xmlHttp;
            if(window.XMLHttpRequest)
            {
                xmlHttp=new XMLHttpRequest();
            }else
            {
                xmlHttp=new ActiveXObject("Microsoft.XMLHTTP")
            }
            xmlHttp.onreadystatechange=function(){
                var ch=document.getElementById("character");
                ch.innerHTML=xmlHttp.responseText;
            }
            xmlHttp.open("GET","LAB12_2_2.php",true);
            xmlHttp.send();
        }
        function dele(){
            var ch=document.getElementById("character");
            ch.innerHTML="";
        }
    </script>
</head>
<body>
<div style="position:relative;width: 384px;height: 216px">
    <img src="images.jfif" onmouseover="printWord()" onmouseout="dele()" width="400px" height="216px" id="aa">
    style="position:absolute; z-index:2; right:30px; bottom:100px;background-color: white" id="character"></span>
</div>
</body>
</html>


