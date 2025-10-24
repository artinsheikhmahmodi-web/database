<?php
// update_grade.php
// دریافت POST از فرم inline در student.php برای ثبت/ویرایش "moadel"

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

include "../db.php";
$cnn = (new db)->connection_database;

// بررسی لاگین
if (!isset($_SESSION['user_logged']) || empty($_SESSION['user_logged'])) {
    echo "مجاز نیستید.";
    exit;
}

$user_logged = $_SESSION['user_logged'];
$role = isset($user_logged['role']) ? $user_logged['role'] : '';

// دریافت و اعتبارسنجی ورودی‌ها
if (!isset($_POST['student_code']) || !isset($_POST['moadel'])) {
    echo "ورودی لازم ارسال نشده.";
    exit;
}

$student_code = trim($_POST['student_code']);
$moadel_raw = trim($_POST['moadel']);

// اعتبارسنجی معدل (عدد بین 0 و 20)
if (!is_numeric($moadel_raw)) {
    echo "معدل باید یک عدد باشد.";
    exit;
}
$moadel = floatval($moadel_raw);
if ($moadel < 0 || $moadel > 20) {
    echo "معدل باید بین 0 تا 20 باشد.";
    exit;
}

// اگر کاربر معلم است، چک کنیم این دانش‌آموز متعلق به اوست
if ($role === 'teacher') {
    $teacher_code = $user_logged['code_meli']; // همونی که در session داری
    // Prepared statement برای جلوگیری از SQL injection
    $chk_sql = "SELECT 1 FROM student_teacher WHERE teacher_code = ? AND student_code = ? LIMIT 1";
    $chk_stmt = $cnn->prepare($chk_sql);
    if (!$chk_stmt) {
        echo "خطا در آماده‌سازی پرس‌وجو: " . htmlspecialchars($cnn->error);
        exit;
    }
    $chk_stmt->bind_param("is", $teacher_code, $student_code);
    $chk_stmt->execute();
    $chk_res = $chk_stmt->get_result();
    if ($chk_res->num_rows === 0) {
        echo "شما اجازه‌ی تغییر معدل این دانش‌آموز را ندارید.";
        exit;
    }
    $chk_stmt->close();
}

// حالا آپدیت معدل در جدول student با prepared statement
$update_sql = "UPDATE student SET moadel = ? WHERE code_meli = ?";
$update_stmt = $cnn->prepare($update_sql);
if (!$update_stmt) {
    echo "خطا در آماده‌سازی پرس‌وجو: " . htmlspecialchars($cnn->error);
    exit;
}
$update_stmt->bind_param("ds", $moadel, $student_code);

if ($update_stmt->execute()) {
    // موفقیت — بازگشت به صفحه لیست با پیام کوتاه (یا می‌تونی redirect بدون پیام کنی)
    // اگر می‌خوای پیام را در session بذاری و در student.php نمایش بدی، می‌تونی از $_SESSION استفاده کنی.
    $_SESSION['flash_msg'] = "معدل با موفقیت ثبت شد.";
    $update_stmt->close();
    // برگرد به لیست (آدرس را بر اساس ساختار پروژه‌ات تنظیم کن)
    header("Location: student.php");
    exit;
} else {
    echo "خطا در ثبت معدل: " . htmlspecialchars($update_stmt->error);
    $update_stmt->close();
    exit;
}
?>