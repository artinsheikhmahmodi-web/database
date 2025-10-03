<?php
print_r($_POST);
/*
 [code_meli] => 1695483251 
 [firstname] => امیریل 
 [lastname] => غفاری 
 [father] => عماد 
 [grade] => 17 

*/ 
$code_meli = $_POST["code_meli"];
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$father = $_POST["father"];
$grade = $_POST["grade"];


$cnn = new mysqli("localhost", "root", "", "soal_8_ary_php_mysql_soalat_amali");

$sql = "DELETE FROM students WHERE `students`.`code_meli` = $code_meli";

$result =  $cnn->query($sql);

if($cnn->affected_rows > 0){
    echo "حذف  دانش آموز با";
    echo "<span style=\"color: greenyellow;\">"."موفقیت"."</span>";
    echo "انجام شد";
}
else{
echo "حذف  دانش آموز با";
    echo "<span style=\"color: red;\">"."شکست"."</span>";
    echo "مواجه شد";
}

?>

<p>
    <a href="students.php">لیست دانش آموزان</a>
</p>

