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
        `code_meli`, `firstname`, `lastname`, `father`, `grade`

        <input type="text" name="code_meli">
        <input type="text" name="firstname">
        <input type="text" name="lastname">
        <input type="text" name="father">
        <input type="text" name="grade">

        <input type="submit" value="ثبت">
    </form>

</body>

</html>