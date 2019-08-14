<html>
<head>
    <title>来访登记</title>
    <meta charset="utf-8">

    <style>
        #daohanglan{
            width:1400px;
            height:40px;
            font-size:20px;
            background-color:#C93;
            border-bottom:2px solid #000;
        }

        #daohanglan ul li{
            text-align:center;
            width:230px;
            display:block;
            float:left;
        }
        #daohanglan ul a:link{
            text-decoration:none;
            color:#000;
        }
        #daohanglan ul a:visited{
            text-decoration:none;
            color:#000;
        }
        #daohanglan ul a:hover{
            text-decoration:underline;
            color:#09F;
        }
        #daohanglan ul a:active{
            text-decoration:none;
            color:#0FF;
            font-size:120%;
        }
        #kuangjia{
            margin:0 auto;
            width:1400px;
            border-top:2px solid #000;
            border-right:2px solid #000;
            border-bottom:2px solid #000;
            border-left:2px solid #000;
            border-color: transparent;
        }
    </style>
</head>

<body bgcolor="lightblue">
<div id="kuangjia">
    <div id="daohanglan">
        <ul>
            <a href="首页.html"><li>首页</li></a>
            <!--<a href="轻松考证.html">--><li>轻松考证</li></a>
            <!--<a href="考证资料.html">--><li>考证资料</li></a>
            <a href="软件优势.html"><li>软件优势</li></a>
            <a href="帮助.html"><li>帮助</li></a>
        </ul>
    </div>

    <form name="myForm" action="demo.php" onsubmit="return final()" method="post">
        <table width="689" height="212" border="1" align="center" bgcolor="#ADEEC3">
            <!-- 第1行 -->
            <tr><td colspan="4" align="center"><h2>登录</h2></td></tr>
            <!-- 第2行 -->
            <tr>
                <td align="center" bordercolor="lightpink">账户：</td>		<td><input type="text" name="username" required="required" placeholder="请输入昵称"></td>
                <td align="center">年龄</td>	<td><input type="text" name="age" required="required" placeholder="请输入年龄"></td>
            </tr>
            <!-- 第4行 -->
            <tr>
                <td align="center">性别：</td>
                <td><input type="radio" name="gender" value="female" checked>女
                    <input type="radio" name="gender" value="male">男</td>

                <td align="center">职业：</td>		<td><select name="job" size="1">
                        <option value="job1" selected="selected">学生</option>
                        <option value="job2" selected="selected">在职人士</option>
                        <option value="job3" selected="selected">自由工作者</option>

                    </select></td>
            </tr>
            <!-- 第5行 -->
            <tr>
                <td align="center">地区：</td>		<td><select name="place" size="1">
                        <option value="place1" selected="selected">华东</option>
                        <option value="place2" selected="selected">华南</option>
                        <option value="place3" selected="selected">华北</option>
                        <option value="place4" selected="selected">华西</option>
                    </select></td>
                <td align="center">是否接受电话或邮件回访</td>		<td>
                    <input type="radio" name="wangshang" checked> 接受
                    <input type="radio" name="youju"> 不接受
                </td>
            </tr>
            <!-- 第6行 -->
            <tr>
                <td align="center">你从什么地方了解该网站的：</td>		<td colspan="4">
                    <input type="checkbox" value="aihao" name="checkbox1"> 微信
                    <input type="checkbox" value="aihao" name="checkbox2"> 论坛
                    <input type="checkbox" value="aihao" name="checkbox3"> 网页广告
                    <input type="checkbox" value="aihao" name="checkbox4" checked> 其他
                </td>
            </tr>

            <!-- 第7行 -->
            <tr>
                <td align="center">联系电话:</td><td><input type="text" required="required" name="phone" placeholder="请输入电话"></td>
                <td align="center">邮箱：</td><td><input type="text" name="email" placeholder="请输入邮箱" required="required"></td>
            </tr>

            <!-- 第8行 -->
            <tr>
                <td align="center">对于我们的意见与看法：</td><td  colspan="4"><textarea name="message" rows="8" cols="30"></textarea></td>
            <tr>

                <!-- 第9行 -->
            <tr>
                <td align="center" colspan="4">
                    <input type="submit" name="提交" value="提交">
                    <input type="reset" name="重置" value="重置">
                </td>

            </tr>

        </table>

    </form>
</div>
</body>
</html>