<?php

if(@$_GET['action'] == "logout"){
    session_start();
    setcookie("user","",time()-60);

    session_unset();
    session_destroy();
    header("Location:TEST.php");
}
?>
