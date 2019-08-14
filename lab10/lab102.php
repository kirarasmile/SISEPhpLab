<?php
$dsn="mysql:host=localhost;dbname=db_mysise";
$db=new PDO($dsn,'root','123456');
$db->query('set names utf8');