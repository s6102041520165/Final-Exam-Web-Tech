# MySQL Extensions
## ติดต่อฐานข้อมูล
* การเชื่อมต่อ MySQL ใช้ฟังก์ชั่น <br/><b>mysql_connect(ชื่อโฮสต์,ยูเซอร์,รหัสผ่าน)</b><br/>
ถ้าเชื่อมต่อกับฐานข้อมูลสำเร็จ จะรีเทิร์น connection  และเราต้องสร้างตัวแปรเก็บ connection ไว้ 
* การ use ฐานข้อมูล ใช้ฟังก์ชั่น <br/><b>mysql_select_db(ฐานข้อมูล, ตัวแปรที่เก็บ connection)</b>
<pre>
&lt;?php
$conn = mysql_connect('localhost','weerachai','1234') or die ("Connect db failed.");

$db = mysql_select_db('tct_phone',$conn) or die("Can't select db.");
?>
</pre>
## การสร้าง Query
### mysql_query($query); คือคำสั่งในการ Query ข้อมูลเช่น Insert, Update , Delete ตัวอย่างเช่น
<pre>
$query = "select * from branch";
$result = mysql_query($query);
</pre>
### mysql_num_fields($result); คือการนับจำนวนคอลัมน์ตัวอย่างการใช้งานเช่น
<pre>
$num_field = mysql_num_fields($result);
</pre>
### mysql_field_name($result,$i) นำชื่อ field ไปแสดงผล
<pre>
&lt;?php
echo "&lt;tr>";
for($i=0; $i&lt;$num_field; $i++){
    echo "&lt;th>";
        echo mysql_field_name($result,$i);
    echo "&lt;/th>";
}
echo "&lt;/tr>";
?>
</pre>
### mysql_fetch_row($result) แสดงข้อมูลในตารางจากการ Query ข้างต้น โดยรีเทิร์นข้อมูลมาเป็นอาร์เรย์
<pre>
&lt;?php
while($rs_name = mysql_fetch_row($result)){
    echo "&lt;tr>";
    for($i=0; $i&lt;$num_field; $i++)
        echo "&lt;td>".$rs_name[$i]."&lt/td>";
    echo "&lt;/tr>";
}
?>
</pre>