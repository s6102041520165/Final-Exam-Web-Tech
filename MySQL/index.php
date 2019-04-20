<?php
// Connect MySQL Server
$conn = mysql_connect('localhost','weerachai','1234') or die ("Connect db failed.");

//Used database
$db = mysql_select_db('tct_phone',$conn) or die("Can't select db.");

// Query
$query = "select * from branch";
$result = mysql_query($query);

//นับจำนวนฟิลด์ในตาราง
$num_field = mysql_num_fields($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MySQL Extensions</title>
</head>
<body>
    <table>
    <?php
    //นำชื่อ field ไปแสดง
        echo "<tr>";
        for($i=0; $i<$num_field; $i++){
            echo "<th>";
                echo mysql_field_name($result,$i);
            echo "</th>";
        }
        echo "</tr>";
    ?>
    <?php
    //นำข้อมูลในตารางมาแสดงที่เว็บไซต์ โดยใช้ฟังก์ชั่น mysql_fetch_row($result) 
        while($rs_name = mysql_fetch_row($result)){
            echo "<tr>";
            for($i=0; $i<$num_field; $i++)
                echo "<td>".$rs_name[$i]."</td>";
            echo "</tr>";
        }
    ?>
    </table>
</body>
</html>