<p>
    <a href="modir-add.php">ساخت مدیر جدید در صورت نیاز</a>
</p>
<?php
print_r($_POST);

$code_madreseh = $_POST["code_madreseh"];
$name = $_POST["name"];
$code_modir = $_POST["code_modir"];


$cnn = new mysqli("localhost", "root", "", "school_db");

if (!empty($code_modir)) {
    $sql = "INSERT INTO `madreseh` (`code_madreseh`, `name`, `code_modir`)
                        VALUES ('$code_madreseh', '$name', '$code_modir')";
} else {
    $sql = "INSERT INTO `madreseh` (`code_madreseh`, `name`)
                        VALUES ('$code_madreseh', '$name')";
}

//exit($sql);

$result =  $cnn->query($sql);

if ($cnn->affected_rows > 0) {
    echo "ثبت دانش مدرسه با";
    echo "<span style=\"color: greenyellow;\">" . "موفقیت" . "</span>";
    echo "انجام شد";
} else {
    echo "ثبت دانش مدرسه با";
    echo "<span style=\"color: red;\">" . "شکست" . "</span>";
    echo "مواجه شد";
}

?>
<p>
    <a href="madreseh.php">لیست مدارس</a>
</p>