<?php
print_r($_GET);
echo "<hr>";
echo " ویرایش مدیر ";
$q = $_GET["xyz"];

$cnn = new mysqli("localhost", "root", "", "school_db");
$sql = "SELECT * FROM `modir` WHERE `code_meli` = $q";
$result = $cnn->query($sql);
if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    //`code_meli`, `firstname`, `lastname`
    $code_meli = $row["code_meli"];
    $firstname = $row["firstname"];
    $lastname = $row["lastname"];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ویرایش مدیر </title>
</head>

<body>

    <form action="modir-edit-action.php" method="post">
        `code_meli`, `firstname`, `lastname`
        <p>
            <label for="code_meli">کد ملی</label>
            <input type="text" name="code_meli" id="code_meli" value="<?= $code_meli ?>">
        </p>
        <p>
            <label for="firstname">نام</label>
            <input type="text" name="firstname" id="firstname" value="<?= $firstname ?>">
        </p>
        <p>
            <label for="lastname">کد مدیر</label>
            <input type="text" name="lastname" id="lastname" value="<?= $lastname ?>">
        </p>

        <input type="submit" value="ثبت تغییرات">
    </form>

</body>

</html>