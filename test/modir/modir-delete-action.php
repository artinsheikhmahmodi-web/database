<?php
print_r($_POST);

$code_meli = $_POST["code_meli"];
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];


$cnn = new mysqli("localhost", "root", "", "school_db");

$sql = "DELETE FROM modir WHERE `modir`.`code_meli` = $code_meli";

$result =  $cnn->query($sql);

if ($cnn->affected_rows > 0) {
    echo "حذف  مدیر با";
    echo "<span style=\"color: greenyellow;\">" . "موفقیت" . "</span>";
    echo "انجام شد";
} else {
    echo "حذف  مدیر با";
    echo "<span style=\"color: red;\">" . "شکست" . "</span>";
    echo "مواجه شد";
}

?>

<p>
    <a href="modir.php">لیست مدیران</a>
</p>