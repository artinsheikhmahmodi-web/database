<?php

//print_r($_POST);


$students = array(
    array('name' => 'امیرحسین قربانی', 'dros_nomreh' => array('html' => 20, 'css' => 19.5, 'js' => 13.25, 'php' => 15.5, 'mysql' => 17)),
    array('name' => 'آرمان رضایی', 'dros_nomreh' => array('html' => 18, 'css' => 13.75, 'js' => 5, 'php' => 18, 'mysql' => 19)),
    array('name' => 'میلاد کریمی', 'dros_nomreh' => array('html' => 9.75, 'css' => 20, 'js' => 14.5, 'php' => 17.25, 'mysql' => 16)),
    array('name' => 'ماهان حسینی', 'dros_nomreh' => array('html' => 17.5, 'css' => 16.75, 'js' => 13.5, 'php' => 18, 'mysql' => 19.5)),
    array('name' => 'کیان شریفی', 'dros_nomreh' => array('html' => 14.75, 'css' => 9, 'js' => 18.5, 'php' => 17.75, 'mysql' => 16.25)),
    array('name' => 'علی احمدی', 'dros_nomreh' => array('html' => 13.25, 'css' => 18, 'js' => 16.25, 'php' => 14, 'mysql' => 17.5)),
    array('name' => 'رهام جعفری', 'dros_nomreh' => array('html' => 7.5, 'css' => 13.25, 'js' => 16, 'php' => 17.25, 'mysql' => 13.75)),
    array('name' => 'آرش احمدی', 'dros_nomreh' => array('html' => 15.25, 'css' => 19, 'js' => 16.25, 'php' => 12.25, 'mysql' => 10.5)),
    array('name' => 'کسری نادری', 'dros_nomreh' => array('html' => 19.5, 'css' => 7.5, 'js' => 16.75, 'php' => 18, 'mysql' => 17.25)),
    array('name' => 'کیان محمدی', 'dros_nomreh' => array('html' => 16.25, 'css' => 19.75, 'js' => 13, 'php' => 16, 'mysql' => 14.25))
);

$courses = ['html', 'css', 'js', 'php', 'mysql']; // دروس

// 1) محاسبه رتبه‌ها برای هر درس (Dense Rank)
$perCourseRankings = [];
foreach ($courses as $course) {
    $rows = [];
    foreach ($students as $st) {
        $score = $st['dros_nomreh'][$course] ?? null;
        if ($score !== null) {
            $rows[] = ['name' => $st['name'], 'score' => (float)$score];
        }
    }
    usort($rows, function ($a, $b) {
        if ($b['score'] == $a['score']) {
            return strcmp($a['name'], $b['name']);
        }
        return $b['score'] <=> $a['score'];
    });

    $currentRank = 0;
    $lastScore = null;
    foreach ($rows as $row) {
        if ($lastScore === null || $row['score'] !== $lastScore) {
            $currentRank++;
            $lastScore = $row['score'];
        }
        $perCourseRankings[$course][$row['name']] = $currentRank;
    }
}

// 2) نمایش جدول هر درس با نام، نمره و رتبه (قبلاً آمده بود)
foreach ($courses as $course) {
    $entries = [];
    foreach ($students as $st) {
        $name = $st['name'];
        $score = $st['dros_nomreh'][$course] ?? null;
        if ($score !== null) {
            $rank = $perCourseRankings[$course][$name] ?? null;
            $entries[] = ['name' => $name, 'score' => $score, 'rank' => $rank];
        }
    }

    usort($entries, function ($a, $b) {
        if ($a['rank'] == $b['rank']) {
            return strcmp($a['name'], $b['name']);
        }
        return $a['rank'] <=> $b['rank'];
    });

    echo "<h3>" . htmlspecialchars(ucfirst($course)) . "</h3>";
    echo "<table border='1' cellpadding='6' cellspacing='0' style='border-collapse: collapse; width: 60%;'>";
    echo "<tr><th>رتبه</th><th>نام</th><th>نمره</th></tr>";
    foreach ($entries as $e) {
        echo "<tr><td>{$e['rank']}</td><td>" . htmlspecialchars($e['name'], ENT_QUOTES, 'UTF-8') . "</td><td>{$e['score']}</td></tr>";
    }
    echo "</table><br/>";
}

// 3) جدول جدید: رتبه در دروس مختلف برای هر دانش‌آموز
echo "<h3>رتبه در دروس مختلف برای هر دانش‌آموز</h3>";
echo "<table border='1' cellpadding='6' cellspacing='0' style='border-collapse: collapse; width: 60%;'>";
echo "<tr><th>نام</th>";
foreach ($courses as $course) {
    echo "<th>" . strtoupper($course) . "</th>";
}
echo "</tr>";

foreach ($students as $st) {
    $name = $st['name'];
    echo "<tr><td>" . htmlspecialchars($name, ENT_QUOTES, 'UTF-8') . "</td>";
    foreach ($courses as $course) {
        $rank = $perCourseRankings[$course][$name] ?? '';
        echo "<td>" . ($rank !== '' ? $rank : '') . "</td>";
    }
    echo "</tr>";
}
echo "</table>";

exit();

$students = array(
    array('name' => 'امیرحسین قربانی', 'dros_nomreh' => array('html' => 20, 'css' => 19.5, 'js' => 13.25, 'php' => 15.5, 'mysql' => 17)),
    array('name' => 'آرمان رضایی', 'dros_nomreh' => array('html' => 18, 'css' => 13.75, 'js' => 5, 'php' => 18, 'mysql' => 19)),
    array('name' => 'میلاد کریمی', 'dros_nomreh' => array('html' => 9.75, 'css' => 20, 'js' => 14.5, 'php' => 17.25, 'mysql' => 16)),
    array('name' => 'ماهان حسینی', 'dros_nomreh' => array('html' => 17.5, 'css' => 16.75, 'js' => 13.5, 'php' => 18, 'mysql' => 19.5)),
    array('name' => 'کیان شریفی', 'dros_nomreh' => array('html' => 14.75, 'css' => 9, 'js' => 18.5, 'php' => 17.75, 'mysql' => 16.25)),
    array('name' => 'علی احمدی', 'dros_nomreh' => array('html' => 13.25, 'css' => 18, 'js' => 16.25, 'php' => 14, 'mysql' => 17.5)),
    array('name' => 'رهام جعفری', 'dros_nomreh' => array('html' => 7.5, 'css' => 13.25, 'js' => 16, 'php' => 17.25, 'mysql' => 13.75)),
    array('name' => 'آرش احمدی', 'dros_nomreh' => array('html' => 15.25, 'css' => 19, 'js' => 16.25, 'php' => 12.25, 'mysql' => 10.5)),
    array('name' => 'کسری نادری', 'dros_nomreh' => array('html' => 19.5, 'css' => 7.5, 'js' => 16.75, 'php' => 18, 'mysql' => 17.25)),
    array('name' => 'کیان محمدی', 'dros_nomreh' => array('html' => 16.25, 'css' => 19.75, 'js' => 13, 'php' => 16, 'mysql' => 14.25))
);

$courses = ['html', 'css', 'js', 'php', 'mysql']; // فهرست دروس

foreach ($courses as $course) {
    // جمع‌آوری نام و نمره برای هر درس
    $rows = [];
    foreach ($students as $st) {
        $score = $st['dros_nomreh'][$course] ?? null;
        if ($score !== null) {
            $rows[] = ['name' => $st['name'], 'score' => (float)$score];
        }
    }

    // مرتب‌سازی نزولی بر اساس نمره و در صورت برابر بودن، بر اساس نام
    usort($rows, function ($a, $b) {
        if ($b['score'] == $a['score']) {
            return strcmp($a['name'], $b['name']);
        }
        return $b['score'] <=> $a['score'];
    });

    // اختصاص رتبه با Ranking ساده (Dense Rank)
    $ranked = [];
    $currentRank = 0;
    $lastScore = null;
    foreach ($rows as $row) {
        if ($lastScore === null || $row['score'] !== $lastScore) {
            $currentRank++;
            $lastScore = $row['score'];
        }
        $row['rank'] = $currentRank;
        $ranked[] = $row;
    }

    // نمایش جدول برای هر درس
    echo "<h3>" . htmlspecialchars(ucfirst($course)) . "</h3>";
    echo "<table border='1' cellpadding='6' cellspacing='0' style='border-collapse: collapse; width: 60%;'>";
    echo "<tr><th>رتبه</th><th>نام</th><th>نمره</th></tr>";
    foreach ($ranked as $r) {
        echo "<tr><td>{$r['rank']}</td><td>" . htmlspecialchars($r['name'], ENT_QUOTES, 'UTF-8') . "</td><td>{$r['score']}</td></tr>";
    }
    echo "</table><br/>";
}

exit();

$students = array(
    array('name' => 'امیرحسین قربانی', 'dros_nomreh' => array('html' => 20, 'css' => 19.5, 'js' => 13.25, 'php' => 15.5, 'mysql' => 17)),
    array('name' => 'آرمان رضایی', 'dros_nomreh' => array('html' => 18, 'css' => 13.75, 'js' => 5, 'php' => 18, 'mysql' => 19)),
    array('name' => 'میلاد کریمی', 'dros_nomreh' => array('html' => 9.75, 'css' => 20, 'js' => 14.5, 'php' => 17.25, 'mysql' => 16)),
    array('name' => 'ماهان حسینی', 'dros_nomreh' => array('html' => 17.5, 'css' => 16.75, 'js' => 13.5, 'php' => 18, 'mysql' => 19.5)),
    array('name' => 'کیان شریفی', 'dros_nomreh' => array('html' => 14.75, 'css' => 9, 'js' => 18.5, 'php' => 17.75, 'mysql' => 16.25)),
    array('name' => 'علی احمدی', 'dros_nomreh' => array('html' => 13.25, 'css' => 18, 'js' => 16.25, 'php' => 14, 'mysql' => 17.5)),
    array('name' => 'رهام جعفری', 'dros_nomreh' => array('html' => 7.5, 'css' => 13.25, 'js' => 16, 'php' => 17.25, 'mysql' => 13.75)),
    array('name' => 'آرش احمدی', 'dros_nomreh' => array('html' => 15.25, 'css' => 19, 'js' => 16.25, 'php' => 12.25, 'mysql' => 10.5)),
    array('name' => 'کسری نادری', 'dros_nomreh' => array('html' => 19.5, 'css' => 7.5, 'js' => 16.75, 'php' => 18, 'mysql' => 17.25)),
    array('name' => 'کیان محمدی', 'dros_nomreh' => array('html' => 16.25, 'css' => 19.75, 'js' => 13, 'php' => 16, 'mysql' => 14.25))
);

$courses = ['html', 'css', 'js', 'php', 'mysql']; // ترتیب درس‌ها

foreach ($courses as $course) {
    $rows = [];
    foreach ($students as $st) {
        $name = $st['name'];
        $score = isset($st['dros_nomreh'][$course]) ? $st['dros_nomreh'][$course] : null;
        if ($score !== null) {
            $rows[] = ['name' => $name, 'score' => (float)$score];
        }
    }

    // مرتب‌سازی نزولی بر اساس نمره
    usort($rows, function ($a, $b) {
        if ($b['score'] == $a['score']) {
            return strcmp($a['name'], $b['name']); // در صورت تساوی، بر اساس نام
        }
        return $b['score'] <=> $a['score'];
    });

    // نمایش در جدول HTML برای هر درس
    echo "<h3>" . htmlspecialchars(ucfirst($course)) . "</h3>";
    echo "<table border='1' cellpadding='6' cellspacing='0' style='border-collapse: collapse; width: 60%;'>";
    echo "<tr><th>نام</th><th>نمره</th></tr>";
    foreach ($rows as $r) {
        echo "<tr><td>" . htmlspecialchars($r['name'], ENT_QUOTES, 'UTF-8') . "</td><td>" . $r['score'] . "</td></tr>";
    }
    echo "</table><br/>";
}

exit();

//ارتباط با دیتابیس
$cnn = new mysqli("localhost", "root", "", "soal_10_ary_php_mysql_soalat_amali");

$r = $cnn->query("SELECT * FROM `students`;");

$names = [];
$html = [];
$css = [];
$js = [];
$php = [];
$mysql = [];

$record_students=[];

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

    $record_students[] =[
        "name" => $record["firstname"] . "&nbsp" . $record["lastname"],
        "dros_nomreh" => [
            "html" => $record["HTML"],
            "css" => $record["CSS"],
            "js" => $record["JS"],
            "php" => $record["PHP"],
            "mysql" => $record["MYSQL"],
        ]];
}


print_r($record_students);
exit;


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
    $records_html[] = [($students["html"][$n]) => ($students["names"][$n])];
}

echo "<hr>records_html:<br>";
print_r($records_html);

echo "<hr>";


$students = array(
    'names' => array(
        "امیرحسین قربانی",
        "آرمان رضایی",
        "میلاد کریمی",
        "ماهان حسینی",
        "کیان شریفی",
        "علی احمدی",
        "رهام جعفری",
        "آرش احمدی",
        "کسری نادری",
        "کیان محمدی"
    ),
    'html' => array(20, 18, 9.75, 17.5, 14.75, 13.25, 7.5, 15.25, 19.5, 16.25),
    'css' => array(19.5, 13.75, 20, 16.75, 9, 18, 13.25, 19, 7.5, 19.75),
    'js' => array(13.25, 5, 14.5, 13.5, 18.5, 16.25, 16, 16.25, 16.75, 13),
    'php' => array(15.5, 18, 17.25, 18, 17.75, 14, 17.25, 12.25, 18, 16),
    'mysql' => array(17, 19, 16, 19.5, 16.25, 17.5, 13.75, 10.5, 17.25, 14.25)
);

// برای هر درس، نام و نمره را ترکیب و (اختیاری) مرتب می‌کنیم
$courses = ['html', 'css', 'js', 'php', 'mysql'];

foreach ($courses as $course) {
    $scores = $students[$course];
    $pairs = [];

    echo "<hr>print_r(scores):<br>";
    print_r($scores);
    //exit();

    foreach ($scores as $id => $score) {
        echo "<hr>print_r(idx):<br>";
        print_r($id);
        $name = $students['names'][$id];
        $pairs[] = ['name' => $name, 'score' => $score];
    }

    exit();
    // مرتب‌سازی نزولی بر اساس نمره
    usort($pairs, function ($a, $b) {
        return $b['score'] <=> $a['score'];
    });

    // نمایش در جدول HTML
    echo "<h3>" . htmlspecialchars(ucfirst($course)) . "</h3>";
    echo "<table border='1' cellpadding='6' cellspacing='0' style='border-collapse: collapse; width: 60%;'>";
    echo "<tr><th>نام</th><th>نمره</th></tr>";
    foreach ($pairs as $p) {
        echo "<tr><td>" . htmlspecialchars($p['name']) . "</td><td>" . $p['score'] . "</td></tr>";
    }
    echo "</table><br/>";
}

exit();

// آرایه ورودی
$students = array(
    array(20 => "امیرحسین قربانی"),
    array(18 => "آرمان رضایی"),
    array(9.75 => "میلاد کریمی"),
    array(17.5 => "ماهان حسینی"),
    array(14.75 => "کیان شریفی"),
    array(13.25 => "علی احمدی"),
    array(7.5 => "رهام جعفری"),
    array(15.25 => "آرش احمدی"),
    array(19.5 => "کسری نادری"),
    array(16.25 => "کیان محمدی")
);

// تابع برای مرتب‌سازی بر اساس نمره
usort($students, function ($a, $b) {
    // استخراج نمره از آرایه
    $scoreA = key($a);
    $scoreB = key($b);

    // مقایسه نمرات
    return $scoreB <=> $scoreA; // برای مرتب‌سازی نزولی
});

// نمایش آرایه مرتب شده
foreach ($students as $student) {
    $score = key($student);
    $name = $student[$score];
    echo "نمره: $score - نام: $name<br>";
}


ksort($records_html);

echo "<hr>";
print_r($records_html);
exit();

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

if ($htmls[0] > $htmls[1] && $htmls[0] > $htmls[2] && $htmls[1] > $htmls[2]) {
    $index_1 = 0;
    $index_2 = 1;
    $index_3 = 2;
} else if ($htmls[0] > $htmls[1] && $htmls[0] > $htmls[2] && $htmls[2] > $htmls[1]) {
    $index_1 = 0;
    $index_2 = 2;
    $index_3 = 1;
} else if ($htmls[1] > $htmls[0] && $htmls[1] > $htmls[2] && $htmls[0] > $htmls[2]) {
    $index_1 = 1;
    $index_2 = 0;
    $index_3 = 2;
} else if ($htmls[1] > $htmls[0] && $htmls[1] > $htmls[2] && $htmls[2] > $htmls[0]) {
    $index_1 = 1;
    $index_2 = 2;
    $index_3 = 0;
} else if ($htmls[2] > $htmls[0] && $htmls[2] > $htmls[1] && $htmls[0] > $htmls[1]) {
    $index_1 = 2;
    $index_2 = 0;
    $index_3 = 1;
} else if ($htmls[2] > $htmls[0] && $htmls[2] > $htmls[1] && $htmls[1] > $htmls[0]) {
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
