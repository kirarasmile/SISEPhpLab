<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <script type="text/javascript">
        //显示悬浮层
        function showInform(){
            document.getElementById("inform").style.display='block';
        }
        function showInform2(){
            document.getElementById("inform2").style.display='block';
        }
        //隐藏悬浮层
        function hiddenInform(event){
            var informDiv = document.getElementById('inform');
            var x=event.clientX;
            var y=event.clientY;
            var divx1 = informDiv.offsetLeft;
            var divy1 = informDiv.offsetTop;
            var divx2 = informDiv.offsetLeft + informDiv.offsetWidth;
            var divy2 = informDiv.offsetTop + informDiv.offsetHeight;
            if( x < divx1 || x > divx2 || y < divy1 || y > divy2){
                document.getElementById('inform').style.display='none';
            }

        }
        function hiddenInform2(event2){
            var informDiv2 = document.getElementById('inform2');
            var x2=event2.clientX;
            var y2=event2.clientY;
            var divx12 = informDiv2.offsetLeft;
            var divy12 = informDiv2.offsetTop;
            var divx22 = informDiv2.offsetLeft + informDiv2.offsetWidth;
            var divy22 = informDiv2.offsetTop + informDiv2.offsetHeight;
            if( x2 < divx12 || x2 > divx22 || y2 < divy12 || y2 > divy22){
                document.getElementById('inform2').style.display='none';
            }

        }

    </script>
</head>
<body>
<td>
<a id="btn" onMouseOver="javascript:showInform();" onMouseOut="hiddenInform()">
    <img src='images.jfif' >
<div id="inform" onMouseOver="javascript:showInform();" onMouseOut="hiddenInform(event)">
        123
</div>
</a>
</td><br>
<td>
<a id="btn2" onMouseOver="javascript:showInform2();" onMouseOut="hiddenInform2()">
    <img src='74562050_p0.png' width="200" >
</a>
</td>

<div id="inform2" onMouseOver="javascript:showInform2();" onMouseOut="hiddenInform2(event2)">
    321
</div>

</body>
</html>