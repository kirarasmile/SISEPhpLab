<html><body>
<form method="POST" action="lab06-post.php">
<?php
    for($i=1;$i<=10;$i++){
     ?>
        <input type="checkbox" name="object[]" value="<?=$i ?>">&nbsp &nbsp &nbsp <a href="LAB06-detail.php? id=<?=$i ?>">项目<?=$i ?></a> <br >
<?php
    }?>
<input type = "submit" value="提交">
</form>
</body></html>