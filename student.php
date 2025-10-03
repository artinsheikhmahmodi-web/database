<?php

//ارتباط با دیتابیس
$cnn = new mysqli("localhost","root","","school_db");

$a = "SELECT * FROM `student`;";

$r = $cnn->query($a);

$record = $r->fetch_assoc(); // یک رکورد(سطر) از جدول میخواند

print_r($record);


$record = $r->fetch_assoc(); // یک رکورد(سطر) از جدول میخواند

print_r($record);

echo "<hr>";
echo $record["firstname"];

?>