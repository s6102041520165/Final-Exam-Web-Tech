<?php 

// Connect MySQL Server
$conn = mysql_connect('localhost','weerachai','1234','dreamhome') or die ("Connect db failed.");

//วิธีใช้คำสั่ง Insert
$name = 'KMUTNB';//กำหนดชื่อสาขาเป็น KMUTNB
$postcode = '10800';//กำหนดรหัสไปรษณีย์เป็น postcode
$sql = "insert into branch(name,postcode)
        values ($name,$postcode); ";//สร้างตัวแปร sql ไว้เก็บคำสั่ง sql และ values กำหนดให้รับค่าจากตัวแปร $name และ $postcode
$query = mysqli_query($conn,$sql);//นำตัวแปร sql มา Query ถ้า Query สำเร็จจะรีเทิร์น True ถ้าไม่สำเร็จจะรีเทิร์น FALSE
if($query) echo "Inserted";//เช็คสถานะการ Query 
mysql_close($conn);
?>