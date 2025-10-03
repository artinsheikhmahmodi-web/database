<?php
print_r($_GET);
echo "<hr>";
echo " حذف نام و شهر ";
$q = $_GET["xyz"];

$cnn = new mysqli("localhost", "root", "", "soal_12_ary_php_mysql_soalat_amali");
$sql = "SELECT * FROM `name_city` WHERE `code_meli` = $q";
$result = $cnn->query($sql);
if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
   //`code_meli`, `firstname`, `lastname`, `city`
    $code_meli = $row["code_meli"];
    $firstname = $row["firstname"];
    $lastname = $row["lastname"];
    $city = $row["city"];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>حذف نام و شهر </title>
</head>

<body>

    <form action="ary-12-delete-action.php" method="post">
        `code_meli`, `firstname`, `lastname`, `city`
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
            <label for="city">شهر</label>
            <input type="text" name="city" id="city" value="<?= $city ?>" readonly>
        </p>
        <input type="submit" value="حذف نام و شهر ">
    </form>

</body>

</html>