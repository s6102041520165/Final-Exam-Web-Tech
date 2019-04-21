# MySQL Extensions
## ติดต่อฐานข้อมูล
* การเชื่อมต่อ MySQL ใช้ฟังก์ชั่น <br/><b>mysql_connect(ชื่อโฮสต์,ยูเซอร์,รหัสผ่าน)</b><br/>
ถ้าเชื่อมต่อกับฐานข้อมูลสำเร็จ จะรีเทิร์น connection  และเราต้องสร้างตัวแปรเก็บ connection ไว้ 
* การ use ฐานข้อมูล ใช้ฟังก์ชั่น <br/><b>mysql_select_db(ฐานข้อมูล, ตัวแปรที่เก็บ connection)</b>
<pre>
&lt;?php
$conn = mysql_connect('localhost','weerachai','1234') or die ("Connect db failed.");

$db = mysql_select_db('dreamhome',$conn) or die("Can't select db.");
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
## การ Insert ข้อมูล
* การ Insert ข้อมูล จะใช้ฟังก์ชั่น mysql_query($sql) เหมือนกับตัวอย่างการแสดงข้อมูล โดยต้องส่ง parameter เป็นคำสั่ง sql เช่น 
<pre>
insert into branch(name,postcode) 
values ('KMUTNB','10800');
</pre>
### ตัวอย่างการใช้งานจริง
<pre>
&lt;php
$name = 'KMUTNB';
$postcode = '10800';
$sql = "insert into branch(name,postcode)
        values ($name,$postcode); ";
$query = mysql_query($sql);
if($query) echo "Inserted";
?>
</pre>

## การ Update ข้อมูล
* การ Update ข้อมูล จะใช้ฟังก์ชั่น mysql_query($sql) เหมือนกับตัวอย่างการแสดงข้อมูล โดยต้องส่ง parameter เป็นคำสั่ง sql เช่น 
<pre>
update branch SET name = 'KMUTT' WHERE id = 1;
</pre>
### ตัวอย่างการใช้งานจริง
<pre>
&lt;php
$id = 1;
$name = 'KMUTT';
$postcode = '10800';
$sql = "update branch
        set name = $name,
        postcode = $postcode
        where id = $id";
$query = mysql_query($sql);
if($query) echo "Updated";
?>
</pre>
#### * ตัวอย่างการ update จะอยู่ที่ไฟล์ update.php และการ insert อยู่ที่ไฟล์ insert.php