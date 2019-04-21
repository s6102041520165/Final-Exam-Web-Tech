<?php
// Connect MySQL Server
$conn = mysql_connect('localhost','weerachai','1234') or die ("Connect db failed.");

//Used database
$db = mysql_select_db('dreamhome',$conn) or die("Can't select db.");

$id = 1;
$name = 'KMUTT';
$postcode = '10800';

$sql = "update branch
        set name = $name,
        postcode = $postcode
        where id = $id"; // เก็บคำสั่ง sql ไว้ที่ตัวแปร $sql
$query = mysql_query($sql);//นำตัวแปร $sql มา Query

if($query) echo "Updated";//เช็คสถานะการ Query
mysql_close($conn);
?>