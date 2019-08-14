<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<font color="blue">当前最流行的web开发语言：</font><br>
<form method="get" action="lab152.php" >
    <input type="radio" id="ra1" name="radio" value="php">PHP<br>
    <input type="radio" id="ra2" name="radio" value="asp">ASP<br>
    <input type="radio" id="ra3" name="radio" value="jsp">JSP<br>
    <input id="submit" type="submit" name="submit" value="请投票" onclick="check()"><br>
</form>
<script>
    function check() {
        var ra1=document.getElementById("ra1");
        var ra2=document.getElementById("ra2");
        var ra3=document.getElementById("ra3");
       if(ra1.checked==false&&ra2.checked==false&&ra3.checked==false){
            alert("radio button not select");
              return false;
          }
       return true;

    }

</script>
