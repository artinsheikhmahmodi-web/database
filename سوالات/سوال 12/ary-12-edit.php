<?php
print_r($_GET);
echo "<hr>";
echo " ویرایش نام و شهر ها ";
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
    <title>ویرایش نام و شهر ها</title>
</head>

<body>

    <form action="ary-12-edit-action.php" method="post">
        `code_meli`, `firstname`, `lastname`, `city`
        <p>
            <label for="code_meli">کد ملی</label>
            <input type="text" name="code_meli_new" id="code_meli" value="<?= $code_meli ?>">
        </p>
        <p>
            <label for="firstname">نام</label>
            <input type="text" name="firstname" id="firstname" value="<?= $firstname ?>">
        </p>
        <p>
            <label for="lastname">نام خانوادگی</label>
            <input type="text" name="lastname" id="lastname" value="<?= $lastname ?>">
        </p>
        <p>
            <label for="city">شهر</label>
            <input type="text" name="city" id="city" value="<?= $city ?>">
        </p>        
        
        <input type="hidden"  name="code_meli" value="<?= $code_meli ?>">
        <input type="submit" value="ثبت تغییرات">
    </form>

</body>

</html>