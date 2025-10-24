<?php
session_start();
if(isset($_SESSION["user_logged"]) && (!empty($_SESSION["user_logged"]))){
    $user_logged = $_SESSION["user_logged"];
    //print_r($_SESSION);
}
else{
    echo "مجاز نیستید";
    echo "<hr>";
    echo "<a href=\"login.php\">ورود</a>";
    exit;
}
//exit;


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<p>
    <label for="">مشخصات کاربر وارد شده:</label>
    <span>
        <?php
        echo
 $user_logged["firstname"]. " " .  $user_logged["lastname"] 
 . " نقش:" . $user_logged["role"]; 
        ?>
    </span>
    <img src="images/<?=  $user_logged["pic"]?>" alt="" width="100">
</p>
<p>
    <a href="logout.php">خروج</a>
</p>

    <a href="modir/modir.php">مدیر</a>
    <a href="student/student.php">دانش آموز</a>
    <a href="madreseh/madreseh.php">مدرسه</a>
    <a href="teacher/teacher.php">معلم</a>
</body>
</html>

