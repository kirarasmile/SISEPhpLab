<html><body>
<form method="post" action="">
计算器  <input name="shu1" size="1" value="<?php echo @$_POST['shu1']?>"/>
        <select name="fh">
            <option value="+" <?php echo @$_POST['fh']=="+"?"selected":""?> >+</option>
            <option value="-" <?php echo @$_POST['fh']=="-"?"selected":""?> >-</option>
            <option value="*" <?php echo @$_POST['fh']=="*"?"selected":""?> >*</option>
            <option value="/" <?php echo @$_POST['fh']=="/"?"selected":""?> >/</option>
        </select>
    <input name="shu2" size="1" value="<?php echo @$_POST['shu2']?>"/>
    <input type="submit" name="answer" value="=">
    <?php
    if(isset($_POST['answer'])){
        $a=0;
        if($_POST['fh']=='+'){
            echo $a=$_POST['shu1']+$_POST['shu2'];
        }
        elseif($_POST['fh']=='-'){
            echo $a=$_POST['shu1']-$_POST['shu2'];
        }
        elseif($_POST['fh']=='*'){
            echo $a=$_POST['shu1']*$_POST['shu2'];
        }
        elseif($_POST['fh']=='/'){
            echo $a=$_POST['shu1']/$_POST['shu2'];
        }
    }
    ?>
</form>
</body></html>