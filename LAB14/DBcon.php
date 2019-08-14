<?php
$con=@new mysqli("localhost","root","123456");
$con->select_db("db_mysise");
$con->set_charset("utf8");
