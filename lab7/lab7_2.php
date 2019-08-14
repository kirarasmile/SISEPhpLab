<html><body>
猜数字游戏:
<?php
$a="";
$b="";
if(!isset ($_POST['sub'])){
    $a=rand(1,10);
    $b=5;
}
?>
<?php
if(isset($_POST['sub']))
{
    $SZ=$_POST["SZ"];
    $a=$_POST["rand"];
    $b=$_POST["last"];
    $b--;
    $c=0;
    if($SZ>$a)
        echo "猜大了，你还有 $b 次机会";
    elseif($SZ<$a)
        echo "猜小了，你还有 $b 次机会";
    else{
        $c=5-$b;
        echo "你猜对了，用了$c 次机会";
        unset($_POST['sub']);
    }
}
?>
<form method="post" action=""><br/>输入整数（1-10）</br>
    <input type="text" name="SZ" size="6">
    <input name="rand" type="hidden" value="<?=$a?>">
    <input name="last" type="hidden" value="<?=@$b?>">
    <input type="submit" name="sub" value="确定">
</form>
</body></html>