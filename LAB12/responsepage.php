<?php
//get the q parameter from URL
$q=$_GET["q"];
//全部小写化
$q=strtolower($q);
//非空验证
if(isset($q) && $q != '')
{
    $con = mysql_connect("localhost","root","123456");
    if(!$con)
    {
        die('Could not connect: ' .mysql_error());
    }
    mysql_select_db("lab12",$con);

    $sql = "select * from test";
    //$sql="SELECT FirstName FROM Persons where Firstname like '%$q%'";

    $result =mysql_query($sql,$con);
    while($row = mysql_fetch_array($result))
    {
        //匹配判断
        if(stristr(strtolower($row['name']),$q))
        {
            //echo "-----------------Persons-----------------";
            echo /* "firstname:" .*/ $row['name'] . "<br />";
            //echo "lastname:" . $row['LastName'] . "<br />";
            //echo "age:" . $row['Age'] . "<br />";
        }
        //echo $row['FirstName'] . "<br />";
    }
    mysql_close($con);
}
?>