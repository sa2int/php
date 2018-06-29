<?php

header('Content-Type: text/html; charset=UTF-8');

// DB接続用
$server = "mysql543.db.sakura.ne.jp";
$mydb = "game-mania_test";
$usr = "game-mania";
$pass = "hayato0210";
$query = "SELECT * FROM `name` LIMIT 0,2";
//$query = "SELECT MAX(id) FROM `name`";
$link = mysql_connect($server, $usr, $pass);
$db = mysql_select_db($mydb, $link);
mysql_query('SET NAMES utf8', $link);
$result = mysql_query($query);

$max = 0;

while($row = mysql_fetch_assoc($result)) {

    $id = $row["id"];
    $name = $row["name"];
    //$detail = $row["detail"];

    echo $id . " " . $name . "<br>";// . $detail;
    //echo $row["MAX(id)"];
    //$max =  $row["MAX(id)"];
}

/*
$query2 = "INSERT INTO `game-mania_test`.`name` (`id`, `name`) VALUES ('" .($max+1). "', 'test');";
$result2 = mysql_query($query);
if(!$result2){
    echo $result2;
}else{
    echo $result2."  insert success";
}
*/
mysql_free_result($result);
//mysql_free_result($result2);
mysql_close($link);

?>
