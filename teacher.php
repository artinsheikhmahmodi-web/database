<?php

$cnn = new mysqli("localhost","root","","school_db");

$a = "SELECT * FROM `teacher`;";

$r = $cnn->query($a);

$record = $r->fetch_assoc();

print_r($record);
echo "<hr>";
$record = $r->fetch_assoc();

print_r($record);
echo "<hr>";
$record = $r->fetch_assoc();

print_r($record);
echo "<hr>";
echo $record["lastname"];

