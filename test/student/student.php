<?php
session_start();
include "../db.php";
$cnn = (new db)->connection_database;

// بررسی لاگین بودن کاربر
if (!isset($_SESSION['user_logged'])) {
    echo "شما وارد نشده‌اید.";
    exit;
}

$user_logged = $_SESSION['user_logged'];
$role = $user_logged['role'];

// اگر نقش معلم است، از code_meli او استفاده کنیم
if ($role === 'teacher') {
    $teacher_code = $user_logged['code_meli'];

    // نمایش کد معلم برای اطمینان
    echo "کد معلم شما: " . htmlspecialchars($teacher_code) . "<br>";

    // فقط دانش‌آموزهای مربوط به این معلم
    $a = "
        SELECT s.code_meli, s.firstname, s.lastname
        FROM student s
        INNER JOIN student_teacher st ON s.code_meli = st.student_code
        WHERE st.teacher_code = '$teacher_code'
    ";
} else {
    // ادمین یا نقش‌های دیگر: همه دانش‌آموزها را ببیند
    $a = "SELECT code_meli, firstname, lastname FROM student";
}

$result = $cnn->query($a);

// چک اگر خطایی در کوئری هست
if (!$result) {
    die("خطا در اجرای کوئری: " . htmlspecialchars($cnn->error));
}
?>

<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>لیست دانش‌آموزان</title>
    <style>
        body { font-family: Vazirmatn, sans-serif; direction: rtl; text-align: center; }
        table { margin: 20px auto; border-collapse: collapse; width: 80%; }
        th, td { border: 1px solid #888; padding: 8px; }
        th { background-color: #ddd; }
        input[type="text"] { width: 60px; text-align: center; }
        input[type="submit"] { padding: 5px 10px; }
    </style>
</head>
<body>

<h2>لیست دانش‌آموزان</h2>

<table>
    <tr>
        <th>کد ملی</th>
        <th>نام</th>
        <th>نام خانوادگی</th>
        <th>معدل</th>
        <th>ثبت</th>
    </tr>

<?php
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "
        <tr>
            <td>{$row['code_meli']}</td>
            <td>{$row['firstname']}</td>
            <td>{$row['lastname']}</td>
            <td>
                <form method='POST' action='update_grade.php'>
                    <input type='hidden' name='student_code' value='{$row['code_meli']}'>
                    <input type='text' name='moadel' placeholder='نمره'>
            </td>
            <td>
                    <input type='submit' value='ثبت'>
                </form>
            </td>
        </tr>";
    }
} else {
    echo "<tr><td colspan='5'>هیچ دانش‌آموزی برای شما ثبت نشده است.</td></tr>";
}
?>
</table>

</body>
</html>