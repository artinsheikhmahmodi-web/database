<?php
print_r($_POST);

$code_meli = $_POST["code_meli"];
$code_meli_new = $_POST["code_meli_new"];
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$city = $_POST["city"];

$cnn = new mysqli("localhost", "root", "", "soal_12_ary_php_mysql_soalat_amali");

$allow_update = TRUE;

if ($code_meli != $code_meli_new) {

    $sql_check_codemeli = "SELECT * FROM `name_city` WHERE `code_meli` = $code_meli_new ";

    $result_1 = $cnn->query($sql_check_codemeli);
    if ($result_1->num_rows > 0) {
        $allow_update = false;
    }
}

if ($allow_update == true) {
    $sql = "UPDATE `name_city` 
SET 
`code_meli`='$code_meli_new',
`firstname`='$firstname',
`lastname`='$lastname',
`city`='$city'
WHERE `name_city`.`code_meli` = $code_meli";

    //exit( $sql);


    $result =  $cnn->query($sql);

    if ($cnn->affected_rows > 0) {
        echo " ثبت تغییرات بر نام و شهر ها با";
        echo "<span style=\"color: greenyellow;\">" . "موفقیت" . "</span>";
        echo " انجام شد";
    } else {
        echo " ثبت تغییرات بر نام و شهر ها با";
        echo "<span style=\"color: red;\">" . "شکست" . "</span>";
        echo " مواجه شد";
    }

?>

    <p>
        <a href="ary-12.php">لیست نام و شهر ها</a>
    </p>
<?php
} else {
?>
    <p>
        کد ملی قبلا به شخص دیگری اختصاص داده شده بود.
        <a href="ary-12.php">بازگشت به صفحه </a>
    </p>
<?php
}
?>