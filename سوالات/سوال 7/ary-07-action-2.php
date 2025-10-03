<?php

/*
$m = $_POST["numbers"];
$a = explode(",", $m);
*/

$cnn = new mysqli("localhost","root","","soal_7_ary_php_mysql_soalat_amali");

$sql = "SELECT * FROM `numbers`;";

$r = $cnn->query($sql);
$a=[];
while ($record = $r->fetch_assoc()) {
$a[]=$record["numbers"];
}


$count = [];

for ($i = 0; $i < count($a); $i++) {
    $num = $a[$i];
    $found = false;

    for ($j = 0; $j < count($count); $j++) {
        if ($count[$j]['num'] == $num) {
            $count[$j]['times']++;
            $found = true;
            break;
        }
    }

    if (!$found) {
        $count[] = [
            'num' => $num,
            'times' => 1
        ];
    }
}

$max_num = null;
$max_times = 0;

for ($i = 0; $i < count($count); $i++) {
    if ($count[$i]['times'] > $max_times) {
        $max_times = $count[$i]['times'];
        $max_num = $count[$i]['num'];
    }
}

echo "عددی که بیشتر از همه تکرار شده: " . $max_num . "<br>";
echo "تعداد تکرار: " . $max_times;
?>