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