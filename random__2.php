<?php

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

$names = [];
foreach ($students as $student) {
    $names[] = $student["name"];
}

?>
<style>
    td {
        border: 1px solid;
    }
</style>
<table>
    <tr>
        <td>ردیف</td>
        <td>نام</td>
    </tr>

    <?php
    for ($n = 0; $n < count($names); $n++) {
    ?>
        <tr>
            <td>
                <?= $n + 1  ?>
            </td>
            <td>
                <?= $names[$n] ?>
            </td>
        </tr>
    <?php
    }
    ?>

</table>

<h2>بصورت تصادفی</h2>

<table>
    <tr>
        <td>ردیف</td>
        <td>نام</td>
    </tr>

    <?php
    $min = 0; // Minimum value
    $max = count($names) - 1; // Maximum value
    $count = 5; // Number of random numbers to generate

    $numbers = range($min, $max);
    shuffle($numbers); // Shuffle the array
    $randomNumbers = array_slice($numbers, 0, $count); // Get the first $count numbers
    for ($n = 0; $n < count($randomNumbers); $n++) {
        $q = $randomNumbers[$n];

    ?>
        <tr>
            <td>
                <?= $n + 1  ?>
            </td>
            <td>
                <?= $names[$q] ?>
            </td>
        </tr>
    <?php
    }
    ?>

</table>