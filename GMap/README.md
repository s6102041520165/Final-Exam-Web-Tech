# Google Map
### import google maps api ไว้ใน head ของ html
<pre>
&lt;head>
    &lt;script src="http://maps.googleapis.com/maps/api/js">&lt;/script>
&lt;/head>
</pre>
### สร้าง function initialize() เพื่อกำหนด Property ของ Google Map
* center คือตำแหน่งที่จะให้โฟกัส ต้องสร้าง สร้าง object ขึ้นมาดังนี้
<br/>center : new google.maps.LatLng(ละติจูด,ลองจิจูด)
* zoom คือค่าที่ต้องการให้ zoom แผนที่ ตัวเลขยิ่งสูง ยิ่ง zoom เยอะ เช่น <br/>
zoom : 10
* mapTypeId คือชนิดที่เราต้องให้แสดงในเว็บไซต์ เช่น รูปแบบถนน ภูมศาสตร์ ฯลฯ <br/>
mapTypeId : google.maps.MapTypeId.ROADMAP
<pre>
&lt;script>
    function initialize(){
        var mapProp = {
            center : new google.maps.LatLng(13.819552,100.514812),
            zoom : 10,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
    }
&lt;/script>
</pre>
### สร้างส่วนที่ต้องการให้แสดง Google Map ว่าต้องการให้แสดงส่วนไหนภายใน body เช่น ต้องการให้แสดง ใน tag &lt;div id="gMapContent">&lt;/div>


<pre>
&lt;body>
    &lt;div id="gMapContent" style="width:600px;height:400px">
    &lt;/div>
&lt;/body>
</pre>

### สร้าง Object Google Map ในฟังก์ชั่น initialize()
<pre>
var content = document.getElementById('gMapContent');
var map = new google.maps.Map(content,mapProp);
</pre>
### จัดการ Event เช่นเมื่อคลิก หรือ โหลดหน้าเว็บให้แสดง Map
google.maps.event.addDomListener(window,'EventType',functionName)
<pre>
google.maps.event.addDomListener(window,'load',initialize);
</pre>

## การทำงาน
* google.maps.event.addDomListener(window,'load',initialize);<br/>
เมื่อ Browser โหลด จะเรียกใช้ฟังก์ชั่น initialize() 
* สร้าง mapProp ประกอบด้วย center,zoom,และ mapTypeId ที่เป็น JSON Object
* เพิ่มแผนที่ลงใน content ที่เป็น html
* โค๊ดต่อไปนี้เป็นเพียงการโหลด แผนที่ ไม่ได้สร้าง Marker

## การสร้าง Marker
หากต้องการสร้าง Marker ในแผนที่ของเราให้ สร้าง Property เพิ่มในฟังก์ชั่น initialize() ดังนี้
<pre>

var myMarker = new google.maps.Marker({
    position : mapProp.center
});

myMarker.setMap(map);
</pre>
* สร้าง Object โดยกำหนดตำแหน่งของ Marker จากออกเจ็ค center ของตัวแปร mapProp