<?php
print_r($_GET);
echo "<hr>";
echo " ویرایش دانش آموز ";
$q=$_GET["xyz"];

$cnn = new mysqli("localhost", "root", "", "soal_8_ary_php_mysql_soalat_amali");
$sql = "SELECT * FROM `students` WHERE `code_meli` = $q";
$result = $cnn->query($sql);
if($result->num_rows == 1){
    $row = $result->fetch_assoc();
    // `code_meli`, `firstname`, `lastname`, `father`, `grade`
    $code_meli = $row["code_meli"];
    $firstname = $row["firstname"];
    $lastname = $row["lastname"];
    $father = $row["father"];
    $grade = $row["grade"];

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ویرایش دانش آموز </title>
</head>

<body>

    <form action="student-edit-action.php" method="post">
        `code_meli`, `firstname`, `lastname`, `father`, `grade`
<p>
    <label for="code_meli">کد ملی</label>
    <input type="text" name="code_meli"  id="code_meli" value="<?= $code_meli ?>">
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
    <label for="father">نام پدر</label>
    <input type="text" name="father" id="father"  value="<?= $father ?>">

</p>
<p>
    <label for="grade">نمره</label>
    <input type="text" name="grade" id="grade"  value="<?= $grade ?>">

</p>

        <input type="submit" value="ثبت تغییرات">
    </form>

</body>

</html>