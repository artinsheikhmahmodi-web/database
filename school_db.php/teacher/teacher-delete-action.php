<?php
print_r($_POST);

$code_meli = $_POST["code_meli"];
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];


$cnn = new mysqli("localhost", "root", "", "school_db");

$sql = "DELETE FROM teacher WHERE `teacher`.`code_meli` = $code_meli";

$result =  $cnn->query($sql);

if ($cnn->affected_rows > 0) {
    echo "حذف معلم با";
    echo "<span style=\"color: greenyellow;\">" . "موفقیت" . "</span>";
    echo "انجام شد";
} else {
    echo "حذف معلم با";
    echo "<span style=\"color: red;\">" . "شکست" . "</span>";
    echo "مواجه شد";
}

?>

<p>
    <a href="teacher.php">لیست معلمان</a>
</p>