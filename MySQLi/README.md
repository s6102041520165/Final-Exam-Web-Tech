# MySQLi Extensions
## ติดต่อฐานข้อมูล
* การเชื่อมต่อ MySQL ใช้ฟังก์ชั่น <br/><b>mysqli_connect(ชื่อโฮสต์,ยูเซอร์,รหัสผ่าน,ฐานข้อมูล)</b><br/>
ถ้าเชื่อมต่อกับฐานข้อมูลสำเร็จ จะรีเทิร์น connection  และเราต้องสร้างตัวแปรเก็บ connection ไว้ 
<pre>
&lt;?php
$conn = mysqli_connect('localhost','weerachai','1234','dreamhome') or die ("Connect db failed.");
?>
</pre>
## การสร้าง Query
### mysqli_query($conn,$query); คือคำสั่งในการ Query ข้อมูลเช่น Select, Insert, Update , Delete ประกอบด้วยอาร์คิวเมนต์สองตัวคือ
* connection (ตัวแปรที่เก็บ connection เอาไว้)
* query (ตัวแปรที่เก็บคำสั่ง sql ไว้)
<pre>
$query = "select * from branch";
$result = mysqli_query($conn,$query);
</pre>
### mysqli_num_fields($result); คือการนับจำนวนคอลัมน์ตัวอย่างการใช้งานเช่น
<pre>
$num_field = mysqli_num_fields($result);
</pre>
### mysqli_field_name($result,$i) นำชื่อ field ไปแสดงผล
<pre>
&lt;?php
echo "&lt;tr>";
for($i=0; $i&lt;$num_field; $i++){
    echo "&lt;th>";
        echo mysqli_field_name($result,$i);
    echo "&lt;/th>";
}
echo "&lt;/tr>";
?>
</pre>
### mysqli_fetch_array($result,MYSQLI_NUM) แสดงข้อมูลในตารางจากการ Query ข้างต้น โดยรีเทิร์นข้อมูลมาเป็นอาร์เรย์ ประกอบด้วยอาร์คิวเมนต์ 2 ตัว
* ตัวแปร Query ข้อมูล
* ชนิดการ Fetch 
    * MYSQLI_NUM จะรีเทิร์นค่ามาเป็นตำแหน่งของอาร์เรย์
    * MYSQLI_ASSOC จะรีเทิร์นค่ามาเป็น Assoc array
<pre>
&lt;?php
while($rs_name = mysqli_fetch_array($result,MYSQLI_NUM)){
    echo "&lt;tr>";
    for($i=0; $i&lt;$num_field; $i++)
        echo "&lt;td>".$rs_name[$i]."&lt/td>";
    echo "&lt;/tr>";
}
?>
</pre>
## การ Insert ข้อมูล
* การ Insert ข้อมูล จะใช้ฟังก์ชั่น mysqli_query($conn,$sql) เหมือนกับตัวอย่างการแสดงข้อมูล โดยต้องส่ง parameter เป็นคำสั่ง sql เช่น 
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
$query = mysqli_query($conn,$sql);
if($query) echo "Inserted";
?>
</pre>

## การ Update ข้อมูล
* การ Update ข้อมูล จะใช้ฟังก์ชั่น mysqli_query($sql) เหมือนกับตัวอย่างการแสดงข้อมูล โดยต้องส่ง parameter เป็นคำสั่ง sql เช่น 
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
$query = mysqli_query($conn,$sql);
if($query) echo "Updated";
?>
</pre>
#### * ตัวอย่างการ update จะอยู่ที่ไฟล์ update.php และการ insert อยู่ที่ไฟล์ insert.php