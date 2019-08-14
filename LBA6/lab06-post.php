<html><body>
<?php
$object=$_POST["object"];
$o2=count($object);

echo"<p>你提交了如下项目:</p>";
for($i=0 ;$i< $o2 ; $i++)

    echo "第".$object[$i]."个项目<br >";
?>

</body></html>