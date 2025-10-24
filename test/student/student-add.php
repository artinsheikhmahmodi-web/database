<?php
echo "دانش آموز جدید";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>دانش آموز جدید</title>
</head>

<body>

    <form action="student-add-action.php" method="post">
        `code_meli`, `firstname`, `lastname`, `father`, `jenseiat`, `tarikh_tavalod`, `moadel`, `tozihat`, `code_modir`
        <p>
            <label for="code_meli">کد ملی</label>
            <input type="text" name="code_meli" id="code_meli">
        </p>
        <p>
            <label for="firstname">نام</label>
            <input type="text" name="firstname" id="firstname">
        </p>
        <p>
            <label for="lastname">نام خانوادگی</label>
            <input type="text" name="lastname" id="lastname">
        </p>
        <p>
            <label for="father">پدر </label>
            <input type="text" name="father" id="father">
        </p>
        <p>
            <label for="jenseiat">جنسیت</label>
            <input type="text" name="jenseiat" id="jenseiat">
        </p>
        <p>
            <label for="tarikh_tavalod">تاریخ تولد </label>
            <input type="text" name="tarikh_tavalod" id="tarikh_tavalod">
        </p>
        <p>
            <label for="moadel">معدل </label>
            <input type="text" name="moadel" id="moadel">
        </p>
        <p>
            <label for="tozihat">توضیحات</label>
            <input type="text" name="tozihat" id="tozihat">
        </p>
        <p>
            <label for="code_modir">کد مدیر</label>
            <input type="text" name="code_modir" id="code_modir">
        </p>
        <input type="submit" value="ثبت">
    </form>

</body>

</html>