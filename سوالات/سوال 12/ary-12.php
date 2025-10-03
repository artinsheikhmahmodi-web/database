<?php

$cnn = new mysqli("localhost", "root", "", "soal_12_ary_php_mysql_soalat_amali");

$r = $cnn->query("SELECT * FROM `name_city`;");

$names = [];
$cities = [];


$n = 0;
while ($record = $r->fetch_assoc()) {

    // `code_meli`, `firstname`, `lastname`, `city`
    $firstnames[] = $record["firstname"];
    $lastnames[] = $record["lastname"];
    $names[] = $record["firstname"] . "&nbsp" . $record["lastname"];
    $cities[] = $record["city"];

    $n++;
    if ($n == 2) {
    }
}


echo "نمایش همه ی نفرات بهمراه شهر : 
<br>
";


for ($n = 0; $n < count($names); $n++) {
    $name = $names[$n];
    $city_name = $cities[$n];

    echo "name : " . $name;
    echo "  ===>  ";
    echo "city : " . $city_name . " ";
    echo "<br>";
}

echo "<hr>";

echo "شهری که بیشترین نفرات دارد : <br>";

$city_count_1 = [];

foreach ($cities as $c) {
    if (isset($city_count_1[$c])) {
        $city_count_1[$c]++;
    } else {
        $city_count_1[$c] = 1;
    }
}
$max_city_count = max($city_count_1);

$max_cities = array_keys($city_count_1, $max_city_count);

foreach ($max_cities as $max_city) {
    echo $max_city . " با تعداد " . $max_city_count . " نفر<br> ";
}


echo "<hr>";

echo "شهری که کمترین نفرات دارد : <br>";

$city_count_2 = [];

foreach ($cities as $c) {
    if (isset($city_count_2[$c])) {
        $city_count_2[$c]++;
    } else {
        $city_count_2[$c] = 1;
    }
}
$min_city_count = min($city_count_2);

$min_cities = array_keys($city_count_2, $min_city_count);

foreach ($min_cities as $min_city) {
    echo $min_city . " با تعداد " . $min_city_count . " نفر<br> ";
}

echo "<hr>";

echo "نامی که بیشترین تکرار دارد : <br>";

$firstname_count_1 = [];

foreach ($firstnames as $c) {
    if (isset($firstname_count_1[$c])) {
        $firstname_count_1[$c]++;
    } else {
        $firstname_count_1[$c] = 1;
    }
}
$max_firstname_count = max($firstname_count_1);

$max_firstnames = array_keys($firstname_count_1, $max_firstname_count);

foreach ($max_firstnames as $max_firstname) {
    echo $max_firstname . " با تعداد " . $max_firstname_count . " نفر<br> ";
}

echo "<hr>";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table,
        td,
        th {
            border: 1px solid;
        }
    </style>
</head>

<body>


    <?php

    $cnn = new mysqli("localhost", "root", "", "soal_12_ary_php_mysql_soalat_amali");

    $r = $cnn->query("SELECT * FROM `name_city`;");

    if (
        isset($_GET["search_1"]) && !empty($_GET["search_1"])  &&
        isset($_GET["search_field_1"]) && !empty($_GET["search_field_1"]) &&
        isset($_GET["search_type"]) && !empty($_GET["search_type"])
    ) {

        $search_1 =  $_GET["search_1"];
        $search_field_1 =  $_GET["search_field_1"];
        $search_type =  $_GET["search_type"];

echo "search_1:".$search_1."<br>";
echo "search_field_1:".$search_field_1."<br>";
echo "search_type:".$search_type."<br>";

//exit;

        if ($search_field_1 == "all" &&  $search_type  == "daghigh") {
            $sql = "SELECT * FROM `name_city` AS NS WHERE 
                NS.code_meli = '$search_1' OR 
                NS.firstname = '$search_1' OR 
                NS.lastname = '$search_1' OR 
                NS.city = '$search_1'; 
            ";
        } else if ($search_field_1 != "all" &&  $search_type  == "daghigh") {
            $sql = "SELECT * FROM `name_city` 
                WHERE 
                `$search_field_1` = '$search_1'
                 ";
            // SELECT * FROM `name_city` AS NS WHERE NS.code_meli = "تهران" OR NS.firstname = "تهران" OR NS.lastname = "تهران" OR NS.city = "تهران"; 
        } else if ($search_field_1 == "all" &&  $search_type  == "Nadaghigh") {
            $sql = "SELECT * FROM `name_city` AS NS WHERE 
                NS.code_meli  LIKE '%$search_1%' OR 
                NS.firstname LIKE '%$search_1%' OR 
                NS.lastname LIKE '%$search_1%' OR 
                NS.city LIKE '%$search_1%';
            ";
            
                //exit($sql);
        } else if ($search_field_1 != "all" &&  $search_type  == "Nadaghigh") {
            $sql = "SELECT * FROM `name_city` 
                WHERE 
                `$search_field_1` like '%$search_1%'
                ";                
        } else {  // جستجو بر اساس یک فیلد
            if ($search_field_1 == "all" &&  $search_type  == "daghigh") {
                $sql = "SELECT * FROM `name_city` AS NS WHERE 
                NS.code_meli = '$search_1' OR 
                NS.firstname = '$search_1' OR 
                NS.lastname = '$search_1' OR 
                NS.city = '$search_1';
            ";
            } else if ($search_field_1 != "all" &&  $search_type  == "daghigh") {
                $sql = "SELECT * FROM `name_city` WHERE `$search_field_1` = '$search_1'";
            } else if ($search_field_1 == "all" &&  $search_type  == "Nadaghigh") {
                $sql = "SELECT * FROM `name_city` AS NS WHERE 
                NS.code_meli = '%$search_1%' OR 
                NS.firstname = '%$search_1%' OR 
                NS.lastname = '%$search_1%' OR 
                NS.city = '%$search_1%';
            ";
            } else if ($search_field_1 != "all" &&  $search_type  == "Nadaghigh") {
                $sql = "SELECT * FROM `name_city` WHERE `$search_field_1` = '$search_1'";
            }
        }

        $result = $cnn->query($sql);
        if ($result->num_rows > 0) {
    ?>
            <p>
                <a href="name_city-add.php">نام و شهر جدید</a>
            </p>

            <table>
                <tr>
                    <th>code_meli</th>
                    <th>firstname</th>
                    <th>lastname</th>
                    <th>city</th>
                </tr>
                <?php
                while ($record = $result->fetch_assoc()) {

                ?>
                    <tr>
                        <td>
                            <?php
                            echo $record["code_meli"];
                            ?>
                        </td>
                        <td>
                            <?php
                            echo $record["firstname"];
                            ?>
                        </td>
                        <td>
                            <?php
                            echo $record["lastname"];
                            ?>
                        </td>
                        <td>
                            <?php
                            echo $record["city"];
                            ?>
                        </td>
                        <td>
                            <a href="name_city-edit.php?xyz=<?= $record["code_meli"] ?>">ویرایش</a>
                            <a href="name_city-delete.php?xyz=<?= $record["code_meli"] ?>">حذف</a>

                        </td>
                    </tr>
                <?php
                }
                ?>
            </table>

        <?php
        } else {
            echo "جستجو نتیجه ای نداشت!";
        }
    } else {

        $a = "SELECT * FROM `name_city`";

        $r = $cnn->query($a);
        ?>

        <p>
            <a href="ary-12-add.php">نام و شهر جدید</a>
        </p>

        <table>
            <tr>
                <th>code_meli</th>
                <th>firstname</th>
                <th>lastname</th>
                <th>city</th>
            </tr>
            <?php
            while ($record = $r->fetch_assoc()) {

            ?>
                <tr>
                    <td>
                        <?php
                        echo $record["code_meli"];
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $record["firstname"];
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $record["lastname"];
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $record["city"];
                        ?>
                    </td>
                    <td>
                        <a href="ary-12-edit.php?xyz=<?= $record["code_meli"] ?>">ویرایش</a>
                        <a href="ary-12-delete.php?xyz=<?= $record["code_meli"] ?>">حذف</a>

                    </td>
                </tr>
            <?php
            }
            ?>
        </table>

    <?php
    }
    ?>

    <form action="" method="get">
        <p>
            <label for="search_1">جستجو:</label>
            <input type="text" id="search_1" name="search_1" value="عل">

            <select name="search_field_1" id="search_field_1">
                <option value="all">همه فیلدها</option>
                <option value="code_meli">کد ملی</option>
                <option value="firstname">نام</option>
                <option value="lastname">نام خانوادگی</option>
                <option value="city">شهر</option>
            </select>
        </p>
        <p>
            <label for="search_type_daghigh">جستجوی دقیق</label>
            <input type="radio" value="daghigh" name="search_type" id="search_type_daghigh">
            <br>
            <label for="search_type_Nadaghigh">جستجوی بخشی از متن</label>
            <input type="radio" value="Nadaghigh" name="search_type" id="search_type_Nadaghigh">
        </p>
        <p><input type="submit" value="جستجو کن"></p>
    </form>

</body>

</html>