<?php
echo "مدرسه جدید";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مدرسه جدید</title>
    <style>
        .d-none {
            display: none;
        }
    </style>
</head>

<body>

    <form action="madreseh-add-action.php" method="post">
        `code_madreseh`, `name`, `code_modir`
        <p>
            <label for="code_madreseh">کد مدرسه</label>
            <input type="text" name="code_madreseh" id="code_madreseh">
        </p>
        <p>
            <label for="name">نام</label>
            <input type="text" name="name" id="name">
        </p>
        <p>
            <label for="code_modir">کد مدیر </label>
            <?php
            if (isset($_GET["option"]) && $_GET["option"] == "selected_modir") {
                // &code_modir=177){
            ?>
                <input type="text" name="code_modir" id="code_modir" value="<?= $_GET["code_modir"] ?>">
            <?php
            } else {
            ?>
                <input type="text" name="code_modir" id="code_modir" value="">
            <?php
            }
            ?>

            <br>
            <a href="../modir/modir.php?option=select_modir">انتخاب مدیر</a>

        </p>
        <input type="submit" value="ثبت">
    </form>


    <div id="d1" class="d-none">

    </div>

</body>

</html>