<?php
print_r($_POST);

$code_meli = $_POST["code_meli"];
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$city = $_POST["city"];

$cnn = new mysqli("localhost", "root", "", "soal_12_ary_php_mysql_soalat_amali");

$sql = "DELETE FROM name_city WHERE `name_city`.`code_meli` = $code_meli";

$result =  $cnn->query($sql);

if ($cnn->affected_rows > 0) {
    echo " حذف نام و شهر با";
    echo "<span style=\"color: greenyellow;\">" . "موفقیت" . "</span>";
    echo " انجام شد";
} else {
    echo " حذف نام و شهر با";
    echo "<span style=\"color: red;\">" . "شکست" . "</span>";
    echo " مواجه شد";
}

?>

<p>
    <a href="ary-12.php">لیست نام و شهرها</a>
</p>