<html><body>
1.一下属于Web开发语言的有哪几种？<br />
<form method="post" action="">
Ajax<input type="checkbox" name="yy[]" value="Ajax">
PHP<input type="checkbox" name="yy[]" value="PHP">
FLASH<input type="checkbox" name="yy[]" value="FLASH">
ASP<input type="checkbox" name="yy[]" value="ASP">
JSP<input type="checkbox" name="yy[]" value="JSP">
<input type="submit" name="sub" value="确定">
</form>
<?php
if(isset($_POST["sub"])&&isset($_POST["yy"])){
    $i=0; $string=NULL;
    foreach($_POST["yy"] as $value){
        if($value=="PHP")
            $i++;
        if($value=="ASP")
            $i++;
        if($value=="JSP")
            $i++;
        $string=$value." ".$string;
    }
    echo "你选择的答案有：".$string.",";
    if($i==3){
        echo "结果:恭喜你，答对了！";
    }elseif($i=2){
        echo"回答不全";
    }elseif($i=1) {
        echo "回答不全";
    }
    else{
        echo "结果 : 对不起，你答错了！";
    }
}
?>
</body></html>