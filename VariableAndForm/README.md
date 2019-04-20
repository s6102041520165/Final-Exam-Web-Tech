# PHP (Variable and Form)
### ตัวแปรในภาษา php มีวิธีการประกาศเหมือนกับภาษาอื่น ทั่วไป แต่มีข้อแตกต่างไปเล็กน้อยคือ ตัวแปรต้องขึ้นต้นด้วย $ เสมอ ตัวอย่างเช่น 

### $name = "Weerachai"; 
### หมายถึงตัวแปร name เก็บข้อมูลที่เป็น String


## Form
### การสร้าง Form HTML ร่วมกับ PHP มีหลักการอยู่ว่า
* Form จะต้องระบุ method (มี Get และ Post) และ action (ไฟล์ที่จะรับข้อมูลจากการป้อนของผู้ใช้) และใน ฟอร์มจะต้องมีปุ่มที่กำหนดชนิดเป็น submit เพื่อส่งข้อมูลในฟอร์มไปให้ Server ทำงาน ตัวอย่างเช่น 
<pre>
    &lt;form method="post" action="mult.php"&gt;
        &lt;input type="text" name="txtX" /&gt;
        &lt;input type="text" name="txtY" /&gt;
        &lt;button type="submit"&gt;Calculator&lt;button&gt;
    &lt;/form&gt;
</pre>
<i>จากตัวอย่างโค๊ดจะรับข้อมูล txtX และ txtY ผ่านทางฟอร์ม เมื่อกดปุ่ม Calculator จะส่งข้อมูลไปที่ไฟล์ mult.php method เป็น post</i>

# ไฟล์ mult.php
## วิธีการใช้ GET และ POST
### GET ใช้ $_GET['คีย์ที่ส่งมา']
### GET ใช้ $_POST['คีย์ที่ส่งมา']
### # $_GET และ POST จะรับค่าจาก value ของแอทริบิวต์ name ใน form.html มา ซึ่งก็คือ txtX และ txtY 

## $_GET 
### ถ้าหากเราส่งค่าจากหน้า form.html เป็นแบบ get มา วิธีการส่งค่ามันจะส่งผ่าน URL ไปที่ไฟล์ Server สมมติว่าไฟล์ form.html เปลี่ยน method="get" จะส่งค่าผ่าน Url ดังนี้
<pre>
https://localhost/FinalWebTech/VariableAndForm/<b>mult.php?txtX=<i>3</i>&txtY=<i>2</i></b>
</pre>
- ไฟล์ฝั่ง Server (mult.php) นำค่าที่ส่งมาคำนวณ
ตัวอย่างโค๊ดเช่น
<pre>

&lt;?php 
$x = $_GET['txtX'];
$y = $_GET['txtY'];
$sum = $x * $y;
echo "Sum : $sum ";
?>
</pre>
## $_POST
### ค่าที่ถูกส่งจากฟอร์มมาเป็นแบบ Post จะซ่อนข้อมูลไว้ ดังนั้น $_POST จึงเหมาะกว่า
- ไฟล์ฝั่ง Server (mult.php) นำค่าที่ส่งมาคำนวณ
ตัวอย่างโค๊ดเช่น
<pre>

&lt;?php 
$x = $_POST['txtX'];
$y = $_POST['txtY'];
$sum = $x * $y;
echo "Sum : $sum ";
?>
</pre>