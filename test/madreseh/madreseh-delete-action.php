<?php
print_r($_POST);

$code_madreseh = $_POST["code_madreseh"];
$name = $_POST["name"];
$code_modir = $_POST["code_modir"];


$cnn = new mysqli("localhost", "root", "", "school_db");

$sql = "DELETE FROM madreseh WHERE `madreseh`.`code_madreseh` = $code_madreseh";

$result =  $cnn->query($sql);

if ($cnn->affected_rows > 0) {
    echo "حذف  مدرسه با";
    echo "<span style=\"color: greenyellow;\">" . "موفقیت" . "</span>";
    echo "انجام شد";
} else {
    echo "حذف  مدرسه با";
    echo "<span style=\"color: red;\">" . "شکست" . "</span>";
    echo "مواجه شد";
}

?>

<p>
    <a href="madreseh.php">لیست مدارس</a>
</p>