<?php
//$a = $_POST["numbers"];

$cnn = new mysqli("localhost","root","","soal_7_ary_php_mysql_soalat_amali");

$a = "SELECT * FROM `numbers`;";

$r = $cnn->query($a);
$count = [];
while ($record = $r->fetch_assoc()) {

for ($i = 0; $i < count($record); $i++) {
    /*
    print_r($record);
    exit;
    */
    $num = $record["numbers"];
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

echo "عدد با بیشترین تکرار: " . $max_num . "<br>";
echo "تعداد تکرار: " . $max_times;
}