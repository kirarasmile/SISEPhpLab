<?php
session_start();
if(!empty($_GET["code"])  &&  !empty($_SESSION["code"])){
    $userCode=$_GET["code"];
    $realCode=$_SESSION["code"];
    if($userCode == $realCode){
        echo "true";
    }else{
        echo "false";
    }
}else{
    echo "false";
}