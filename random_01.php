<?php
$min = 1; // Minimum value
$max = 100; // Maximum value
$count = 5000; // Number of random numbers to generate

$count_max = 0;
$count_min = 0;
echo "Generating $count random numbers between $min and $max:\n";
for ($i = 0; $i < $count; $i++) {
    $randomNumber = mt_rand($min, $max);
    if ($randomNumber == $max)  $count_max++;
    if ($randomNumber == $min)  $count_min++;
    echo $randomNumber . "<br>";
}

echo "count_max: ".$count_max."<br>";
echo "count_min: ".$count_min."<br>";
