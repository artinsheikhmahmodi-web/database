<?php
print_r($_POST);

$code_meli = $_POST["code_meli"];
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$father = $_POST["father"];
$jenseiat = $_POST["jenseiat"];
$tarikh_tavalod = $_POST["tarikh_tavalod"];
$moadel = $_POST["moadel"];
$tozihat = $_POST["tozihat"];
$code_modir = $_POST["code_modir"];


$cnn = new mysqli("localhost", "root", "", "school_db");

$sql = "INSERT INTO `student`(`code_meli`, `firstname`, `lastname`, `father`, `jenseiat`, `tarikh_tavalod`, `moadel`, `tozihat`, `code_modir`) 
                        VALUES ('$code_meli','$firstname','$lastname','$father','$jenseiat','$tarikh_tavalod','$moadel','$tozihat','$code_modir')";

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
    <a href="student.php">لیست دانش آموزان</a>
</p>


