<?php 
/***** เมื่อส่งค่าจากฟอร์มเป็นแบบ get *****
$x = $_GET['txtX'];
$y = $_GET['txtY'];
$sum = $x * $y;
echo "Sum : $sum ";
/****** ******/

$x = $_POST['txtX'];
$y = $_POST['txtY'];
$sum = $x * $y;
echo "Sum = $sum ";
?>