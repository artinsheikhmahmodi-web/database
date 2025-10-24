<?php
print_r($_POST);

$code_madreseh = $_POST["code_madreseh"];
$name = $_POST["name"];
$code_modir = $_POST["code_modir"];



$cnn = new mysqli("localhost", "root", "", "school_db");

if($code_modir != ""){    
    $sql = "UPDATE `madreseh` 
SET 
`code_madreseh` = '$code_madreseh',
 `name` = '$name',
  `code_modir` = '$code_modir',
WHERE `madreseh`.`code_madreseh` = $code_madreseh";
}
else{
    $sql = "UPDATE `madreseh` 
SET 
`code_madreseh` = '$code_madreseh',
 `name` = '$name'
WHERE `madreseh`.`code_madreseh` = $code_madreseh";
}
//exit($sql);
$result =  $cnn->query($sql);

if ($cnn->affected_rows > 0) {
    echo "ثبت تغییرات بر مدرسه با";
    echo "<span style=\"color: greenyellow;\">" . "موفقیت" . "</span>";
    echo "انجام شد";
} else {
    echo "ثبت تغییرات بر مدرسه با";
    echo "<span style=\"color: red;\">" . "شکست" . "</span>";
    echo "مواجه شد";
}

?>

<p>
    <a href="madreseh.php">لیست مدارس</a>
</p>