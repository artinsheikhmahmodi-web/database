<?php
print_r($_GET);
echo "<hr>";
echo " حذف مدرسه ";
$q = $_GET["xyz"];

$cnn = new mysqli("localhost", "root", "", "school_db");
$sql = "SELECT * FROM `madreseh` WHERE `code_madreseh` = $q";
$result = $cnn->query($sql);
if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
//`code_madreseh`, `name`, `code_modir`
    $code_madreseh = $row["code_madreseh"];
    $name = $row["name"];
    $code_modir = $row["code_modir"];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>حذف مدرسه </title>
</head>

<body>

    <form action="madreseh-delete-action.php" method="post">
        `code_madreseh`, `name`, `code_modir`
        <p>
            <label for="code_madreseh">کد مدرسه</label>
            <input type="text" name="code_madreseh" id="code_madreseh" value="<?= $code_madreseh ?>" readonly>
        </p>
        <p>
            <label for="name">نام</label>
            <input type="text" name="name" id="name" value="<?= $name ?>" readonly>
        </p>
        <p>
            <label for="code_modir">کد مدیر</label>
            <input type="text" name="code_modir" id="code_modir" value="<?= $code_modir ?>" readonly>
        </p>
        <input type="submit" value="حذف مدرسه ">
    </form>

</body>

</html>