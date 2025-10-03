<?php
print_r($_GET);
echo "<hr>";
echo " حذف دانش آموز ";
$q = $_GET["xyz"];

$cnn = new mysqli("localhost", "root", "", "school_db");
$sql = "SELECT * FROM `student` WHERE `code_meli` = $q";
$result = $cnn->query($sql);
if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    //`code_meli`, `firstname`, `lastname`, `father`, `jenseiat`, `tarikh_tavalod`, `moadel`, `tozihat`, `code_modir`
    $code_meli = $row["code_meli"];
    $firstname = $row["firstname"];
    $lastname = $row["lastname"];
    $father = $row["father"];
    $jenseiat = $row["jenseiat"];
    $tarikh_tavalod = $row["tarikh_tavalod"];
    $moadel = $row["moadel"];
    $tozihat = $row["tozihat"];
    $code_modir = $row["code_modir"];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>حذف دانش آموز </title>
</head>

<body>

    <form action="student-delete-action.php" method="post">
        `code_meli`, `firstname`, `lastname`, `father`, `jenseiat`, `tarikh_tavalod`, `moadel`, `tozihat`, `code_modir`
        <p>
            <label for="code_meli">کد ملی</label>
            <input type="text" name="code_meli" id="code_meli" value="<?= $code_meli ?>" readonly>
        </p>
        <p>
            <label for="firstname">نام</label>
            <input type="text" name="firstname" id="firstname" value="<?= $firstname ?>" readonly>
        </p>
        <p>
            <label for="lastname">نام خانوادگی</label>
            <input type="text" name="lastname" id="lastname" value="<?= $lastname ?>" readonly>
        </p>
        <p>
            <label for="father">پدر</label>
            <input type="text" name="father" id="father" value="<?= $father ?>" readonly>
        </p>
        <p>
            <label for="jenseiat">جنسیت</label>
            <input type="text" name="jenseiat" id="jenseiat" value="<?= $jenseiat ?>" readonly>
        </p>
        <p>
            <label for="tarikh_tavalod">تاریخ تولد</label>
            <input type="text" name="tarikh_tavalod" id="tarikh_tavalod" value="<?= $tarikh_tavalod ?>" readonly>
        </p>
        <p>
            <label for="moadel">معدل</label>
            <input type="text" name="moadel" id="moadel" value="<?= $moadel ?>" readonly>
        </p>
        <p>
            <label for="tozihat">توضیحات</label>
            <input type="text" name="tozihat" id="tozihat" value="<?= $tozihat ?>" readonly>
        </p>
        <p>
            <label for="code_modir">کد مدیر</label>
            <input type="text" name="code_modir" id="code_modir" value="<?= $code_modir ?>" readonly>
        </p>
        <input type="submit" value="حذف دانش آموز ">
    </form>

</body>

</html>