<?php
// Connect MySQL Server
mysqli_connect('localhost','weerachai','1234','dreamhome') or die ("Connect db failed.");

// Query
$query = "select * from branch";
$result = mysqli_query($conn,$query);

//นับจำนวนฟิลด์ในตาราง
$num_field = mysqli_num_fields($result);
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
        while($field = mysqli_fetch_field($result)){
            echo "<th>";
                echo $field->name;
            echo "</th>";
        }
        echo "</tr>";
    ?>
    <?php
    //นำข้อมูลในตารางมาแสดงที่เว็บไซต์ โดยใช้ฟังก์ชั่น mysql_fetch_row($result) 
        while($rs_name = mysqli_fetch_array($result,MYSQLI_NUM)){
            echo "<tr>";
            for($i=0; $i<$num_field; $i++)
                echo "<td>".$rs_name[$i]."</td>";
            echo "</tr>";
        }
    ?>
    </table>
</body>
</html>