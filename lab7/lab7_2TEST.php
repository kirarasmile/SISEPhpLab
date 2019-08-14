<?php
header("content-type:text/html;charset=utf-8");
echo <<<ASS
<h2>1.以下属于Web开发语言的有哪几种？</h2>
<form method="post" action="">
   Ajax<input type="checkbox" value="Ajax" name="item[]"/>
   PHP<input type="checkbox" value="PHP" name="item[]"/>
   FLASH<input type="checkbox" value="FLASH" name="item[]"/>
   ASP<input type="checkbox" value="ASP" name="item[]"/>
   JSP<input type="checkbox" value="JSP" name="item[]"/><br>
   <input type="submit" value="确定" name="sure"/>
</form>
ASS;
if(isset($_POST["sure"])&&isset($_POST["item"])){
    $i=0; $string=NULL;
    foreach($_POST["item"] as $value){
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
    }
    else{
        echo "结果 : 对不起，你答错了！";
    }
}