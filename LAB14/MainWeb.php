<script language="javascript">
    //    用两个标志表示验证码和名字是否合理
    var codeFlag;
    var nameFlag;
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
            if (xmlHttp.responseText == "该用户名可以使用") {
                nameFlag = true;
            } else {
                nameFlag = false;
            }
            if (nameFlag && codeFlag) {
                document.getElementById("sub").disabled = false;
            } else {
                document.getElementById("sub").disabled = true;
            }
        }
        var username = document.getElementById("name");
        xmlHttp.open("get", "Username.php?username=" + username.value, true);
        xmlHttp.send();
    }
    function codeVerify(){
        if (document.getElementById("code").value.length == 0) {
            document.getElementById("sub").disabled = false;
            codeFlag=false;
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
//            var hint = document.getElementById("code");
//            hint.innerHTML = xmlHttp.responseText;
            if (xmlHttp.responseText == "true") {
                codeFlag = true;
            } else {
                codeFlag = false;
            }
            if (nameFlag && codeFlag) {
                document.getElementById("sub").disabled = false;
            } else {
                document.getElementById("sub").disabled = true;
            }
        }
        var code = document.getElementById("code");
        xmlHttp.open("get", "Codeverfiy.php?code=" + code.value, true);
        xmlHttp.send();

    }

    function refresh(){
        document.getElementById("codeImg").src="getCode.php?t="+Math.random();
    }
</script>

<center>

    <div style="border:1px dashed #F00;margin-top:10px;padding-top: 10px;width: 300px">
        <div>欢迎注册成为本网站的VIP!</div>
        <form action="Code.php" method="post">
            <p><input type="text" name="name" placeholder="用户名" onchange="isRepeated()" id="name"></p>
            <div id="hint" style="color:red"></div>
            <p> <input type="password" placeholder="密码" name="password1"></p>
            <p><input type="password" placeholder="确认密码" name="password2"></p>
            <p><input type="email" name="email" placeholder="邮箱"></p>
            <p> <input type="text" name="mobile" placeholder="手机号"></p>
            <p><input placeholder="验证码" type="text" name="code" id="code" onchange="codeVerify()"/></p>
            <img src="getCode.php" id="codeImg" /><div onclick="refresh()" style="color: red">看不清，点击刷新</div>
            <p><input id="sub" type="submit" value="注册" name="register" disabled="true"></p>
        </form>
    </div></center>