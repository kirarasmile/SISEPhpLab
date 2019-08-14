<html>
<head>
    <title>登录成功</title>
    <meta name="content-type";
          charset="UTF-8">
</head>
<body>
<div>
    <?php
    session_start();
    $username= isset($_SESSION['user'])?$_SESSION['user']:"";
    if(!empty($username)){ ?>
        <h1>登录成功！</h1> 欢迎您！
        <?php echo $username; ?>
        <br/> <a href="107.php">注销</ a>
<?php }else {  ?>
        你无权访问！！！请<a href="105.php">登录</a>
    <?php } ?> </div>
</body>
</html>