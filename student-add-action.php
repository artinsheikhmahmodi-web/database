<?php
print_r($_POST);
/*
 [code_meli] => 314587222 
 [firstname] => غلامرضا 
 [lastname] => حمیداوی 
 [father] => خلیل
 [grade] => 16.73 

*/ 
$code_meli = $_POST["code_meli"];
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$father = $_POST["father"];
$grade = $_POST["grade"];


$cnn = new mysqli("localhost", "root", "", "soal_8_ary_php_mysql_soalat_amali");

$sql = "INSERT INTO `students` (`code_meli`, `firstname`, `lastname`, `father`, `grade`) 
                        VALUES ('$code_meli', '$firstname', '$lastname', '$father', '$grade')";

$result =  $cnn->query($sql);

if($cnn->affected_rows > 0){
    echo "ثبت دانش آموز جدید با";
    echo "<span style=\"color: greenyellow;\">"."موفقیت"."</span>";
    echo "انجام شد";
}
else{
echo "ثبت دانش آموز جدید با";
    echo "<span style=\"color: red;\">"."شکست"."</span>";
    echo "مواجه شد";
}

?>
<p>
    <a href="students.php">لیست دانش آموزان</a>
</p>


