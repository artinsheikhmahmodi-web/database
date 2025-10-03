<?php

//print_r($_POST);

//ارتباط با دیتابیس
$cnn = new mysqli("localhost", "root", "", "soal_10_ary_php_mysql_soalat_amali");

$r = $cnn->query("SELECT * FROM `students`;");

$names = [];
$html = [];
$css = [];
$js = [];
$php = [];
$mysql = [];

$n = 0;
while ($record = $r->fetch_assoc()) {

    // `code_meli`, `firstname`, `lastname`, `father`, `HTML`, `CSS`, `JS`, `PHP`, `MYSQL`

    $names[] = $record["firstname"] . "&nbsp" . $record["lastname"];
    $html[] = $record["HTML"];
    $css[] = $record["CSS"];
    $js[] = $record["JS"];
    $php[] = $record["PHP"];
    $mysql[] = $record["MYSQL"];


    $n++;
    if ($n == 2) {
        //break;
    }
}


//exit;


$grades = [
    "names" => $names,
    "html" => $html,
    "css" => $css,
    "js" => $js,
    "php" => $php,
    "mysql" => $mysql
];

echo "<hr>";
echo "<pre><h2>grades</h2>";
print_r($grades);
echo "</pre>";
echo "<hr>";

//exit;

/*
$names = explode(",", $grades["names"]);
$htmls = explode(",", $grades["html"]);
$csss = explode(",", $grades["css"]);
$jss = explode(",", $grades["js"]);
$phps = explode(",", $grades["php"]);
$mysqls = explode(",", $grades["mysql"]);
*/

$names = $names;
$htmls = $html;
$csss = $css;
$jss = $js;
$phps = $php;
$mysqls = $mysql;


$students = [
    "names" => $names,
    "html" => $htmls,
    "css" => $csss,
    "js" => $jss,
    "php" => $phps,
    "mysql" => $mysqls
];

echo "<hr>";
echo "<pre><h2>students</h2>";
print_r($students);
echo "</pre>";
echo "<hr>";

echo "
معدل هر دانشجو بهمراه نام :
<br>
نمایش نمرات دانشجویان از هر درس خاص :
<br>
";

for ($n = 0; $n < count($names); $n++) {
    $name = $names[$n];
    $html = floatval($htmls[$n]);
    $css = floatval($csss[$n]);
    $js = floatval($jss[$n]);
    $php = floatval($phps[$n]);
    $mysql = floatval($mysqls[$n]);

    $avg = (($html + $css + $js + $php + $mysql) / 5);

    echo "name:" . $name;
    echo "  ===>  ";
    echo "html:" . $html . " ";
    echo "  ---  ";
    echo "css:" . $css . " ";
    echo "  ---  ";
    echo "js:" . $js . " ";
    echo "  ---  ";
    echo "php:" . $php . " ";
    echo "  ---  ";
    echo "mysql:" . $mysql . " ";
    echo "  ---  ";
    echo "(معدل:" . $avg . ")";
    echo "<br>";
}

echo "<hr>";
/*
بالاترین و کمترین معدل بهمراه نام دانشجو 
*/
$avgs = [];
for ($n = 0; $n < count($names); $n++) {
    $html = floatval($htmls[$n]);
    $css = floatval($csss[$n]);
    $js = floatval($jss[$n]);
    $php = floatval($phps[$n]);
    $mysql = floatval($mysqls[$n]);
    $avg = (($html + $css + $js + $php + $mysql) / 5);
    $avgs[] = $avg;
}

$maxAvg = max($avgs);
$minAvg = min($avgs);

echo " بیشترین معدل: " . $maxAvg . "<br>";
echo " کمترین معدل: " . $minAvg;

echo "<hr>";
/*
بیشترین و کمترین نمره هر درس بهمراه نام دانشجو 
*/
$subjects = [
    "html" => $htmls,
    "css" => $csss,
    "js" => $jss,
    "php" => $phps,
    "mysql" => $mysqls
];

foreach ($subjects as $subject => $scores) {
    $max = max($scores);
    $min = min($scores);
    echo "$subject: بیشترین نمره :$max --- کمترین نمره :$min <br>";
}

echo "<hr>";
/*
دانشجویانی که در یک درس خاص قبول شده اند 
*/

echo "قبول‌شدگان PHP:<br>";
for ($n = 0; $n < count($names); $n++) {
    if (floatval($phps[$n]) >= 10) {
        echo $names[$n] . " (" . $phps[$n] . ")<br>";
    }
}

echo "<hr>";
/*
دانشجویانی که در همه ی دروس قبول شده اند 
*/

echo "قبول شده/شدگان در تمامی دروس : <br>";

for ($n = 0; $n < count($names); $n++) {
    $grades = [
        floatval($htmls[$n]),
        floatval($csss[$n]),
        floatval($jss[$n]),
        floatval($phps[$n]),
        floatval($mysqls[$n])
    ];
    $passedAll = true;
    foreach ($grades as $grade) {

        if ($grade < 10) {
            $passedAll = false;
            break;
        }
    }
    if ($passedAll) {
        echo "$names[$n] <br>";
    }
}

echo "<hr>";
/*
دروس مردود شده بهمراه نام و نمره 
*/

echo " دروس مردود شده به همراه نمره: <br>";

$fails = [];
for ($n = 0; $n < count($names); $n++) {
    if (floatval($htmls[$n]) < 10) {
        $fails[] = [
            "name" => $names[$n],
            "dars" => "html",
            "nomreh" => $htmls[$n],
        ];
    }
    if (floatval($csss[$n]) < 10) {
        //$fails[] =  $csss[$n];
        $fails[] = [
            "name" => $names[$n],
            "dars" => "css",
            "nomreh" => $csss[$n],
        ];
    }
    if (floatval($jss[$n]) < 10) {
        $fails[] = [
            "name" => $names[$n],
            "dars" => "js",
            "nomreh" => $jss[$n],
        ];
    }
    if (floatval($phps[$n]) < 10) {
        $fails[] = [
            "name" => $names[$n],
            "dars" => "php",
            "nomreh" => $phps[$n],
        ];
    }
    if (floatval($mysqls[$n]) < 10) {
        $fails[] = [
            "name" => $names[$n],
            "dars" => "mysql",
            "nomreh" => $mysqls[$n],
        ];
    }
}

print_r($fails);
echo "<br>";
echo "##################################################";
echo "<hr>";
?>
<table border="1">
    <tr>
        <td>name</td>
        <td>dars</td>
        <td>nomreh</td>
    </tr>

    <?php
    // echo "name:" . "\t\t\t" . "dars" . "\t\t\t" . "nomreh";
    // echo "<br>";
    foreach ($fails as $fail => $value) {
    ?>
        <tr>
            <td><?= $value["name"] ?></td>
            <td><?= $value["dars"] ?></td>
            <td><?= $value["nomreh"] ?></td>
        </tr>
    <?php
        /*
    echo $value["name"] . "\t\t\t" .     $value["dars"] . "\t\t\t" .     $value["nomreh"];
    echo "<br>";
    echo "---------------------------";
    echo "<br>";
    //    echo "name:" . $fail . " " . " dars:" . $value . "<br>";
    */
    }
    ?>
</table>
<?php


echo "<hr>#######################<br><h2>نفرات اول تا سوم هر درس</h2>";
//exit();

/*
نفرات اول تا سوم هر درس
*/

// مرتب کردن آرایه از بزرگ به کوچک
echo "همه ی دانش آموزان:" . "<br>";
//print_r($students);

$record = [
    "html" => [
        19 => "ali",
        12 => "reza",
        17 => "taha",
    ],
    "css" => [
        17 => "ali",
        18 => "reza",
        15 => "taha",
    ]
];
//sort( $record["html"])

/*
// مرتب‌سازی بر اساس هر درس
foreach ($record as $subject => $students) {
    // مرتب‌سازی نمرات به صورت صعودی
    arsort($students); // اگر بخواهید به صورت نزولی مرتب کنید از asort استفاده کنید
    echo "درس: $subject<br>";
    foreach ($students as $score => $name) {
        echo "نمره: $score - نام: $name<br>";
    }
    echo "<br>"; // خط جدید برای جداسازی خروجی
}
    */

// مرتب‌سازی بر اساس کلید
ksort($record["css"]);
?>
<table border="1">
    <tr>
        <td>نمره</td>
        <td>نام</td>
    </tr>
    <?php

    // نمایش خروجی
    foreach ($record["css"] as $score => $name) {
    ?>
        <tr>
            <td><?= $score ?></td>
            <td><?= $name ?></td>
        </tr>
    <?php
        //echo "نمره: $score - نام: $name\n";
    }
    ?>
</table>

<?php

//exit();
echo "<br>";
print_r($students["html"]);

// ایجاد ساختار عددی از آرایه های نمرات
$records_html = [];
$records_css = [];
$records_js = [];
$records_php = [];
$records_mysql = [];
/*
    "html" => [
        19 => "ali",
        12 => "reza",
        17 => "taha",
    ],
*/


echo "<hr>";
echo "<pre><h2>students</h2>";
print_r($students);
echo "</pre>";
echo "<hr>";

$htmls = [];
for ($n = 0; $n < count($students["names"]); $n++) {
    $records_html[] = [
        "name" => $students["names"][$n],
        "nomreh" => $students["html"][$n]
    ];
    $records_css[] = [
        "name" => $students["names"][$n],
        "nomreh" => $students["css"][$n]
    ];
    $records_js[] = [
        "name" => $students["names"][$n],
        "nomreh" => $students["js"][$n]
    ];
    $records_php[] = [
        "name" => $students["names"][$n],
        "nomreh" => $students["php"][$n]
    ];
    $records_mysql[] = [
        "name" => $students["names"][$n],
        "nomreh" => $students["mysql"][$n]
    ];
}


echo "<hr>قبل از مرتب سازی records_html:<br>";
print_r($records_html);
array_sort($records_html);
echo "<hr>بعد از مرتب سازی records_html:<br>";
print_r($records_html);


echo "###########################<hr>قبل از مرتب سازی records_css:<br>";
print_r($records_css);
array_sort($records_css);
echo "<hr>بعد از مرتب سازی records_css:<br>";
print_r($records_css);


function array_sort(&$ary_first)
{    
    usort($ary_first, function ($a, $b) {
        return $b["nomreh"] <=> $a["nomreh"];
    });    
}

//asort($records_html);




$htmls = [];
for ($n = 0; $n < count($students["html"]); $n++) {
    $htmls[] = $students["html"][$n];
}

$csss = [];
for ($n = 0; $n < count($students["css"]); $n++) {
    $csss[] = $students["css"][$n];
}
$jss = [];
for ($n = 0; $n < count($students["js"]); $n++) {
    $jss[] = $students["js"][$n];
}
$phps = [];
for ($n = 0; $n < count($students["php"]); $n++) {
    $phps[] = $students["php"][$n];
}
$mysqls = [];
for ($n = 0; $n < count($students["mysql"]); $n++) {
    $mysqls[] = $students["mysql"][$n];
}
echo "<br>HTMLS:";
print_r($htmls);
echo "<br>CSSS:";
print_r($csss);
echo "<br>JSS:";
print_r($jss);
echo "<br>PHPs:";
print_r($phps);
echo "<br>MySQLs:";
print_r($mysqls);

$index_1 = 0;
$index_2 = 0;
$index_3 = 0;

$max_1 = $htmls[$index_1];
$max_2 = $htmls[$index_2];
$max_3 = $htmls[$index_3];

if ($htmls[0] > $htmls[1]  && $htmls[0]  > $htmls[2] && $htmls[1] > $htmls[2]) {
    $index_1 = 0;
    $index_2 = 1;
    $index_3 = 2;
} else if ($htmls[0] > $htmls[1]  && $htmls[0]  > $htmls[2] && $htmls[2] > $htmls[1]) {
    $index_1 = 0;
    $index_2 = 2;
    $index_3 = 1;
} else if ($htmls[1] > $htmls[0]  && $htmls[1]  > $htmls[2] && $htmls[0] > $htmls[2]) {
    $index_1 = 1;
    $index_2 = 0;
    $index_3 = 2;
} else if ($htmls[1] > $htmls[0]  && $htmls[1]  > $htmls[2] && $htmls[2] > $htmls[0]) {
    $index_1 = 1;
    $index_2 = 2;
    $index_3 = 0;
} else if ($htmls[2] > $htmls[0]  && $htmls[2]  > $htmls[1] && $htmls[0] > $htmls[1]) {
    $index_1 = 2;
    $index_2 = 0;
    $index_3 = 1;
} else if ($htmls[2] > $htmls[0]  && $htmls[2]  > $htmls[1] && $htmls[1] > $htmls[0]) {
    $index_1 = 2;
    $index_2 = 1;
    $index_3 = 0;
}

for ($n = 3; $n < count($htmls); $n++) {
    if ($htmls[$n] > $max_1) {
        $max_3 = $max_2;
        $index_3 = $index_2;

        $max_2 = $max_1;
        $index_2 = $index_1;

        $max_1 = $htmls[$n];
        $index_1 = $n;
    } else if ($htmls[$n] > $max_2) {
        $max_3 = $max_2;
        $index_3 = $index_2;

        $max_2 = $htmls[$n];
        $index_2 = $n;
    } else if ($htmls[$n] > $max_3) {
        $max_3 = $htmls[$n];
        $index_3 = $n;
    }
}

echo "<br>HTMLS:";
print_r($htmls);
echo "<br>";

echo "HTML(1):" . $htmls[$index_1] . "  nemae:" . $names[$index_1] . "<br>";
echo "HTML(2):" . $htmls[$index_2] . "  nemae:" . $names[$index_2] . "<br>";
echo "HTML(3):" . $htmls[$index_3] . "  nemae:" . $names[$index_3] . "<br>";
